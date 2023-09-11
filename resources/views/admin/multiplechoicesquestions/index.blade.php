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
            <a class="btn btn-success" href="{{ route('admin.multiplechoicesquestions.create') }}">Create New <i class="fa-solid fa-plus"></i></a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th colspan="2">Questions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $mcquestions as $no => $mcquestion )
                    <tr>
                        <td rowspan="2" class="align-middle text-center">{{ $no+1 }}</td>
                        <td class="w-100 fw-bold"><pre>{{ json_decode($mcquestion->question) }}</pre></td>
                        <td rowspan="2" class="align-middle">
                            <div class="d-flex gap-2">
                                <a class="btn btn-dark btn-lg my-1" href="{{ route('admin.multiplechoicesquestions.edit',$mcquestion->id) }}"><i class="fa-solid fa-pen"></i></a>
                            
                                <form class="" action="{{ route('admin.multiplechoicesquestions.destroy',$mcquestion->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-lg my-1" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex gap-3">
                            @php
                                $choices = explode('#',json_decode($mcquestion->choices));                            
                                $liststyle = "ls".$mcquestion->liststyle;
                                $ls = ${$liststyle};
                                $choiceswithliststyle = [];
                                foreach ($choices as $n => $choice){
                                    array_push($choiceswithliststyle,"( $ls[$n] ) ".$choice);
                                }
                            @endphp
                            @foreach ( $choiceswithliststyle as $c )
                                <p>{{ $c }}</p>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection