<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApartmentRequest;
use App\Apartment;

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
        return view('pages.apartmentCreate');
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

      $name = uniqid(date('HisYmd'));

      $file = $request -> file('img');
      if ($file) {
      $targetPath = "img";
      $targetFile = "aprt-" . $name . "." . $file -> getClientOriginalExtension();
      $file -> move($targetPath, $targetFile);
      $validated['img'] = $targetFile;
      }

      $validated['user_id'] = $request->user()->id;
      Apartment::create($validated);
      return redirect('/');

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
        $apartment = Apartment::findOrFail($id);
        return view('pages.apartmentEdit', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentRequest $request, $id)
    {
        $validated = $request -> validated();
        $apartment = Apartment::findOrFail($id);

        $name = uniqid(date('HisYmd'));

        $file = $request -> file('img');
        if ($file) {
        $targetPath = "img";
        $targetFile = "aprt-" . $name . "." . $file -> getClientOriginalExtension();
        $file -> move($targetPath, $targetFile);
        $validated['img'] = $targetFile;
        }

        $apartment -> update($validated);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        return redirect('/');
    }
}
