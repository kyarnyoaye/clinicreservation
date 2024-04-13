	<section class="container">
		<div class="searchInfo">
        <div>
			<h1 align="center">Search Doctors</h1>
			<form action="memberViewSelectedDoctor.php" method="post">
				<table width="200px" style="font-size: 14px; color: #003366; font-weight:bold;">
					<tr>
						<td>Speciality</td>
						<td><select name="speciality">
                        <option>All</option>
                        <option>Allergist(Immunologist)</option>
                        <option>Cardiologist(Heart Doctor)</option>
                        <option>Dentist</option>
                        <option>Dermatologist</option>
                        <option>Dietitian</option>
                        <option>Ear</option>
                        <option>Nose and Throat Doctor(ENT)</option>
                        <option>Endocrinologist</option>
                        <option>Eye Doctor</option>
                        <option>Gastroenterologist</option>
                        <option>Hematologist(Blood Specialist)</option>
                        <option>Infectious Disease Specialist</option>
                        <option>Nephrologist(Kidney Specialist)</option>
                        <option>Neurologist</option>
                        <option>Obstetrician-Gynecologist</option>
                        <option>Ophthalmologist</option>
                        <option>Optometrist</option>
                        <option>Orthodontist</option>
                        <option>Orthopedic Surgeon</option>
                        <option>Pain Management Specialist</option>
                        <option>Pediatric Dentist</option>
                        <option>Pediatrician</option>
                        <option>Physical Therapist</option>
                        <option>Plastic Surgeon</option>
                        <option>Podiatrist(Foot Specialist)</option>
                        <option>Primary Care Doctor</option>
                        <option>Prosthodontist</option>
                        <option>Psychiatrist</option>
                        <option>Psychologist</option>
                        <option>Pulmonologist(Lung Doctor)</option>
                        <option>Radiologist</option>
                        <option>Rheumatologist</option>
                        <option>Sleep Medicine Specialist</option>
                        <option>Sports Medicine Specialist</option>
                        <option>Urologist</option>
                        </select>
                        </td>
					</tr>
					<tr>
						<td>Name</td>
						<td><input type="text" name="doctorName"></td>
					</tr>
                    <tr>
						<td>Gender</td>
						<td><select name="gender">
                        <option>All</option>
                        <option>Male</option>
                        <option>Female</option>
                        </select>
                        </td>
					</tr>
                     <tr>
						<td>Day</td>
						<td><select name="day">
                        <option>All</option>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                        <option>Sunday</option></select></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" value="Search" /></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
	</section>