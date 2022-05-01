<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Review;
class ReviewsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth',['except'=>['index','show']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reviews=Review::all();
      return view('reviews.index')->with('reviews',$reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'stars' => 'required',
          'body' => 'required',
          'placeid' => 'required',

      ]);

      $review = new Review;
      $review->stars = $request->input('stars');
      $review->body = $request->input('body');
      $review->userid = auth()->user()->id;
      $review->placeid = $request->input('placeid');
      $review->save();

      return redirect('/')->with('place', $request->input('placeid'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review= Review::find($id);
        return view('reviews.show')->with('review',$review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
      {
          $review = Review::find($id);

          //Check if post exists before deleting
          if (!isset($review)){
              return redirect('/')->with('error', 'No Review Found');
          }

          // // Check for correct user
          // if(auth()->user()->id !==$post->user_id){
          //     return redirect('/posts')->with('error', 'Unauthorized Page');
          // }

          return view('reviews.edit')->with('review', $review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $this->validate($request, [
              'stars' => 'required',
              'body' => 'required'
          ]);
          $review = Review::find($id);

          // Update Post
          $review->stars = $request->input('stars');
          $review->body = $request->input('body');

          $review->save();

          return redirect('/')->with('success', 'Review Updated');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $review = Review::find($id);

         //Check if post exists before deleting
         if (!isset($review)){
             return redirect('/')->with('error', 'No Review Found');
         }

         // Check for correct user
         // if(auth()->user()->id !==$post->user_id){
         //     return redirect('/posts')->with('error', 'Unauthorized Page');
         // }

         $review->delete();
         return redirect('/')->with('success', 'Review Removed');
     }
}
