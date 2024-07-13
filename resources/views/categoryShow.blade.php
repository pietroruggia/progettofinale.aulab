<x-layout>
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-1 p-4">{{ __('ui.esplora') }} #{{ $category->categoria }}</h1>
            </div>
        </div>
    </div>
    <div class="container bgpers ">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-around">
                    @forelse ($category->articles as $article)
                        <div class="col-12 col-md-4 my-2">
                            <div data-aos="flip-left">
                                <div class="card-shadow card">
                                    <div class="card-body ">
                                        <img class="card-img-top"
                                            src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(600, 600) : 'https://picsum.photos/200' }}"
                                            alt="foto dell'articolo {{ $article->nome }}">
                                        <h5 class=" mt-3 card-title">{{ $article->nome }}</h5>
                                        <p class="card-text">{{ $article->provenienza }}</p>
                                        <p class="card-text"> {{ substr($article->descrizione, 0, 100) }}
                                            @if (strlen($article->descrizione) >= 100) ... @endif
                                            </p>
                                        <p class="card-text">€ {{ $article->prezzo }}</p>
                                        <a href="{{ route('categoryDet', $article) }}"
                                            class="btn btn-success mt-2 ">{{ __('ui.details') }}</a>
                                        <p class="my-2 mt-2"> {{ __('ui.published') }} :
                                            {{ $article->created_at->format('d/m/Y') }}
                                            <br> {{ __('ui.vendor') }} : {{ $article->user->name ?? ' ' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p> {{ __('ui.annunci') }} </p>
                            <p> {{ __('ui.publish') }}: <a
                                    href="{{ route('article.create') }}
                            "
                                    class="btn btn-success">{{ __('ui.new') }}</a></p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>
