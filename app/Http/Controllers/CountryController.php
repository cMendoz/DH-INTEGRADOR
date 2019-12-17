<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CountryController extends Controller
{
    public function change(Request $request) {
        $user = Auth::user();
        $country = strtolower($request['country']);

        $user->country = $country;
        $user->save();

        return redirect('/');
    }
}
