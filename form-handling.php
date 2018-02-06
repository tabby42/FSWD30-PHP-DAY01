<!DOCTYPE html>
<html>
<head>
    <title>PHP form example: POST</title>
</head>
<body>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	  	<input type="text" name="name" placeholder="Name"/>
	  	<input type="email" name="email" placeholder="E-Mail">
	 	<input type="date" name="birthday" value="" placeholder="birthday">
	 	<input type="submit" name="submit" />
	</form>

	<?php
		if(isset($_POST['submit'])) {
			$name = test_input($_POST["name"]);
			$email = test_input($_POST["email"]);
			$bDay = test_input($_POST["birthday"]);

			 if( !empty($name) && !empty($email) && !empty($bDay) ){
			 	echo "Welcome ". $_POST['name']. "<br />";
			 	echo "Your email address is ". $_POST['email'] . "<br>";
			 	echo $_POST['birthday'];
		 	} else {
		 		echo "Please fill out all the form fields";
		 	}
		}

		function test_input($data) {
		  //Strip unnecessary characters
		  $data = trim($data);
		  //Remove backslashes (\)
		  $data = stripslashes($data);
		  //escape
		  $data = htmlspecialchars($data);
		  return $data;
		}

	?>
</body>
</html>