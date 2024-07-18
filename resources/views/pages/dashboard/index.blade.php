@extends('layouts.main')

@section('content')
    <main class="container py-5 d-flex flex-column gap-3">
        <header class="d-flex align-items-end justify-content-between">
            <div class="d-flex gap-3 align-items-center">
                <i class="ri-dashboard-line fs-4"></i>
                <h4 class="m-0">Dashboard</h4>
            </div>
        </header>
        <section id="quick-actions" class="d-flex gap-2">
            <a href="{{ route('dashboard.product.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                <span>Add Product</span>
                <i class="ri-add-line"></i>
            </a>
            <a href="" class="btn btn-dark btn-sm d-flex align-items-center gap-2">
                <span>My Profile</span>
                <i class="ri-profile-line"></i>
            </a>
        </section>
        @if (session()->has('message'))
            <div class="alert alert-{{ session()->pull('message_type') }}">
                {{ session()->pull('message') }}
            </div>
        @endif
    </main>
@endsection
