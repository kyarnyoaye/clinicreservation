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
	if (empty($_POST["memberPwd"])) {
		$oldPwdError = "Old password is required";
	} 
	if (empty($_POST["memberNewPwd"])) {
		$newPwdError = "New password is required";
	} 
	if (empty($_POST["memberConfirmedPwd"])) {
		$confirmPwdError = "Confirmed password is required";
	} 
	if($_POST["memberNewPwd"]!=$_POST["memberConfirmedPwd"]){
		$confirmPwdError = "Password and confirmed password do not match";
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';
		$memberName=$_SESSION['memberName'];
		$password=$_POST['memberPwd'];
		if($_POST["memberPwd"]!='' && $_POST["memberNewPwd"]!='' && $_POST["memberConfirmedPwd"]!='')
    	{
			$result=mysql_query("select * from member where memberName='" . $memberName . "' and memberPwd='" . $password . "'");
        	$row=mysql_fetch_array($result); 
			if($row){
				$memberPwd=$_POST['memberNewPwd'];         
    			$sql_update=mysql_query("update member set memberPwd='" . $memberPwd. "' where memberId='".$_SESSION['memberId']."'");
				header('location:memberHome.php');
			}
			else{
				$oldPwdError='Old password is incorrect';
			}
		}
	}
}
else if(isset($_POST['change']) && $_POST['change']=='Cancel'){
	header('location:memberHome.php');
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
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 14px; color: #03637E;">	
                <div align="center">
		<br>
	<h4 id="title">Member Change Password Form</h4>
	<br>
	<form action="changeMemberPassword.php" method="post">
		<table id="membersend">
			<tr>
				<td align="center">Old Password:<span style="color: red;">*</span></td>
				<td><input type="password" name="memberPwd" maxlength="15" /><span style="color: red;"><?php echo $oldPwdError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">New Password:<span style="color: red;">*</span></td>
				<td><input type="password" name="memberNewPwd" maxlength="15" /><span style="color: red;"><?php echo $newPwdError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Confirmed Password:<span style="color: red;">*</span></td>
				<td><input type="password" name="memberConfirmedPwd" maxlength="15" /><span style="color: red;"><?php echo $confirmPwdError;?></span></td>
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
					<td colspan="5"><?php include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/includes/footer.php';?></td>
			   </tr>			
		</table>
		</td>
		<td width="8%"></td>
	  </tr>
	</table>
</body>
</html>