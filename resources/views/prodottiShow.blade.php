<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-1 text-center">
                <h1 class="display-1  p-4">{{ __('ui.prodotti') }}</h1>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row  justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 my-3">
                    <div data-aos="flip-left">
                        <div class="card">
                            <div class="card-body p-1">
                                <img class="card-img-top"
                                src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(600, 600) : 'https://picsum.photos/200' }}"
                                alt="foto dell'articolo {{ $article->nome }}">
                                <h5 class="card-title">{{ $article->nome }}</h5>
                                <p class="card-text">{{ $article->provenienza }}</p>
                                <p class="card-text"> {{ substr($article->descrizione, 0, 100) }}
                                    @if (strlen($article->descrizione) >= 100) ... @endif
                                    </p>
                                <p class="card-text"> € {{ $article->prezzo }}</p>
                                <a href="{{ route('categoryDet', $article) }}"
                                    class="btn btn-success shadow">{{ __('ui.details') }}</a>
                                <a href="{{ route('categoryShow', $article->category) }}"
                                    class="btn btn-success shadow my-5"> {{ $article->category->categoria }}</a>
                                <p>{{ __('ui.published') }}: {{ $article->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
