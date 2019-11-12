<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Service;
use App\Message;

class userSempliceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $apartments = Apartment::all();
      return view('pages.home', compact('apartments'));
    }

    // Funzione per visualizzazione appartamenti con ricerca semplice
    public function search()
    {
        $city = $_GET['city'];
        $apartments = Apartment::where('city', $city) -> get();
        return view('pages.apartmentSearch', compact('apartments', 'city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function messageStore(Request $request, $id)
    {
        $validatedData = $request -> validate([
          'firstname' => 'required',
          'lastname' => 'nullable',
          'content' => 'required',
          'email' => 'required'
        ]);

        // $apartment = Apartment::findOrFail($id);
        // $message = Message::create($validatedData);
        $validatedData['apartment_id'] = $id;
        // dd($apartment);
        $newMessage = new Message;
        $newMessage->fill($validatedData);
        // $newMessage->save();
        $newMessage = Message::create($validatedData);

        // $request->session()->flash('status', 'Il messaggio è stato inviato correttamente');
        // $request->session()->flash('error', 'Si è verificato un errore. Inviare un nuovo messaggio');

        return redirect('apartment/' . $id);
        // return back()->withInput([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $services = Service::where('apartment_id', $id)->first();

        $apartment = Apartment::findOrFail($id);
        return view('pages.apartmentShow', compact('apartment', 'user'));
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
