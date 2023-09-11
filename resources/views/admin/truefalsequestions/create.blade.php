@extends('layouts.main')

@section('title','Create True or False Questions')

@section('content')

<div>
    @include('layouts.nav')
    <div class="container pt-5">
        <div class="col-6 offset-3">
            <form action="{{ route('admin.truefalsequestions.store') }}" method="POST">
                @csrf
                <h1 class="my-3">Create New Question</h1>
                <div class="mb-3 form-floating">
                    <textarea class="form-control {{ $errors->first('truefalsequestion') ? 'is-invalid' : '' }}" name="truefalsequestion" placeholder="Enter a question." id="truefalsequestion" style="height: 100px"></textarea>
                    <label for="truefalsequestion">True or False Question</label>
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('truefalsequestion') }}</p>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <a href="{{ URL::previous() }}" class="btn btn-outline-danger w-100">Cancle</a>
                    <button class="btn btn-success w-100" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection