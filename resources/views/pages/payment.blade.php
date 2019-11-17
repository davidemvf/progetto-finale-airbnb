@extends('layouts.main-layout')

@section('content')
  <div class="container">
    <div class="payment_box">
        <h3>
          Hai scelto la promo da {{ $sponsorship -> price }}€ per il tuo annuncio.
          <br>
          Procededi pure al pagamento.
        </h3>
        <div id="dropin-container"></div>
        <button class="button_style" id="submit_button">CONFERMA PAGAMENTO</button>
    </div>
 </div>


  <script>
    $(document).ready(init);

    function init() {
    var button = document.querySelector('#submit_button');
    braintree.dropin.create({
      authorization: "{{ Braintree_ClientToken::generate() }}",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          $.get('{{ route('payment.make', [$id = $apartment -> id, $sponsorship_id = $sponsorship -> id]) }}', {payload}, function (response) {
            if (response.success) {
              alert('Payment successfull!');
            } else {
                alert('Payment failed');
              }
          }, 'json');
        });
      });
  });
  };
  </script>

@endsection
