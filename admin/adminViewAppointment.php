<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/clinicreservation/dblink.php';
if(!isset($_POST['appointmentDate'])){
	$appointmentDate=date("Y-m-d");
}
else {
	$appointmentDate=$_POST['appointmentDate'];	
}

if(!isset($_POST['speciality'])){
	$speciality='All';
}
else {
	$speciality=$_POST['speciality'];
}
$_SESSION['appointmentDate']=$appointmentDate;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clinic Reservation</title>
<link href="css/adminStyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet"
	href="/clinicreservation/calendar/zapatec/zpcal/themes/winter.css" />
<script type="text/javascript"
	src="/clinicreservation/calendar/zapatec/zpcal/utils/zapatec.js"></script>
<script type="text/javascript"
	src="/clinicreservation/calendar/zapatec/zpcal/src/calendar.js"></script>
<script type="text/javascript"
	src="/clinicreservation/calendar/zapatec/zpcal/lang/calendar-en.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>
<script type="text/javascript" src="js/slideshow.js"></script>
<script language="javascript">
function disableControls(){
document.getElementById('calendar').childNodes[1].disable='true';
document.getElementById('calendar').childNodes[1].readOnly='readonly';
document.getElementById('calendar').childNodes[1].disable='';
}
function disableKeys(){
var keyCode=(document.all)?event.keyCode:e.which;
if(keyCode==9){
window.event.returnValue=true; //for allowing TAB
}else{
window.event.returnValue=false;
}
}
</script>
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
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 14px; color: #03637E;">	
                <div align="center">
					<div onkeydown="Javascript:disablekeys();" onmousedown="Javascript:disableControls()">
						<form action="adminViewAppointment.php" method="post">
							&nbsp;&nbsp;Select Date:<input type="text" name="appointmentDate" id="calendar" value="<?php  if($_SESSION['appointmentDate']) echo $_SESSION['appointmentDate']; ?>" />
						<button id="trigger"
							style="border-style: solid; border-color: rgb(255, 247, 104) rgb(0, 0, 0) rgb(0, 0, 0) rgb(255, 247, 104); border-width: 2px; background: rgb(255, 204, 0) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: rgb(43, 41, 212); font-family: arial; font-style: normal; font-variant: normal; font-size: 11px; line-height: normal; font-size-adjust: none; font-stretch: normal; font-weight: 900; width: 20px; height: 19px;">
							<img src="images/cal-icon.gif" />
						</button><script type="text/javascript">
							//<![CDATA[
							Zapatec.Calendar.setup({
								firstDay : 1,
								electric : false,
								inputField : "calendar",
								button : "trigger",
								ifFormat : "%Y-%m-%d",/* %d-%b-%y */
								daFormat : "%Y-%m-%d"
							});
							//]]>
						</script>
       						&nbsp;&nbsp;&nbsp;&nbsp; 
      						Select Specialization:
      <select name="speciality">
      					<option>All</option>
                        <option>Allergist(Immunologist)</option>
                        <option>Cardiologist(Heart Doctor)</option>
                        <option>Dentist</option>
                        <option>Dermatologist</option>
                        <option>Dietitian</option>
                        <option>Ear</option>
                        <option>Nose and Throat Doctor(ENT)</option>
                        <option>Endocrinologist</option>
                        <option>Eye Doctor</option>
                        <option>Gastroenterologist</option>
                        <option>Hematologist(Blood Specialist)</option>
                        <option>Infectious Disease Specialist</option>
                        <option>Nephrologist(Kidney Specialist)</option>
                        <option>Neurologist</option>
                        <option>Obstetrician-Gynecologist</option>
                        <option>Ophthalmologist</option>
                        <option>Optometrist</option>
                        <option>Orthodontist</option>
                        <option>Orthopedic Surgeon</option>
                        <option>Pain Management Specialist</option>
                        <option>Pediatric Dentist</option>
                        <option>Pediatrician</option>
                        <option>Physical Therapist</option>
                        <option>Plastic Surgeon</option>
                        <option>Podiatrist(Foot Specialist)</option>
                        <option>Primary Care Doctor</option>
                        <option>Prosthodontist</option>
                        <option>Psychiatrist</option>
                        <option>Psychologist</option>
                        <option>Pulmonologist(Lung Doctor)</option>
                        <option>Radiologist</option>
                        <option>Rheumatologist</option>
                        <option>Sleep Medicine Specialist</option>
                        <option>Sports Medicine Specialist</option>
                        <option>Urologist</option>
                        </select>
                        <input type="submit" name="view" value="View" />
      
 <form> 
 </div>
   <?php if(isset($_POST['view'])){ 
   	 $today=date("Y-m-d");   
	 if($speciality == 'All'){
		$query="select appointment.*,member.memberName,doctor.doctorName from doctor,appointment,member where appointment.doctorId=doctor.doctorId and member.memberId=appointment.memberId and appointment.appointmentDate = '" . $appointmentDate . "' and appointment.appointmentDate >= '" . $today . "'"; 
	 }
	 else {
		 $query="select appointment.*,member.memberName,doctor.doctorName from doctor,appointment,member where appointment.doctorId=doctor.doctorId and member.memberId=appointment.memberId and appointment.appointmentDate = '" . $appointmentDate . "' and appointment.appointmentDate >= '" . $today . "' and speciality = '" . $speciality . "'"; 
	 }
$result=mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result);
if ($num_results > 0){
 ?>                             
	<br>
	<h4 id="title">Appointment Information</h4>
	<br>
     <table style="border:1px solid#e7ecee; width:90%" cellspacing=0 align="center";>
<tr align="center" bgcolor="lightseagreen">
     <th style="width:20%;">Patient Name</th>
     <th style="width:20%;">Doctor Name</th>
     <th style="width:20%;">Appointment Date</th>
     <th style="width:20%;">Appointment Time</th>
     <th style="width:20%;">Token</th>
     </tr>
     <?php
                while ($row = mysql_fetch_array($result)) {
					echo "<tr><td style='border: 1px solid #e7ecee;'>".$row["memberName"]."</td>";                                             
					echo "<td style='border: 1px solid #e7ecee;'>".$row["doctorName"]."</td>";
      				echo "<td style='border: 1px solid #e7ecee;'>".$row["appointmentDate"]."</td>"."";
       				echo "<td style='border: 1px solid #e7ecee;'>".$row["appointmentTime"]."</td>";
                   	echo "<td style='border: 1px solid #e7ecee;'>".$row["token"]."</td>";
				   	echo "</tr>";
				}
	?>
	</table>
</div>
<?php
}
else {
	?>
    <div align="center" color: steelblue; padding-left: 10px; font-weight: bold;">
    <h3><font color="red">No Appointment</font> </h3>
    </div>
    <?php
}
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