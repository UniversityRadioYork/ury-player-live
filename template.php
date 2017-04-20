<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo($player_name); ?> - <?php echo($event_name); ?> <?php echo($stream_name); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <style>
      body {
        background: url("assets/custom/<?php echo($bg_image); ?>") center center no-repeat;
      }
    </style>
  </head>
  <body>

  <nav class="navbar navbar-toggleable bg-faded navbar-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-brand">
      <img src="assets/logo.png" height="34" alt="<?php echo($player_name); ?> Logo">
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <div class="my-2 my-lg-0">
        <div id="navbar-slogan">On Air | <strong>Online</strong> | On Demand</div>
    </div>
  </nav>

	<div class="container">
		<h3><small>You're listening to...</small></h3>
    <header>
				<div id="show-title">
          <h1><?php echo($event_name); ?></h1>
          <h2><?php echo($stream_name); ?></h2>
				</div>
        <div id="show-image">
          <img src="assets/custom/<?php echo($show_image); ?>" alt="<?php echo($event_name); ?> Logo">
        </div>
        <div id="show-player" class="row">
          <div id="show-player-play" class="fa fa-play col-2"></div>
          <div id="show-player-text" class="col"><p>LIVE</p></div>
          <div id="show-player-volume-container" class="col-4">
            <div id="volume-icon" class="fa fa-volume-up"></div>
            <div id="volume">
              <div id="volumeHandle"></div>
            </div>
          </div>
          <audio id="music" preload="true">
            <source src="<?php echo($audio_url); ?>" type="audio/<?php echo($audio_type); ?>">
              Your browser does not support our audio stream.
          </audio>
        </div>
    </header>
	</div>

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
        <p>Copyright &copy; 1967-2017 <a href="https://ury.org.uk" target="_blank">University Radio York</a><br>Designed by the <a href="mailto:webmaster@ury.org.uk" title="Click to email the Computing team.">URY Computing Team</a>
        <br><a href="https://www.york.ac.uk/docs/disclaimer/disclaimer.htm" target="_blank">Disclaimer</a></p>
      </div>
  </footer>

  <script src="assets/player.js"></script>

  </body>
</html>