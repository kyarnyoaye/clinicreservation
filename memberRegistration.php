<?php
// Initialize variables to null.
$regNameError ="";
$regPwdError ="";
$confirmPwdError ="";
$fatherNameError ="";
$ageError="";
$phoneError="";
function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
// On submitting form below function will execute.
if(isset($_POST['register']) && $_POST['register']=='Register'){
	if (empty($_POST["memberRegName"])) {
		$regNameError = "Name is required";
	} else {
		$name = test_input($_POST["memberRegName"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$regNameError = "Only letters and white space allowed";
		}
	}
	
	if (empty($_POST["memberRegPwd"])) {
		$regPwdError = "Password is required";
	}
	
	if (empty($_POST["memberConfirmPwd"])) {
		$confirmPwdError = "Confirm Password is required";
	}
	
	if($_POST["memberRegPwd"]!=$_POST["memberConfirmPwd"]){
		$confirmPwdError = "Password and confirmed password do not match";
	}
	
	if(!empty($_POST["memberFatherName"])){
		$name = test_input($_POST["memberFatherName"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$fatherNameError = "Only letters and white space allowed";
		}
	}
	if(!empty($_POST["memberAge"])){
		$age = test_input($_POST["memberAge"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[1-9]{1}[0-9]{0,1}$/",$age)) {
			$ageError = "Age is invalid";
		}
	}
	
	if(empty($_POST["memberAge"])){
		$ageError = "Age is invalid"; 
	}
	
	if(!empty($_POST["memberAge"])){
		$age = test_input($_POST["memberAge"]);
		if($age <= 0){
			$ageError = "Age is invalid";
		}
	}
	
	if(!empty($_POST["memberPhone"])){
		$phone = test_input($_POST["memberPhone"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[0-9]{8,12}$/",$phone)) {
			$phoneError = "Phone number is invalid";
		}
	}
	
	if($regNameError=="" && $regPwdError=="" && $confirmPwdError=="" && $fatherNameError=="" && $ageError=="" && $phoneError==""){
		include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';
		$sql = "INSERT INTO member
                   (memberId,
                    memberName,
                    memberPwd,
					memberFatherName,
					memberAge,
					memberGender,
					memberPhone,
					memberAddress
                    )
                  VALUES
                   (NULL,
                    '" . $_POST['memberRegName'] . "',
                    '" . $_POST['memberRegPwd'] . "',
					'" . $_POST['memberFatherName'] . "',
					'" . $_POST['memberAge'] . "',
					'" . $_POST['memberGender'] . "',
					'" . $_POST['memberPhone'] . "',
					'" . $_POST['memberAddress'] . "')";
		$res=mysql_query($sql);
		header('location:registrationSuccess.php');
	}
}
else if(isset($_POST['register']) && $_POST['register']=='Cancel'){
	header('location:index.php');
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
                  	 <!-- Login table -->
                  	 <table width="100%" style="margin: 0px 0px 0px -3px">
						<tr>
							<td><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/login.php';?></td>
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
		<h4 id="title">Member Registration</h4>
		<br>
		<form action="memberRegistration.php" method="post">
			<table>
				<tr>
					<td>Name:<span style="color: red;">*</span></td>
                    <td><input type="text" name="memberRegName" maxlength="30" /><span style="color: red;"><?php echo $regNameError;?></span></td>
				</tr>
				<tr>
					<td>Password:<span style="color: red;">*</span></td>
                    <td><input type="password" name="memberRegPwd" maxlength="15" /><span style="color: red;"><?php echo $regPwdError;?></span></td>
				</tr>
				<tr>
					<td>Confirmed Password:<span style="color: red;">*</span></td>
                    <td><input type="password" name="memberConfirmPwd" maxlength="15" /><span style="color: red;"><?php echo $confirmPwdError;?></span></td>
				</tr>
				<!--<tr>
					<td>Photo:</td>
                    <td><input type="file" name="memberPhoto" /></td>
				</tr>-->
				<tr>
					<td>Father's Name:</td>
                    <td><input type="text" name="memeberFatherName" size="20" maxlength="30" /><span style="color: red;"><?php echo $fatherNameError;?></span></td>
				</tr>
				<tr>
					<td>Age:</td>
                    <td><input type="number" name="memberAge" size="20" maxlength="2" max="99" value="0" /><span style="color: red;"><?php echo $ageError;?></span></td>
				</tr>
				<tr>
					<td>Gender:</td>
                    <td><input type="radio" name="memberGender" value="Male" />Male&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="memberGender" value="Female" />Female</td>
				</tr>
				<tr>
					<td>Phone:</td>
                    <td><input type="text" name="memberPhone" size="20" maxlength="12" /><span style="color: red;"><?php echo $phoneError;?></span></td>
				</tr>
				<tr>
					<td>Address:</td>
                    <td><textarea name="memberAddress" rows="5" cols="30"></textarea></td>
				</tr>
                <tr>
                <td>&nbsp;</td>
                </tr>
				<tr>
					<td colspan="2" align="center">
                    <input type="submit" name="register" value="Register" />
                    <input type="submit" name="register" value="Cancel" /></td>
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