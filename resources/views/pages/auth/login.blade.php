@extends('layouts.auth')

@section('content')
    <form method="POST" class="d-flex flex-column gap-5" style="min-width: 300px">
        @csrf
        <header class="d-flex flex-column gap-3 text-center">
            <i class="ri-gemini-line" style="font-size: 3rem"></i>
            <div>
                <h3 class="m-0 mb-2">Laravel - Sign In</h3>
                <span class="text-muted">Welcome back, please fill up the form to continue!</span>
            </div>
        </header>
        <main>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="type your password">
                <label for="password">Password</label>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Remember my login information
                    </label>
                </div>
            </div>
            <div class="d-flex flex-column gap-3 mt-4">
                <button type="submit" class="btn btn-dark">Sign In</button>
                <small class="text-muted text-center">Or</small>
                <a href="{{ route('register') }}" class="btn btn-light">Create New Account</a>
            </div>
        </main>
    </form>
@endsection
