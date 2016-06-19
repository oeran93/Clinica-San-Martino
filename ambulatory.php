<?php
	include_once './generics.php';
	include_once './content_extractor.php';
	include_once './models/doctors.php';
	include_once './models/ambulatories.php';
	
	$db = new Database($lang);
	
	$ambulatory_id = array_key_exists('ID', $_GET) ? $_GET['ID'] : 1; 
	$ambulatory = new Ambulatory($db);
	$ambulatory->get_by_id($ambulatory_id);

	$content_extractor = new ContentExtractor("content/$lang/ambulatories/".strtolower($ambulatory->acronim).".xml");
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
	<link rel="stylesheet" type="text/css" href="./css/ambulatory.css">
	<?php echo "<link rel='stylesheet' type='text/css' href='./css/".strtolower($ambulatory->acronim).".css'>
	<title> {$ambulatory->name}</title>" ?>
</head>
<body>
	<?php echo "<div id='header_bg_image' data-image='{$ambulatory->image}'>"; 
			include_once("./partials/_navbar.php");
			echo "</div>";
	?>
	<div class="container page_section">
		<div class="row title_box">
			<div class="col-xs-12">
				<h3 class="text_stand_out text-center"><span class="fa fa-arrow-circle-o-left fa-lg scroll_arrow left_scroll_arrow" data-id="#dep-scroll"></span>Ambulatori<span class=" fa fa-arrow-circle-o-right fa-lg scroll_arrow right_scroll_arrow" data-id="#dep-scroll"></span></h3>
			</div>
		</div>
		<div class="row h_scroll" id="dep-scroll">
			<?php
				$all_amb = new Ambulatories($db);
				$all_amb->get_all();
				foreach ($all_amb->ambulatories as $one_a) {
					if (!$one_a->active) continue;
					echo "<section class='col-xs-6 col-sm-3 h_scroll_box h_scroll_box'>";
						echo "<img class='img-thumbnail img-responsive' src='./images/ambulatories/small/{$one_a->image}'>";
						echo "<h5 class='text-capitalize h_scroll_text'><a href='./ambulatory.php?ID={$one_a->id}' class='link'>{$one_a->name}</a></h5>";
					echo "</section>";
				}
			?>
		</div>
	</div>
	<div class="container page_section">
		<div class="row">
			<section class="ambulatory_description col-xs-12">
				<div class="row">
					<div class="title_box col-xs-12">
						<h3 class="text_stand_out text-center">
							<?php echo $ambulatory->name ?>
						</h3>
					</div>
					<div class="col-xs-12">
						<?php echo $content_extractor->get_section('description');?>
					</div>
				</div>
			</section>
		</div>
		<div class="row">
			<section class ="section col-xs-12 col-md-offset-1 col-md-8">
				<?php include_once("./partials/_".strtolower($ambulatory->acronim).".php"); ?>
			</section>
			<section class ="section col-xs-offset-4 col-xs-4 col-md-offset-0 col-md-2">
				<div class="row">
					<div class="title_box col-xs-12">
						<h3 class="text_stand_out text-center"><?php echo "Medici" ?></h3>
					</div>
					<div class="col-xs-12">
						<?php 
							$doctors = new Doctors($db);
							$doctors->get_by_ambulatory($ambulatory->id);
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
				</div>
			</section>
		</div>
	</div>
	<?php  
		include_once("./partials/_footer.php");
	?>
	<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/format.js"></script>
	<script type="text/javascript" src="./js/layout.js"></script>
	<script type="text/javascript" src="./js/ambulatory.js"></script>
</body>
</html>