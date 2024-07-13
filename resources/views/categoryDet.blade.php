<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 p-5">{{ __('ui.details') }}</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-2 mb-5">
        <div class="row justify-content-center">
            <div class="col-4 d-flex text-center flex-column justify-content-center">
                <h2>{{ __('ui.name') }} : {{$article->nome}}</h2>
                <h4>{{ __('ui.provenienza') }} : {{$article->provenienza}}</h4>
                <p>{{ __('ui.description') }} : {{$article->descrizione}}</p>
                <p class="bold">{{ __('ui.vendor') }}: {{$article->user->name}}</p>
                <a href="{{ route('categoryShow',$article->category) }}" class="btn btn-success shadow my-5"> {{$article->category->categoria}}</a>
            </div>
            <div class="col-6">
                @if ($article->images->count() > 0)
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($article->images as $key => $image)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img src="{{ $image->getUrl(600, 600) }}" class="d-block w-100 h-50" alt="Immagine {{ $key + 1}} dell'articolo {{ $article->title}}" style="height:500px !important">
                        </div>
                        @endforeach
                    </div>
                    @if ($article->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    @endif
                </div>
                @else
                <img src="https://picsum.photos/300" alt="Nessuna foto inserita dall'utente">
                @endif
            </div>
        </div>
    </div>
</x-layout>