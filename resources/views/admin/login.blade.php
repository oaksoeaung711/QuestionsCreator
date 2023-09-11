@extends('layouts.main')

@section('title','Login')

@section('content')
<div class="container-fluid">
    <div class="col-md-4 offset-md-4">
        <div class="card p-5 shadow-lg mt-5">
            <h1 class="text-center fw-bold mb-3">WELCOME</h1>
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" id="email" placeholder="name@example.com">
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('email') }}</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}" value="{{ old('password') }}" id="password" placeholder="">
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('password') }}</p>
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-dark text-light w-100 fw-bold">Login</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection()