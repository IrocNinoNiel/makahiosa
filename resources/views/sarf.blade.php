@extends('layouts.app')

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/sarf.css') }}" rel="stylesheet">

<div class="container">
    <div class="container mt-2">
      <div class="container">
        <div class="borders">
          <div class="card">
          
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="fw-bold">STUDENT ACTIVITY REQUEST FORM</p>
                  <p class="mb-0">DR. MARIA ANGELES D. HINOSOLANGO</p>
                  <p class="mt-0 mb-0">OIC-Vice Chancellor, Student Affairs and Services</p>
                  <p class="mt-0">USTP CDO</p>
                  <div class="w-25 text-center">
                    <img src="{{asset('images/osa.jpg')}}" class="rounded w-50 border rounded-circle" alt="...">
                  </div>
                  <br>
                  <button class="btn btn-outline-secondary" disabled><span class="text-dark">OSA@ustp.edu.ph</span></button>
                </div>
                <div class="p-0 m-0">
                  <div>
                    <div class="border text-center rounded">
                      <p class="h6 secondary-color">DOCUMENT CODE NO.</p>
                      <p class="h6">FM-USTP-OSA-009</p>
                      <table class="table table-bordered secondary-color mb-0">
                        <tr>
                          <td>REV NO.</td>
                          <td>EFFECTIVE DATE</td>
                          <td>PAGE-NO.</td>
                        </tr>
                        <tr>
                          <td>00</td>
                          <td>05.01.19</td>
                          <td>1.1</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  @include('includes.message');
  <form action="{{route('sarf.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container mt-2">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold">Date of Activity Application <span class="required-field"></span></label>
              <div class="input-container">
                <input type="Date" name="dateOfApplication" placeholder="Date of Activity Application">
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
            <div class="row">
              <div class="col-8">
                <div class="">
                  <label for="exampleInputEmail1" class="form-label fw-bold">Name of the Organization</label>
                  <input type="hidden" name="organization_id" value="{{Auth::user()->id}}">
                  <div class="input-container">
                    <button class="border rounded-pill secondary-color" disabled><span class="text-dark ml-3 mr-3">John United Org</span></button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="">
                  <img src="{{asset('images/osa.jpg')}}" class="w-25 border" alt="...">
                </div>
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
                <input type="text" name="nameOfRepresentative" placeholder="Name of the Representative">
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
                <input type="text" name="titleOfTheEvent" placeholder="Title of the Event">
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
                <input type="text" name="generalObjective" placeholder="Type of Event">
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
                <input type="text" name="generalObjective" placeholder="General Objective">
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
                <input type="text" name="objectives" id="objectives[]" placeholder="Specific Objectives">
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
                <input type="Date" name="dateOfEvent" placeholder="Date of Event">
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
                <input type="Date" name="endDateOfTheEvent" placeholder="End Date of Event">
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
                <input type="integer" name="hoursDuration" placeholder="Hours Duration">
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
                <input type="time" name="startOfEvent" placeholder="Start">
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold">End <span class="required-field"></span></label>
              <div class="input-container">
                <input type="time" name="endOfEvent" placeholder="Start">
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
                <input type="text" name="numOfParticipant" placeholder="Hours Duration">
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
                <input type="text" name="venueOfEvent" placeholder="Venue of Event">
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
                <input type="integer" name="amountAllocated" placeholder="Amount Allocated">
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
                <input type="text" name="sourceOfFunds" placeholder="Source of Funds ">
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
              <div class="form-group">
                <label for="files" class="form-label mt-4">Upload All Necesarry files</label>
                <input
                    type="file"
                    name="files[]"
                    id=""
                    class="form-control"
                    accept="files/*"
                    multiple>
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
                  <button class="btn btnsubmit pl-4 pr-4" type="submit">Submit</button>
              </div>
              <div class="col text-right">
                  <button class="btn text-danger font-weight-bold">Clear Form</button>
              </div>
          </div>
        </div>
    </div>
  </form>
  </div>

  <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted mt-5">
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MAKAHIOSA</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{asset('js/app.js')}}"></script>
@endsection
