<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Mail\SendPasswordChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());
        return back()->with('success', 'Profile successfully updated.');
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        #Mail::to(auth('admin')->user()->email)->send(new SendPasswordChange(auth('admin')->user()->firstname));
        return back()->with('success', 'Password successfully updated.');
    }
}
