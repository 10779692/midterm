<?php

require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
//BUILD THE QUERY
$sql = "SELECT * FROM directory ORDER BY fullname ASC";
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($conn, $sql) or die ('Query Failed');

//FUNCTION
function convertMonth($a) {
    switch($a) {
        case 1: 
        $b='January';
            break;
            case 1: 
        $b='February';
            break;
            case 2: 
        $b='March';
            break;
            case 3: 
        $b='April';
            break;
            case 4: 
        $b='May';
            break;
            case 5: 
        $b='June';
            break;
            case 6: 
        $b='July';
            break;
            case 7: 
        $b='August';
            break;
            case 8: 
        $b='September';
            break;
            case 9: 
        $b='October';
            break;
            case 10: 
        $b='November';
            break;
            case 11: 
        $b='December';
            break;
            case 12: 
    } 
    return $b;
} //end function


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
    <h1>Employee Directory</h1>
    <br>
       <?php 
        //DISPLAY WHAT WE FOUND
        while ($row = mysqli_fetch_array($result)) {
            //substr($string, start, length)
            $day = substr($row[birthday],0 ,2 );
            $monthNum = substr($row[birthday],3 ,2 );
            $monthName = convertMonth($monthNum); //call a function
            $year = substr($row[birthday],6 ,4 );
            
            echo '<div class="displayNames" style="background-color: #e4e4e4; padding: 20px; margin-bottom: 15px;">';
            echo '<h4>'.$row[fullname].'</h4>';
            echo '<br>';
            echo '<p><b>Area of Expertise:</b> '.$row[expertise].'</p>';
            echo '<p><b>Phone:</b> '.$row[phone].'</p>';
            echo '<p><b>Email:</b> '.$row[email].'</p>';
            echo '<p><b>Area of Specailization:</b> '.$row[paragraph].'</p>';
            echo '</div>';
        };
        //WE'RE DONE SO HANG UP
        $conn->close();
        ?>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>    