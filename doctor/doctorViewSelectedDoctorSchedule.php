<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clinic Reservation</title>
<link href="css/doctorStyle.css" rel="stylesheet" type="text/css" />
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
                  		<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/header.php';?>
                  	</td>
              	</tr>
  				<tr>	
             			<?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/menu.php';?>                      
              	</tr>
             	<tr>
                  <td valign="top" colspan="1" class="borderStyle" width="20%">
                  	 <?php
				  if(!isset($_SESSION['doctorId'])){
				  ?>
                  	 <!-- Login table -->
                  	 <table width="100%" style="margin: 0px 0px 0px -3px">
						<tr>
							<td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/login.php';?></td>
						</tr>
					</table>
                  <?php
				  }
				  else{
				  ?>
                   <!-- Doctor Functions -->
                  	 <table width="100%" style="margin: 0px 0px 0px -3px">
						<tr>
							<td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/doctorFunctions.php';?></td>
						</tr>
					</table>
                  <?php
				  }
				  ?>
                     <!-- left frame --> <!-- search table -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/search.php';?></td>
                          </tr>
                      </table>
                      <!-- left frame --> <!-- service list -->
                      <table width="100%" style="margin: 0px 0px 0px -3px">
                          <tr>
                              <td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/services.php';?></td>
                          </tr>
                      </table>    				      				  
				</td>
                <?php
					if ($_POST['viewSchedule']=='View Schedule'){
						include $_SERVER['DOCUMENT_ROOT'].'/clinicreservation/dblink.php';
						$doctorId=$_POST['doctorId'];
						$query="select * from schedule where schedule.doctorId='" . $doctorId . "'"; 
						$result=mysql_query($query) or die(mysql_error());
				?>
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
               <?php
                $num_results = mysql_num_rows($result);
				if ($num_results > 0){
				?>	
                <div align="center">
	<br>
	<h4 id="title">Doctor Schedule Information</h4>
	<br>
     <table style="border:1px solid#e7ecee; width:90%" cellspacing=0 align="center";>
<tr align="center" bgcolor="wheat">
     <th style="width:25%;">Day</th>
     <th style="width:25%;">Start Time</th>
     <th style="width:25%;">End Time</th>
     </tr>
     <?php
                while ($row = mysql_fetch_array($result)) {
					echo "<tr align='center'><td style='border: 1px solid #e7ecee;'>".$row["day"]."</td>";                                             
      				echo "<td style='border: 1px solid #e7ecee;'>".$row["startTime"]."</td>"."";
       				echo "<td style='border: 1px solid #e7ecee;'>".$row["endTime"]."</td>";
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
                <h3><font color="red">No Schedule Information!</font> </h3></div>
                <?php
				}
				?>
     
				</td>
                 <?php
					}
					else if($_POST['viewSchedule']=='Back'){
						include $_SERVER['DOCUMENT_ROOT'].'/clinicreservation/dblink.php';
						$doctorName=$_SESSION['srDoctorName'];
						$speciality=$_SESSION['srSpeciality'];
						$gender=$_SESSION['srGender'];
						$day=$_SESSION['srDay'];

if($doctorName=='All')
{
	if($speciality=='All')
	{
		if($gender=='All')
		{ 
		  if($day=='All')
		  {
			  $query="select * from doctor"; //for all
		  }
		  else  
		  {
			  $query="select doctor.* from doctor,schedule where schedule.day='" . $day . "' and doctor.doctorId=schedule.doctorId";//for day 
		  }
		}//if($gender='All')
		else
		{
		  if($day=='All')
		  {
			  $query="select * from doctor where doctorGender='" . $gender . "'";//for gender 
		  }
		  else  
		  {
			  $query="select doctor.* from doctor,schedule where schedule.day='" . $day . "' and doctorGender='" . $gender . "' and doctor.doctorId=schedule.doctorId";//for day and gender 
		  }
		}//else for if($gender='All')
	}//if($speciality='All')
	else
	{
		if($gender=='All')
		{ 
		  if($day=='All')
		  {
			  $query="select * from doctor where speciality='" . $speciality . "'"; //for only speciality
		  }
		  else  
		  {
			  $query="select doctor.* from doctor,schedule where doctor.speciality='" . $speciality . "' and schedule.day='" . $day . "' and doctor.doctorId=schedule.doctorId";//for speciality and day 
		  }
		}//if($gender='All')
		else
		{
		  if($day=='All')
		  {
			  $query="select * from doctor where doctorGender='" . $gender . "' and speciality='" . $speciality . "'";//for speciality and gender
		  }
		  else  
		  {
			  $query="select doctor.* from doctor,schedule where doctor.doctorGender='" . $gender . "' and doctor.speciality='" . $speciality . "' and schedule.day='" . $day . "' and doctor.doctorId=schedule.doctorId";//for speciality, gender and day 
		  }
		}//else for if($gender='All')
	}//else for if($speciality='All')
}//if($doctorName='All')
else
{
	if($speciality=='All')
	{
		if($gender=='All')
		{ 
		  if($day=='All')
		  {
			  $query="select * from doctor where doctorName='" . $doctorName . "'"; //for doctor name
		  }
		  else  
		  {
			  $query="select doctor.* from doctor,schedule where doctor.doctorName='" . $doctorName . "' and schedule.day='" . $day . "' and doctor.doctorId=schedule.doctorId";//for doctor name and day "; 
		  }
		}//if($gender='All')
		else
		{
		  if($day=='All')
		  {
			  $query="select * from doctor where doctorName='" . $doctorName . "' and doctorGender='" . $gender ."'"; //for doctor name and gender
		  }
		  else  
		  {
			  $query="select doctor.* from doctor,schedule where doctor.doctorName='" . $doctorName . "' and doctorGender='" . $gender . "' and schedule.day='" . $day . "' and doctor.doctorId=schedule.doctorId";//for doctor name, gender and day "; 
		  }
		}//else for if($gender='All')
	}//if($speciality='All')
	else
	{
		if($gender=='All')
		{ 
		  if($day=='All')
		  {
			  $query="select * from doctor where doctorName='" . $doctorName . "' and speciality='" . $speciality . "'"; //for doctor name and speciality
		  }
		  else  
		  {
			   $query="select doctor.* from doctor,schedule where doctor.doctorName='" . $doctorName . "' and doctor.speciality='" . $speciality . "' and schedule.day='" . $day . "' and doctor.doctorId=schedule.doctorId"; //for doctor name, speciality and day
		  }
		}//if($gender='All')
		else
		{
		  if($day=='All')
		  {
			  $query="select * from doctor where doctorName='" . $doctorName . "' and doctorGender='" . $gender . "' and speciality='" . $speciality . "'"; //for doctor name, gender and speciality
		  }
		  else  
		  {
			  $query="select doctor.* from doctor,schedule where doctor.doctorName='" . $doctorName . "' and doctor.doctorGender='" . $gender . "' and doctor.speciality='" . $speciality . "' and schedule.day='" . $day . "' and doctor.doctorId=schedule.doctorId"; //for doctor name, gender, speciality and day
		  }
		}//else for if($gender='All')
	}//else for if($speciality='All')
}//if($doctorName='All')
	
$result=mysql_query($query) or die(mysql_error());				?>
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
                <div align="center">
	<br>
	<h4 id="title">Doctor Information</h4>
	<br>
     <table style="border:1px solid#e7ecee; width:90%" cellspacing=0 align="center";>
<tr align="center" bgcolor="wheat">
     <th style="width:25%;">Doctor Name</th>
     <th style="width:25%;">Qualification</th>
     <th style="width:25%;">Specialization</th>
     <th style="width:25%;"></th>
     </tr>
     <?php
                while ($row = mysql_fetch_array($result)) {
					echo "<tr align='center'><td style='border: 1px solid #e7ecee;'>".$row["doctorName"]."</td>";                                             
      				echo "<td style='border: 1px solid #e7ecee;'>".$row["degree"]."</td>"."";
       				echo "<td style='border: 1px solid #e7ecee;'>".$row["speciality"]."</td>";
	 ?>
<td style='border: 1px solid #e7ecee;'><a href="doctorViewSelectedDoctorDetail.php?doctorId=<?php echo $row['doctorId']; ?>"><span id="viewColor">View Detail</span></a></td>
<?php       
echo "</tr>";                
}
?>
	</table>
</div>
				</td>
                <?php
					}
					?>
               </tr>
			   <tr>
					<td colspan="5"><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/includes/footer.php';?></td>
			   </tr>			
		</table>
		</td>
		<td width="8%"></td>
	  </tr>
	</table>
</body>
</html>