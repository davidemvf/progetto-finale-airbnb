<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorship;
use Braintree_Transaction;

class PaymentsController extends Controller
{
  public function process(Request $request, $id, $sponsorship_id) {

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

      $apartment -> save();

      
        return response()->json($status);
    }

}
