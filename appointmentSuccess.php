<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clinic Reservation</title>
<link href="css/clinic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>
<script type="text/javascript" src="js/slideshow.js"></script>

</head>
<body id="bb" background="images/background/leafCircle.jpg">
  <table width="100%">
  	<tr>
  		<td width="8%"></td>
  		<td width="84%">
  <!-- main frame -->
  			<table border="0" width="100%" style="background: #F5FFFA;">
  				<!--<tr>
  					<td colspan="5" align="center" class="borderStyle">
  						<img src="images/headImg6.jpg" alt="Heading Image" width="100%" />	
  					</td>
  				</tr>-->
 				<tr>
                  	<td colspan="5" class="borderStyle">
                  		<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/header.php';?>
                  	</td>
              	</tr>
  				<tr>	
             			<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/menu.php';?>                      
              	</tr>
             	<tr>
                  <td valign="top" colspan="1" class="borderStyle" width="20%">
                  	<!-- Member Functions -->
                  	<table width="100%" style="margin: 0px 0px 0px -3px">
						<tr>
							<td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/memberFunctions.php';?></td>
						</tr>
					</table>
                     <!-- left frame --> <!-- search table -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/search.php';?></td>
                          </tr>
                      </table>
                      <!-- left frame --> <!-- service list -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/services.php';?></td>
                          </tr>
                      </table>    				      				  
				</td>
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
               <div align="center">
	<br>
	<h4 id="title">Your Appointment Information</h4>
	<br>
    <form action="memberHome.php" method="post">
	<table id="membersend1">
		<tr>
			<td align="center">Your Token number</td>
			<td><?php echo $_SESSION["appointToken"]?></td>
		</tr>
        <tr>
				<td>&nbsp;</td>
			</tr>
		<tr>
			<td align="center">Appointment Date</td>
			<td><?php echo $_SESSION["appointmentDate"]?></td>
		</tr>
        <tr>
				<td>&nbsp;</td>
			</tr>
		<tr>
			<td align="center">Appointment Time</td>
			<td><?php echo $_SESSION['appointStartTime']?> - <?php echo $_SESSION['appointEndTime']?></td>
		</tr>
        <tr>
				<td>&nbsp;</td>
			</tr>
		<tr>
			<td align="center">Appointment Doctor</td>
			<td><?php echo $_SESSION['appointDoctorName']?></td>
		</tr>
        <tr>
				<td>&nbsp;</td>
			</tr>
		<tr>
			<td align="center">Appointment Doctor's Specialization</td>
			<td><?php echo $_SESSION['appointDoctorSpeciality']?></td>
		</tr>
		<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="OK" value="OK" /></td>
			</tr>
	</table>
</div>	
				</td>
               </tr>
			   <tr>
					<td colspan="5"><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/footer.php';?></td>
			   </tr>			
		</table>
		</td>
		<td width="8%"></td>
	  </tr>
	</table>
</body>
</html>