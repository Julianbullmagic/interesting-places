<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlacesController extends Controller
{

  public function create(Request $request)
  {
    $place = new Place;
    $place->stars = $request->input('address');
    $place->body = $request->input('location');
    $place->stars = $request->input('name');
    $place->body = $request->input('phone');
    $place->stars = $request->input('types');
    $place->body = $request->input('website');
    $place->place_id = $request->input('place_id');
    $place->save();  }
}
