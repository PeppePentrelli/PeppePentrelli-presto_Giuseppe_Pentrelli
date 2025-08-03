{{-- Inizio Navbar --}}
<nav class="navbar navbar-expand-lg bg-primary shadow fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap">

        {{-- Icone home e menu articoli --}}
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
                            Tutti gli articoli
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('article.create') }}">
                            Pubblica un articolo
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
                                {{ $category->name }}
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
                    <li><a class="dropdown-item" href="#"><i class="flag-italy flag me-2"></i>Italiano <i
                                class="fa fa-check text-success"></i></a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="flag-united-kingdom flag me-2"></i>English</a>
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="flag-poland flag me-2"></i>Polski</a></li>
                    <li><a class="dropdown-item" href="#"><i class="flag-china flag me-2"></i>中文</a></li>
                    <li><a class="dropdown-item" href="#"><i class="flag-japan flag me-2"></i>日本語</a></li>
                    <li><a class="dropdown-item" href="#"><i class="flag-germany flag me-2"></i>Deutsch</a></li>
                    <li><a class="dropdown-item" href="#"><i class="flag-france flag me-2"></i>Français</a></li>
                    <li><a class="dropdown-item" href="#"><i class="flag-spain flag me-2"></i>Español</a></li>
                    <li><a class="dropdown-item" href="#"><i class="flag-russia flag me-2"></i>Русский</a></li>
                    <li><a class="dropdown-item" href="#"><i class="flag-portugal flag me-2"></i>Português</a>
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
                        <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                        <li><a class="dropdown-item" href="#">My profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        @endauth

    </div>
</nav>
{{-- Fine Navbar --}}
