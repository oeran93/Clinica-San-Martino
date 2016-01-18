<?php
	include_once("./models/ambulatories.php");
	$ambulatories = new Ambulatories($db);
	$ambulatories->get_all();
	foreach($ambulatories->ambulatories as $ambulatory){
		echo "<div class='row ambulatory'>";
			echo "<section class='col-xs-6 col-md-3' class='picture'>";
				echo "<img class='img-thumbnail img-responsive' src='./images/ambulatories/{$ambulatory->image}'>";
			echo "</section>";
			echo "<section class='row infos col-xs-6 col-md-9'>";
				echo "<section class='col-xs-12'>";
					echo "<h3><a href='./ambulatory.php?ID={$ambulatory->id}' class='link'>";
					echo " {$ambulatory->name}</a></h3>";
					$doctors = new Doctors($db);
					$doctors->get_by_ambulatory($ambulatory->id);
					foreach ($doctors->doctors as $doctor) {
						echo " <span class='link h5'><a href='./team.php#{$doctor->first_name}{$doctor->last_name}'>{$department->name}</a></span>";
					}
				echo "</section>";
				echo "<section class='col-xs-12 ellipsed_text' data-text_length='300'>".get_text_from_file("./descriptions/ambulatories/$lang/".strtolower($ambulatory->acronim).".txt")."</section>";
			echo "</section>";
		echo "</div>";
	}
?>