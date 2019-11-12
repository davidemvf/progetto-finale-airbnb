<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 app-flex testo-slider">
                    <p>The best holiday experience</p>
                    <h1>{{$city}}</h1>
                    <div class="box-searchbar">
                        <form class="searchbar" action="{{ route('apartment.search')}}">
                            @csrf
                            @method('GET')
                            <input value='' id="site-search" type="text" name="city" 
                            placeholder="Ricerca per città" required maxlength='50'>
                            <i class="fa fa-crosshairs"></i>
                            <button type="submit">
                                Search
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item active">
            <img class="d-block w-100 margin-slider" src="img/{{$city}}.jpg" alt="Napoli">
        </div>
        {{-- <div class="carousel-item">
            <img class="d-block w-100 margin-slider" src="img/toscana.jpg" alt="Firenze">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 margin-slider" src="img/fori-romani.jpg" alt="Roma">
        </div> --}}
    </div>
</div>