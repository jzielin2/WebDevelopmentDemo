<?php include 'dbConfig.php'; ?>

<html>
<head>
	<title>For Exmaple</title>
</head>
<body>

<h1>Name lookup</h1>
<p>Enter your email below and we'll let you know the name currently linked to your account</p>
<form action="userLookup.php" method="post">
	<input type="text" name="email" placeholder="Enter your Email" /> <br/>
	<input type="Submit" />
</form>

<?php

	if(!isset($_POST["email"])){}
	else{
		$email = $_POST["email"];
		$conn = dbConnect();

		//Inject string that illusetrates pulling back more data: 	test' OR 'one'='one
		//test' UNION ALL select CONCAT(email, ' -> ', password) as name FROM userAccountsPlain WHERE '1' = '1
		
		$getUserId = "SELECT name FROM userAccountsPlain WHERE email = '$email'";
		$results = mysqli_query($conn, $getUserId);
		
		if($results){
			echo "The name registered for this account is ";
			
			$row = mysqli_fetch_assoc($results);
			echo $row['name'];
			while ($row = mysqli_fetch_assoc($results))
			{
				echo "<br/>" . $row['name'];
			}
		}
		else{
			echo "Error: " . mysqli_error($conn);
		}
	}

?>

</body>
</html>