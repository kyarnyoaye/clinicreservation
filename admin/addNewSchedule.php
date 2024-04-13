<?php
session_start();
if ($_POST['addSchedule']=='Add'){
	include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';	
	$maxPatient=4;				
	$query = "insert into schedule
                   (scheduleId,
				    day,
                    startTime,
					endTime,
					doctorId
                    )
                  VALUES
                   (NULL,
				    '" . $_POST['day'] . "',
					'" . $_POST['startTime'] . "',
					'" . $_POST['endTime'] . "',
                    '" . $_POST['doctorId'] . "')";
$result=mysql_query($query) or die(mysql_error());
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clinic Reservation</title>
<link href="css/adminStyle.css" rel="stylesheet" type="text/css" />
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
                  		<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/admin/includes/header.php';?>
                  	</td>
              	</tr>
  				<tr>	
             			<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/admin/includes/menu.php';?>                      
              	</tr>
             	<tr>
                  <td valign="top" colspan="1" class="borderStyle" width="20%">
                  	<!-- Member Functions -->
                  	 <table width="100%" style="margin: 0px 0px 0px -3px">
						<tr>
							<td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/admin/adminFunctions.php';?></td>
						</tr>
					</table>
                     <!-- left frame --> <!-- search table -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/admin/includes/search.php';?></td>
                          </tr>
                      </table>
                      <!-- left frame --> <!-- service list -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/admin/includes/services.php';?></td>
                          </tr>
                      </table>    				      				  
				</td>
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
                <div align="center">
		<br>
			<img src="images/home.jpg" />
		<br>
		<h3 id="title" align="center">
			<font color="blue">Our System Mission</font>
		</h3>
		<p align="justify">
			<font color="blue"> Our Mission </font>: Our Online Clinic Reservation
			System is an electronic paperless application designed with high
			flexibility and ease of usage, implemented in Clinics and Medical
			Centers. The Aim of developing this system is to minimize
			physician's idle time overlooking patient's waiting time. Our System
			can provide doctor's information and doctor's schedule for patient's to make appointment.
            Users can search and view doctor's information with various criteria such as 
            doctor's name, gender, speciality and day. A patient can login, only when he/she enters 
            a correct username and password.
		</p>
		</div>
				</td>
               </tr>
			   <tr>
					<td colspan="5"><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/admin/includes/footer.php';?></td>
			   </tr>			
		</table>
		</td>
		<td width="8%"></td>
	  </tr>
	</table>
</body>
</html>