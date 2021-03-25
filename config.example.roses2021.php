<?php
//Global Config

$player_name = "((URY)) Player";
$event_name = "Roses 2021";
$show_image = "logo-roses.png";
$bg_image = "bg-roses-1.jpg";
$homepage_url = "https://ury.org.uk/";
$homepage_alt = "URY Homepage";
$player_url_base = "/";
$stream_url_base = "https://audio.ury.org.uk/";
$audio_type = "mpeg";

//strm-data.php (for external stream name access)
//will prepend the value in $stream-prefix to its output.
//You'll probably want a space after it.
$stream_prefix = "URY ";

//webRootDir/$keyval => ["Stream Name", "Subtitle", "Audio Stream Name", "Presenters"],
//Subtitle (Sport name etc) can be left blank ("")
$stream_data = array(
  "main" => ["URY 1350AM: Main Broadcast", "Sport Name", "live-high", ""],
# "xtra" => ["URY Xtra: Roses Commentary", "", "OB-Line", ""],
#  "roses1" => ["Stream 1", "Basketball", "roses1", "Presenter 1, Presenter 2"],
#  "roses2" => ["Stream 2", "Men's Volleyball", "roses2", "Presenter 1, Presenter 2"],
#  "roses3" => ["Stream 3", "Kendo coverage on URY", "roses3", "Presenter 1, Presenter 2"],
#  "roses4" => ["Stream 4", "Women's Handball", "roses4", "Presenter 1, Presenter 2"],
);

//Default to a player page.
//Overriden by other page types.
$page_type = "player";
