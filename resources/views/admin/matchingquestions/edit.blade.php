@extends('layouts.main')

@section('title','Edit Matching Questions')

@section('content')

<div>
    @include('layouts.nav')
    <div class="container pt-5">
        <div class="col-6 offset-3">
            <form action="{{ route('admin.matchingquestions.update',$matchingquestion->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h1 class="my-3">Edit Question</h1>
                <div class="mb-3 form-floating">
                    <textarea class="form-control {{ $errors->first('matchingquestion') ? 'is-invalid' : '' }}" name="matchingquestion" placeholder="Enter a question." id="matchingquestion" style="height: 100px">{{ json_decode($matchingquestion->question) }}</textarea>
                    <label for="matchingquestion">Matching Question</label>
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('matchingquestion') }}</p>
                    </div>
                </div>

                <div class="mb-3 form-floating">
                    <textarea class="form-control {{ $errors->first('columnA') ? 'is-invalid' : '' }}" name="columnA" placeholder="Enter a question." id="columnA" style="height: 100px">{{ json_decode($matchingquestion->columnA) }}</textarea>
                    <label for="columnA">Column A</label>
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('columnA') }}</p>
                    </div>
                </div>

                <div class="mb-3 form-floating">
                    <textarea class="form-control {{ $errors->first('columnB') ? 'is-invalid' : '' }}" name="columnB" placeholder="Enter a question." id="columnB" style="height: 100px">{{ json_decode($matchingquestion->columnB )}}</textarea>
                    <label for="columnB">Column B</label>
                    <div class="invalid-feedback">
                        <p>{{ $errors->first('columnB') }}</p>
                    </div>
                </div>

                <div class="w-100 d-flex justify-content-between gap-2">
                    <div class="mb-3 w-50">
                        <label for="columnAstyle" class="form-label">Column A</label>
                        <select class="form-select fs-5" name="columnAliststyle" id="columnAstyle" required>
                            <option disabled value="">Choose Style For Column A</option>
                            <option {{ $matchingquestion->columnAliststyle == 1 ? 'selected' : "" }} value="1">I,II,III,IV,...</option>
                            <option {{ $matchingquestion->columnAliststyle == 2 ? 'selected' : "" }} value="2">i,ii,iii,iv,...</option>
                            <option {{ $matchingquestion->columnAliststyle == 3 ? 'selected' : "" }} value="3">a,b,c,d,...</option>
                            <option {{ $matchingquestion->columnAliststyle == 4 ? 'selected' : "" }} value="4">A,B,C,D,...</option>
                            <option {{ $matchingquestion->columnAliststyle == 5 ? 'selected' : "" }} value="5">က,ခ,ဂ,ဃ,...</option>
                            <option {{ $matchingquestion->columnAliststyle == 6 ? 'selected' : "" }} value="6">1,2,3,4,...</option>
                            <option {{ $matchingquestion->columnAliststyle == 7 ? 'selected' : "" }} value="7">၁,၂,၃,၄,...</option>
                        </select>
                    </div>
                    <div class="mb-3 w-50">
                        <label for="columnAstyle" class="form-label">Column B</label>
                        <select class="form-select fs-5" name="columnBliststyle" id="columnBstyle" required>
                            <option disabled value="">Choose Style For Column B</option>
                            <option {{ $matchingquestion->columnBliststyle == 1 ? 'selected' : "" }} value="1">I,II,III,IV,...</option>
                            <option {{ $matchingquestion->columnBliststyle == 2 ? 'selected' : "" }} value="2">i,ii,iii,iv,...</option>
                            <option {{ $matchingquestion->columnBliststyle == 3 ? 'selected' : "" }} value="3">a,b,c,d,...</option>
                            <option {{ $matchingquestion->columnBliststyle == 4 ? 'selected' : "" }} value="4">A,B,C,D,...</option>
                            <option {{ $matchingquestion->columnBliststyle == 5 ? 'selected' : "" }} value="5">က,ခ,ဂ,ဃ,...</option>
                            <option {{ $matchingquestion->columnBliststyle == 6 ? 'selected' : "" }} value="6">1,2,3,4,...</option>
                            <option {{ $matchingquestion->columnAliststyle == 7 ? 'selected' : "" }} value="7">၁,၂,၃,၄,...</option>
                        </select>
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