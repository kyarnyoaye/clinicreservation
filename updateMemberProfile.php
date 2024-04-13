<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';     
$query="select * from member where memberId='".$_SESSION['memberId']."'"; 
						$result=mysql_query($query) or die(mysql_error());
						$row = mysql_fetch_array($result);
$nameError ="";
$ageError="";
$phoneError="";
function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
// On submitting form below function will execute.
if(isset($_POST['update']) && $_POST['update']=='Save'){
	if (empty($_POST["memberName"])) {
		$nameError = "Name is required";
	} else {
		$name = test_input($_POST["memberName"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameError = "Only letters and white space allowed";
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
	
	if($nameError=="" && $ageError=="" && $phoneError==""){
		include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';     
    $memberName=$_POST['memberName'];
    $memberFatherName=$_POST['memberFatherName'];
	$memberAge=$_POST['memberAge'];
    $memberGender=$_POST['memberGender'];
    $memberPhone=$_POST['memberPhone'];
    $memberAddress=$_POST['memberAddress'];
              
    $sql_update=mysql_query("update member set memberName='$memberName',memberFatherName='$memberFatherName',memberAge='$memberAge',memberGender='$memberGender',memberPhone='$memberPhone',memberAddress='$memberAddress' where memberId='".$_POST['memberId']."'");
		$_SESSION['memberName']=$memberName;
		header('location:memberHome.php');
	}
}
else if(isset($_POST['update']) && $_POST['update']=='Cancel'){
	header('location:memberHome.php');
}
else if(isset($_POST['update']) && $_POST['update']=='Change Password'){
	header('location:changeMemberPassword.php');
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
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
                <div align="center">
	<br>
	<h4 id="title">Member Update Form</h4>
	<br>
	<form action="#" method="post">
    <input type="hidden" id="memberId" name="memberId" value=<?php echo $row['memberId']; ?> />
    <input type="hidden" id="memberFatherName" name="memberFatherName" value="<?php echo $row['memberFatherName']; ?>" />
    <input type="hidden" id="memberGender" name="memberGender" value=<?php echo $row['memberGender']; ?> />
		<table id="membersend">
			<tr>
				<td align="center">Name:</td>
				<td><input type="text" name="memberName" maxlength="30" value="<?php echo $row['memberName'];?>"/><span style="color: red;"><?php echo $nameError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Father Name:</td>
                <td><?php echo $row["memberFatherName"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Age:</td>
                <td><input type="number" name="memberAge" max="99" maxlength="3" value="<?php echo $row['memberAge'];?>"/><span style="color: red;"><?php echo $ageError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Gender:</td>
                <td><?php echo $row["memberGender"]?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Phone:</td>
                <td><input type="text" name="memberPhone" maxlength="12" value="<?php echo $row['memberPhone'];?>"/><span style="color: red;"><?php echo $phoneError;?></span></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center">Address:</td>
                <td><textarea name="memberAddress" cols="30" rows="5"> <?php echo $row['memberAddress'];?></textarea></td>
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