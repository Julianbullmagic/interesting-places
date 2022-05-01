<?php

use Illuminate\Support\Facades\Route;
use App\Models\Review;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('/reviews', 'App\Http\Controllers\ReviewsController');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reviews/create/{placeid}', function ($placeid) {
    return view('reviews/create')->with('placeid', $placeid);
});

Route::get('/yourreviews/{userid}', function ($userid) {
  error_log("hi",$userid);
  $reviews=Review::where('userid', $userid )->get();
  return view('reviews/yourreviews')->with('reviews', $reviews);
});

  Route::get('/getreviewsforaplace/{placeid}', function ($placeid) {
    error_log("hello");
    $reviews=Review::where('placeid', $placeid )->get();
    return $reviews;
  });

  Route::post('/createplace', function (Request $request) {
    error_log("hello!!!!");
    $place = new Place;

    $place_id=$request->get('place_id');
    if(isset($place_id)){
      error_log($request->get('place_id'));
      $place->place_id = $request->get('place_id');
    }
    $address=$request->get('address');
    if(isset($address)){
      error_log($request->get('address'));
      $place->address = $request->get('address');
    }
    $name=$request->get('name');
    if(isset($name)){
      error_log($request->get('name'));
      $place->name = $request->get('name');
    }
    $phone=$request->get('phone');
    if(isset($phone)){
      error_log($request->get('phone'));
      $place->phone = $request->get('phone');
    }
    $website=$request->get('website');
    if(isset($website)){
      error_log($request->get('website'));
      $place->website = $request->get('website');
    }

    // $review->location = $request->input('location');
    // $review->types = $request->input('types');
    $place->save();
    return $place;
  });
?>
