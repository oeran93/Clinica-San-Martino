<?php
	include_once './generics.php';
	include_once './models/doctors.php';
	include_once './models/department.php';
	$db = new Database($lang);
	$department_id = array_key_exists('ID', $_GET) ? $_GET['ID'] : 1; 
	$department = new Department($db);
	$department->get_by_id($department_id);
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
	<link rel="stylesheet" type="text/css" href="./css/department.css">
	<?php echo "<link rel='stylesheet' type='text/css' href='./css/".strtolower($department->acronim).".css'>
	<title> {$department->name}</title>" ?>
</head>
<body>
	<?php echo "<div id='header_bg_image' data-image='{$department->image}'>"; 
			include_once("./_navbar.php");
	?>
	</div>
	<div class="container page_section">
		<div class="row">
			<section class="department_description col-xs-offset-1 col-xs-10">
				<div class="title_box col-xs-12">
					<h3 class="text_stand_out text-center"><?php echo $department->name ?></h3>
				</div>
				<div class="col-xs-12">
				<?php echo get_text_from_file("./descriptions/departments/$lang/".strtolower($department->acronim.".txt"))?>
				</div>
			</section>
			<section class ="section col-xs-12 col-md-offset-1 col-md-8">
				<div class="col-xs-12">
					<?php include_once("./pages/".strtolower($department->acronim)."/$lang/_".strtolower($department->acronim).".php") ?>
				</div>
			</section>
			<section class ="section col-xs-offset-3 col-xs-6 col-md-offset-0 col-md-2">
				<div class="title_box col-xs-12">
					<h3 class="text_stand_out text-center"><?php echo "Medici" ?></h3>
				</div>
				<div class="col-xs-12">
					<?php 
						$doctors = new Doctors($db);
						$doctors->get_by_department($department->id);
						foreach ($doctors->doctors as $doctor) {
						echo "<section class='doctor_box'>";
							echo "<img class='img-thumbnail img-responsive' src='./images/doctors/{$doctor->image}'>";
							echo "<span class='text-capitalize h_scroll_text'><a href='./team.php#{$doctor->first_name}{$doctor->last_name}' class ='link'>";
							if(strcmp($doctor->gender,'M')==0){
								echo "Dr.";
							}else{
								echo "Dr. ssa";
							}
							echo " {$doctor->last_name} {$doctor->first_name}</a></span>";
						echo "</section>";
						}
					?>
				</div>
			</section>
		</div>
	</div>
	<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/format.js"></script>
	<script type="text/javascript" src="./js/layout.js"></script>
	<script type="text/javascript" src="./js/department.js"></script>
</body>
</html>