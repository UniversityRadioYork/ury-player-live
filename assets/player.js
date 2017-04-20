//I know this is untidy, i'll fix it later ;)


var music = document.getElementById("music"); // id for audio element

var sourceElement = document.querySelector("source");
var originalSourceUrl = sourceElement.getAttribute("src");

var pButton = document.getElementById("show-player-play"); // play button

//Play and Pause
function play(playOnly) {
  alert("click");
  // start music
  if (music.paused) {
    if (!sourceElement.getAttribute("src")) {
      sourceElement.setAttribute("src", originalSourceUrl);
      music.load(); // This restarts the stream download
    }
    music.play();
    // remove play, add pause
    pButton.className = "";
    pButton.className = "col-2 fa fa-pause";
  } else if (!playOnly) { // pause music
    sourceElement.setAttribute("src", ""); //prevent's being delayed on play again.
    music.pause();
    // settimeout, otherwise pause event is not raised normally
    setTimeout(function () {
      music.load(); // This stops the stream from downloading
    });
    // remove pause, add play
    pButton.className = "";
    pButton.className = "col-2 fa fa-play";
  }
}
