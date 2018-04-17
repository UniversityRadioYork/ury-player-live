<?php
include("config.php");
//Allow roseslive.co.uk/live to access it
header("Access-Control-Allow-Origin: *");

if (isset($_GET['id'])) {
	$stream_id = filter_var ($_GET['id'], FILTER_SANITIZE_STRING);
	if (array_key_exists($stream_id,$stream_data)) {
		$stream_title = $stream_data[$stream_id][0];
		$stream_subtitle = $stream_data[$stream_id][1];
		$separator = "";
		if (strlen($stream_subtitle) > 0) {
			$separator = " - ";
		}
		echo ($stream_prefix . $stream_title . $separator . $stream_subtitle);
	} else {
		echo ($stream_prefix . " - Offline");
	}
}
?>
