<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;
use Image as ImageResize;

class ImageController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $images = Image::where('name', 'LIKE', "%$search%")->orderByDesc('created_at')->take(10)->paginate(10);
            return view('user.image_records', compact('images'));
        }
        $images = Image::orderByDesc('created_at')->paginate(10);
        return view('user.image_records', compact('images'));
    }

    public function new(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:15'],
            'nickname' => ['required', 'max:20'],
            'job' => ['required', 'max:25'],
            'traits' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:4096']
        ]);
        DB::beginTransaction();
        $image = new Image();
        $image->name = $request->name;
        $image->nickname = $request->nickname;
        $image->job = $request->job;
        $image->traits = $request->traits;
        $image->image_code = Str::random();

        $imageFile = $request->file('image');
        $imageName = Str::random(20);
        $imageFileName = $imageName . '.' . $imageFile->extension();
        $imagePath = public_path('/work/original');
        $imageResizePath = public_path('/work/resized');
        $img = ImageResize::make($imageFile->path());
        $img->resize(600, 850, function($constraint) {
            $constraint->aspectRatio();
        })->save($imageResizePath.'/'.$imageFileName);
        $imageFile->move($imagePath.'/'.$imageFileName);
        $imageInfo = array_merge(
            $request->except(['_token', 'image']), 
            ['original_image' => $imageFileName]
        );
        $pdf = Pdf::loadView('user.image_view', compact('imageInfo'));
        $pdfFileName = $imageName . '.pdf';
        $pdf->save(public_path()."/work/processed/$pdfFileName");
        $image->original_image = $imageFileName;
        $image->processed_image = $pdfFileName;
        if ($image->save()) {
            #$url = route('user.image.view', ['id' => $imageId]);
            #$pdf = Pdf::loadFile($url);
            DB::commit();
            $pdf->download($pdfFileName);
            return back()->with('success', 'Image has been processed')
                        ->with('img_link', route('user.image', ['id' => $image->id, 'code' => $image->image_code]));
        }
        DB::rollBack();
        return back()->withErrors(['saveErr' => 'Error processing image, pls try again']);
    }

    public function get($id, $code)
    {
        $image = Image::find($id);
        return view('user.image', compact('image'));
    }

    public function view($id)
    {
        $image = Image::find($id);
        $imageInfo = $image->toArray();
        return view('user.image_view', compact('imageInfo'));
    }
}
