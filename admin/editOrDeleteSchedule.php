<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/clinicreservation/dblink.php';
$sql="select * from appointment"; 
$res=mysql_query($sql) or die(mysql_error());
$num_results = mysql_num_rows($res);
if ($num_results > 0){
/*$query="select schedule.*,doctor.doctorName from schedule,doctor,appointmentstatus,appointment where schedule.scheduleId!=appointmentstatus.scheduleId and appointmentstatus.doctorId=appointment.doctorId and appointmentstatus.appointmentDate=appointment.appointmentDate and schedule.doctorId=doctor.doctorId";*/
$query="select distinct(schedule.scheduleId),schedule.*,doctor.doctorName from schedule,doctor,appointment where schedule.doctorId=doctor.doctorId and ((schedule.doctorId=appointment.doctorId and schedule.day!=DAYNAME(appointment.appointmentDate)) or (schedule.doctorId<>ALL(select doctorId from appointment)))"; 
$result=mysql_query($query) or die(mysql_error());
}
else {
	$query="select schedule.*,doctor.doctorName from schedule,doctor where schedule.doctorId=doctor.doctorId"; 
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
                  	<!-- Admin Functions -->
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
                 <?php
               $num_results = mysql_num_rows($result);
			   if ($num_results > 0){
				?>	
                <div align="center">
	<br>
	<h4 id="title">Schedule Information</h4>
	<br>
     <table style="border:1px solid#e7ecee; width:95%" cellspacing=0 align="center";>
<tr align="center" bgcolor="lightseagreen">
     <th style="width:20%;">Doctor Name</th>
     <th style="width:20%;">Day</th>
     <th style="width:20%;">Start Time</th>
     <th style="width:20%;">End Time</th>
     <th style="width:20%;"></th>
     </tr>
     <?php
                while ($row = mysql_fetch_array($result)) {
					echo "<tr><td style='border: 1px solid #e7ecee;'>".$row["doctorName"]."</td>";                                             
      				echo "<td style='border: 1px solid #e7ecee;'>".$row["day"]."</td>"."";
       				echo "<td style='border: 1px solid #e7ecee;'>".$row["startTime"]."</td>";
					echo "<td style='border: 1px solid #e7ecee;'>".$row["endTime"]."</td>";
	 ?>
<td style='border: 1px solid #e7ecee;'><a href="editScheduleForm.php?scheduleId=<?php echo $row['scheduleId']; ?>"><span id="viewColor">Edit</span></a>
/<a href="deleteSchedule.php?scheduleId=<?php echo $row['scheduleId']; ?>"><span id="viewColor">Delete</span></a>
</td>
<?php       
echo "</tr>";                
}
?>
	</table>
</div>
<?php
				}else{
				?>
                <div align="center">
                <br><br>
                <h3><font color="red">No Schedule To Delete or Edit!</font> </h3></div>
                <?php
				}
				?>
	
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