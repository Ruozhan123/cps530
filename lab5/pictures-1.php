<!DOCTYPE html>
<html>
<head>
  <title>Lab 5 - Pictures</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="pic-1.css" rel="stylesheet" type="text/css" media="screen, print">
</head>
<body>
<?php

include("db_connection.php");
$sql1 = "SELECT subject, location, date_taken FROM pictures order by date_taken desc";
$result1 = mysqli_query($connect, $sql1);

$sql2 = "SELECT subject, location, picture_url FROM pictures where location='ontario'";
$result2 = mysqli_query($connect, $sql2);

$sql3 = "SELECT subject, picture_url FROM pictures ORDER BY RAND () LIMIT 1";
$result3 = mysqli_query($connect, $sql3);

$sql4 = "SELECT count(*) AS num_of_pics FROM pictures";
$result4 = mysqli_query($connect, $sql4);
?>

  <div class="container">
    <div class="row">
      <h1>Pictures</h1>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <h2>All Pictures Information</h2>
        <table>
          <thead>
            <th>Subject</th>
            <th>Location</th>
            <th>Date</th>
          </thead>
          <tbody>
            <?php
              if (mysqli_num_rows($result1) > 0) {
                  while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                      echo "<tr>";
                      echo "<td>".$row["subject"]."</td><td>".$row["location"]."</td><td>". $row["date_taken"]."</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "No results found";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <h2>The Pictures Taken in Ontario</h2>
        <?php
          if (mysqli_num_rows($result2) > 0) {
            while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
              echo "<div class='col-xs-12 col-sm-6'>";
              echo "<figure><image src='". $row["picture_url"]."'>";
              echo "<figcaption>".$row["subject"]." - " .$row["location"]."</figcaption></figure>";
              echo "</div>";
            }
          } else {
            echo "No results found";
          }
        ?>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <h2><center>One Random Image</center></h2>
          <?php
              if (mysqli_num_rows($result3) > 0) {
                  $row = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                   echo "<div>";
                   echo "<figure><image src='". $row["picture_url"]."'>";
                   echo "<figcaption>".$row["subject"]. "</figcaption></figure>";
                   echo "</div>";
              } else {
                  echo "No results found";
              }
        ?>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <?php
          $row = mysqli_fetch_array($result4, MYSQLI_ASSOC);
          echo "<p style='margin-top: 30px; text-align:center;font-weight:bold;'>The total number of images in the database: " . $row['num_of_pics']."</p>";
          ?>
      </div>
    </div>
  </div>

</body>
</html>
