<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center align-content-center">
            <div class="col-12">
                <h1 class="p-5">{{ __('ui.ricerca') }}"<span class="fdt-italic">{{$query}}</span>"
                </h1>
            </div>
        </div>
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card shadow">
                        <img class="card-img-top" src="{{$article->images->first()->getUrl(600, 600)}}" alt="foto dell'articolo">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->nome}}</h5>
                            <p class="card-text">{{$article->provenienza}}</p>
                            <p class="card-text">{{$article->prezzo}}</p>
                            <a href="{{route('categoryDet', $article)}}" class="btn btn-success shadow">{{ __('ui.details') }}</a>
                            <p class="">{{ __('ui.published') }} : {{$article->created_at->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        {{ __('ui.negative') }}
                    </h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>