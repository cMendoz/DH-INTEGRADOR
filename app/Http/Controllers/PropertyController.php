<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Favorite;
use App\Photo;
use Auth;

class PropertyController extends Controller
{
    public function add(Request $request) {
        $newProperty = new Property();

        $pictures = $request['pictures'];
        $main_picture = array_shift($pictures);

        $main_path = $main_picture->store('public');
        $main_fileName = basename($main_path);
        
        $newProperty->title = $request['title'];
        $newProperty->location = $request['location'];
        $newProperty->main_picture = $main_fileName;
        $newProperty->area = $request['area'];
        $newProperty->beds = $request['beds'];
        $newProperty->price = $request['price'];
        $newProperty->owner = Auth::user()->id;

        $newProperty->save();

        foreach($pictures as $picture) {
            $newPicture = new Photo();

            $path = $picture->store('public');
            $fileName = basename($path);

            $newPicture->img = $fileName;
            $newPicture->property_id = $newProperty->id;
            $newPicture->save();
        }

        return redirect('/');
    }

    public function favorites(Request $request) {

        $favorites = $request['id'];

        foreach($favorites as $favorite) {
            $newFavorite = new Favorite();
            $newFavorite->property_id = $favorite;
            $newFavorite->user_id = Auth::user()->id;
            $newFavorite->favorite = 1;
            $newFavorite->save();
        }

        return redirect('/');
    }

    public function bookings(Request $request) {

        $newBooking = new Favorite();

        $newBooking->booked = 1;
        $newBooking->date_in = strtotime($request['dateIn']);
        $newBooking->date_out = strtotime($request['dateOut']);
        $newBooking->property_id = $request['id'];
        $newBooking->user_id = Auth::user()->id;
        $newBooking->price = $request['price'];
        $newBooking->save();

        return redirect('/');
    }
    
}
