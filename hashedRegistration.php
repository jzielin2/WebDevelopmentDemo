<?php include 'dbConfig.php'; ?>

<html>
<head>
	<title>For Exmaple</title>
</head>
<body>

<div class="container-master">
	<div class="container-site-header">
		<h1>Please enter your email and password below to sign up!</h1>
	</div>

	<div class="container-account-creation-form">
		<form action="hashedRegistration.php" method="post">
			<input type="text" name="email" placeholder="Enter your Email" /> <br/>
			<input type="Password" name="password" placeholder="Enter your Password" /> <br/>
			<input type="text" name="name" placeholder="Enter your name" /> <br/>
			<input type="Submit" />
		</form>
	</div>

	<div class="container-results">
		<?php

			if(!isset($_POST["email"]) || !isset($_POST["password"])){}
			else{
				$email = $_POST["email"];
				$password = md5($_POST["password"]);
				$conn = dbConnect();

				$insertUser = "INSERT INTO userAccountsHashed (email, password) VALUES ('$email', '$password')";
				
				if(mysqli_query($conn, $insertUser)){
					echo "Great - you are now registered with the email " . $email . ". <a href=\"userLookup.php\">Now look up your User ID</a>";
				}
				else{
					echo "Error: " . mysqli_error($conn);
				}
			}

		?>
	</div>
</div>

</body>
</html>