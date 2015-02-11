<?php include 'dbConfig.php'; ?>

<html>
<head>
	<title>For Exmaple</title>
</head>
<body>

<h1>Please enter your email and password below to sign up!</h1>

<form action="form.php" method="post">
	<input type="text" name="email" placeholder="Enter your Email" /> <br/>
	<input type="Password" name="password" placeholder="Enter your Password" /> <br/>
	<input type="text" name="name" placeholder="Enter your name" /> <br/>
	<input type="Submit" />
</form>

<?php

	if(!isset($_POST["email"]) || !isset($_POST["password"])){}
	else{
		$email = $_POST["email"];
		$password = $_POST["password"];
		$name = $_POST["name"];
		$conn = dbConnect();

		$insertUser = "INSERT INTO userAccountsPlain (email, password, name) VALUES ('$email', '$password', '$name')";
		
		if(mysqli_query($conn, $insertUser)){
			echo "Great - you are now registered with the email " . $email . ". <a href=\"userLookup.php\">Now look up your User ID</a>";
		}
		else{
			echo "Error: " . mysqli_error($conn);
		}
	}

?>

</body>
</html>