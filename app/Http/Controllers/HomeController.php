<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        #$imageRecords = Image::all();
        $totalRecords = Image::count();
        $todayRecords = Image::where(DB::raw('DATE(created_at)'), date('Y-m-d'))->count();
        return view('user.dashboard', compact('totalRecords', 'todayRecords'));
    }

    public function home()
    {
        return redirect()->route('login');
    }
}
