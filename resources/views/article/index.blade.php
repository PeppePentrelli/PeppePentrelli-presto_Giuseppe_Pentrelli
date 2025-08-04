<x-layout>
    <main class="container-fluid bg-light py-4">
        {{-- Spazio sotto la navbar --}}
        <div style="height: 100px"></div>

        {{-- Titolo --}}
        <h2 class="display-5 fw-bold text-primary my-5 text-center">
            <i class="bi bi-lightning-charge-fill my-5"></i>Tutti gli articoli
        </h2>

        <div class="row" >
            {{-- Sidebar categorie --}}
            <aside class="col-12 col-md-3 col-lg-2 mb-4 sidebar">
                <div class="bg-white border shadow rounded p-3 h-100">
                    <h5 class="mb-3">Categorie</h5>
                    <ul class="nav flex-column">
                        @foreach ($categories as $category)
                            <li class="nav-item mb-1">
                                <a href="{{ route('byCategory', ['category' => $category]) }}" class="nav-link text-dark">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            {{-- Sezione articoli --}}
            <section class="col-12 col-md-9 col-lg-10 " >
                <div class="row justify-content-start">
                    @forelse ($articles as $article)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center " >
                            <x-card :article="$article" />
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <h4 class="text-muted">Non sono stati caricati articoli.</h4>
                        </div>
                    @endforelse
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $articles->links() }}
                </div>
            </section>
        </div>
    </main>
</x-layout>
