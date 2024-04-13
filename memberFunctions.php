<section class="container">
	<div class="memberInfo">
		<h1>Welcome, <?php echo $_SESSION['memberName']; ?></h1>
		<table>
			<tr class="infoRow">
				<td><a href="/clinicreservation/viewProfile.php">View Profile</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr class="infoRow">
				<td><a href="/clinicreservation/appointmentSchedule.php">Make Appointment</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr class="infoRow">
            	<td><a href="/clinicreservation/viewAppointment.php">View Appointment</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr class="infoRow">
            	<td><a href="/clinicreservation/doctorsForVoting.php">Vote Doctor</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr class="infoRow">
            	<td><a href="/clinicreservation/logoutMember.php">Logout</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
	</div>
</section>