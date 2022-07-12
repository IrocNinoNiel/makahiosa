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
