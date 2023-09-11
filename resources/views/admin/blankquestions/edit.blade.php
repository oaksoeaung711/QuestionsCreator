@extends('layouts.main')

@section('title','Edit Blank Questions')

@section('content')

<div>
    @include('layouts.nav')
    <div class="container pt-5">
        <div class="col-6 offset-3">
            <form action="{{ route('admin.blankquestions.update',$question->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h1 class="my-3">Edit Question</h1>
                <div class="mb-3 form-floating">
                    <textarea class="form-control {{ $errors->first('blankquestion') ? 'is-invalid' : '' }}" name="blankquestion" placeholder="Enter a question." id="blankquestion" style="height: 100px">{{ json_decode($question->question) }}</textarea>
                    <label for="blankquestion">Blank Question</label>
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('blankquestion') }}</p>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <a href="{{ route('admin.blankquestions.index') }}" class="btn btn-outline-danger w-100">Cancle</a>
                    <button class="btn btn-success w-100" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection