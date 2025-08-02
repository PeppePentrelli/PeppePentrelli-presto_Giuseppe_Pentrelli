<x-layout>
    <div class="container-fluid bg-light text-dark min-vh-100 d-flex flex-column justify-content-center align-items-center">
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
    </div>
</x-layout>
