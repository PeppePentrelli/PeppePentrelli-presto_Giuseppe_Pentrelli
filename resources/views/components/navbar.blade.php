{{-- Inizio Navbar --}}
<nav class="navbar navbar-expand-lg bg-primary shadow fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap">

        {{-- Form Ricerca Articoli --}}
        <form class="d-flex" role="search" method="GET" action="{{ route('article.search') }}">
            <input class="form-control me-2" type="search" placeholder="{{ __('ui.search') }}" aria-label="{{ __('ui.search') }}" name="query" />
            <button class="btn btn-light me-2" type="submit">{{ __('ui.search') }}</button>
        </form>

        {{-- Logo --}}
        <a class="navbar-brand text-white" href="{{ route('homepage') }}">
            <i class="bi bi-lightning-charge-fill me-2 fs-3"></i>
        </a>

        {{-- Icone home e menu dropdown --}}
        <ul class="navbar-nav d-flex flex-row ms-auto me-2 align-items-center">

            {{-- Icona Home --}}
            <li class="nav-item mx-2">
                <a href="{{ route('homepage') }}" class="nav-link p-0">
                    <i class="bi bi-house-heart text-white fs-3"></i>
                </a>
            </li>

            {{-- Dropdown --}}
            <li class="nav-item dropdown mx-2">
                <a class="nav-link p-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-shop text-white fs-4"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('article.index') }}">
                            {{ __('ui.all_articles') }}
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('article.create') }}">
                            {{ __('ui.publish_article') }}
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    {{-- Categorie dinamiche --}}
                    @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item text-capitalize"
                                href="{{ route('byCategory', ['category' => $category]) }}">
                                {{ __("ui.$category->name") }}
                            </a>
                        </li>
                        @if (!$loop->last)
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

        </ul>

        {{-- Dropdown lingua --}}
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a data-mdb-dropdown-init class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown"
                    role="button" aria-expanded="false">
                    <i class="bi bi-gear text-white fs-4"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            </li>
            <li class="dropdown-item d-flex justify-content-center">
                <x-_locale lang="it" />
            </li>
            <li class="dropdown-item d-flex justify-content-center">
                <x-_locale lang="en" />
            </li>
            <li class="dropdown-item d-flex justify-content-center">
                <x-_locale lang="es" />
            </li>
            <li class="dropdown-item d-flex justify-content-center">
                <x-_locale lang="fr" />
            </li>
            <li class="dropdown-item d-flex justify-content-center">
                <x-_locale lang="de" />
            </li>
            <li class="dropdown-item d-flex justify-content-center">
                <x-_locale lang="ru" />
            </li>

            </li>
        </ul>
        </li>
        </ul>

        {{-- Login/Register guest --}}
        @guest
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a data-mdb-dropdown-init class="nav-link dropdown-toggle text-white" href="#" id="guestDropdown"
                        role="button" aria-expanded="false">
                        <i class="bi bi-box-arrow-in-right fs-4"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="guestDropdown">
                        <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">{{ __('ui.something_else_here') }}</a></li>
                    </ul>
                </li>
            </ul>
        @endguest

        {{-- Avatar utente --}}
        @auth
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a data-mdb-dropdown-init class="nav-link dropdown-toggle d-flex align-items-center text-white"
                        href="#" id="userDropdown" role="button" aria-expanded="false">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
                            class="rounded-circle avatar-border" height="30" width="30" alt="Avatar"
                            loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">{{ __('ui.my_profile') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('ui.settings') }}</a></li>
                        @if (Auth::user()->is_revisor)
                            <li>
                                <a class="dropdown-item" href="{{ route('revisor.index') }}">
                                    {{ __('ui.enter_as_revisor') }}
                                    <span class="badge rounded-pill bg-danger ms-2">
                                        {{ \App\Models\Article::toBeRevisedCount() }} </span>
                                    </span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('ui.logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        @endauth

    </div>
</nav>
{{-- Fine Navbar --}}
