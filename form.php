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
		<form action="form.php" method="get">
			<input type="text" name="email" placeholder="Enter your Email" /> <br/>
			<input type="Password" name="password" placeholder="Enter your Password" /> <br/>
			<input type="text" name="name" placeholder="Enter your name" /> <br/>
			<input type="Submit" />
		</form>
	</div>

	<div class="container-results">
		<?php

			if(isset($_GET["email"]) && isset($_GET["password"])){

				//Save all the data from the form into three variables we can use here
				$email = $_GET["email"];
				$password = $_GET["password"];
				$name = $_GET["name"];
				
				//Write our SQL statement using the three variables we just created from the form.
				//Store this query in a new variable we can use to pass to the database.
				$insertUserQuery = "INSERT INTO userAccountsPlain (email, password, name) 
														VALUES ('$email', '$password', '$name')";

				//Open a new connection to the database server so we can pass our query to it. 
				//Store the connection information in a variable we can use to tell our script 
				//how to connect to the DB
				$DBConnectionDetails = dbConnect();
				
				//Use our DB connection information to pass our query to the database.  We won't 
				//worry about storing any response since we're not looking to get back any 
				//information in this query
				mysqli_query($DBConnectionDetails, $insertUserQuery);

				//Use the "echo" function to output a success message to the user.
				echo "Great - you are now registered with the email " . $email . ". ";
				echo "<a href=\"userLookup.php\">Now look up your User ID</a>";

			}
			else{
			
			}

		?>

		

	</div>
</div>

</body>
</html>