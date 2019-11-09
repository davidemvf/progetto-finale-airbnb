<div class="message-form">
  <form class="" action="{{ route('message.store', $apartment -> id) }}" method="post">
    @csrf
    @method('POST')

    @guest
      <label for="firstname">Nome</label>
      <input type="text" name="firstname" value="">

      <label for="lastname">Cognome</label>
      <input type="text" name="lastname" value="">

      <label for="email">Inserisci il tuo indirizzo email</label>
      <input type="text" name="email" value="">
    @else
      <label for="firstname">Nome</label>
      <input type="text" name="firstname" value="{{ Auth::user() -> firstname }}">

      <label for="lastname">Cognome</label>
      <input type="text" name="lastname" value="{{ Auth::user() -> lastname }}">

      <label for="email">Email</label>
      <input type="text" name="email" value="{{ Auth::user() -> email }}">
    @endguest


    <input type="text" name="content" placeholder="Scrivi il messaggio..." value="">

    <button type="submit" name="button">Invia</button>
  </form>
</div>
