<?php
//Load the post data into PHP variables
if (isset($_POST['Submit'])) {
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
$sql = "INSERT INTO directory (fullname, expertise, phone, email, paragraph, photo ) VALUES ('$fullname','$expertise','$phone','$email','$paragraph')";
//NOW TRY AND TALK TO THE DATABASE
if ($conn->query($sql) === TRUE) {
    echo " New Employee Added Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//WE'RE DONE SO HANG UP
$conn->close();
header('Location: index.php');
exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

    <title>Midterm</title>
  </head>
  <body>
  <?php include_once('navbar.php');?>
    <br><br>
<div class="container">
<h1>Add New Employee</h1>
<form action="addEmployee.php" method="POST"  name="travelInfo" id="travelInfo">
    <div class="form-group">
    <label for="exampleInputName1">Full Name</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Name" name="fullname">
    </div>
    <div class="form-group">
    <label for="exampleInputName1">Area of Expertise</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Expertise" name="expertise">
    </div>
    <div class="form-group">
    <label for="exampleInputName1">Faculity Phone Number</label>
    <input type="tel" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Phone Number" name="phone">
    </div>
    <div class="form-group">
    <label for="exampleInputName1">Email Address</label>
    <input type="email" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Email" name="email">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Area of Specialization</label>
    <textarea class="form-control" name="paragraph" id="exampleFormControlTextarea1" rows="3" placeholder="Two Sentences About Employee"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload Employee Photo</label>
    <span>File must be saved as a .jpg file.</span><br>
			<span>Please crop to 150px wide X 200px tall before uploading</span><br>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
  </div>
  <button type="submit" name="submit" value="Add Member" class="btn btn-primary mb-2">Add Employee</button>
  </div>

    </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>