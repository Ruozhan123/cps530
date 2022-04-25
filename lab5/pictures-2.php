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
  <div class="container">
    <div class="row">
      <h1>Search Pictures</h1>
    </div>
    <div class="row">
      <form class="form-horizontal" action="picture_process.php" method="post">
        <div class="form-group">
          <label for="location" class="col-xs-6 col-sm-5 control-label">Location: </label>
          <div class="col-xs-6 col-sm-5">
            <select name="location" id="location" class="drop_down">
              <option value="Ontario">Ontario</option>
              <option value="Quebec">Quebec</option>
              <option value="Shanghai">Shanghai</option>
            </select>
          </div>
        </div>
				<div class="form-group">
          <label for="columns" class="col-xs-6 col-sm-5 control-label">Picture Start Date:</label>
          <div class="col-xs-6 col-sm-5">
            <input type="date" class="form-control" name="start_date" placeholder="Picture Start Date" required>
          </div>
        </div>
        <div class="form-group">
          <label for="columns" class="col-xs-6 col-sm-5 control-label">Picture End Date:</label>
          <div class="col-xs-6 col-sm-5">
            <input type="date" class="form-control" name="end_date" placeholder="Picture End Date" required>
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

</body>
</html>
