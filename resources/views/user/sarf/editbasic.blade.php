@extends('layouts.app')

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/sarf.css') }}" rel="stylesheet">

<div class="container">
  @include('includes.message')
  <form action="{{route('sarf.updateBasicInfo', $sarf->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="container mt-2">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold">Date of Activity Application <span class="required-field"></span></label>
              <div class="input-container">
                <input type="Date" name="dateOfApplication" placeholder="Date of Activity Application" value="{{ $sarf->dateOfApplication}}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Name of the Representative <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="text" name="nameOfRepresentative" placeholder="Name of the Representative" value="{{ $sarf->nameOfRepresentative }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="container mt-2">
        <div class="container">
            <div class="card">
            <div class="card-body">
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Title of the Event <span class="required-field"></span></label>
                <div class="input-container">
                    <input type="text" name="titleOfTheEvent" placeholder="Title of the Event" value="{{$sarf->titleOfTheEvent}}">
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">
                  Type of Event
                  <span class="required-field"></span>
                  <span class="tt bi-search p-1 border rounded-circle btn-outline-secondary" data-bs-placement="right" title="Symposium, Seminar-Workshop, Conference, Training, Concert, Assembly, Etc"></span>
                  </span>
                </label>
                <div class="input-container">
                  <input type="text" name="typeOfTheEvent" placeholder="Type of Event" value="{{$sarf->typeOfTheEvent}}">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">General Objective <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="text" name="generalObjective" placeholder="General Objective" value="{{ $sarf->generalObjective}}">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <div class="d-flex justify-content-between">
                  <label for="exampleInputEmail1" class="form-label fw-bold">Specific Objectives <span class="required-field"></span></label>
                  <button class="btn btn-outline-primary" type="button" id="btn-obj">+</button>
                </div>
                <div class="input-container mt-2" id="container-obj">
                    @foreach ($sarf->specific as $item)
                        <div class="d-flex">
                            <input type="text" name="objectives[]" id="objectives[]" placeholder="Specific Objectives" value="{{$item->name}}">
                            <button class="btn btn-outline-danger btn-to-delete" type="button" id="btn-obj-delete">x</button>
                        </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="container mt-2">
        <div class="container">
            <div class="card">
            <div class="card-body">
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Date of Event <span class="required-field"></span></label>
                <div class="input-container">
                    <input type="Date" name="dateOfEvent" placeholder="Date of Event" value="{{$sarf->dateOfEvent}}">
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="endDateOfTheEvent" class="form-label fw-bold">End Date of the Event <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="Date" name="endDateOfTheEvent" placeholder="End Date of Event" value="{{$sarf->endDateOfTheEvent}}">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Hours Duration <span class="required-field"></span></label>
                        <div class="input-container">
                        <input type="number" name="hoursDuration" placeholder="Hours Duration" value="{{$sarf->hoursDuration}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Start <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="time" name="startOfEvent" placeholder="Start" value="{{$sarf->startOfEvent}}">
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">End <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="time" name="endOfEvent" placeholder="End" value="{{$sarf->endOfEvent}}">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold"># of Participants <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="text" name="numOfParticipant" placeholder="Hours Duration" value="{{$sarf->numOfParticipant}}">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Venue of Event <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="text" name="venueOfEvent" placeholder="Venue of Event" value="{{$sarf->venueOfEvent}}">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Amount Allocated <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="integer" name="amountAllocated" placeholder="Amount Allocated" value="{{$sarf->amountAllocated}}">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">Source of Funds <span class="required-field"></span></label>
                <div class="input-container">
                  <input type="text" name="sourceOfFunds" placeholder="Source of Funds" value="{{$sarf->sourceOfFunds}}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="mt-3 container">
        <div class="container">
          <div class="row">
              <div class="col">
                  <button class="btn btn-warning pl-4 pr-4" type="submit">Edit</button>
              </div>
          </div>
        </div>
    </div>
  </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ asset('js/sarf.js')}}"></script>
@endsection
