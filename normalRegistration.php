<?php include 'dbConfig.php'; ?>
<html>
<head>
	<title>Normal Form Example</title>

	<link rel="stylesheet" type="text/css" href="css/sharedStyles.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="container-master">
	<div class="container-site-header">
		<h1 class='text-title-header'>Web Development Demo</h1>
		<h2 class='text-title-subheader'>Forms and Databases</h2>
	</div>

	<div class="container-account-creation-form">
		<h3 class="text-body-header">Tell us about you!</h3>

		<form action="normalRegistration.php" method="get">
			<input type="text" name="email" placeholder="Email" /> <br/>
			<input type="Password" name="password" placeholder="Password" /> <br/>
			<input type="text" name="name" placeholder="Name" /> <br/>
			<input type="Submit" value="Sign Me Up"/>
		</form>
	</div>

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

				if(mysqli_error($DBConnectionDetails)){
					echo "<div class=\"container-results\">";
					echo "<p class=\"text-banner-message\">There was some error storing your info.  Please try again.";
				}
				else{
					//Use the "echo" function to output a success message to the user.
					echo "<div class=\"container-results\">";
					echo "<p class=\"text-banner-message\">Great - we just registered you as " . $email . ". Click ";
					echo "<a class=\"link-normal\" href=\"userLookup.php\">here</a> to confirm your information.</p>";
				}
			}
			else{
				echo "<div>";
			}

		?>

		

	</div>
</div>

</body>
</html>