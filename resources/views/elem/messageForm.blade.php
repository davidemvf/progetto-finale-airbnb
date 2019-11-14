<div class="message-form">

  <form class="" action="{{ route('message.store', $apartment -> id) }}" method="post">
    @csrf
    @method('POST')

    @guest
      <div class="form-row">
        <div class="form-group col-xs-12 col-md-4">
          <label for="firstname">Nome</label>
          <input class="form-control" type="text" name="firstname" value="">
        </div>

        <div class="form-group col-xs-12 col-md-4">
          <label for="lastname">Cognome</label>
          <input class="form-control" type="text" name="lastname" value="">
        </div>

        <div class="form-group col-xs-12 col-md-4">
          <label for="email">Email</label>
          <input class="form-control" type="text" name="email" value="">
        </div>
      </div>
    @else
      <div class="form-row">
        <div class="form-group col-xs-12 col-md-4">
          <label for="firstname">Nome</label>
          <input class="form-control" type="text" name="firstname" value="{{ Auth::user() -> firstname }}">
        </div>

        <div class="form-group col-xs-12 col-md-4">
          <label for="lastname">Cognome</label>
          <input class="form-control" type="text" name="lastname" value="{{ Auth::user() -> lastname }}">
        </div>

        <div class="form-group col-xs-12 col-md-4">
          <label for="email">Email</label>
          <input class="form-control" type="text" name="email" value="{{ Auth::user() -> email }}">
        </div>
      </div>
    @endguest

    <div class="form-group">
      <label for="content">Messaggio</label>
      <textarea class="form-control" name="content" rows="8" placeholder="scrivi un messaggio"></textarea>
      <button class="button_style" type="submit" name="button">Invia</button>
    </div>

  </form>
</div>
