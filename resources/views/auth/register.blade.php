{{-- Register view --}}
<x-layout>
        {{-- Distanziatore --}}
    <div style="height: 100px"></div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 border rounded-4 shadow-lg p-4">

                <h4 class="text-center fw-bold mt-2">Crea un nuovo account</h4>
                <p class="text-center text-muted mb-4">È veloce e gratuito!</p>

                {{-- Social --}}
                <div class="text-center mb-3">
                    <p>Registrati con:</p>
                    <button type="button" class="btn btn-secondary btn-floating mx-1"><i class="bi bi-facebook"></i></button>
                    <button type="button" class="btn btn-secondary btn-floating mx-1"><i class="bi bi-google"></i></button>
                    <button type="button" class="btn btn-secondary btn-floating mx-1"><i class="bi bi-github"></i></button>
                </div>

                <p class="text-center">oppure</p>
                <hr>

                {{-- FORM --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <!-- Nome -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input name="name" type="text" class="form-control" placeholder="Nome utente" value="{{ old('name') }}" />
                        </div>
                        @error('name')
                            <div class="text-danger mb-2 ms-1">{{ $message }}</div>
                        @enderror

                        <!-- Email -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
                        </div>
                        @error('email')
                            <div class="text-danger mb-2 ms-1">{{ $message }}</div>
                        @enderror

                        <!-- Password -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input name="password" type="password" class="form-control" placeholder="Password" />
                        </div>
                        @error('password')
                            <div class="text-danger mb-2 ms-1">{{ $message }}</div>
                        @enderror

                        <!-- Conferma Password -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Conferma password" />
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger mb-2 ms-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Checkbox --}}
                    <div class="form-check d-flex justify-content-center mb-3">
                        <input class="form-check-input me-2" type="checkbox" name="terms" id="terms" />
                        <label class="form-check-label" for="terms">
                            Accetto i <a href="#">termini e condizioni</a>
                        </label>
                    </div>
                    @error('terms')
                        <div class="text-danger text-center mb-3">{{ $message }}</div>
                    @enderror

                    <!-- Submit -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mb-3">Registrati</button>
                    </div>

                    <p class="text-center">Hai già un account? <a href="{{ route('login') }}">Accedi</a></p>
                </form>

            </div>
        </div>
    </div>
        {{-- Distanziatore --}}
    <div style="height: 100px"></div>
</x-layout>
