<?php
//Global Config

$player_name = "((URY)) Player";
$event_name = "University Radio York";
$show_image = "logo-station.png";
$bg_image = "bg-faders.jpg";
$homepage_url = "https://ury.org.uk/";
$homepage_alt = "URY Homepage";
$player_url_base = "/";
$stream_url_base = "https://ury.org.uk/audio/";
$audio_type = "mpeg";

//strm-data.php (for external stream name access)
//will prepend the value in $stream-prefix to its output.
//You'll probably want a space after it.
$stream_prefix = "URY ";

//webRootDir/$keyval => ["Stream Name", "Subtitle", "Audio Stream Name"],
//Subtitle (Sport name etc) can be left blank ("")
$stream_data = array(
  "main" => ["Main Broadcast", "", "live-high"]
);

//Default to a player page.
//Overriden by other page types.
$page_type = "player";
?>
