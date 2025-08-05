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
                    <div class="d-md-none overflow-x-auto" style="white-space: nowrap; ">

                        @foreach ($relatedArticles as $relatedArticle)
                            <div class="d-inline-block py-5" style="width: 250px; margin-right: 10px;">
                                <div class="card ">

                                    <img src="{{ $relatedArticle->images->first() ? Storage::url($relatedArticle->images->first()->path) : 'https://picsum.photos/200/300' }}"
                                        class="card-img-top" style="height: 120px; object-fit: cover;">
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

                        @forelse ($relatedArticles as $relatedArticle)
                            <div class="card mb-3 mx-auto" style="width: 90%;">

                                <img src="{{ $relatedArticle->images->first() ? Storage::url($relatedArticle->images->first()->path) : 'https://picsum.photos/200/300' }}"
                                    class="card-img-top" style="height: 120px; object-fit: cover;">
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
            <section class="col-12 col-md-9 col-lg-9">
                <div class="card shadow p-3 bg-light">
                    {{-- Carosello immagini 300x300 --}}
                    @if ($article->images->count() > 0)
                        <div id="carouselArticle-{{ $article->id }}" class="carousel slide mb-3">
                            <div class="carousel-inner">
                                @foreach ($article->images as $key => $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ $image->getUrl(300, 300) }}" class="d-block mx-auto rounded shadow"
                                            alt="Immagine {{ $key + 1 }}" style="width: 300px; height: 300px; ">
                                    </div>
                                @endforeach
                            </div>
                            @if ($article->images->count() > 1)
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselArticle-{{ $article->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Precedente</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselArticle-{{ $article->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Successivo</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <img src="https://picsum.photos/300/300?random=1" class="d-block mx-auto mb-3 rounded shadow"
                            alt="Immagine di default" style="width: 300px; height: 300px; object-fit: contain;">
                    @endif

                    {{-- Dettagli testuali --}}
                    <div class="text-center mb-4">
                        <h2>{{ $article->title }}</h2>
                        <p class="text-muted">{{ $article->created_at->format('d/m/Y') }} -
                            {{ $article->user->name ?? 'Non disponibile' }}</p>
                        <small class="badge bg-info text-dark">#{{ $article->category->name }}</small>
                        <p class="mt-3">{{ $article->description }}</p>
                    </div>

                    {{-- Tabella con dati aggiuntivi --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Prezzo</th>
                                    <td>{{ $article->price }} €</td>
                                </tr>
                                <tr>
                                    <th>Categoria</th>
                                    <td>{{ $article->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Venditore</th>
                                    <td>{{ $article->user->name ?? 'Non disponibile' }}</td>
                                </tr>
                                <tr>
                                    <th>Spedizione</th>
                                    <td>{{ $article->shipping_info }}</td>
                                </tr>
                                <tr>
                                    <th>Dimensioni (cm)</th>
                                    <td>{{ $article->length_cm }} x {{ $article->width_cm }} x
                                        {{ $article->height_cm }}</td>
                                </tr>
                                <tr>
                                    <th>Peso (kg)</th>
                                    <td>{{ $article->weight_kg }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('article.index') }}" class="btn btn-primary mt-3">Torna alla lista</a>
                    </div>
                </div>
            </section>

        </div>
    </div>
    {{-- Distanziatore --}}
    <div style="height: 100px"></div>
</x-layout>
