@extends('layouts.main')

@section('title','Home')

@section('content')

<div>
    @include('layouts.nav')
    <div class="container pt-5">
        <div>
            <h1 class="fw-bold">Upload Questions</h1>
        </div>
        <div>
            <a class="d-block border shadow-sm rounded text-decoration-none text-dark fw-bold fs-2 p-4 my-4" href="{{ route('admin.truefalsequestions.index') }}">
                <img src="{{ asset('assets/imgs/icons/true-or-false.png') }}" class="me-1" width="60" />
                <span>Create True or False Questions</span>
            </a>

            <a class="d-block border shadow-sm rounded text-decoration-none text-dark fw-bold fs-2 p-4 my-4" href="{{ route('admin.blankquestions.index') }}">
                <img src="{{ asset('assets/imgs/icons/blank.png') }}" class="me-1" width="60" />
                <span>Create Fill in The Blank Questions</span>
            </a>

            <a class="d-block border shadow-sm rounded text-decoration-none text-dark fw-bold fs-2 p-4 my-4" href="{{ route('admin.multiplechoicesquestions.index') }}">
                <img src="{{ asset('assets/imgs/icons/multiplechoice.png') }}" class="me-1" width="60" />
                <span>Create Multiple Choices Questions</span>
            </a>

            <a class="d-block border shadow-sm rounded text-decoration-none text-dark fw-bold fs-2 p-4 my-4" href="{{ route('admin.matchingquestions.index') }}">
                <img src="{{ asset('assets/imgs/icons/matching.png') }}" class="me-1" width="60" />
                <span>Create Matching Questions</span>
            </a>
        </div>
        <hr class="border border-dark">
        <div>
            <h1 class="fw-bold">Create Questions</h1>
        </div>
        <div>
            <a class="d-block border shadow-sm rounded text-decoration-none text-dark fw-bold fs-2 p-4 my-4" href="{{ route('createquestionpapers.index') }}">
                <img src="{{ asset('assets/imgs/icons/question.png') }}" class="me-1" width="60" />
                <span>Create Questions Papers</span>
            </a>
        </div>
    </div>
</div>

@endsection