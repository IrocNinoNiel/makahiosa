@extends('layouts.app')

@section('content')
    <div class="container m-auto w-50 pt-5 pb-5">
        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Sarf Info</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="card">
                    <h4 class="my-3 mx-auto">Basic Information</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Event Name : {{$sarf->titleOfTheEvent}}    
                        </li>
                        <li class="list-group-item">
                            Representative Namee : {{$sarf->nameOfRepresentative}}
                        </li>
                        <li class="list-group-item">
                            General Objective : {{$sarf->generalObjective}}
                        </li>
                        <li class="list-group-item">
                            Specific Objective <br/>
                            - Specific Objective Sample 1<br/>
                            - Specific Objective Sample 2<br/>
                            - Specific Objective Sample 3<br/>
                        </li>
                        <li class="list-group-item">
                            Date: {{$sarf->dateOfEvent}}
                        </li>
                        <li class="list-group-item">
                            Duration: {{$sarf->hoursDuration}}
                        </li>
                        <li class="list-group-item">
                            Start Time: {{$sarf->startOfEvent}}
                        </li>
                        <li class="list-group-item">
                            End Time: {{$sarf->endOfEvent}}
                        </li>
                        <li class="list-group-item">
                            # of Participant : {{$sarf->numOfParticipant}}
                        </li>
                        <li class="list-group-item">
                            Venue : {{$sarf->venueOfEvent}}
                        </li>
                        <li class="list-group-item">
                            Amount Allocated : {{$sarf->amountAllocated}}
                        </li>
                        <li class="list-group-item">
                            Source of Funds : {{$sarf->sourceOfFunds}}
                        </li>
                        <li class="list-group-item">
                            Source of Funds : @if ($sarf->status == 'pending')
                                <button class="btn btn-outline-warning">Pending</button>
                            @elseif ($sarf->status == 'approved')
                                <button class="btn btn-outline-warning">Approved</button>
                            @else
                                <button class="btn btn-outline-danger">Rejected</button>
                            @endif
                        </li>
                      </ul>
                </div>
                <div class="card my-3">
                    <h4 class="my-3 mx-auto">File Attachment</h4>
                    <ul class="list-group">
                        @foreach ($sarf->files as $file)
                            <li class="list-group-item">
                                <a href="{{ asset('files/'.$file->sarves_id.'/'.$file->name) }}">{{$file->truename}}.{{$file->extension}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
         </div>
    </div>
@endsection
