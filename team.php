<?php
	include_once './generics.php';
	include_once './models/doctors.php';
	include_once './models/departments.php';
	include_once './models/ambulatories.php';
	include_once './content_extractor.php';

	$db = new Database($lang);

	$content_extractor = new ContentExtractor("content/$lang/team.xml");
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
		<?php include_once("./partials/_navbar.php");?>
	</div>
	<div class="container page_section" id="team_list">
		<div class="row title_box">
			<div class="col-xs-12">
				<h3 class="text_stand_out text-center">Incontra il nostro team</h3>
			</div>
		</div>
		<div class="section col-xs-12 col-md-offset-1 col-md-10">
		<?php
			$doctors = new Doctors($db);
			$doctors->get_all();
			foreach($doctors->doctors as $doctor){
				echo "<div class='row doctor'>";
					echo "<div class='anchor' id='{$doctor->first_name}{$doctor->last_name}'></div>";
					echo "<section class='col-xs-offset-2 col-sm-offset-0 col-xs-8 col-sm-6 col-md-3'>";
						echo "<img class='img-thumbnail img-responsive' src='./images/doctors/{$doctor->image}'>";
					echo "</section>";
					echo "<section class='row infos col-xs-12 col-sm-6 col-md-9'>";
						echo "<section class='col-xs-12'>";
							echo "<h3><span class='fa fa-download fa'></span> <a href='./curricula/$lang/{$doctor->curriculum}' class='link'>";
							if(strcmp($doctor->gender,'M')==0){
								echo "Dr.";
							}else{
								echo "Dr. ssa";
							}
							echo " {$doctor->first_name} {$doctor->last_name}</a></h3>";
							$departments = new Departments($db);
							$departments->get_by_doctor($doctor->id);
							foreach ($departments->departments as $department) {
								echo " <span class='h5'><a class='link' href='./department.php?ID={$department->id}'>{$department->name}</a></span> |";
							}
							$ambulatories = new Ambulatories($db);
							$ambulatories->get_by_doctor($doctor->id);
							foreach ($ambulatories->ambulatories as $ambulatory) {
								echo " <span class='h5'><a class='link' href='./ambulatory.php?ID={$ambulatory->id}'>{$ambulatory->name}</a></span> |";
							}
						echo "</section>";
						echo "<section class='col-xs-12'>".$content_extractor->get_section(strtolower($doctor->first_name.$doctor->last_name),"Download ".$doctor->last_name."'s curriculum to know more.")."</section>";
					echo "</section>";
				echo "</div>";
			}
		?>
		</div>
	</div>
	<?php  
		include_once("./partials/_footer.php");
	?>
	<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/layout.js"></script>
</body>
</html>