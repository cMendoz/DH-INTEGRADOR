<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LanguageController extends Controller
{
    public function change(Request $request) {
        $user = Auth::user();
        $language = strtolower($request['language']);

        $user->language = $language;
        $user->save();

        return redirect('/');
    }
}
