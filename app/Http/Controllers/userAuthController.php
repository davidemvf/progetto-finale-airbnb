<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ApartmentRequest;
use App\Apartment;
use App\Service;
use App\Message;
use App\Sponsorship;

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

    }

    public function sponsorshipIndex($id)
    {
      $apartment = Apartment::findOrFail($id);
      $sponsorships = Sponsorship::all();
      return view('pages.sponsorship', compact('sponsorships', 'apartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('pages.apartmentCreate', compact('services'));
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
        'city' => 'required',
        'prov' => 'required',
        'cap' => 'required',
        'address'=> 'required',
        // 'lat'=> 'required',
        // 'long'=> 'required',
        'img'=> 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        'services' => []
        ]);

      $name = uniqid(date('HisYmd'));

      $file = $request -> file('img');
      if ($file) {
      $targetPath = "img";
      $targetFile = "aprt-" . $name . "." . $file -> getClientOriginalExtension();
      $file -> move($targetPath, $targetFile);
      $validated['img'] = $targetFile;
      }

      $validated['user_id'] = $request->user()-> id;
      // Apartment::create($validated);

        $newApartment = new Apartment;
        $newApartment->fill($validated);
        $newApartment->save();
        $newApartment->services()->sync($validated['services']);

      return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myapartmentshow()
    {
        $user = Auth::user();
        $apartments = Apartment::all();
        return view('pages.myapartmentsShow', compact('apartments', 'user'));
    }

    public function messagesShow()
    {
        $userId = Auth::user() -> id;

        // $apartments = DB::table('messages')
        //     ->join('apartments', 'apartments.id', '=', 'messages.apartment_id')
        //     ->where('user_id', '=', $userId)
        //     ->get();

        $messages = DB::table('apartments')
            ->join('messages', 'apartments.id', '=', 'messages.apartment_id')
            ->where('user_id', '=', $userId)
            ->orderBy('messages.created_at', 'DESC')
            ->get();

        return view('pages.myMessages', compact('messages'));
    }

    public function paymentShow($id, $sponsorship_id)
    {
      $apartment = Apartment::findOrFail($id);
      $sponsorship = Sponsorship::findOrFail($sponsorship_id);
      return view('pages.payment', compact('apartment', 'sponsorship'));
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
        $services = Service::all();
        return view('pages.apartmentEdit', compact('apartment', 'services'));
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
        $apartment->services()->sync($validated['services']);

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
        $apartment->messages()->delete();
        $apartment->payments()->sync([]);
        $apartment->services()->sync([]);
        $apartment->sponsorships()->sync([]);
        $apartment->delete();
        return redirect('/');
    }
}
