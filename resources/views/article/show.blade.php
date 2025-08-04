{{-- Article Show --}}
<x-layout>
    {{-- Distanziatore --}}
    <div style="height: 100px"></div>

    <div class="container">
        <div class="row g-4">
            {{-- SIDEBAR ORIZZONTALE SU MOBILE, VERTICALE SU DESKTOP --}}
            <div class="col-md-3">
                <div class="related-articles bg-light p-3 rounded shadow h-100 d-flex flex-column justify-content-start"
                    style="min-height: 100%; max-height: 1000px; overflow-y: auto;">

                    {{-- Titolo visibile solo su mobile --}}
                    <h5 class="d-md-none mb-2">Altri articoli</h5>

                    {{-- Container scrollabile su mobile --}}
                    <div class="d-md-none overflow-x-auto" style="white-space: nowrap;">
                        @foreach ($articles as $relatedArticle)
                            <div class="d-inline-block" style="width: 250px; margin-right: 10px;">
                                <div class="card">
                                    <img src="{{ $relatedArticle->image }}" class="card-img-top"
                                        style="height: 120px; object-fit: cover;">
                                    <div class="card-body p-2">
                                        <h6 class="card-title">{{ $relatedArticle->title }}</h6>
                                        <a href="{{ route('article.show', $relatedArticle) }}"
                                            class="btn btn-sm btn-primary w-100">Leggi</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Titolo visibile solo su desktop --}}
                    <h5 class="d-none d-md-block my-4 text-center bold">Articoli correlati</h5>

                    {{-- Versione verticale per desktop --}}
                    <div class="d-none d-md-block">
                        @forelse ($articles as $relatedArticle)
                            <div class="card mb-3 mx-auto" style="width: 90%;">
                                <img src="{{ $relatedArticle->image }}" class="card-img-top"
                                    style="height: 120px; object-fit: cover;">
                                <div class="card-body p-2">
                                    <h6 class="card-title">{{ $relatedArticle->title }}</h6>
                                    <a href="{{ route('article.show', $relatedArticle) }}"
                                        class="btn btn-sm btn-primary w-100">Leggi</a>
                                </div>
                            </div>
                        @empty
                            <div class="text-muted text-center">Nessun articolo correlato trovato.</div>
                        @endforelse
                    </div>


                </div>
            </div>


            {{-- DETTAGLIO ARTICOLO --}}
            <section class="col-12 col-md-9 col-lg-9 ">
                <div class="card mb-5 shadow bg-gradient">

                    {{-- Carosello --}}
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ $article->image_url ?? 'https://picsum.photos/902/400' }}"
                                    class="d-block w-100" alt="{{ $article->title }}"
                                    style="object-fit: cover; height: 300px;">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ $article->image_url ?? 'https://picsum.photos/902/400' }}"
                                    class="d-block w-100" alt="{{ $article->title }}"
                                    style="object-fit: cover; height: 300px;">
                            </div>
                            <div class="carousel-item">

                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    {{-- Corpo della card --}}
                    <div class="card-body">
                        <h1 class="card-title">{{ $article->title }}</h1>

                        @if (Auth::check())
                            <p class="text-muted mb-2">Pubblicato da {{ Auth::user()->name }}</p>
                        @else
                            <p class="text-muted mb-2">Pubblicato da un utente non autenticato</p>
                        @endif

                        <p class="text-muted mb-2">{{ $article->created_at->format('d/m/Y') }}</p>
                        <small class="badge bg-info text-dark mb-3">#{{ $article->category->name }}</small>
                        <p class="card-text">{{ $article->description }}</p>

                        <a href="{{ route('article.index') }}" class="btn btn-primary mt-3">Torna alla lista</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- Distanziatore --}}
    <div style="height: 100px"></div>
</x-layout>
