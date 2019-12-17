<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CurrencyController extends Controller
{
    public function change(Request $request) {
        $user = Auth::user();
        $currency = $request['currency'];

        $user->currency = $currency;
        $user->save();

        return redirect('/');
    }
}
