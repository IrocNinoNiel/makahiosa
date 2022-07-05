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
                <a href="sarf.html" class="btn border badge-pill">
                    <p class="mr-3 ml-3 mt-2"><i class="fa fa-plus"></i><span class="font-weight-bold">
                            Create
                        </span></p>
                </a>
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
                            Event Status: <span id="eventStatus"></span>
                        </div>
                        <hr />
                        <div class="card">
                            <div class="card-body">
                                <p>
                                    <b>Event Objective : </b> <span id="eventObjective"></span>
                                </p>
                                <p>
                                    <b>Organization Name : </b> <span id="orgname"></span>
                                </p>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <p>
                                    <b>Start Date : </b> <span id="stardDate"></span>
                                </p>
                                <p>
                                    <b>End Date : </b> <span id="endDate"></span>
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-body">
                                <p>
                                    <b>Start Time : </b> <span id="startTime"></span>
                                </p>
                                <p>
                                    <b>End Time : </b> <span id="endTime"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    {{-- <script src="assets/js/app.js"></script> --}}

    <script>
        let calendar;
        let eventTitle = document.getElementById("eventTitle");
        let eventStatus = document.getElementById("eventStatus");
        let endDate = document.getElementById("endDate");
        let stardDate = document.getElementById("stardDate");
        let startTime = document.getElementById("startTime");
        let endTime = document.getElementById("endTime");
        let eventObjective = document.getElementById("eventObjective");
        let orgname = document.getElementById("orgname");

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('events') }}",
                type: 'GET',
                dataType: 'json',
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError);
                },
                success: function(result) {
                    console.log(result);
                    let event = [];
                    $.each(result, function() {
                        $.each(this, function(key, value){
                            let obj = {
                                id: value.id,
                                title: value.titleOfTheEvent,
                                start: value.dateOfEvent,
                                end: value.endDateOfTheEvent,
                                color: 'green'
                            }

                            if(value.status === 'rejected'){
                                obj.color = 'red'
                            }else if(value.status === 'pending'){
                                obj.color = 'blue'
                            }else if(value.status === 'accepted'){
                                obj.color = 'green'
                            }

                            event.push(obj);
                        });
                    })


                    calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        events: event,
                        eventClick: function(info) {
                            info.jsEvent.preventDefault(); // don't let the browser navigate

                            if (info.event.url) {
                                window.open(info.event.url);
                            }

                            console.log('Event: ' + info.event.title);
                            let eventValues = {};

                            $.each(result, function() {
                                $.each(this, function(key, value){
                                    if(value.id == info.event.id){
                                        eventValues = value;
                                    }
                                });
                            })
                            eventTitle.innerHTML = eventValues.titleOfTheEvent;
                            eventStatus.innerHTML = eventValues.status;
                            stardDate.innerHTML = eventValues.dateOfEvent;
                            endDate.innerHTML = eventValues.endDateOfTheEvent;
                            startTime.innerHTML = eventValues.startOfEvent;
                            endTime.innerHTML = eventValues.endOfEvent;
                            eventObjective.innerHTML = eventValues.generalObjective;
                            orgname.innerHTML = eventValues.orgname;

                            $("#modelId").modal('show')
                        }
                    });

                    calendar.render();
                }
            });
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
@endsection
