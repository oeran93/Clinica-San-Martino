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
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<title>Clinica San Martino</title>
	</head>

	<body>
		<div id="header_bg_image">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#collapsemenu">
						<span class="fa fa-bars fa-2x"></span>
					</button>
					<a href="./index.php" class="hidden-sm pull-left" id="logo"><img src="./images/brand/logo_3.png"></a>
					<div class="collapse navbar-collapse" id="collapsemenu">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="text_stand_out" href="#" data-section="#services-a">Servizi</a></li>
							<li><a class="text_stand_out" href="#" data-section="#where-a">Dove Siamo</a></li>
							<li><a class="text_stand_out" href="#" data-section="#team-a">Il Team</a></li>
							<li><a class="text_stand_out" href="#" data-section="#contacts-a">Contatti</a></li>
						</ul>
					</div>
				</div>	
			</nav>
			<div class="container hidden-xs" id="header">
				<div class="row">
					<section class="col-sm-5 col-md-4" id="header_description">
						<h2 class="text-capitalize">clinica "San Martino"</h2>
						<h4 class="text-capitalize">il cuore delle alpi, il cuore della medicina</h4>
						<span class"hidden-xs ellipsed_text">La Clinica San Martino è situata a Malgrate, in provincia di Lecco sulla parte terminale del lago di Como, proprio dirimpetto a Lecco. I 4.324 abitanti di Malgrate sono solo una parte della popolazione totale della provincia di Lecco che conta in totale 340.192 abitanti distribuiti su  un territorio di 814 kmq. La crescita demografica dell’intera provincia negli ultimi 10 anni si è assestata attorno al 9,1 %, annuo  rendendo la provincia di Lecco una delle più popolose </span><a class="link" href="">continua</a>
					</section>
				</div>
			</div>
		</div>
		<div id="services_bg_image">
			<div class="container page_section" id="services">
				<div class="anchor" id="services-a"></div>
				<div class="row title_box">
					<div class="col-xs-12">
						<h3 class="text_stand_out text-center"><span class="fa fa-arrow-circle-o-left fa-lg scroll_arrow left_scroll_arrow" data-id="#dep-scroll"></span>servizi<span class=" fa fa-arrow-circle-o-right fa-lg scroll_arrow right_scroll_arrow" data-id="#dep-scroll"></span></h3>
					</div>
				</div>
				<div class="row h_scroll" id="dep-scroll">
					<?php
						$departments = new Departments($db);
						$departments->get_all();
						foreach ($departments->departments as $department) {
							echo "<section class='col-xs-6 col-sm-3 h_scroll_box h_scroll_box'>";
								echo "<img class='img-thumbnail img-responsive' src='./images/departments/{$department->image}'>";
								echo "<h5 class='text-capitalize h_scroll_text'><a href='./department.php?ID={$department->id}' class='link'>{$department->name}</a></h5>";
							echo "</section>";
						}
					?>
				</div>
			</div>
		</div>
		<div id="where_bg_image">
			<div class="container page_section" id="where">
				<div class="anchor" id="where-a"></div>
				<div class="row title_box">
					<div class="col-xs-12">
						<h3 class="text_stand_out text-center">dove siamo</h3>
					</div>
				</div>
				<div class="row">
					<section class="col-xs-12 col-md-7" id="where_map">
						<div id="map"></div>
					</section>
					<section class="col-xs-12 col-md-5" id="where_info">
						<div class="row where_info">
							<section class="col-xs-2">
								<span class="fa fa-bus fa-3x">
							</section>
							<section class="col-xs-10">
								La clinica è facilmente raggiungibile dagli autobus: Linea Lecco n° 4 fermata Via Stabilini Lecco trasporti Linea n° c 40 fermata via provinciale OBI.
							</section>
						</div>
						<div class="row where_info">
							<section class="col-xs-2">
								<span class="fa fa-plane fa-3x">
							</section>
							<section class="col-xs-10">
								Aeroporto di Milano Linate, Aeroporto di Milano Malpensa, Aeroporto di Bergamo Orio al serio. Servizio di transfer in auto, Servizio di transfer elicottero.
							</section>
						</div>
						<div class="row where_info">
							<section class="col-xs-2">
								<span class="fa fa-train fa-3x">
							</section>
							<section class="col-xs-10">
								Stazione ferroviaria di Lecco servizio navetta, autobus c 40, taxi
							</section>
						</div>
						<div class="row where_info">
							<section class="col-xs-2">
								<span class="fa fa-car fa-3x">
							</section>
							<section class="col-xs-10">
								Parcheggio gratuito per pazienti e visitatori
							</section>
						</div>
						<div class="row where_info">
							<section class="col-xs-2">
								<span class="fa fa-wheelchair fa-3x">
							</section>
							<section class="col-xs-10">
								Ingresso e parcheggio prioritario per disabili e mamme in attesa in via Paradiso
							</section>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div id="team_bg_image">
			<div class="container page_section" id="team">
				<div class="anchor" id="team-a"></div>
				<div class="row title_box">
					<div class="col-xs-12">
						<h3 class="text_stand_out text-center"><span class="fa fa-arrow-circle-o-left fa-lg scroll_arrow left_scroll_arrow" data-id="#doct-scroll"></span>il team<span class=" fa fa-arrow-circle-o-right fa-lg scroll_arrow right_scroll_arrow" data-id="#doct-scroll"></span></h3>
					</div>
				</div>
				<div class="row h_scroll" id="doct-scroll">
				<?php
					$doct = new Doctors($db);
					$doct->get_all();
					foreach($doct->doctors as $doctor){
						echo "<section class='col-xs-6 col-sm-3 h_scroll_box'>";
						echo "<img class='img-thumbnail img-responsive' src='./images/doctors/{$doctor->image}'>";
						echo "<span class='text-capitalize h_scroll_text'><a class='link' href='./team.php#{$doctor->first_name}{$doctor->last_name}'>";
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
		</div>
		<div id="contacts_bg_image">
			<div class="container page_section" id="contacts">
				<div class="anchor" id="contacts-a"></div>
				<div class="row title_box">
					<div class="col-xs-12">
						<h3 class="text_stand_out text-center">contatti</h3>
					</div>
				</div>
				<div class="row">
					<section class="col-xs-12 col-md-5" id="contacts_info">
						<div class="text-capitalize row contacts_info">
							<div class="col-xs-2">
								<span class="fa fa-clock-o fa-3x"></span>
							</div>
							<div class="col-xs-10">
								Lunedi' - Venerdi': 7:30 / 19:00.</br>
								Sabato: 7:30 / 11:00.</br>
								Analisi del Sangue: Lunedi' - Sabato, 7:30 / 8:45</br>
							</div>
						</div>
						<div class="row contacts_info">
							<div class="col-xs-2">
								<span class="fa fa-phone-square fa-3x"></span>
							</div>
							<div class="col-xs-10">
								+39 0341 1695111
							</div>
						</div>
						<div class="row contacts_info">
							<div class="col-xs-2">
								<span class="fa fa-paper-plane fa-3x"></span>
							</div>
							<div class="col-xs-10">
								info@clinicasmartino.it
							</div>
						</div>
						<div class="row contacts_info">
							<div class="col-xs-2">
								<span class="fa fa-facebook-official fa-3x"></span>
							</div>
							<div class="col-xs-10">
								<a class="link" href="https://www.facebook.com/clinicasmartinomalgrate/"> Visita La Nostra Pagina Facebook</a>
							</div>
						</div>
					</section>
					<section class="hidden-xs hidden-sm col-md-7" id="contacts_photo">
						<img class="img-responsive img-rounded img-thumbnail" src="./images/contact/1.jpg">
					</section>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script type="text/javascript" src="./js/map_styles.js"></script>
		<script type="text/javascript" src="./js/maps.js"></script>
		<script type="text/javascript" src="./js/format.js"></script>
		<script type="text/javascript" src="./js/index.js"></script>
		<script type="text/javascript" src="./js/layout.js"></script>
	</body>

</html>