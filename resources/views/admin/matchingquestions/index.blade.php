@extends('layouts.main')

@section('title','Matching Questions')

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
            <a class="btn btn-success" href="{{ route('admin.matchingquestions.create') }}">Create New <i class="fa-solid fa-plus"></i></a>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th colspan="3">Questions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $matchingquestions as $no => $matchingquestion )
                    <tr>
                        <td rowspan="3" class="align-middle text-center">{{ $no+1 }}</td>
                        <td class="w-100 fw-bold" colspan="2"><pre>{{ json_decode($matchingquestion->question) }}</pre></td>
                        <td rowspan="3" class="align-middle">
                            <div class="d-flex gap-2">
                                <a class="btn btn-dark btn-lg my-1" href="{{ route('admin.matchingquestions.edit',$matchingquestion->id) }}"><i class="fa-solid fa-pen"></i></a>

                                <form class="" action="{{ route('admin.matchingquestions.destroy',$matchingquestion->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-lg my-1" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Column A</td>
                        <td class="align-middle">
                            @php
                                $columnA = explode('#',json_decode($matchingquestion->columnA));
                                $liststyle = "ls".$matchingquestion->columnAliststyle;
                                $ls = ${$liststyle};
                                $columnAwithliststyle = [];
                                foreach ($columnA as $n => $A){
                                    array_push($columnAwithliststyle,"( $ls[$n] ) ".$A);
                                }
                            @endphp
                            @foreach ( $columnAwithliststyle as $c )
                                <p class="d-inline mx-2">{{ $c }}</p>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">Column B</td>
                        <td class="align-middle">
                            @php
                                $columnB = explode('#',json_decode($matchingquestion->columnB));
                                $liststyle = "ls".$matchingquestion->columnBliststyle;
                                $ls = ${$liststyle};
                                $columnBwithliststyle = [];
                                foreach ($columnB as $n => $B){
                                    array_push($columnBwithliststyle,"( $ls[$n] ) ".$B);
                                }
                            @endphp
                            @foreach ( $columnBwithliststyle as $c )
                                <p class="d-inline mx-2">{{ $c }}</p>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection