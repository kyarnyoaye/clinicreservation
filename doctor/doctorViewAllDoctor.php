<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/clinicreservation/dblink.php';
$query="select * from doctor"; 
$result=mysql_query($query) or die(mysql_error());
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
	<h4 id="title">Doctor Information</h4>
	<br>
     <table style="border:1px solid#e7ecee; width:90%" cellspacing=0 align="center";>
<tr align="center" bgcolor="wheat">
     <th style="width:25%;">Doctor Name</th>
     <th style="width:25%;">Qualification</th>
     <th style="width:25%;">Specialization</th>
     <th style="width:25%;"></th>
     </tr>
     <?php
                while ($row = mysql_fetch_array($result)) {
					echo "<tr><td style='border: 1px solid #e7ecee;'>".$row["doctorName"]."</td>";                                             
      				echo "<td style='border: 1px solid #e7ecee;'>".$row["degree"]."</td>"."";
       				echo "<td style='border: 1px solid #e7ecee;'>".$row["speciality"]."</td>";
	 ?>
<td style='border: 1px solid #e7ecee;'><a href="doctorViewDoctorDetail.php?doctorId=<?php echo $row['doctorId']; ?>"><span id="viewColor">View Detail</span></a></td>
<?php       
echo "</tr>";                
}
?>
	</table>
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