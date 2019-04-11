<script>
$(function() {
    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap3',
        header: {
            left: 'title',
            center: '',
            right: 'prev,today,next'
        },
        defaultView: 'agendaDay',
        defaultDate: '2018-03-12',
        editable: true,
        eventStartEditable: true,
        minTime: '06:00:00',
        maxTime: '22:00:00',
        nowIndicator: true,
        slotLabelInterval: '00:15',
        allDaySlot: false,
        //ATC Hours
        businessHours: [
            {
                dow: [ 1, 2, 3, 4, 5],
                start: '07:00',
                end: '20:15',
            },
            {
                dow: [6, 0],
                start: '08:00',
                end: '15:30',
            }
        ],
        //Bookings
        events: [
            {
                title: 'ZWI ILS + MAPP',
                start: '2018-03-12T10:30:00',
                end: '2018-03-12T10:45:00'
            },
            {
                title: 'TJY ILS + MAPP',
                start: '2018-03-12T17:30:00',
                end: '2018-03-12T17:45:00'
            },
            {
                title: 'TJY VOR + FS',
                start: '2018-03-12T17:45:00',
                end: '2018-03-12T18:00:00'
            }
        ]
   });
});
</script>
<div class="page-header">
  <h1>Airport Manager<form id="airport-select" action="<?php echo base_url();?>admin/airport" method="post" role="form" class="pull-right"><select class="form-control" name="airport" onchange="this.form.submit()"><option value="">My Airports</option><?php foreach($myAirports as $airport){echo '<option value="' . $airport['icao'] . '">' . $airport['icao'] . '</option>';}?></form></h1>
</div>
<div id='calendar' style="width:100%;"></div>
