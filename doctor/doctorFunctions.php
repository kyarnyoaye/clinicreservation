<section class="container">
	<div class="doctorInfo">
		<h1>Welcome, <?php echo $_SESSION['doctorName']; ?></h1>
		<table>
			<tr class="infoRow">
				<td><a href="/clinicreservation/doctor/viewDoctorProfile.php">View Profile</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr class="infoRow">
				<td><a href="/clinicreservation/doctor/viewCorrespondingAppointment.php">View Appointments</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr class="infoRow">
            	<td><a href="/clinicreservation/doctor/viewCorrespondingMember.php">View Members</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr class="infoRow">
            	<td><a href="/clinicreservation/doctor/logoutDoctor.php">Logout</a></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
	</div>
</section>