<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo($player_name); ?> - <?php echo($event_name); ?> <?php echo($stream_name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo($player_url_base) ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo($player_url_base) ?>assets/style.css?t=2018">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  <body class="embedded-player">
  <nav class="bg-faded navbar-inverse p-2">
    <a class="navbar-brand" target="_parent" href="<?php echo($homepage_url); ?>" alt="<?php echo($homepage_alt); ?>">
      <img src="<?php echo($player_url_base) ?>assets/logo-homepage.png" height="34" alt="<?php echo($player_name); ?> Logo">&nbsp;
      <img src="<?php echo($player_url_base) ?>assets/logo-player.png" height="34" alt="<?php echo($player_name); ?> Logo">
    </a>
    <div class="collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <div class="my-2 my-lg-0">
        <div id="navbar-slogan">On Air | <strong>Online</strong> | On Tap</div>
    </div>
  </nav>

  <?php
    switch($page_type) {
    case "player":
  ?>
	<div>
    <header id="stream-available">
      <div class="row container-fluid full-height">
        <div id="show-title" class="col-9 pl-3">
          <h1><?php echo($event_name); ?></h1>
          <h2><?php echo($stream_name); ?></h2>
          <h3><?php echo($stream_subtitle); ?></h3>
          <h4><?php echo($stream_presenters); ?></h4>
        </div>
        <div id="show-image" class="col-3">
          <div id="show-player-play" class="fa fa-play"></div>
        </div>
      </div>
      <div id="show-player" class="row">
        <div id="show-player-text" class="col">LOADING STREAM</div>
        <audio id="player-element">
          <source src="<?php echo($audio_url); ?>" type="audio/<?php echo($audio_type); ?>">
            Your browser does not support our audio stream.
        </audio>
      </div>
    </header>
  </div>
  <script src="<?php echo($player_url_base) ?>assets/player.js"></script>
  <?php
    break;
    };
  ?>
  </body>
</html>

