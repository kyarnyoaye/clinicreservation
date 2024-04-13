<?php
// Initialize variables to null.
$nameError ="";
$pwdError ="";
function test_logindata($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
// On submitting form below function will execute.
if(isset($_POST['login'])){
	if (empty($_POST["doctorName"])) {
		$nameError = "Name is required";
	} else {
		$name = test_logindata($_POST["doctorName"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameError = "Only letters and white space allowed";
		}
	}
	
	if (empty($_POST["passWord"])) {
		$pwdError = "Password is required";
	}
	
	include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';
	$doctorName=$_POST['doctorName'];
	$password=$_POST['passWord'];
	if($doctorName!='' && $password!='')
    {
		$result=mysql_query("select * from doctor where doctorName='" . $doctorName . "' and doctorPwd='" . $password . "'");
        $row=mysql_fetch_array($result); 
		$num_results = mysql_num_rows($result);
		if ($num_results > 0){
			$_SESSION['doctorId']=$row['doctorId'];
		    $_SESSION['doctorName']=$row['doctorName'];
			header('location:doctorHome.php');
		}
		else{
			$pwdError='You entered username or password is incorrect';
		}
	}
}
?>
<section class="container">
	<div class="login">
		<h1>Login</h1>
		<form action="#" method="post">
			<p>
				<span style="font-size:13px;">Doctor Name</span><input type="text" name="doctorName" maxlength="30" /><span style="color: red;"><?php echo $nameError;?></span></p>
			</p>
			<p>
            	<span style="font-size:13px;">Password</span><input type="password" name="passWord" maxlength="15" /><span style="color: red;"><?php echo $pwdError;?></span></p>
			<p class="submit">
            	<input type="submit" name="login" value="Login" /></p>
		</form>
</section>
