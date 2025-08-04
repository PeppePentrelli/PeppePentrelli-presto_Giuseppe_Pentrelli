{{-- HomePage --}}
<x-layout>
    {{-- Inizio Header Pubblica Articolo + Accedi --}}
    <header class="container-fluid text-dark min-vh-100 d-flex flex-column justify-content-center align-items-center">

        {{-- Messaggio Avvenuto invio Mail --}}
        @if (session()->has('message'))
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success alert-dismissible fade show text-center shadow-sm" role="alert">
                            <i class="bi bi-like me-2"></i> {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- Messaggio di errore per tentato accesso a zone per revisori --}}
        @if (session()->has('errorMessage'))
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-danger alert-dismissible fade show text-center shadow-sm"
                            role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('errorMessage') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
    <main class="container-fluid ">



        <div class="d-flex justify-content-center flex-column align-items-center">
            {{-- Titolo Main --}}
            <h2 class="display-5 fw-bold text-primary my-5 text-center">
                <i class="bi bi-lightning-charge-fill me-2"></i>Ultimi Articoli caricati
            </h2>
            <a style="width: max-content;"
                class="btn btn-lg btn-primary px-4 py-2 shadow-sm d-flex justify-content-center"
                href="{{ route('article.index') }}">
                <i class="bi bi-upc-scan me-2"></i>Tutti gli articoli!
            </a>
        </div>

        <div class="row py-5">

            {{-- Card per ogni Articolo in DB --}}
            @forelse ($articles as $article)
                <div class="col-12 col-md-2 col-lg-2">
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
