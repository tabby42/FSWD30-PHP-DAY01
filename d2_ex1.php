<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Exercise User Agent</title>
	<?php
		$viewer = getenv( "HTTP_USER_AGENT" );
		//echo $viewer;
		$browser = "";

		//preg_match( string $pattern , string $subject_of_search) 
		//i -> search case insensitive
		if (preg_match('/Chrome/i', "$viewer")) {
			$browser = "Chrome";
			//echo "<link rel='stylesheet' href='chrome.css'>";
		} else if (preg_match( "/Mozilla/i", "$viewer" )) {
			$browser = "Mozilla";
			//echo "<link rel='stylesheet' href='mozilla.css'>";
		}
	?>
	
</head>
<body>
	<h2><?php echo $browser;?></h2>

</body>
</html>