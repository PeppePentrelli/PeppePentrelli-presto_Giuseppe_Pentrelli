<x-layout>
    {{-- Distanziatore --}}
    <div style="height: 100px"></div>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold display-6 text-primary">Dashboard Revisore</h1>
        </div>

        @if ($article_to_check)
            {{-- Row principale: immagini a sinistra, contenuto a destra (in verticale su mobile) --}}
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 d-flex justify-content-center mb-4">
                    {{-- Swiper Images --}}
                    @if ($article_to_check->images->count())
                        <div class="swiper mySwiper rounded shadow" style="width: 100%; max-width: 350px; height: 350px;">
                            <div class="swiper-wrapper">
                                @foreach ($article_to_check->images as $image)
                                    <div class="swiper-slide d-flex justify-content-center align-items-center bg-light">
                                        <img src="{{ Storage::url($image->path) }}" alt="immagine articolo"
                                            class="img-fluid rounded" style="max-height: 300px; object-fit: contain;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="swiper mySwiper rounded shadow"
                            style="width: 100%; max-width: 350px; height: 350px;">
                            <div class="swiper-wrapper">
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="swiper-slide d-flex justify-content-center align-items-center bg-light">
                                        <img src="https://picsum.photos/350?random={{ $i }}"
                                            alt="segnaposto {{ $i }}" class="img-fluid rounded"
                                            style="max-height: 300px; object-fit: contain;">
                                    </div>
                                @endfor
                            </div>
                        </div>



                    @endif
                </div>

                {{-- Dettagli articolo --}}
                <div class="col-12 col-md-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h2 class="card-title">{{ $article_to_check->title }}</h2>
                            <p class="card-subtitle mb-2 text-muted">Autore:
                                <strong>{{ $article_to_check->user->name }}</strong>
                            </p>
                            <p><strong>Prezzo:</strong> {{ $article_to_check->price }}€</p>
                            <p><strong>Categoria:</strong> {{ $article_to_check->category->name }}</p>
                            <p>{{ $article_to_check->description }}</p>

                            @if (session()->has('message'))
                                <div class="alert alert-success text-center mt-4">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="d-flex justify-content-around mt-4">
                                {{-- Form per rifiutare --}}
                                <form method="POST" action="{{ route('reject', ['article' => $article_to_check]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-danger">Rifiuta</button>
                                </form>

                                {{-- Form per accettare --}}
                                <form method="POST" action="{{ route('accept', ['article' => $article_to_check]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-success">Accetta</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Nessun articolo --}}
            <div class="d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
                <h1 class="mb-3 text-secondary">Nessun articolo da revisionare</h1>
                <a class="btn btn-primary" href="{{ route('homepage') }}">Torna all'homepage</a>
            </div>
        @endif
    </div>




    {{-- SwiperJS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            effect: 'cards',
            grabCursor: true,
        });
    </script>
</x-layout>
