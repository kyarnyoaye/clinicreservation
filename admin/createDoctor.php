<?php
session_start();
$nameError ="";
$pwdError ="";
$confirmPwdError="";

function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
// On submitting form below function will execute.
if(isset($_POST['create']) && $_POST['create']=='Create'){
	if (empty($_POST["doctorName"])) {
		$nameError = "Name is required";
	}else {
		$name = test_input($_POST["doctorName"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z .]*$/",$name)) {
			$nameError = "Only letters, white space and dot allowed";
		}
	} 
	if (empty($_POST["doctorPwd"])) {
		$pwdError = "Password is required";
	} 
	if (empty($_POST["doctorConfirmPwd"])) {
		$confirmPwdError = "Confirmed password is required";
	} 
	if($_POST["doctorPwd"]!=$_POST["doctorConfirmPwd"]){
		$confirmPwdError = "Password and confirmed password do not match";
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';
		$doctorName=$_POST['doctorName'];
		$password=$_POST['doctorPwd'];
		if($_POST["doctorName"]!='' && $_POST["doctorPwd"]!='' && $_POST["doctorConfirmPwd"]!='')
    	{
			$query = "insert into doctor
                   (doctorId,
				    doctorName,
                    doctorPwd
                    )
                  VALUES
                   (NULL,
				    '" . $_POST['doctorName'] . "',
                    '" . $_POST['doctorPwd'] . "')";
				$result=mysql_query($query) or die(mysql_error());
				header('location:adminHome.php');
		}
	}
}
else if(isset($_POST['create']) && $_POST['create']=='Cancel'){
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
	<h4 id="title">Create Doctor Account</h4>
	<br>
	<form action="createDoctor.php" method="post">
		<table id="membersend" >
			<tr>
				<td>Name:<span style="color: red;">*</span></td>
                <td><input type="text" name="doctorName" maxlength="30" /><span style="color: red;"><?php echo $nameError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Password:<span style="color: red;">*</span></td>
                <td><input type="password" name="doctorPwd" maxlength="15" /><span style="color: red;"><?php echo $pwdError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Confirmed Password:<span style="color: red;">*</span></td>
                <td><input type="password" name="doctorConfirmPwd" maxlength="15" /><span style="color: red;"><?php echo $confirmPwdError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="create" value="Create" /> <input type="submit" name="create" value="Cancel" /></td>
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