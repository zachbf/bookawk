<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="2" style="background-color:#cac8c8;">Your details</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Full Name:</th>
			<td><?php echo $userInfo['fname'] . ' ' . $userInfo['lname'];?></td>
		</tr>
		<tr>
			<th>Username:</th>
			<td><?php echo $userInfo['username'];?></td>
		</td>
		<tr>
			<th>Mobile:</th>
			<td><?php echo $userInfo['mobile'];?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?php echo $userInfo['email'];?></td>
		</tr>
	</tbody>
</table>
<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="5" style="background-color:#cac8c8;">Upcoming Bookings</td>
		</tr>
		<tr>
			<th>Location</th>
			<th>Callsign & Type</th>
			<th>Type</th>
			<th>When</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php $bookingsArray = $this->Data_model->getUserBookings($userInfo['id']);?>
		<?php foreach ($bookingsArray as $booking){ ?>
		<tr>
			<td><?php echo $booking['arpt'];?></td>
			<td><?php echo $booking['callsign'];?> / <?php echo $booking['ac_type'];?></td>
			<td><?php echo $booking['app_type'];?> + <?php echo $booking['app_int'];?></td>
			<td><?php echo date ('H:i d/m/y', $booking['book_start']);?></td>
			<td><button class="btn btn-default">View</button></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
