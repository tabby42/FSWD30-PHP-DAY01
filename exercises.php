<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PHP Day 1</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		// Prints the day
		//echo date("l") . "<br>";
		$today = date("l");
		if ($today === "Monday") {
			echo "Happy $today" .  "<br>";
		} elseif ($today === "Tuesday") {
			echo "Huhu" . $today .  "<br>";
		}
		//get weekday of date
		echo "Jun 19,1978 was on a ". date("l", mktime(0,0,0,06,19,1978)) . "<br>";
		//for loop
		for ($i=0; $i < 10; $i++) { 
			echo $i + 1 . "<br>";
		}
		//while loop
		$i = 0;
		$num = 50;
		while( $i < 10){
		 $num--;
		 $i++;
		}
		echo ("Loop stopped at i = $i and num = $num <br>" );
		//do while loop
		$i = 0;
		do{
		 $i++;
		} while( $i < 10 );

		echo ("Loop stopped at i = $i <br>" );

		$cars = array("BMW", "Tesla", "Audi", "Fiat");
		foreach ($cars as $value) {
			echo "<p>$value</p>";
		}

		echo count($cars);

		//associative array
		$comics = array(
			"Calvin & Hobbes" => "Bill Watterson",
			"Sin City" => "Frank Miller",
			"Hellboy" => "Mike Magnola",
			"Asterix" => "Goscinny & Uderzo"
		);

		foreach ($comics as $key => $value) {
			echo "<p>$key -- $value</p>";
		}

		echo "<hr>";

		//multidimensional array
		$comics2 = array(
			"Comic Strips" => array (
				"Calvin & Hobbes" => "Bill Watterson",
				"Pogo" => "Walt Kelly",
				"Krazy Kat" => "George Herriman"
			),
			"Comic Albums" => array(
				"Asterix" => "Goscinny & Uderzo",
				"Lucky Luke" => "Morris",
				"Gaston" => "Andre Franquin"
			),
			"Graphic Novels" => array(
				"Sin City" => "Frank Miller",
				"Hellboy" => "Mike Magnola",
				"Maus" => "Art Spiegelman"
			)
		);

		foreach ($comics2 as $key => $value) {
			ob_start();
			?>
			<h4><?php echo $key; ?></h4>
			<ul>
				<?php
					foreach ($value as $key_inner => $value_inner) {
					echo "<li>$key_inner by $value_inner</li>";
					}
				?>
			</ul>
			<?php
			$content = ob_get_contents();
			ob_get_clean();
			echo $content;
		}

	?>
	<?php
	ob_start();
	?>
	<div>
	    <span>text</span>
	    <a href="#">link</a>
	</div>
	<?php
	$content = ob_get_clean();
	echo $content;
	?>
	
</body>
</html>