<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Sponsorship;
use Braintree_Transaction;

class PaymentsController extends Controller
{
  public function make(Request $request, $id, $sponsorship_id) {

      /* recupero l'appartamento */
      $apartment = Apartment::findOrFail($id);

      /* recupero la sponsorizzazione */

      $sponsorship = Sponsorship::findOrFail($sponsorship_id);
      $payload = $request->input('payload', false);
      $nonce = $payload['nonce'];
      $status = Braintree_Transaction::sale([
          'amount' => $sponsorship -> price,
          'paymentMethodNonce' => $nonce,
          'options' => [
              'submitForSettlement' => True
          ]
      ]);


      /* sincronizzo la relazione */
      $apartment -> sponsorships()->sync($sponsorship);

      /*aggiorno il created_at ad ogni promo*/
      $update = DB::table('apartment_sponsorship')
      ->where('apartment_sponsorship.apartment_id', '=', $id)
      ->update(['apartment_sponsorship.created_at' => Carbon::now()->toDateTimeString()]);

      $apartment -> save();


        return response()->json($status);
    }

}
