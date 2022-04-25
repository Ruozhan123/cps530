<?php
$get_json_file_contents = file_get_contents("https://s9.reliastream.com:2199/rpc/meyima03/streaminfo.get");

$array = json_decode($get_json_file_contents, true);
$array_data = $array["data"][0];
//var_dump($array_data);
$stream_array["radio_title"]="Hawaiian Music Station";
foreach($array_data as $array_index => $array_value)
{
  if ($array_index != "title" && $array_index != "song")
  {

    if ($array_index == "track")
    {
      foreach($array_value as $song_index => $song_value)
      {
        if ($song_index == "playlist")
        {
          $stream_array["play_list_title"]=$song_value["title"];
        }
        else {
          $stream_array[$song_index]=$song_value;
        }
      }
    }
    else
    {
        $stream_array[$array_index]=$array_value;
    }
  }
}

//var_dump($stream_array);
$tuneinurl = str_replace("http","https",$stream_array['tuneinurl']);
$proxytuneinurl=str_replace("http","https",$stream_array['proxytuneinurl']);
?>
<html>
<head>
  <title>Lab 7 - Hawaiian Music Station</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="lab7-2.css" rel="stylesheet" type="text/css" media="screen, print">
</head>
</head>
<body>
<div class="header">
  <h1><?php echo $stream_array["radio_title"];?></h1>
  <h4><?php echo "Hawaiian Time: ".$stream_array["date"] . " " . $stream_array["time"]; ?></h4>
</div>

<h2><?php echo $stream_array["play_list_title"] ?></h2>
<div class="play_list">
<div class="song_image">
<img src="<?php echo $stream_array["imageurl"] ?>">
</div>
<div>
<audio id="audio_list" controls="" autoplay="no" name="media"><source src="https://s9.reliastream.com/proxy/meyima03/stream" type="audio/aac"></audio>
<div class="track_info">
<p><?php echo  $stream_array["title"] ?>
<br>
<?php echo  $stream_array["artist"] ?>
<br>
<?php echo  "Album: ".$stream_array["album"] ?>
</p>
</div>
</div>
<div>
<p><?php echo "Listeners: ".$stream_array["listeners"]?>
<br>
<?php echo "Max Listeners: ".$stream_array["maxlisteners"]?>
<br>
<?php echo "Total Listerners: ".$stream_array["listenertotal"]?>
<div class="split_line"></div>
<?php echo "Tune in url: ".$stream_array["tuneinurl"]?>
<br>
<?php echo "Tune in Format: ".$stream_array["tuneinformat"]?>
<br>
<?php echo "URL: ".$stream_array["url"]?>
<br>
<?php echo "Web Player: ".$stream_array["servertype"]?>
<br>
<?php echo "Server Type: ".$stream_array["servertype"]?>
</div>
<div>
</body>
</html>
