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
                    <div class="d-flex justify-content-between">
                        <h4 class="my-3">Basic Information</h4>
                        <a href="{{ route('sarf.editBasicInfo', $sarf->id) }}" class="btn btn-outline-warning">Edit</a>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Event Name : {{$sarf->titleOfTheEvent}}
                        </li>
                        <li class="list-group-item">
                            Representative Namee : {{$sarf->nameOfRepresentative}}
                        </li>
                        <li class="list-group-item">
                            Type of Event : {{$sarf->typeOfTheEvent}}
                        </li>
                        <li class="list-group-item">
                            General Objective : {{$sarf->generalObjective}}
                        </li>
                        <li class="list-group-item">
                            Specific Objective <br/>
                            @foreach ($sarf->specific as $specific)
                                - {{$specific->name}}<br/>
                            @endforeach
                        </li>
                        <li class="list-group-item">
                            Start Date: {{$sarf->dateOfEvent}}
                        </li>
                        <li class="list-group-item">
                            End Date: {{$sarf->endDateOfTheEvent}}
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
                            Status : @if ($sarf->status == 'pending')
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
                    <div class="d-flex justify-content-between">
                        <h4 class="my-3 mx-auto">File Attachment</h4>
                        <a href="{{ route('sarf.editFiles', $sarf->id) }}" class="btn btn-outline-warning">Edit</a>
                    </div>
                    <ul class="list-group">
                        @foreach ($sarf->files as $file)
                            <li class="list-group-item">
                                <a href="{{ asset('files/'.$file->sarves_id.'/'.$file->name) }}">{{$file->truename}}.{{$file->extension}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <hr/>
                @if (count($sarf->comments) > 0)
                <div class="card my-3">
                    <h4 class="my-3 mx-auto">Comments</h4>
                    {{-- {{$sarf->comments}} --}}
                    @foreach ($sarf->comments as $comment)
                        <div class="card mx-3 p-2 mb-2">
                            <p>
                                @if ($comment->user->is_admin)
                                    <b>Admin</b>
                                @else
                                    <b>Student Org</b>
                                @endif
                                <span>Commented on: {{$comment->created_at}}</span>
                            </p>
                            <p class="">
                                {{$comment->comment}}
                            </p>
                            @if (Auth::user()->id == $comment->user_id)
                                <div class="d-flex justify-content-start mr-2">
                                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-warning" class="m-3">Edit</a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="card my-3">
                <h4 class="my-3 mx-auto">Leave a Comment</h4>
                <form action=" {{route('comment.store')}} " method="POST" class="mx-2">
                    @csrf
                    <div class="form-group">
                      <label for=""></label>
                      <textarea class="form-control @error('comment')
                        border border-danger
                      @enderror" name="comment" id="" rows="3"></textarea>
                      <input type="hidden" name="sarf_id" value="{{$sarf->id}}">
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                      <button type="submit" class="mt-2 btn btn-primary">Add Comment</button>
                    </div>
                </form>
            </div>
            </div>
         </div>
    </div>
@endsection
