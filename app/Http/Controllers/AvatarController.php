<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AvatarController extends Controller
{
    public function store(Request $request) {
        $user = Auth::user();

        $path = $request->file('avatar')->store('public');
        $fileName = basename($path);

        $user->avatar = $fileName;
        $user-> save();

        return redirect('/');
    }
}
