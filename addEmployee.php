<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"><!-- Bootstrap CSS -->
	<meta http-equiv="refresh" content="0;URL='https://weblanguages2.jreedtkd.com/project9redo/index.php" /> 
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<title>Midterm</title>
</head>
<body>
<?php
//echo 'Test <br />
//Load the post data into PHP variables
$fullname = $_POST[fullname];
$expertise = $_POST[expertise];
$phone = $_POST[phone];
$email = $_POST[email];
$paragraph = $_POST[paragraph];
$photo = $_POST[photo];    
require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
//BUILD THE QUERY
$sql = "INSERT INTO directory (fullname, expertise, phone, email, paragraph) VALUES ('$fullname','$expertise','$phone','$email','$paragraph')";
//NOW TRY AND TALK TO THE DATABASE
if ($conn->query($sql) === TRUE) {
    echo " New employee added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//WE'RE DONE SO HANG UP
$conn->close();
?>
</body>
</html>