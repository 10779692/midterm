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
	<form action="<?php $SERVER['PHP_SELF'];?>" method="POST">
        
<?php

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','jreedtkd_3760usr','dgm3760password','jreedtkd_3760test') or die('Connection Failed');
        
//--------------------------------- DELETE SELECTED RECORDS -------------------------------
if(isset($_POST['submit'])) {
    foreach($_POST['todelete'] as $delete_id) {
        //echo $delete_id;
        $query = "DELETE FROM directory WHERE id='$delete_id'";
        
        //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');
    }; // close for each
}; // end of the if statement  
        
//------------------------------ DISPLAY REMAINING RECORDS --------------------------------
        
// BUILD THE QUERY
$query = "SELECT * FROM directory";
        
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection, $query) or die ('Query Failed');     
        
while($row = mysqli_fetch_array($result)) {
    echo '<div class="displayNames" style="background-color: #e4e4e4; padding: 20px; margin-bottom: 15px;">';
    echo '<h4>'.$row[fullname].'</h4>';
    echo '<br>';
    echo '<p><b>Area of Expertise:</b> '.$row[expertise].'</p>';
    echo '<p><b>Phone:</b> '.$row[phone].'</p>';
    echo '<p><b>Email:</b> '.$row[email].'</p>';
    echo '<p><b>Area of Specailization:</b> '.$row[paragraph].'</p>';
    echo '<input type="checkbox" value = '.$row['id'].'" name="todelete[]"/> ';
    echo '<input id="button" type="submit" name="submit" value="Remove Employee" onclick="return confirm">';
    echo '</div>';
};

//WE'RE DONE SO HANG UP
$dbconnection->close();
?>        
		
        
    </form>
    </div>
            
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>