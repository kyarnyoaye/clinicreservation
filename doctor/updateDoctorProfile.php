<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';     
$query="select * from doctor where doctorId='".$_SESSION['doctorId']."'"; 
$result=mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$nameError ="";
$ageError="";
$phoneError="";
$priceError="";
function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
// On submitting form below function will execute.
if(isset($_POST['update']) && $_POST['update']=='Save'){
	if (empty($_POST["doctorName"])) {
		$nameError = "Name is required";
	} else {
		$name = test_input($_POST["doctorName"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z .]*$/",$name)) {
			$nameError = "Only letters, white space and dot allowed";
		}
	}
	
	if(!empty($_POST["doctorAge"])){
		$age = test_input($_POST["doctorAge"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[1-9]{1}[0-9]{0,1}$/",$age)) {
			$ageError = "Age is invalid";
		}
	}
	
	if(empty($_POST["doctorAge"])){
		$ageError = "Age is invalid"; 
	}
	
	if(!empty($_POST["doctorAge"])){
		$age = test_input($_POST["doctorAge"]);
		if($age <= 0){
			$ageError = "Age is invalid";
		}
	}
	
	if(!empty($_POST["doctorPhone"])){
		$phone = test_input($_POST["doctorPhone"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[0-9]{8,12}$/",$phone)) {
			$phoneError = "Phone number is invalid";
		}
	}
	
	if(empty($_POST["price"])){
		$priceError = "Price is invalid"; 
	}
	
	if(!empty($_POST["price"])){
		$price = test_input($_POST["price"]);
		if($price <= 1000){
			$priceError = "Price is invalid";
		}
	}
	
	if($nameError=="" && $ageError=="" && $phoneError=="" && $priceError==""){
		include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';     
    $doctorName=$_POST['doctorName'];
    $speciality=$_POST['speciality'];
	$degree=$_POST['degree'];
	$doctorAge=$_POST['doctorAge'];
    $doctorGender=$_POST['doctorGender'];
    $doctorPhone=$_POST['doctorPhone'];
    $doctorAddress=$_POST['doctorAddress'];
    $experience=$_POST['experience'];
	$price=$_POST['price'];
	       
    $sql_update=mysql_query("update doctor set doctorName='$doctorName',doctorAge='$doctorAge',doctorGender='$doctorGender',doctorPhone='$doctorPhone',doctorAddress='$doctorAddress',speciality='$speciality',degree='$degree',experience='$experience',price='$price' where doctorId='".$_POST['doctorId']."'");
		$_SESSION['doctorName']=$doctorName;
		header('location:doctorHome.php');
	}
}
else if(isset($_POST['update']) && $_POST['update']=='Cancel'){
	header('location:doctorHome.php');
}
else if(isset($_POST['update']) && $_POST['update']=='Change Password'){
	header('location:changeDoctorPassword.php');
}
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
                  	<!-- Doctor Functions -->
                  	 <table width="100%" style="margin: 0px 0px 0px -3px">
						<tr>
							<td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/doctor/doctorFunctions.php';?></td>
						</tr>
					</table>
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
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
                <div align="center">
	<br>
	<h4 id="title">Doctor Update Form</h4>
	<br>
	<form action="updateDoctorProfile.php" method="post">
		<table id="membersend">
			<tr>
				<td align="center">Name:</td>
				<td><input type="text" name="doctorName" maxlength="30" value="<?php echo $row['doctorName'];?>"/><span style="color: red;"><?php echo $nameError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Specialization:</td>
                <td><select name="speciality">
                        <option <?php if($row['speciality']=="Allergist(Immunologist)") echo "selected";?>>Allergist(Immunologist)</option>
                        <option <?php if($row['speciality']=="Cardiologist(Heart Doctor)") echo "selected";?>>Cardiologist(Heart Doctor)</option>
                        <option <?php if($row['speciality']=="Dentist") echo "selected";?>>Dentist</option>
                        <option <?php if($row['speciality']=="Dermatologist") echo "selected";?>>Dermatologist</option>
                        <option <?php if($row['speciality']=="Dietitian") echo "selected";?>>Dietitian</option>
                        <option <?php if($row['speciality']=="Ear") echo "selected";?>>Ear</option>
                        <option <?php if($row['speciality']=="Nose and Throat Doctor(ENT)") echo "selected";?>>Nose and Throat Doctor(ENT)</option>
                        <option <?php if($row['speciality']=="Endocrinologist") echo "selected";?>>Endocrinologist</option>
                        <option <?php if($row['speciality']=="Eye Doctor") echo "selected";?>>Eye Doctor</option>
                        <option <?php if($row['speciality']=="Gastroenterologist") echo "selected";?>>Gastroenterologist</option>
                        <option <?php if($row['speciality']=="Hematologist(Blood Specialist)") echo "selected";?>>Hematologist(Blood Specialist)</option>
                        <option <?php if($row['speciality']=="Infectious Disease Specialist") echo "selected";?>>Infectious Disease Specialist</option>
                        <option <?php if($row['speciality']=="Nephrologist(Kidney Specialist)") echo "selected";?>>Nephrologist(Kidney Specialist)</option>
                        <option <?php if($row['speciality']=="Neurologist") echo "selected";?>>Neurologist</option>
                        <option <?php if($row['speciality']=="Obstetrician-Gynecologist") echo "selected";?>>Obstetrician-Gynecologist</option>
                        <option <?php if($row['speciality']=="Ophthalmologist") echo "selected";?>>Ophthalmologist</option>
                        <option <?php if($row['speciality']=="Optometrist") echo "selected";?>>Optometrist</option>
                        <option <?php if($row['speciality']=="Orthodontist") echo "selected";?>>Orthodontist</option>
                        <option <?php if($row['speciality']=="Orthopedic Surgeon") echo "selected";?>>Orthopedic Surgeon</option>
                        <option <?php if($row['speciality']=="Pain Management Specialist") echo "selected";?>>Pain Management Specialist</option>
                        <option <?php if($row['speciality']=="Pediatric Dentist") echo "selected";?>>Pediatric Dentist</option>
                        <option <?php if($row['speciality']=="Pediatrician") echo "selected";?>>Pediatrician</option>
                        <option <?php if($row['speciality']=="Physical Therapist") echo "selected";?>>Physical Therapist</option>
                        <option <?php if($row['speciality']=="Plastic Surgeon") echo "selected";?>>Plastic Surgeon</option>
                        <option <?php if($row['speciality']=="Podiatrist(Foot Specialist)") echo "selected";?>>Podiatrist(Foot Specialist)</option>
                        <option <?php if($row['speciality']=="Primary Care Doctor") echo "selected";?>>Primary Care Doctor</option>
                        <option <?php if($row['speciality']=="Prosthodontist") echo "selected";?>>Prosthodontist</option>
                        <option <?php if($row['speciality']=="Psychiatrist") echo "selected";?>>Psychiatrist</option>
                        <option <?php if($row['speciality']=="Psychologist") echo "selected";?>>Psychologist</option>
                        <option <?php if($row['speciality']=="Pulmonologist(Lung Doctor)") echo "selected";?>>Pulmonologist(Lung Doctor)</option>
                        <option <?php if($row['speciality']=="Radiologist") echo "selected";?>>Radiologist</option>
                        <option <?php if($row['speciality']=="Rheumatologist") echo "selected";?>>Rheumatologist</option>
                        <option <?php if($row['speciality']=="Sleep Medicine Specialist") echo "selected";?>>Sleep Medicine Specialist</option>
                        <option <?php if($row['speciality']=="Sports Medicine Specialist") echo "selected";?>>Sports Medicine Specialist</option>
                        <option <?php if($row['speciality']=="Urologist") echo "selected";?>>Urologist</option>
                        </select>
                        </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Qualification:</td>
				<td><input type="text" name="degree" maxlength="30" value="<?php echo $row['degree'];?>"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Age:</td>
                <td><input type="number" name="doctorAge" maxlength="2" max="99" value="<?php echo $row['doctorAge'];?>"/><span style="color: red;"><?php echo $ageError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Gender:</td>
                <td><?php echo $row["doctorGender"]?></td>
  			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Phone:</td>
                <td><input type="text" name="doctorPhone" maxlength="12" value="<?php echo $row['doctorPhone'];?>"/><span style="color: red;"><?php echo $phoneError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Address:</td>
                <td><textarea name="doctorAddress" cols="30" rows="5"> <?php echo $row['doctorAddress'];?></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Experience:</td>
                <td><input type="text" name="experience" maxlength="8" value="<?php echo $row['experience'];?>"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Price:</td>
                <td><input type="number" name="price" maxlength="5" max="10000" value="<?php echo $row['price'];?>"/><span style="color: red;"><?php echo $priceError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update" value="Save" />&nbsp;&nbsp;&nbsp;
                <input type="submit" name="update" value="Change Password" />
                &nbsp;&nbsp;&nbsp;<input type="submit" name="update" value="Cancel" /></td>
			</tr>
		</table>
        <input type="hidden" id="doctorId" name="doctorId" value="<?php echo $row['doctorId']; ?>"/>
	<form>
</div>
				</td>
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