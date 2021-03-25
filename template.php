<?php
switch ($page_type) {
  case "player":
    if ($stream_id == null) {
      // $stream_id = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
      $stream_id = $_GET["stream"];
    }
    $exploded = explode("-embed", $stream_id);
    $stream_id = $exploded[0];
    $embedded = false;
    if (count($exploded) > 1) {
      $embedded = true;
    }
    $stream_info = $stream_data[$stream_id];
    if ($stream_info == null) {
      foreach ($stream_data as $key => $stream) {
        if ($stream[2] == $stream_id) {
          header('Location: ' . $player_url_base . $key);
          break;
        }
      }
      $stream_info = $stream_data[$stream_id];
    }
    $stream_name = $stream_info[0];
    $stream_subtitle = $stream_info[1];
    $stream_presenters = $stream_info[3];

    $audio_url = $stream_url_base . $stream_info[2];
    break;
}

if ($embedded) {
  include("template-embed.php");
} else {
  include("template-full.php");
}
