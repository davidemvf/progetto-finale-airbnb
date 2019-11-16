@extends('layouts.main-layout')

@section('content')
  <div class="">
    <div class="payment_box">
      <div class="">
        <h3><strong>{{ $sponsorship -> price }}€</strong> per il tuo annuncio: <strong>{{ $apartment -> title }}</h3></strong>
        <div id="dropin-container"></div>
        <button id="submit_button">Paga</button>
      </div>
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
