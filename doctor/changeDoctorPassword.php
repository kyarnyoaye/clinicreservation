<?php
session_start();
$oldPwdError ="";
$newPwdError ="";
$confirmPwdError="";

function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
// On submitting form below function will execute.
if(isset($_POST['change']) && $_POST['change']=='Change'){
	if (empty($_POST["doctorPwd"])) {
		$oldPwdError = "Old password is required";
	} 
	if (empty($_POST["doctorNewPwd"])) {
		$newPwdError = "New password is required";
	} 
	if (empty($_POST["doctorConfirmedPwd"])) {
		$confirmPwdError = "Confirmed password is required";
	} 
	if($_POST["doctorNewPwd"]!=$_POST["doctorConfirmedPwd"]){
		$confirmPwdError = "Password and confirmed password do not match";
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';
		$doctorName=$_SESSION['doctorName'];
		$password=$_POST['doctorPwd'];
		if($_POST["doctorPwd"]!='' && $_POST["doctorNewPwd"]!='' && $_POST["doctorConfirmedPwd"]!='')
    	{
			$result=mysql_query("select * from doctor where doctorName='" . $doctorName . "' and doctorPwd='" . $password . "'");
        	$row=mysql_fetch_array($result); 
			if($row){
				$doctorPwd=$_POST['doctorNewPwd'];         
    			$sql_update=mysql_query("update doctor set doctorPwd='" . $doctorPwd. "' where doctorId='".$_SESSION['doctorId']."'");
				header('location:doctorHome.php');
			}
			else{
				$oldPwdError='Old password is incorrect';
			}
		}
	}
}
else if(isset($_POST['change']) && $_POST['change']=='Cancel'){
	header('location:doctorHome.php');
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
	<h4 id="title">Doctor Change Password Form</h4>
	<br>
	<form action="changeDoctorPassword.php" method="post">
		<table id="membersend">
			<tr>
				<td align="center">Old Password:<span style="color: red;">*</span></td>
				<td><input type="password" name="doctorPwd" maxlength="15" /><span style="color: red;"><?php echo $oldPwdError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">New Password:<span style="color: red;">*</span></td>
				<td><input type="password" name="doctorNewPwd" maxlength="15" /><span style="color: red;"><?php echo $newPwdError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Confirmed Password:<span style="color: red;">*</span></td>
				<td><input type="password" name="doctorConfirmedPwd" maxlength="15" /><span style="color: red;"><?php echo $confirmPwdError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="change" value="Change" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="change" value="Cancel" /></td>
			</tr>
		</table>
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