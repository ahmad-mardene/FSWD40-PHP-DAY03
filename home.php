<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
</head>
<body>
           Hi' <?php echo $userRow['userEmail']; ?>
            
           <a href="logout.php?logout">Sign Out</a> <hr><br>

          <?php

$sql = "SELECT * FROM car";
$result = mysqli_query($conn, $sql);
// fetch a next row (as long as there are some) into $row

echo"
            <h2>here's a list of our cars:</h2> <br><hr>
		    <table class='table table-dark'>
			  <thead>
			    <tr>
			      <th scope='col'>ID</th>
			      <th scope='col'>BRAND</th>
			      <th scope='col'>MODEL</th>
			      <th scope='col'>YEAR</th>
			      <th scope='col'>SEATS</th>
			    </tr>
			  </thead>";
		    while($row = mysqli_fetch_array($result)) {
		    		        
echo"<tr><td>{$row['car_id']}</td><td>{$row['brand']}</td><td>{$row['model']}</td><td>{$row['year']}</td><td>{$row['Capacity']}</td></tr><br><hr>";
}

$sql1 = "SELECT * FROM customer";
$result = mysqli_query($conn,$sql1);
echo"
        <h2>here's a list of our customers:</h2> <br><hr>
		    <table class='table table-dark'>
			  <thead>
			    <tr>
			      <th scope='col'>ID</th>
			      <th scope='col'>NAME</th>
			      <th scope='col'>Licence Number</th>
			      <th scope='col'>Date of Birth</th>
			    </tr>
			  </thead>";
		    while($row1 = mysqli_fetch_array($result)) {
		    		        
echo"<tr><td>{$row1['customer_id']}</td><td>{$row1['name']}</td><td>{$row1['licence_number']}</td><td>{$row1['date_of_birth']}</td><br><hr>";
}




// while($row = mysqli_fetch_assoc($result)) {
//        printf("%s %s (%s)<br>",
//                      $row["brand"], $row["model"],$row["year"],$row["KM_stand"],$row["Capacity"]);
// }

// Free result set
mysqli_free_result($result);
// Close connection
mysqli_close($conn);
?>
        
  
</body>
</html>
<?php ob_end_flush(); ?>