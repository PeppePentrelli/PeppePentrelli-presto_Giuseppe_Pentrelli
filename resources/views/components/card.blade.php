{{-- card articoli --}}
<div class="card mx-auto my-4"">
    <div class="content" style="transition: transform 0.8s; transform-style: preserve-3d; position: relative;">

        {{-- FRONT SIDE --}}
        <div class="front position-relative"
            style="backface-visibility: hidden; border-radius: 1rem; overflow: hidden; box-shadow: 0 4px 10px rgb(0 0 0 / 0.15);">

            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{ $article->image_url ?? 'https://picsum.photos/400/300' }}" class="img-fluid"
                    alt="{{ $article->title }}" style="height: 180px; object-fit: cover; width: 100%;" />
                <a href="{{ route('article.show', compact('article')) }}">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>

            <div class="card-body text-center">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="text-muted mb-2">{{ $article->price }} €</p>
                <small class="badge bg-info text-dark">#{{ $article->category->name }}</small>



            </div>


            <div class="card-footer d-flex justify-content-between">

                <small class="text-muted">{{ $article->created_at->format('d/m/Y') }}</small>
                <div class="text-center">
                    <small class="text-muted">
                                                    @if (Auth::check())
                                <p class="text-muted mb-2">Pubblicato da {{ Auth::user()->name }}</p>
                            @else
                                <p class="text-muted mb-2">Pubblicato da un utente non autenticato</p>
                            @endif
                    </small>
                </div>
            </div>
        </div>

        {{-- BACK SIDE --}}
        <div class="back position-absolute top-0 start-0 w-100 h-100 bg-primary text-white d-flex flex-column justify-content-center align-items-center p-4"
            style="backface-visibility: hidden; transform: rotateY(180deg); border-radius: 1rem;">

            <i class="bi bi-lightning-charge-fill me-2 text-white display-3"></i>

            <strong>{{ $article->category->name }}</strong>

            <div class=" d-flex justify-content-center align-items-center mt-2">
                <a href="{{ route('article.show', compact('article')) }}"
                    class="btn btn-light btn-sm me-2 ">Dettaglio</a>
                <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                    class="btn btn-light btn-sm ms-2">Categoria</a>
            </div>
        </div>

    </div>
</div>
