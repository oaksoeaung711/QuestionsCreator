@extends('layouts.main')

@section('title','Home')

@section('content')

<div>
    @include('layouts.nav')
    <div class="container pt-5">
        <div>
            <form action="{{ route('createquestionpapers.create') }}" method="POST">
                @csrf
                <div class="">
                    <h1 class="fw-bold my-4">Question Informations</h1>
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25 bg-dark fw-bold text-white border" id="">Grade</span>
                        <input type="text" name="grade" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25 bg-dark fw-bold text-white border" id="">Subject</span>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25 bg-dark fw-bold text-white border" id="">Allowance Time</span>
                        <input type="text" name="allowancetime" class="form-control">
                    </div>
                </div>
                <div>
                    <h1 class="fw-bold my-4">Number Format</h1>
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25 bg-dark fw-bold text-white border">Main Question Number Format</span>
                        <select class="form-select fs-5" name="mainquestionformat" id="" required>
                            <option selected disabled value="">Choose Style</option>
                            <option value="1">I,II,III,IV,...</option>
                            <option value="2">i,ii,iii,iv,...</option>
                            <option value="3">a,b,c,d,...</option>
                            <option value="4">A,B,C,D,...</option>
                            <option value="5">က,ခ,ဂ,ဃ,...</option>
                            <option value="6">1,2,3,4,...</option>
                            <option value="7">၁,၂,၃,၄,...</option>
                        </select>
                    </div>
        
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25 bg-dark fw-bold text-white border">Sub Question Number Format</span>
                        <select class="form-select fs-5" name="subquestionformat" id="" required>
                            <option selected disabled value="">Choose Style</option>
                            <option value="1">I,II,III,IV,...</option>
                            <option value="2">i,ii,iii,iv,...</option>
                            <option value="3">a,b,c,d,...</option>
                            <option value="4">A,B,C,D,...</option>
                            <option value="5">က,ခ,ဂ,ဃ,...</option>
                            <option value="6">1,2,3,4,...</option>
                            <option value="7">၁,၂,၃,၄,...</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <h1 class="fw-bold my-4">Choose Question</h1>
                    <div class="p-3 my-5 rounded shadow">
                        <div class="my-2">
                            <h3 class="fw-bold">True or False Questions</h3>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="maintfquestion" class="form-control" id="email" placeholder="Enter main question">
                        </div>

                        <div class="overflow-y-auto" style="height: 400px">
                            <table class="table">
                                <thead class="table-dark sticky-top">
                                    <th colspan="2">Questions</th>
                                </thead>
                                <tbody>
                                    @foreach ($tfquestions as $tfquestion )
                                        <tr>
                                            @php
                                                $tfinformations = ['question' => json_decode($tfquestion->question)];
                                            @endphp
                                            <td class=""><input class="form-check-input" type="checkbox" name="tfquestions[]" value="{{ json_encode($tfinformations) }}"></td>
                                            <td class="w-100"><pre>{{ json_decode($tfquestion->question )}}</pre></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="p-3 my-5 rounded shadow">
                        <div class="my-2">
                            <h3 class="fw-bold">Fill in The Blank Questions</h3>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="mainblankquestion" class="form-control" id="email" placeholder="Enter main question">
                        </div>

                        <div class="overflow-y-auto my-2" style="height: 400px">
                            <table class="table">
                                <thead class="table-dark sticky-top">
                                    <th colspan="2">Questions</th>
                                </thead>
                                <tbody>
                                    @foreach ($blankquestions as $blankquestion )
                                        <tr>
                                            @php
                                                $blankinformations = ['question' => json_decode($blankquestion->question)];
                                            @endphp
                                            <td class=""><input class="form-check-input" type="checkbox" name="blankquestions[]" value="{{ json_encode($blankinformations) }}"></td>
                                            <td class="w-100"><pre>{{ json_decode($blankquestion->question) }}</pre></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="p-3 my-5 rounded shadow">
                        <div class="my-2">
                            <h3 class="fw-bold">Multiple Choices Questions</h3>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="mainmcquestion" class="form-control" id="email" placeholder="Enter main question">
                        </div>

                        <div class="overflow-y-auto my-2" style="height: 400px">
                            <table class="table">
                                <thead class="table-dark sticky-top">
                                    <th colspan="2">Questions</th>
                                </thead>
                                <tbody>
                                    @foreach ($mcquestions as $mcquestion )
                                        <tr>
                                            @php
                                                $mcinformations = [
                                                    'question' => json_decode($mcquestion->question),
                                                    'choices' => json_decode($mcquestion->choices),
                                                    'liststyle' => json_decode($mcquestion->liststyle),
                                                ];
                                            @endphp
                                            <td class=""><input class="form-check-input" type="checkbox" name="mcquestions[]" value="{{ json_encode($mcinformations) }}"></td>
                                            <td class="w-100"><pre>{{ json_decode($mcquestion->question) }}</pre></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="p-3 my-5 rounded shadow">
                        <div class="my-2">
                            <h3 class="fw-bold">Matching Questions</h3>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="mainmatchingquestion" class="form-control" id="email" placeholder="Enter main question">
                        </div>

                        <div class="mb-3 d-flex gap-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-dark w-25 fw-bold text-white border" id="">Column Name 1</span>
                                <input type="text" name="colname1" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-dark w-25 fw-bold text-white border" id="">Column Name 2</span>
                                <input type="text" name="colname2" class="form-control">
                            </div>
                        </div>

                        <div class="overflow-y-auto my-2" style="height: 400px">
                            <table class="table">
                                <thead class="table-dark sticky-top">
                                    <th colspan="2">Questions</th>
                                </thead>
                                <tbody>
                                    @foreach ($matchingquestions as $matchingquestion)
                                        <tr>
                                            @php
                                                $matchinginformations = [
                                                    'question' => json_decode($matchingquestion->question),
                                                    'columnA' => json_decode($matchingquestion->columnA),
                                                    'columnAliststyle' => $matchingquestion->columnAliststyle,
                                                    'columnB' => json_decode($matchingquestion->columnB),
                                                    'columnBliststyle' => $matchingquestion->columnBliststyle,
                                                ];
                                            @endphp
                                            <td class=""><input class="form-check-input" type="checkbox" name="matchingquestions[]" value="{{ json_encode($matchinginformations) }}"></td>
                                            <td class="w-100"><pre>{{ json_decode($matchingquestion->question) }}</pre></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="my-5 w-100 d-flex gap-3">
                    <a class="btn btn-lg btn-danger w-50">Cancle</a>
                    <button class="btn btn-lg btn-dark w-50" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection