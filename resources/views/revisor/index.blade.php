<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 bgpers">
                <h1 class="display-5 text-center p-5">{{ __('ui.dashboard') }}</h1>
                @if (session()->has('message'))
                <div class="row justify-content-center">
                    <div class="col-12 alert alert-success text-center shadow rounded">
                        {{ session('message') }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @if ($article_to_check)
    <div class="container ">
        <div class="row bgpers justify-content-center">
            @if ($article_to_check->images->count())
            @foreach ($article_to_check->images as $key => $image)
            <div class="col-6 col-md-4 mb-3">
                <img src="{{ $image->getUrl(600, 600) }}" class="img-fluid rounded shadow"
                alt="Immagine {{ $key + 1 }} dell'articolo ' {{ $article_to_check->nome }} ">
            </div>
            @endforeach
            @else
            @for ($i = 0; $i < 3; $i++)
            <img src="https://picsum.photos/200" class="img-fluid rounded shadow imgindex "
            alt="immagine segnaposto">
            @endfor
            @endif
        </div>
    </div>
    <div class="col-md-5 ps-3">
        <div class="card-body">
            <h5 class="fw-bold">Labels</h5>
            {{-- @dd($article_to_check->images) --}}
            @foreach ($article_to_check->images as $image)
            @if ($image->labels)
            @foreach ($image->labels as $label)
            #{{ $label }},
            @endforeach
            @else
            <p class="fst-italic">No labels</p>
            @endif
        </div>
    </div>
    <div class="col-md-3 ps-3">
        <div class="card-body">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$loop->index}}" aria-expanded="false" aria-controls="flush-collapseOne{{$loop->index}}">
                            Ratings
                        </button>
                    </h2>
                    <div id="flush-collapseOne{{$loop->index}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->adult }}">
                                    </div>
                                </div>
                                <div class="col-10">adult</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->violence }}">
                                    </div>
                                </div>
                                <div class="col-10">violence</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->spoof }}">
                                    </div>
                                </div>
                                <div class="col-10">spoof</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->racy }}">
                                    </div>
                                </div>
                                <div class="col-10">racy</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->medical }}">
                                    </div>
                                </div>
                                <div class="col-10">medical</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="container">
        <div class="row justify-content-center mt-3 ">
            <div class="col-6 d-flex flex-column text-center justify-content-center">
                <div>
                    <h1>{{ $article_to_check->nome }}</h1>
                    <h3>Venditore: {{ $article_to_check->user->name }}</h3>
                    <h4>{{ $article_to_check->prezzo }} € </h4>
                    <h4 class="fst-italic text-muted">#{{ $article_to_check->category->categoria }}</h4>
                    <p class="h6">{{ $article_to_check->descrizione }}</p>
                </div>
                <div class="d-flex pb-4 justify-content-around ">
                    <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger py-2 px-5 fw-bold">{{ __('ui.rifiuta') }}</button>
                    </form>
                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success py-2 px-5 fw-bold">{{ __('ui.accetta') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row justify_content_center align-items-center height-custom text-center">
    <div class="col-12">
        <h1 class="fst-italic display-4">{{ __('ui.negative1') }}</h1>
        <a href="{{ route('welcome') }}" class="mt-5 btn btn-success">{{ __('ui.home') }}</a>
    </div>
</div>
@endif
</div>

</x-layout>
