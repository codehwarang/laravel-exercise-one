@extends('layouts.auth')

@section('content')
    <form method="POST" class="d-flex flex-column gap-5" style="min-width: 500px">
        @csrf
        <header class="d-flex flex-column gap-3 text-center">
            <i class="ri-gemini-line" style="font-size: 3rem"></i>
            <div>
                <h3 class="m-0 mb-2">Laravel - Sign Up</h3>
                <span class="text-muted">Seems like you are new here, fill up and lets roll!</span>
            </div>
        </header>
        <main class="d-flex flex-column gap-4">
            <section id="personal-information">
                <h6 class="text-muted">Personal Information</h6>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="name">Your name</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="name" name="name" placeholder="type your name..." value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="email">Email address</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" id="email" name="email" placeholder="type your email..." value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="password">Password</label>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" id="password" name="password" placeholder="type your password...">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="password_confirmation">Confirm password</label>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm your password...">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="date_of_birth">Date of birth</label>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control w-50" id="date_of_birth" name="date_of_birth" placeholder="insert your birth date..." value="{{ old('date_of_birth') }}">
                        @error('date_of_birth')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        Gender
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1">
                            <label class="form-check-label" for="gender_male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="0">
                            <label class="form-check-label" for="gender_female">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender_null" value="2">
                            <label class="form-check-label" for="gender_null">
                                Rather not to say
                            </label>
                        </div>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </section>
            <section id="address-information">
                <h6 class="text-muted">Address Information</h6>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="address">Your address</label>
                    </div>
                    <div class="col">
                        <textarea class="form-control" id="address" name="address" placeholder="type your address...">{{ old('address') }}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="city">City</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="city" name="city" placeholder="type your city..." value="{{ old('city') }}">
                        @error('city')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="region">Region</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="region" name="region" placeholder="type your region..." value="{{ old('region') }}">
                        @error('region')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 pt-1">
                        <label for="country">Country</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="country" name="country" placeholder="type your country..." value="{{ old('country') }}">
                        @error('country')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </section>
            <section>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Remember my login information
                    </label>
                </div>
            </section>
            <footer class="d-flex flex-column gap-3">
                <button type="submit" class="btn btn-dark">Create Account</button>
                <small class="text-muted text-center">Or, if you already have an account</small>
                <a href="{{ route('login') }}" class="btn btn-light">Login</a>
            </footer>
        </main>
    </form>
@endsection
