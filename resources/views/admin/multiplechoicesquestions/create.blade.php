@extends('layouts.main')

@section('title','Create Multiple Choices Questions')

@section('content')

<div>
    @include('layouts.nav')
    <div class="container pt-5">
        <div class="col-6 offset-3">
            <form action="{{ route('admin.multiplechoicesquestions.store') }}" method="POST">
                @csrf
                <h1 class="my-3">Create New Question</h1>
                <div class="mb-3 form-floating">
                    <textarea class="form-control {{ $errors->first('multiplechoicesquestion') ? 'is-invalid' : '' }}" name="multiplechoicesquestion" placeholder="Enter a question." id="multiplechoicesquestion" style="height: 100px"></textarea>
                    <label for="multiplechoicesquestion">Multiple Choices Question</label>
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('multiplechoicesquestion') }}</p>
                    </div>
                </div>

                <div class="mb-3 form-floating">
                    <textarea class="form-control {{ $errors->first('choices') ? 'is-invalid' : '' }}" name="choices" placeholder="Enter a question." id="choices" style="height: 100px"></textarea>
                    <label for="choices">Choices</label>
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('choices') }}</p>
                    </div>
                </div>

                <div class="mb-3 w-50">
                    <label for="choicesstyle" class="form-label">Style</label>
                    <select class="form-select fs-5" name="liststyle" id="choicesstyle" required>
                        <option selected disabled value="">Choose Style</option>
                        <option value="1">I,II,III,IV,...</option>
                        <option value="2">i,ii,iii,iv,...</option>
                        <option value="3">a,b,c,d,...</option>
                        <option value="4">A,B,C,D,...</option>
                        <option value="5">က,ခ,ဂ,ဃ,...</option>
                        <option value="6">1,2,3,4,...</option>
                        <option value="7">၁,၂,၃,၄,...</option>
                    </select>
                    <div id="choicesFeedback" class="invalid-feedback">
                      Please select a valid state.
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