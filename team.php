<?php
	include_once './generics.php';
	include_once './models/doctors.php';
	include_once './models/departments.php';
	$db = new Database($lang);
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href='https://fonts.googleapis.com/css?family=Antic+Slab:400,600' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/layout.css">
	<link rel="stylesheet" type="text/css" href="./css/team.css">	
	<title class="text-capitalize">Il Team</title>
</head>
<body>
	<div id="header_bg_image">
		<?php include_once("./_navbar.php");?>
	</div>
	<div class="container page_section" id="team_list">
		<div class="row title_box">
			<div class="col-xs-12">
				<h3 class="text_stand_out text-center">Incontra il nostro team</h3>
			</div>
		</div>
		<?php
			$doctors = new Doctors($db);
			$doctors->get_all();
			foreach($doctors->doctors as $doctor){
				echo "<div class='row doctor' id='{$doctor->first_name}{$doctor->last_name}'>";
					echo "<section class='col-xs-6 col-md-3' class='picture'>";
						echo "<img class='img-thumbnail img-responsive' src='./images/doctors/{$doctor->image}'>";
					echo "</section>";
					echo "<section class='row infos col-xs-6 col-md-9'>";
						echo "<section class='col-xs-12'>";
							echo "<h3><span class='fa fa-download fa'></span> <a href='{$doctor->curriculum}' class='link'>";
							if(strcmp($doctor->gender,'M')==0){
								echo "Dr.";
							}else{
								echo "Dr. ssa";
							}
							echo " {$doctor->first_name} {$doctor->last_name}</a></h3>";
							$departments = new Departments($db);
							$departments->get_by_doctor($doctor->id);
							foreach ($departments->departments as $department) {
								echo " <span class='link h5'><a href='./department.php?ID={$department->id}'>{$department->name}</a></span>";
							}
						echo "</section>";
						echo "<section class='col-xs-12'>".get_text_from_file("./descriptions/doctors/$lang/".strtolower($doctor->last_name.$doctor->first_name).".txt")."</section>";
					echo "</section>";
				echo "</div>";
			}
		?>
	</div>
	<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/layout.js"></script>
</body>
</html>