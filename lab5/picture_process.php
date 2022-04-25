<!DOCTYPE html>
<html>
<head>
  <title>Lab 5 - Pictures</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="pic-2.css" rel="stylesheet" type="text/css" media="screen, print">
</head>
<body>
<?php
$location = $_POST['location'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

include("db_connection.php");
$sql = "SELECT subject, location, date_taken, picture_url FROM pictures where location='$location' and date_taken between '$start_date' and '$end_date'";
$result = mysqli_query($connect, $sql);

?>
  <div class="container">
    <div class="row">
      <h1><center>The Pictures Taken in <?php echo $location ?> </center></h1>
    </div>

    <div>
    <?php
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<div class='col-xs-12 col-sm-12'>";
        echo "<figure><image src='". $row["picture_url"]."'>";
        echo "<figcaption>".$row["subject"]." - " .$row["location"]."</figcaption></figure>";
        echo "</div>";
      }
    } else {
      echo "No result found";
    }
    ?>
    </div>

    </div>
  </div>
</body>
</html>
