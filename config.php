<?php
//Global Config

$player_name = "((URY)) Player";
$event_name = "Roses 2017";
$show_image = "logo-roses.png";
$bg_image = "bg-roses-1.jpg";
$stream_url_base = "https://ury.org.uk/audio/";
$audio_type = "mp3";

//strm-data.php (for external stream name access)
//will prepend the value in $stream-prefix to its output.
//You'll probably want a space after it.
$stream_prefix = "URY ";

$stream_data = array(
  "roses1" => ["Stream 1", "Basketball"],
  "roses2" => ["Stream 2", "Hockey"],
  "roses3" => ["Stream 3", "Sports Hall"],
  "live-high" => ["Main Broadcast", ""],
);

$stream_id = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

?>
