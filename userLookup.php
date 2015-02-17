<?php include 'dbConfig.php'; ?>

<html>
<head>
	<title>For Exmaple</title>
</head>
<body>
<div class="container-master">
	<div class="container-site-header">
		<h1>Name lookup</h1>
	</div>

	<div class="container-account-creation-form">
		<p>Enter your email below and we'll let you know the name currently linked to your account</p>
		<form action="userLookup.php" method="get">
			<input type="text" name="email" placeholder="Enter your Email" /> <br/>
			<input type="Submit" />
		</form>
	</div>

	<div class="container-results">
		<?php

				
				//Inject string that illusetrates pulling back more data: 	test' OR 'one'='one
				//whatever' UNION ALL SELECT CONCAT(email, ' -> ', password) AS name FROM userAccountsPlain WHERE 'one' = 'one

			if(isset($_GET["email"])){
				
				//Save the data from the form into a variable we can use here
				$email = $_GET["email"];
				
				//Write our SQL statement using the three variables we just created from the form.
				//Store this query in a new variable we can use to pass to the database.				
				$getNameQuery = "SELECT name FROM userAccountsPlain WHERE email = '$email'";

				//Open a new connection to the database server so we can pass our query to it. 
				//Store the connection information in a variable we can use to tell our script 
				//how to connect to the DB				
				$DBConnectionDetails = dbConnect();

				//Use our DB connection information to pass our query to the database.  We then
				//store the results in a new variable, $queryResults
				$queryResults = mysqli_query($DBConnectionDetails, $getNameQuery);
				
				//Write the stock part of our message to the screen
				echo "The name registered for this account is ";

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
			else{
				
			}

		?>
	</div>
</div>
</body>
</html>