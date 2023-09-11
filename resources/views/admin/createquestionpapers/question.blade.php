@extends('layouts.main')

@section('custom_css')
    {{ asset('assets/css/createquestionpapers/style.css') }}
@endsection

@section('content')

@for ($i = 0; $i < 7;$i++)
<div class="page1 p-3">
    {{-- Start Questions Field --}}
    @php
        $no = 1;
    @endphp

    {{-- Start Question Informations --}}
    <div class="d-flex justify-content-between align-items-center">
        <p class="fw-bold fs-5">{{ $grade }}</p>
        <p class="fw-bold fs-5">{{ $subject }}</p>
        <p class="fw-bold fs-5">{{ $allowancetime }}</p>
    </div>
    {{-- End Question Informations --}}

    @foreach($allquestions as $mainquestion => $questions)
        @php
            shuffle($questions);

            $mqformat = "ls".$mainquestionformat;
            $mqformat = ${$mqformat};

            $sqformat = "ls".$subquestionformat;
            $sqformat = ${$sqformat};
        @endphp
        <div>
            <p class="fw-bold">{{ $mqformat[$no-1] }}. {{ $mainquestion }}</p>
        </div>
        @foreach($questions as $qn => $question)
            @php                     
                $decodequestion = json_decode($question,true);
            @endphp

            @if(count($decodequestion) == 1)   
                <div class="d-flex justify-content-between ms-4">
                    <div class="d-flex gap-1">
                        <p>({{ $sqformat[$qn] }})</p>
                        <pre>{{ $decodequestion['question'] }}</pre>
                    </div>
                    <p class="border-bottom border-2" style="width: 15%;">({{ $sqformat[$qn] }})</p>
                </div>
            @elseif (count($decodequestion) == 3)
                @php
                    $choices = explode('#',$decodequestion['choices']);
                    $liststyle = "ls".$decodequestion['liststyle'];
                    $ls = ${$liststyle};
                    $choiceswithliststyle = [];
                    foreach ($choices as $n => $choice){
                        array_push($choiceswithliststyle,"( $ls[$n] ) ".$choice);
                    }
                @endphp
                <div class="d-flex justify-content-between align-items-center ms-4">
                    <div class="d-flex gap-1">
                        <p>({{ $sqformat[$qn] }})</p>
                        <div class="d-flex flex-column">
                            <pre>{{ $decodequestion['question'] }}</pre>
                            <div class="d-flex gap-3">
                                @foreach ($choiceswithliststyle as $c)
                                    <pre>{{ $c }}</pre>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <p class="border-bottom border-2" style="width: 15%;">({{ $sqformat[$qn] }})</p>
                </div>
            @elseif (count($decodequestion) == 5)
                @php
                    $columnA = explode('#',$decodequestion['columnA']);
                    $colAliststyle = "ls".$decodequestion['columnAliststyle'];
                    $ls = ${$colAliststyle};
                    $columnAwithliststyle = [];
                    foreach ($columnA as $n => $A){
                        array_push($columnAwithliststyle,"( $ls[$n] ) ".$A);
                    }

                    $columnB = explode('#',$decodequestion['columnB']);
                    $colBliststyle = "ls".$decodequestion['columnBliststyle'];
                    $ls = ${$colBliststyle};
                    $columnBwithliststyle = [];
                    foreach ($columnB as $n => $B){
                        array_push($columnBwithliststyle,"( $ls[$n] ) ".$B);
                    }
                @endphp
                <div class="d-flex justify-content-between ms-4">
                    <div class="d-flex gap-1">
                        <p>({{ $sqformat[$qn] }})</p>
                        <div class="d-flex flex-column">
                            <pre>{{ $decodequestion['question'] }}</pre>
                            <div class="d-flex gap-5">
                                <div class="mx-5 d-flex flex-column">
                                    <p>{{ $colname1 }}</p>
                                    @foreach ($columnAwithliststyle as $colA)
                                        <pre>{{ $colA }}</pre>
                                    @endforeach
                                </div>
                                <div class="mx-5 d-flex flex-column">
                                    <p>{{ $colname2 }}</p>
                                    @foreach ($columnBwithliststyle as $colB)
                                        <pre>{{ $colB }}</pre>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" style="width: 20%;">
                        <p>({{ $sqformat[$qn] }})</p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>{{ $colname1 }}</p>
                                @foreach ($columnAwithliststyle as $colA)
                                    <pre class="border-bottom border-2 p-2"></pre>
                                @endforeach
                            </div>
                            <div>
                                <p>{{ $colname2 }}</p>
                                @foreach ($columnBwithliststyle as $colB)
                                    <pre class="border-bottom border-2 p-2"></pre>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        {{-- <li><p><span class="fw-bold fs-5"></span> <span class="fw-bold">{{ $mainquestion }}</span></p></li>
        <ol>
            @foreach ($questions as $question )
                @php
                    $decodequestion = json_decode($question,true)
                @endphp
                @if(count($decodequestion) == 1)
                    <li>
                        <p>{{ $decodequestion['question'] }}</p>
                    </li>
                @elseif (count($decodequestion) == 3)
                    <li>
                        <p>{{ $decodequestion['question'] }}</p>
                        <p>{{ $decodequestion['choices'] }}</p>
                    </li>

                @elseif (count($decodequestion) == 5)
                    <li>
                        <p>{{ $decodequestion['question'] }}</p>
                        <p>{{ $decodequestion['columnA'] }}</p>
                        <p>{{ $decodequestion['columnB'] }}</p>
                    </li>
                @endif
            @endforeach
        </ol> --}}
        @php
        $no++
        @endphp
    @endforeach
    {{-- End Questions Field --}}

    {{-- Start Answers Field --}}
    <div class="">

    </div>
    {{-- End Answers Field --}}
</div>
@endfor

@endsection