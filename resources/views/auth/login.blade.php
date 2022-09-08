@extends('layouts.app')

@section('content')
    <div id="page-container">
        <main id="main-container">
            <div class="hero-static d-flex align-items-center">
                <div class="w-100">
                    <div class="bg-body-extra-light">
                        <div class="content content-full">
                            <div class="row g-0 justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-4 py-4 px-4 px-lg-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-1">
                                            DashTest
                                        </h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="py-3">
                                            <div class="mb-4">
                                                <input type="text"
                                                    class="form-control form-control-lg form-control-alt  @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="E-mail"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-alt @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Senha" required
                                                    autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <div class="d-md-flex align-items-md-center justify-content-md-between">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="login-remember">Lembrar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6 col-xxl-5">
                                                <button type="submit" class="btn w-100 btn-alt-primary">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fs-sm text-center text-muted py-3">
                        Feito com <i class="fa fa-heart text-danger"></i> e <i
                            class="fa-solid fa-mug-saucer text-warning"></i> por <a class="fw-semibold"
                            href="https://www.linkedin.com/in/lawanmaciel" target="_blank">Lawan Maciel</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
