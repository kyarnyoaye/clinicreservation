<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/clinicreservation/dblink.php';
$scheduleId=$_GET['scheduleId'];
$query="select doctor.doctorName,schedule.* from schedule,doctor where schedule.scheduleId='" . $scheduleId . "' and doctor.doctorId=schedule.doctorId"; 
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);

if(isset($_POST['editSchedule']) && $_POST['editSchedule']=='Edit'){
	include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';     
    $day=$_POST['day'];
	$startTime=$_POST['startTime'];
	$endTime=$_POST['endTime'];
	       
    $sql_update=mysql_query("update schedule set day='$day',startTime='$startTime',endTime='$endTime' where scheduleId='".$_POST['scheduleId']."'");
	header('location:adminHome.php');
}
else if(isset($_POST['editSchedule']) && $_POST['editSchedule']=='Cancel'){
	header('location:adminHome.php');
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
                <div align="center">
	<br>
		<h4 id="title">Edit Schedule Form</h4>
		<br>
		<form action="#" method="post">
        <input type="hidden" name="scheduleId" value="<?php echo $scheduleId ?>" />
			<table>
				<tr>
					<td>Doctor Name:</td>
                    <td><?php echo $row["doctorName"] ?></td>
				</tr>
                <tr><td>&nbsp;</td></tr>
				<tr>
					<td>Day:</td>
                    <td><select name="day">
                        <option <?php if($row['day']=="Monday") echo "selected";?>>Monday</option>
                        <option <?php if($row['day']=="Tuesday") echo "selected";?>>Tuesday</option>
                        <option <?php if($row['day']=="Wednesday") echo "selected";?>>Wednesday</option>
                        <option <?php if($row['day']=="Thursday") echo "selected";?>>Thursday</option>
                        <option <?php if($row['day']=="Friday") echo "selected";?>>Friday</option>
                        <option <?php if($row['day']=="Saturday") echo "selected";?>>Saturday</option>
                        <option <?php if($row['day']=="Sunday") echo "selected";?>>Sunday</option></select></td>
				</tr>
                <tr><td>&nbsp;</td></tr>
				<tr>
					<td>Start Time:</td>
                    <td><select name="startTime">
                        <option <?php if($row['startTime']=="7:00AM") echo "selected";?>>7:00AM</option>
                        <option <?php if($row['startTime']=="7:30AM") echo "selected";?>>7:30AM</option>
                        <option <?php if($row['startTime']=="8:00AM") echo "selected";?>>8:00AM</option>
                        <option <?php if($row['startTime']=="8:30AM") echo "selected";?>>8:30AM</option>
                        <option <?php if($row['startTime']=="9:00AM") echo "selected";?>>9:00AM</option>
                        <option <?php if($row['startTime']=="9:30AM") echo "selected";?>>9:30AM</option>
                        <option <?php if($row['startTime']=="10:00AM") echo "selected";?>>10:00AM</option>
                        <option <?php if($row['startTime']=="10:30AM") echo "selected";?>>10:30AM</option>
                        <option <?php if($row['startTime']=="11:00AM") echo "selected";?>>11:00AM</option>
                        <option <?php if($row['startTime']=="11:30AM") echo "selected";?>>11:30AM</option>
                        <option <?php if($row['startTime']=="12:00AM") echo "selected";?>>12:00AM</option>
                        <option <?php if($row['startTime']=="12:30PM") echo "selected";?>>12:30PM</option>
                        <option <?php if($row['startTime']=="1:00PM") echo "selected";?>>1:00PM</option>
                        <option <?php if($row['startTime']=="1:30PM") echo "selected";?>>1:30PM</option>
                        <option <?php if($row['startTime']=="2:00PM") echo "selected";?>>2:00PM</option>
                        <option <?php if($row['startTime']=="2:30PM") echo "selected";?>>2:30PM</option>
                        <option <?php if($row['startTime']=="3:00PM") echo "selected";?>>3:00PM</option>
                        <option <?php if($row['startTime']=="3:30PM") echo "selected";?>>3:30PM</option>
                        <option <?php if($row['startTime']=="4:00PM") echo "selected";?>>4:00PM</option>
                        <option <?php if($row['startTime']=="4:30PM") echo "selected";?>>4:30PM</option>
                        <option <?php if($row['startTime']=="5:00PM") echo "selected";?>>5:00PM</option>
                        <option <?php if($row['startTime']=="5:30PM") echo "selected";?>>5:30PM</option>
                        <option <?php if($row['startTime']=="6:00PM") echo "selected";?>>6:00PM</option>
                        <option <?php if($row['startTime']=="6:30PM") echo "selected";?>>6:30PM</option>
                        <option <?php if($row['startTime']=="7:00PM") echo "selected";?>>7:00PM</option>
                        <option <?php if($row['startTime']=="7:30PM") echo "selected";?>>7:30PM</option>
                        <option <?php if($row['startTime']=="8:00PM") echo "selected";?>>8:00PM</option>
                        <option <?php if($row['startTime']=="8:30PM") echo "selected";?>>8:30PM</option>
                        <option <?php if($row['startTime']=="9:00PM") echo "selected";?>>9:00PM</option>
                        </select></td>
				</tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
					<td>End Time:</td>
                    <td><select name="endTime">
                        <option <?php if($row['endTime']=="8:00AM") echo "selected";?>>8:00AM</option>
                        <option <?php if($row['endTime']=="8:30AM") echo "selected";?>>8:30AM</option>
                        <option <?php if($row['endTime']=="9:00AM") echo "selected";?>>9:00AM</option>
                        <option <?php if($row['endTime']=="9:30AM") echo "selected";?>>9:30AM</option>
                        <option <?php if($row['endTime']=="10:00AM") echo "selected";?>>10:00AM</option>
                        <option <?php if($row['endTime']=="10:30AM") echo "selected";?>>10:30AM</option>
                        <option <?php if($row['endTime']=="11:00AM") echo "selected";?>>11:00AM</option>
                        <option <?php if($row['endTime']=="11:30AM") echo "selected";?>>11:30AM</option>
                        <option <?php if($row['endTime']=="12:00AM") echo "selected";?>>12:00AM</option>
                        <option <?php if($row['endTime']=="12:30PM") echo "selected";?>>12:30PM</option>
                        <option <?php if($row['endTime']=="1:00PM") echo "selected";?>>1:00PM</option>
                        <option <?php if($row['endTime']=="1:30PM") echo "selected";?>>1:30PM</option>
                        <option <?php if($row['endTime']=="2:00PM") echo "selected";?>>2:00PM</option>
                        <option <?php if($row['endTime']=="2:30PM") echo "selected";?>>2:30PM</option>
                        <option <?php if($row['endTime']=="3:00PM") echo "selected";?>>3:00PM</option>
                        <option <?php if($row['endTime']=="3:30PM") echo "selected";?>>3:30PM</option>
                        <option <?php if($row['endTime']=="4:00PM") echo "selected";?>>4:00PM</option>
                        <option <?php if($row['endTime']=="4:30PM") echo "selected";?>>4:30PM</option>
                        <option <?php if($row['endTime']=="5:00PM") echo "selected";?>>5:00PM</option>
                        <option <?php if($row['endTime']=="5:30PM") echo "selected";?>>5:30PM</option>
                        <option <?php if($row['endTime']=="6:00PM") echo "selected";?>>6:00PM</option>
                        <option <?php if($row['endTime']=="6:30PM") echo "selected";?>>6:30PM</option>
                        <option <?php if($row['endTime']=="7:00PM") echo "selected";?>>7:00PM</option>
                        <option <?php if($row['endTime']=="7:30PM") echo "selected";?>>7:30PM</option>
                        <option <?php if($row['endTime']=="8:00PM") echo "selected";?>>8:00PM</option>
                        <option <?php if($row['endTime']=="8:30PM") echo "selected";?>>8:30PM</option>
                        <option <?php if($row['endTime']=="9:00PM") echo "selected";?>>9:00PM</option>
                        <option <?php if($row['endTime']=="7:00AM") echo "selected";?>>7:00AM</option>
                        <option <?php if($row['endTime']=="7:30AM") echo "selected";?>>7:30AM</option>
                        <option <?php if($row['endTime']=="8:00AM") echo "selected";?>>8:00AM</option>
                        <option <?php if($row['endTime']=="8:30AM") echo "selected";?>>8:30AM</option>
                        <option <?php if($row['endTime']=="9:00AM") echo "selected";?>>9:00AM</option>
                        <option <?php if($row['endTime']=="9:30AM") echo "selected";?>>9:30AM</option>
                        <option <?php if($row['endTime']=="10:00AM") echo "selected";?>>10:00AM</option>
                        <option <?php if($row['endTime']=="10:30AM") echo "selected";?>>10:30AM</option>
                        <option <?php if($row['endTime']=="11:00AM") echo "selected";?>>11:00AM</option>
                        <option <?php if($row['endTime']=="11:30AM") echo "selected";?>>11:30AM</option>
                        <option <?php if($row['endTime']=="12:00AM") echo "selected";?>>12:00AM</option>
                        <option <?php if($row['endTime']=="12:30PM") echo "selected";?>>12:30PM</option>
                        <option <?php if($row['endTime']=="1:00PM") echo "selected";?>>1:00PM</option>
                        <option <?php if($row['endTime']=="1:30PM") echo "selected";?>>1:30PM</option>
                        <option <?php if($row['endTime']=="2:00PM") echo "selected";?>>2:00PM</option>
                        <option <?php if($row['endTime']=="2:30PM") echo "selected";?>>2:30PM</option>
                        <option <?php if($row['endTime']=="3:00PM") echo "selected";?>>3:00PM</option>
                        <option <?php if($row['endTime']=="3:30PM") echo "selected";?>>3:30PM</option>
                        <option <?php if($row['endTime']=="4:00PM") echo "selected";?>>4:00PM</option>
                        <option <?php if($row['endTime']=="4:30PM") echo "selected";?>>4:30PM</option>
                        <option <?php if($row['endTime']=="5:00PM") echo "selected";?>>5:00PM</option>
                        <option <?php if($row['endTime']=="5:30PM") echo "selected";?>>5:30PM</option>
                        <option <?php if($row['endTime']=="6:00PM") echo "selected";?>>6:00PM</option>
                        <option <?php if($row['endTime']=="6:30PM") echo "selected";?>>6:30PM</option>
                        <option <?php if($row['endTime']=="7:00PM") echo "selected";?>>7:00PM</option>
                        <option <?php if($row['endTime']=="7:30PM") echo "selected";?>>7:30PM</option>
                        <option <?php if($row['endTime']=="8:00PM") echo "selected";?>>8:00PM</option>
                        <option <?php if($row['endTime']=="8:30PM") echo "selected";?>>8:30PM</option>
                        <option <?php if($row['endTime']=="9:00PM") echo "selected";?>>9:00PM</option>
                        <option <?php if($row['endTime']=="9:30PM") echo "selected";?>>9:30PM</option>
                        <option <?php if($row['endTime']=="10:00PM") echo "selected";?>>10:00PM</option>
                        </select></td>
				</tr>
                <tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" align="center">
                    <input type="submit" name="editSchedule" value="Edit" />
                    <input type="submit" name="editSchedule" value="Cancel" /></td>
				</tr>
			</table>
		</form>
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