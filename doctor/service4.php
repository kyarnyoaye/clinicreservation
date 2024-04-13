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
			<img src="images/pt1.jpg" />
		<br>
		<h3 id="title" align="center">
			<font color="blue">Physical Therapy</font>
		</h3>
        <div align="justify" style="margin-left:10px; margin-right:10px;">
        <p>
		The clinic provides comprehensive, affordable physical therapy treatment for patients.
Our clinic includes 6 private treatment rooms, an inviting, large gym space with 2 Pilates reformers, exercise bikes, stair master elliptical trainers, tread-mill, weight machines, pulley system, free weights and slide board. Other exercise equipment includes gymnastic balls, BOSU, foam rollers, balance boards and various balls for rehabilitation of patients. We also offer traditional physical therapy modalities like ultrasound, infrared light therapy, electrical stimulation, ionto- and phono-phoresis and whirlpool.
</p>
<br>
<p>
The majority of patients treated at the Physical Therapy clinic are seen for:
<div align="justify" style="margin-left:25px;">
<ul>
    <li>orthopedic problems (i.e. neck and low-back pain, postural dysfunction, sprains/ strains and dysfunction of muscles or joints)</li>
    <li>sports injuries (i.e. knee pain, patello-femoral pain, runners knee, ITB syndrome, shoulder strains/ impingement, post ACL reconstruction, shoulder surgeries/Bankart repair, ankle sprains)</li>
    <li>work injuries ( i.e. overuse injuries/repetitive strain injuries, work/lab related injuries, hand injuries)</li>
    <li>neurological conditions ( i.e. spinal cord injury, cerebral palsy, stroke, MS and muscular dystrophy)</li>
</ul>
</div>
</p>
<br>
<p>
Our staff consists of 3 Physical Therapists, who have expertise in a variety of specialty areas, including orthopedics, sports medicine, ergonomics, pediatrics and neurology.
</p>
<br>
<p>
At the first visit, the Physical Therapist will provide a comprehensive evaluation and set up goals and a treatment plan. It is a good idea to bring clothing such as shorts, sports bras/tank tops, and/or exercise attire to your appointment. This will make it easier to evaluate the injured area of your body.
</p>
<br>
<p>
Our treatment philosophy stresses active patient participation through patient education and home exercise. This is of great importance for the success of your rehabilitation program. You will be asked to do some activities on your own to optimize your rehabilitation. These may include strength exercise, stretches, ergonomic modifications and using ice or heat. 
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