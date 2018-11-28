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
require_once('variables.php');
$id = $_POST[id];
$fullname = $_POST[fullname];
$expertise = $_POST[expertise];
$phone = $_POST[phone];
$email = $_POST[email];
$paragraph = $_POST[paragraph];
$photo = $_POST[photo];

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE directory SET fullname=('$fullname'), expertise=('$expertise'), phone=('$phone'), email=('$email'), paragraph=('$paragraph'), photo=('$photo') WHERE id=2";


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 

//WE'RE DONE SO HANG UP
$conn->close();
?>
</body>
</html>