<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\ApartmentRequest;
use App\Apartment;
use App\User;

class userAuthController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('pages.apartmentCreate', compact('users', 'apartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validated = $request->validate([
        'title'=> 'required',
        'desc'=> 'required',
        'rooms'=> 'required',
        'beds'=> 'required',
        'toilettes'=> 'required',
        'square_meters'=> 'required',
        'address'=> 'required',
        'img'=> 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048'

        ]);


      $file = $request -> file('img');
      if ($file) {
      $targetPath = "img";
      $targetFile = "aprt-" . rand(1,9999) . "." . $file -> getClientOriginalExtension();
      $file -> move($targetPath, $targetFile);
      $validated['img'] = $targetFile;
      }


      $validated['user_id'] = $request->user()->id;
      Apartment::create($validated);
      return redirect('/home');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
