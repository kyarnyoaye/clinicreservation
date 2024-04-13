<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/clinicreservation/dblink.php';
$today=date("Y-m-d");
$query="select appointment.*,member.memberName,doctor.doctorName from doctor,appointment,member where appointment.memberId='".$_SESSION['memberId']."' and  appointment.doctorId=doctor.doctorId and member.memberId=appointment.memberId and appointment.appointmentDate > '" . $today . "'"; 
$result=mysql_query($query) or die(mysql_error());
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
                <?php
                $num_results = mysql_num_rows($result);
if ($num_results > 0){	
?>
                <div align="center">
	<br>
	<h4 id="title">Member Appointments</h4>
	<br>
     <table style="border:1px solid#e7ecee; width:95%" cellspacing=0 align="center";>
<tr align="center" bgcolor="#8470FF">
     <th style="width:20%;">Patient Name</th>
     <th style="width:20%;">Doctor Name</th>
     <th style="width:20%;">Appointment Date</th>
     <th style="width:20%;">Appointment Time</th>
     <th style="width:10%;">Token</th>
     <th style="width:10%;"></th>
     </tr>
     <?php
                while ($row = mysql_fetch_array($result)) {
					echo "<tr align='center'><td style='border: 1px solid #e7ecee;'>".$row["memberName"]."</td>";                                             
					echo "<td style='border: 1px solid #e7ecee;'>".$row["doctorName"]."</td>";
      				echo "<td style='border: 1px solid #e7ecee;'>".$row["appointmentDate"]."</td>"."";
       				echo "<td style='border: 1px solid #e7ecee;'>".$row["appointmentTime"]."</td>";
                   	echo "<td style='border: 1px solid #e7ecee;'>".$row["token"]."</td>";
					?>
					<td style='border: 1px solid #e7ecee;'><a href="/clinicreservation/appointmentCancel.php?appointmentId=<?php echo $row['appointmentId']; ?>"><span id="viewColor">Cancel</span></a></td>
                    <?php
				   	echo "</tr>";
				}
	?>
	</table>
</div>
<?php
}
else{
?>
 <div align="center" color: steelblue; padding-left: 10px; font-weight: bold;">
 <br>
 <br>
 <br>
    <h3><font color="red">You don't have any appointment.</font> </h3>
    </div>
    <?php
}
?>
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