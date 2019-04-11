<div class="page-header">
  <h1>Airport Manager<form id="airport-select" action="<?php echo base_url();?>admin/airport" method="post" role="form" class="pull-right"><select class="form-control" name="airport" onchange="this.form.submit()"><option value="">My Airports</option><?php foreach($myAirports as $airport){echo '<option value="' . $airport['icao'] . '">' . $airport['icao'] . '</option>';}?></form></h1>
</div>
