<x-layout>
                {{-- Distanziatore --}}
            <div style="height: 100px"></div>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold display-6 text-primary">Dashboard Revisore</h1>
        </div>

        @if ($article_to_check)
            <div class="row row-cols-2 row-cols-md-4 g-4 mb-5 justify-content-center">

   
                @for ($i = 0; $i < 6; $i++)
                    <div class="col text-center">
                        <img class="img-fluid rounded shadow-sm" src="https://picsum.photos/300" alt="Placeholder Image">
                    </div>
                @endfor
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h2 class="card-title">{{$article_to_check->title}}</h2>
                            <p class="card-subtitle mb-2 text-muted">Autore: <strong>{{$article_to_check->user->name}}</strong></p>
                            <p class="mb-1"><strong>Prezzo:</strong> {{$article_to_check->price}}€</p>
                            <p class="mb-3"><strong>Categoria:</strong> {{$article_to_check->category->name}}</p>
                            <p>{{$article_to_check->description}}</p>

                            @if (session()->has('message'))
                                <div class="alert alert-success text-center mt-4">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="d-flex justify-content-around mt-4">
                                {{-- Form per rifiutare articolo --}}
                                <form method="POST" action="{{ route('reject', ['article' => $article_to_check]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-danger">Rifiuta</button>
                                </form>
                                {{-- Form per accettare articolo --}}
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
            <div class="d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
                <h1 class="mb-3 text-secondary">Nessun articolo da revisionare</h1>
                <a class="btn btn-primary" href="{{ route('homepage') }}">Torna all'homepage</a>
            </div>
        @endif
    </div>
</x-layout>
