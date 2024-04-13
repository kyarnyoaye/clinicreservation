<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';
$query="select * from member where memberId='".$_SESSION['memberId']."'"; 
$sql="select doctor.doctorId,doctor.doctorName,doctor.speciality,schedule.startTime,schedule.endTime from schedule,doctor where schedule.doctorId=doctor.doctorId and schedule.scheduleId='".$_GET['scheduleId']."'"; 

$result=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

$res=mysql_query($sql) or die(mysql_error());
$record = mysql_fetch_array($res);

$_SESSION['appointDoctorId']=$record['doctorId'];
$_SESSION['appointDoctorName']=$record['doctorName'];
$_SESSION['appointDoctorSpeciality']=$record["speciality"];
$_SESSION['appointStartTime']=$record["startTime"];
$_SESSION['appointEndTime']=$record["endTime"];
$startTime=$record["startTime"];
$endTime=$record["endTime"];
$_SESSION['appointTime']=$startTime . ' - ' .$endTime;

if(isset($_POST['appointment']) && $_POST['appointment']=='Appointment'){
	$sql1 = "select * from appointmentstatus where appointmentDate='" . $_SESSION['appointmentDate'] . "' and doctorId='" . $_SESSION['appointDoctorId'] . "'";
	$res1=mysql_query($sql1) or die(mysql_error());
	$record1 = mysql_fetch_array($res1);
	$_SESSION['appointToken']=$record1["lastToken"]+1;
	$lastToken=$_SESSION['appointToken'];
	$sql2 = "INSERT INTO appointment
                   (appointmentId,
                    memberId,
                    doctorId,
					appointmentDate,
					appointmentTime,
					token
                    )
                  VALUES
                   (NULL,
                    '" . $_SESSION['memberId'] . "',
                    '" . $_SESSION['appointDoctorId'] . "',
					'" . $_SESSION['appointmentDate'] . "',
					'" . $_SESSION['appointTime'] . "',
					'" . $_SESSION['appointToken'] . "')";
				$res2=mysql_query($sql2) or die(mysql_error());
	
	$sql3="update appointmentstatus set lastToken='$lastToken' where appointmentDate='" . $_SESSION['appointmentDate'] . "' and doctorId='" . $_SESSION['appointDoctorId'] . "'";
	$res3=mysql_query($sql3) or die(mysql_error());
	header('location:appointmentSuccess.php');
}
else if(isset($_POST['appointment']) && $_POST['appointment']=='Cancel'){
	header('location:appointmentSchedule.php');
}
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
	<h4 id="title">Member Appointment Information</h4>
	<br>
	<form action="#" method="post">
		<table id="membersend1">
			<tr>
				<td align="center">Name:</td>
				<td><?php echo $row["memberName"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Gender:</td>
				<td><?php echo $row["memberGender"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Age:</td>
				<td><?php echo $row["memberAge"]?></td>
			</tr>	
			<tr>
				<td>&nbsp;</td>
			</tr>			
			<tr>
				<td align="center">Phone:</td>
				<td><?php echo $row["memberPhone"]?></td>
			</tr>
				<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Doctor Name:</td>
				<td><?php echo $record["doctorName"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Doctor's Specialization:</td>
				<td><?php echo $record["speciality"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Appointment Date:</td>
				<td><?php echo $_SESSION["appointmentDate"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Appointment Time:</td>
				<td><?php echo $record["startTime"]?>-<?php echo $record["endTime"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
                <input type="submit" name="appointment" value="Appointment" />
                <input type="submit" name="appointment" value="Cancel" /></td>
			</tr>
		</table>
	</form>
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