<?php
	include_once("./models/ambulatories.php");
	$ambulatories = new Ambulatories($db);
	$ambulatories->get_all();
	foreach($ambulatories->ambulatories as $ambulatory){
		echo "<div class='row ambulatory'>";
			echo "<section class='col-xs-12 col-sm-6 col-md-3' class='picture'>";
				echo "<img class='img-thumbnail img-responsive' src='./images/ambulatories/small/{$ambulatory->image}'>";
			echo "</section>";
			echo "<section class='row infos col-xs-12 col-sm-6 col-md-9'>";
				echo "<section class='col-xs-12'>";
					echo "<h3>";
						echo "<p>";
							if ($ambulatory->active) echo "<a href='./ambulatory.php?ID={$ambulatory->id}'>";
								echo "{$ambulatory->name}";
							if ($ambulatory->active) echo "</a>";
						echo "</p>";
					echo "</h3>";
					$doctors = new Doctors($db);
					$doctors->get_by_ambulatory($ambulatory->id);
					foreach ($doctors->doctors as $doctor) {
						echo " <span class='link h5'><a href='./team.php#{$doctor->first_name}{$doctor->last_name}'>{$doctor->first_name} {$doctor->last_name} |</a></span>";
					}
				echo "</section>";
				echo "<section class='col-xs-12 ellipsed_text' data-text_length='300'>".$content_extractor->get_section(strtolower($ambulatory->acronim))."</section>";
			echo "</section>";
		echo "</div>";
	}
?>