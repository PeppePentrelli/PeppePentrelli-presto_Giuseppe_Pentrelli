{{-- HomePage --}}
<x-layout>
    {{-- Inizio Header Pubblica Articolo + Accedi --}}
    <header class="container-fluid text-dark min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="display-1 fw-bold text-primary mb-3">
                <i class="bi bi-lightning-charge-fill me-2"></i>Presto.it
            </h1>

            <p class="lead text-muted mb-4">
                Il tuo marketplace di fiducia per vendere e comprare articoli in modo semplice e veloce!
            </p>

            @auth
                <a class="btn btn-lg btn-outline-primary px-4 py-2 shadow-sm" href="{{ route('article.create') }}">
                    <i class="bi bi-plus-circle me-2"></i>Pubblica subito un articolo!
                </a>
            @else
                <a class="btn btn-lg btn-primary px-4 py-2 shadow-sm" href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Accedi per iniziare!
                </a>
            @endauth
        </div>
    </header>

    {{-- Fine Header Pubblica Articolo + Accedi --}}

    {{-- Linea divisione sezione --}}
    <hr class="text-primary">

    {{-- Inizio Main-Ultimi articoli caricati --}}
    <main class="container-fluid">

        {{-- Titolo Main --}}
        <h2 class="display-5 fw-bold text-primary my-5 text-center">
            <i class="bi bi-lightning-charge-fill me-2"></i>Ultimi Articoli caricati
        </h2>

        <div class="row py-5">
            {{-- Card per ogni Articolo in DB --}}
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 col-lg-3">
                    <x-card :article="$article" />
                </div>

                {{-- Se non sono stati caricati Artticoli --}}
            @empty
                <div class="col-12">
                    <h3>Non sono stati caricati articoli</h3>
                </div>
            @endforelse
        </div>
    </main>


    
    {{-- Fine Main --}}
</x-layout>
