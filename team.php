<?php
	require 'doctors.php';
	$db = new Database('it');
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
	<span class="text-capitalize" id="scroll_top"><p>Torna in alto</p></span>
	<div id="header_bg_image">
		<?php include_once('_navbar.php'); ?>
		<div class="container hidden-xs" id="header">
			<div class="row">
				<section class="col-sm-5 col-md-4" id="header_description">
					<h2 class="text-capitalize">I Nostri Medici</h2>
					<h4 class="text-capitalize">professionalita' e passione</h4>
					<span class"hidden-xs ellipsed_text">La Clinica San Martino è situata a Malgrate, in provincia di Lecco sulla parte terminale del lago di Como, proprio dirimpetto a Lecco. I 4.324 abitanti di Malgrate sono solo una parte della popolazione totale della provincia di Lecco che conta in totale 340.192 abitanti distribuiti su  un territorio di 814 kmq. La crescita demografica dell’intera provincia negli ultimi 10 anni si è assestata attorno al 9,1 %, annuo  rendendo la provincia di Lecco una delle più popolose </span><a class="link" href="">continua</a>
				</section>
			</div>
		</div>
	</div>
	<div class="container" id="team_list">
		<div class="row title_box">
			<div class="col-xs-12">
				<h3 class="text_stand_out text-center">Incontra il nostro team</h3>
			</div>
		</div>
		<?php
			$doct = new Doctors($db);
			$doct->get_all_doctors();
			foreach($doct->doctors as $doctor){
				echo "<div class='row doctor'>";
					echo "<section class='col-xs-6 col-md-3' class='picture'>";
						echo "<img class='img-thumbnail img-responsive' src='./images/services/1.jpg'>";
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
							$department = $doctor->departments[0];
							echo "<h5>$department</h5>";
						echo "</section>";
						echo "<section class='col-xs-12'>{$doctor->description}</section>";
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