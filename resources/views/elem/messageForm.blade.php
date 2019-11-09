<div class="message-form">
  <form class="" action="{{ route('message.store', $apartment -> id) }}" method="post">
    @csrf
    @method('POST')

    @guest
      <label for="firstname">Nome</label> <br>
      <input type="text" name="firstname" value=""> <br>

      <label for="lastname">Cognome</label> <br>
      <input type="text" name="lastname" value=""> <br>

      <label for="email">Email</label> <br>
      <input type="text" name="email" value=""> <br>
    @else
      <label for="firstname">Nome</label> <br>
      <input type="text" name="firstname" value="{{ Auth::user() -> firstname }}"> <br>

      <label for="lastname">Cognome</label> <br>
      <input type="text" name="lastname" value="{{ Auth::user() -> lastname }}"> <br>

      <label for="email">Email</label> <br>
      <input type="text" name="email" value="{{ Auth::user() -> email }}"> <br>
    @endguest

    <label for="content">Messaggio</label> <br>

    <textarea name="content" rows="8" cols="40" placeholder="scrivi un messaggio"></textarea> <br>

    <button class="button_style" type="submit" name="button">Invia</button>
  </form>
</div>
