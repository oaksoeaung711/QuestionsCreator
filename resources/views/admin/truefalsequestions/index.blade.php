@extends('layouts.main')

@section('title','True or False Questions')

@section('content')

<div>
    @include('layouts.nav')
    <div class="container pt-5">
        @if(Session::has('error'))
            <div class="d-flex justify-content-end">
                <div class="alert alert-danger w-25" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                </div>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="d-flex justify-content-end">
                <div class="alert alert-success w-25" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                </div>
            </div>
        @endif
        <div class="my-3 d-flex justify-content-end align-items-center">
            <a class="btn btn-success" href="{{ route('admin.truefalsequestions.create') }}">Create New <i class="fa-solid fa-plus"></i></a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th colspan="2">Questions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $truefalsequestions as $no => $truefalsequestion )
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td class="w-100 fw-bold"><pre>{{ json_decode($truefalsequestion->question) }}</pre></td>
                        <td class="align-middle">
                            <div class="d-flex gap-2">
                                <a class="btn btn-dark" href="{{ route('admin.truefalsequestions.edit',$truefalsequestion->id) }}"><i class="fa-solid fa-pen"></i></a>

                                <form action="{{ route('admin.truefalsequestions.destroy',$truefalsequestion->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection