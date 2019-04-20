<?php
  switch($page_type) {
  case "player":
    if ($stream_id == null) {
      $stream_id = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    }
    $stream_info = $stream_data[$stream_id];
    if ($stream_info == null) {
      foreach ($stream_data as $key => $stream) {
        if ($stream[2] == $stream_id) {
          header('Location: '.$player_url_base.$key);
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
?>
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
    <style>
      body {
        background: url("<?php echo($player_url_base) ?>assets/custom/<?php echo($bg_image); ?>") center center no-repeat;
      }
    </style>
  </head>
  <body>

  <nav class="navbar navbar-toggleable bg-faded navbar-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo($homepage_url); ?>" alt="<?php echo($homepage_alt); ?>">
      <img src="<?php echo($player_url_base) ?>assets/logo-homepage.png" height="34" alt="<?php echo($player_name); ?> Logo">
    </a>
    <!-- <span class="navbar-brand divider"></span> -->
    <a class="navbar-brand" href="<?php echo($player_url_base); ?>" alt="<?php echo($player_name); ?>">
      <img src="<?php echo($player_url_base) ?>assets/logo-player.png" height="34" alt="<?php echo($player_name); ?> Logo">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
	<div class="container">
		<span>You're listening to...</span>
    <header id="stream-available">
      <div id="show-title">
        <h1><?php echo($event_name); ?></h1>
        <h2><?php echo($stream_name); ?></h2>
        <h3><?php echo($stream_subtitle); ?></h3>
        <h4><?php echo($stream_presenters); ?></h4>
      </div>
      <div id="show-image">
        <img src="<?php echo($player_url_base) ?>assets/custom/<?php echo($show_image); ?>" alt="<?php echo($event_name); ?> Logo">
      </div>
      <div id="show-player" class="row">
        <div id="show-player-play" class="fa fa-play col-2"></div>
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
    case "stream-list":
  ?>
  <div class="container">
    <h3><small>Choose your coverage...</small></h3>
    <header id="stream-available">
      <div id="show-title">
        <h1><?php echo($event_name); ?></h1>
        <h3><span class="btn btn-red btn-live">LIVE</span> Right Now</h3>
      </div>
      <?php foreach ($stream_data as $stream_id => $stream) { ?>
        <a href="<?php echo($stream_id); ?>">
          <div class="stream-list-row row">
            <div id="show-player-text" class="col"><?php echo $stream[0]; ?> <span><?php echo $stream[1]; ?></span></div>
          </div>
        </a>
      <?php }; ?>
      <div id="show-image">
        <img src="<?php echo($player_url_base) ?>assets/custom/<?php echo($show_image); ?>" alt="<?php echo($event_name); ?> Logo">
      </div>
    </header>
  </div>
  <?php
    break;
    };
  ?>
  <footer class="container-fluid footer">
      <div class="navbar-left">
            <a href="https://facebook.com/URY1350" target="_blank">
                <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
            </a>
            <a href="https://twitter.com/URY1350" target="_blank">
                <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
            </a>
            <a href="https://youtube.com/c/URY1350" target="_blank">
                <i class="fa fa-youtube fa-2x" aria-hidden="true"></i>
            </a>
            <a href="https://mixcloud.com/URY1350" target="_blank">
                <i class="fa fa-mixcloud fa-2x" aria-hidden="true"></i>
            </a>
      </div>
      <div class="navbar-right">
        <p>Copyright &copy; 1967-2018 <a href="https://ury.org.uk" target="_blank">University Radio York</a><br>Designed by the <a href="mailto:webmaster@ury.org.uk" title="Click to email the Computing team.">URY Computing Team</a>
        <br><a href="https://www.york.ac.uk/docs/disclaimer/disclaimer.htm" target="_blank">Disclaimer</a></p>
      </div>
  </footer>
  </body>
</html>
