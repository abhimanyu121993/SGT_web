@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')

<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>GreyLock Security Properties</span></h5>
            <br><br>
            </div>

 
            <div class="col s2 m6 l6 mb-2">
            <a class="btn  waves-effect waves-light breadcrumbs-btn right ccbutton"
            href="{{route(Session::get('guard') . '.property.create')}}"><span
                class="hide-on-small-onl">Create Shift</span></a>    
            </div>
          </div>


</div>
   


</div>


@endsection
@section('content-area')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">

<div class="col-md-8">
                <div id="calendar"></div>
            </div>
<!-- 
<div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                       <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div> -->

         
            <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"714f7ab019457200","version":"2021.12.0","r":1,"token":"f79813393a9345e8a59bb86abc14d67d","si":100}' crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>


@endsection
@section('script-area')

<script>
$(document).ready(function() {
    $(document).on('click', '.property_route', function() {
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            success: function(data) {
                $('#modal1').html(data);
                $('#modal1').modal('open');
            }
        });
    });
});
</script>

<script>
    

    var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    
    $(function() {
    
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({ id: row.id, title: row.title, start: row.start_datetime, end: row.end_datetime });
            });
        }
        
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear(),
    
        calendar = new Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'prev,next today',
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            selectable: true,
            themeSystem: 'bootstrap',
            events: events,
            eventClick: function(info) {
                var details = $('#event-details-modal');
                var id = info.event.id;
    
                if (!!scheds[id]) {
                    details.find('#title').text(scheds[id].title);
                    details.find('#description').text(scheds[id].description);
                    details.find('#start').text(scheds[id].sdate);
                    details.find('#end').text(scheds[id].edate);
                    details.find('#edit,#delete').attr('data-id', id);
                    details.modal('show');
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function(info) {
                // Do Something after events mounted
            },
            editable: true
        });
    
        calendar.render();
    
        // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('');
            $(this).find('input:visible').first().focus();
        });
    
        // Edit Button
        $('#edit').click(function() {
            var id = $(this).attr('data-id');
    
            if (!!scheds[id]) {
                var form = $('#schedule-form');
    
                console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"));
                form.find('[name="id"]').val(id);
                form.find('[name="title"]').val(scheds[id].title);
                form.find('[name="description"]').val(scheds[id].description);
                form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"));
                form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"));
                $('#event-details-modal').modal('hide');
                form.find('[name="title"]').focus();
            } else {
                alert("Event is undefined");
            }
        });
    
        // Delete Button / Deleting an Event
        $('#delete').click(function() {
            var id = $(this).attr('data-id');
    
            if (!!scheds[id]) {
                var _conf = confirm("Are you sure to delete this scheduled event?");
                if (_conf === true) {
                    location.href = "./delete_schedule.php?id=" + id;
                }
            } else {
                alert("Event is undefined");
            }
        });
    });
    
    
    </script>
    
        <script>
            
        </script>
@endsection