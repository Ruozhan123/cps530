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
      <h1>Multiplication Table</h1>
    </div>

    <div class="row">
      <div class="form-group">
        <form class="form-horizontal" action="multiplication_table_process.php" method="post">
          <div class="form-group">
            <label for="rows" class="col-xs-6 col-sm-5 control-label">Number of Rows:</label>
            <div class="col-xs-6 col-sm-5">
              <input type="number" class="form-control" name="rows" placeholder="Number of Rows" required>
            </div>
          </div>
          <div class="form-group">
            <label for="columns" class="col-xs-6 col-sm-5 control-label">Number of Columns:</label>
            <div class="col-xs-6 col-sm-5">
              <input type="number" class="form-control" name="columns" placeholder="Number of Columns" required>
            </div>
          </div>
          <div class="form-group">
            <div class="text-center">
              <input type="submit" class="form-control btn btn-primary" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer>
    <div class="col-xs-12 col-sm-12">
      <?php
        setcookie('visitedcount',1+$_COOKIE['visitedcount'],time()+60*60);
	       $visited_count = $_COOKIE['visitedcount'];
         echo "<p style='margin-top: 30px; text-align:center;font-weight:bold;'>Total of page views: " . $visited_count." times</p>";
      ?>
    </div>
  </footer>

</body>
</html>
