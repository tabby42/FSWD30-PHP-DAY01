<!DOCTYPE html>
<html>
<head>
    <title>PHP form example: POST</title>
</head>
<body>
	<?php
		$name_error = "";
		$mail_error = "";
		$bDay_error = "";
		$name = "";
		$email = "";
		$bDay = "";
		//echo $today;

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$name_error = "Name is required";
			} else {
				$name = test_input($_POST["name"]);
				if (checkString($name)) {
					$name_error = "";
					echo "valid name";
				} else {
			  		$name_error = "Only letters and white space allowed"; 
				}
			}
			if (empty($_POST["email"])) {
				$mail_error = "E-Mail is required";
			} else {
				$email = test_input($_POST["email"]);
				if (checkEmail($email)) {
					$mail_error = "";
					echo "valid email";
				} else {
			  		$mail_error = "Invalid email format"; 
				}
			}
			if (empty($_POST["birthday"])) {
				$bDay_error = "Birthdate is required";
			} else {
				$bDay = test_input($_POST["birthday"]);
				if (checkBday($bDay) == -1) {
			  		$bDay_error = "You must be older than 18"; 
				} else if (checkBday($bDay) == false) {
					$bDay_error = "Invalid Date"; 
				} else {
			  		echo "OK";
				}
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

		function checkString($data) {
			if (!preg_match("/^[a-zA-Z ]*$/",$data)) {
			  return false;
			}
			return true;
		}

		function checkEmail($data) {
			if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
			  return false;
			}
			return true;
		}

		function checkBday($date) {
		  $tempDate = explode('-', $date);
		  $today = new DateTime(date("Y-m-d"));
		  $bdate = new DateTime($date);
		  $interval = $today->diff($bdate);
		  var_dump($interval->y);
		  // checkdate(month, day, year)
		  if (!checkdate($tempDate[1], $tempDate[2], $tempDate[0])) {
		  	echo "false";
		  	return false;
		  }
		  if (!$interval->y > 18) {
		  	echo "-1";
		  	return -1;
		  }
		  echo "true";
		  return true;
		}

	?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	  	<input type="text" name="name" placeholder="Name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"/><br>
	  	<span class="err"><?php echo $name_error;?></span><br>
	  	<input type="text" name="email" placeholder="E-Mail" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" /><br>
	  	<span class="err"><?php echo $mail_error;?></span><br>
	 	<input type="date" name="birthday" value="" placeholder="birthday" value="<?php echo isset($_POST['birthday']) ? $_POST['birthday'] : '' ?>"><br>
	 	<span class="err"><?php echo $bDay_error;?></span><br>
	 	<input type="submit" name="submit" />
	</form>


</body>
</html>