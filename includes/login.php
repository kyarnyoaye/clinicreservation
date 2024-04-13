<?php
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
	if (empty($_POST["memberName"])) {
		$nameError = "Name is required";
	} else {
		$name = test_logindata($_POST["memberName"]);
		// check name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameError = "Only letters and white space allowed";
		}
	}
	
	if (empty($_POST["passWord"])) {
		$pwdError = "Password is required";
	}
	
	include $_SERVER['DOCUMENT_ROOT'] .'/clinicreservation/dblink.php';
	$memberName=$_POST['memberName'];
	$password=$_POST['passWord'];
	if($memberName!='' && $password!='')
    {
		$result=mysql_query("select * from member where memberName='" . $memberName . "' and memberPwd='" . $password . "'");
        $row=mysql_fetch_array($result); 
		$num_results = mysql_num_rows($result);
		if ($num_results > 0){
			$_SESSION['memberId']=$row['memberId'];
		    $_SESSION['memberName']=$row['memberName'];
			header('location:memberHome.php');
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
				<span style="font-size:13px;">User Name</span><input type="text" name="memberName" maxlength="30" /><span style="color: red;"><?php echo $nameError;?></span></p>
			</p>
			<p>
            	<span style="font-size:13px;">Password</span><input type="password" name="passWord" maxlength="15" /><span style="color: red;"><?php echo $pwdError;?></span></p>
			<p class="submit">
            	<input type="submit" name="login" value="Login" /></p>
		</form>
	</div>
    
	<div class="register">
		<p>
			Not a Member?<br><a href="/clinicreservation/memberRegistration.php">Click here to Register</a>
		</p>
	</div>
</section>
