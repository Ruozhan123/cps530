<!DOCTYPE html>
<html>
<head>
  <title>Lab 5 - Multiplication table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="multiplication.css" rel="stylesheet" type="text/css" media="screen, print">
</head>
<body>
  <div class="container">
			<div class="row">
				<h1>Multiplication Table Result</h1>
			</div>

      <div class="row">
			<?php
        $error_msg = "";
				if(isset($_POST['rows']) && ((int)$_POST['rows']<3 || (int)$_POST['rows']>12)) {
          $error_msg = "Invalid Number of Rows. Number of Rows must be between 3 and 12. <br>";
        }
        if(isset($_POST['columns']) && ((int)$_POST['columns']<3 || (int)$_POST['columns']>12)) {
          $error_msg .= "Invalid Number of columns. Number of columns must be between 3 and 12. <br> ";
        }
        if (empty($error_msg)) {
          $rows = (int)$_POST['rows'];
          $columns = (int)$_POST['columns'];
          echo "<table><tbody>";
          for ($i=1;$i<=$rows;$i++){
            echo "<tr>";
            for($j=1; $j<=$columns;$j++){
              echo "<td>".$i*$j."</td>";
            }
            echo "</tr>";
          }
          echo "</tbody></table>";
        }
        else {
          echo $error_msg;
          echo "<a href='https://www.scs.ryerson.ca/~r56li/multiplicationTable.php'>Return to the form</a>";
        }
			?>
    </div>
  </div>

</body>
</html>
