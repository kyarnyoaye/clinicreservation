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
                   <!-- Member Functions -->
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
                <td valign="top" colspan="4" class="borderStyle" style="font-family: Quicksand-Regular; font-size: 16px; color: #03637E;">	
                <div align="center">
		<br>
			<img src="images/ctscan.jpg" />
		<br>
		<h3 id="title" align="center">
			<font color="blue">CT-SCAN</font>
		</h3>
		<div align="justify" style="margin-left:10px; margin-right:10px;">
        <p>
        A CT or CAT (computed tomography) scan combines X-ray and computer technology to show highly detailed, 3-D images of any part of the body, including bones, muscles, fat, organs and blood vessels. Scans can also be performed using a contrast solution (either swallowed or injected) to make tissues and vessels more visible.
        </p>
        <p><br><b>
Advanced CT techniques
</b>
</p>
<p>
We provide a range of advanced CT-guided techniques that doctors use in both diagnosis and interventional radiology treatments, including:
<div align="justify" style="margin-left:25px;">
<ul>
   <li>Biopsies and abscess drainages</li>
    <li>CT angiography/arteriography</li>
    <li>CT radiation therapy planning</li>
    <li>Image-guided surgeries and pre-surgical planning</li>
    <li>Myelography (spine imaging with contrast solution)</li>
</ul>
</div>
        </p>
        </div>
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