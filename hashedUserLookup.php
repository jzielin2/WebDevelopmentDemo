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
		<h2 class='text-title-subheader'>Introduction to Hashing</h2>
	</div>

	<div class="container-account-creation-form">
		<h3 class="text-body-header">Look up your name by email</h3>
		<form action="hashedUserLookup.php" method="get">
			<input type="text" name="email" placeholder="Enter your Email" /> <br/>
			<input type="Submit" />
		</form>
	</div>

		<?php

			if(isset($_GET["email"])){
				
				//Save the data from the form into a variable we can use here
				$email = $_GET["email"];
				
				//Write our SQL statement using the three variables we just created from the form.
				//Store this query in a new variable we can use to pass to the database.				
				$getNameQuery = "SELECT name FROM userAccountsHashed WHERE email = '$email'";

				//Open a new connection to the database server so we can pass our query to it. 
				//Store the connection information in a variable we can use to tell our script 
				//how to connect to the DB				
				$DBConnectionDetails = dbConnect();

				//Use our DB connection information to pass our query to the database.  We then
				//store the results in a new variable, $queryResults
				$queryResults = mysqli_query($DBConnectionDetails, $getNameQuery);
				
				//If there are any errors in the code, then show an error message to the user
				if(mysqli_error($DBConnectionDetails)){
					echo "<div class=\"container-results\">";
					echo "<p class=\"text-banner-message\">There was some error storing your info.  Please try again.";
				}
				//If there are no errors, show the results of the name lookup
				else{
					//Write the stock part of our message to the screen
					echo "<div class=\"container-results\">";
					echo "<p class=\"text-banner-message\">The name registered for this account is ";

					//We now need to write the results of our query to show the names that were found.
					//The details aren't important here. At a high level, we can only deal with results
					//one row at a time.  We load the first name returned by the query and write it on 
					//the screen.  We then check for a second name. If it exists, we write it to the
					//the screen and check for a third.  If it doesn't exist we stop.
					$row = mysqli_fetch_assoc($queryResults);
					echo $row['name'];
					while ($row = mysqli_fetch_assoc($queryResults)){
						echo "<br/>" . $row['name'];
					}
				}
				
				echo "</p>";
			
			}
			else{
				echo "<div>";
			}

		?>
	</div>
</div>
</body>
</html>