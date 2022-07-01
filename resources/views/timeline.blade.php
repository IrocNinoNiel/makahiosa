@extends('layouts.app')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Calendar UI -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
<link href="{{ asset('css/calendar.css') }}" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-ml-12 col-sm-12">
            <a href="sarf.html" class="btn border badge-pill"><p class="mr-3 ml-3 mt-2"><i class="fa fa-plus"></i><span class="font-weight-bold">
                Create
            </span></p></a>
        </div>
        <div class="col-xl-10 col-lg-10 col-ml-12 col-sm-12">
            <div id='calendar'></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Event Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <h3 id="eventTitle"></h3>
                <div class="container pt-3">
                    <div class="alert alert-warning" role="alert">
                        Event Status: Done
                      </div>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <p>
                                <b>Event Description : </b> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur voluptatum alias, mollitia magnam quidem illum illo qui blanditiis, aliquid animi rem doloribus iusto eveniet quisquam ad sunt deleniti sequi aspernatur!
                            </p>
                            <p>
                                <b>Organization Name : </b> Dummy Organization
                            </p>
                        </div>
                    </div>
                   <div class="card mt-3">
                        <div class="card-body">
                            <p>
                                <b>Start Date : </b> June 1, 2022
                            </p>
                            <p>
                                <b>End Date : </b> June 3, 2022
                            </p>
                        </div>
                   </div>

                   <div class="card mt-3">
                    <div class="card-body">
                        <p>
                            <b>Start Time : </b> 8:00 AM
                        </p>
                        <p>
                            <b>End Time : </b> 5:00 PM
                        </p>
                    </div>
               </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let calendar;
    let eventTitle = document.getElementById("eventTitle");

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                {
                    title: 'General Assembly - Dummy College 2',
                    start: '2022-06-01',
                    end: '2022-06-04',
                    color: 'green'
                },
                {
                    title: 'General Assembly - Dummy College 1',
                    start: '2022-06-27',
                    end: '2022-06-29',
                },
                {
                    title: 'General Assembly - Dummy College 3',
                    start: '2022-06-26',
                    end: '2022-06-31',
                    color: 'yellow',
                    textColor: 'black'
                },
                {
                    title: 'General Assembly - Dummy College 4',
                    start: '2022-06-27',
                    end: '2022-06-29',
                    color: 'red',
                },
            ],
            eventClick: function(info) {
                info.jsEvent.preventDefault(); // don't let the browser navigate

                if (info.event.url) {
                    window.open(info.event.url);
                }

                console.log('Event: ' + info.event.title);

               eventTitle.innerHTML = info.event.title;

                $("#modelId").modal('show')
            }
        });

        calendar.render();
    });
</script>

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
<script src="assets/js/app.js"></script>
@endsection
