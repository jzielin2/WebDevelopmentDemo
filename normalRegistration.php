<html>
<head>
	<title>Deloitte Demo</title>
</head>
<body>

<?php 

	include 'dbConfig.php';

	$conn = dbConnect();

	$insertUser = "INSERT INTO userAccountsPlain (email, password) VALUES (\"".$_POST["email"]."\", \"".$_POST["password"]."\")";
	echo $insertUser;
	$getUserId = "SELECT * FROM userAccountsPlain WHERE email = $_POST[email]";
	
	mysqli_query($conn, $insertUser);

	echo "Query is working";
	echo "Error: " . mysqli_error($conn);

?>

</body>
</html>