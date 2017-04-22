var music = document.getElementById("music"); // id for audio element

var sourceElement = document.querySelector("source");
var originalSourceUrl = sourceElement.getAttribute("src");

var pButton = "#show-player-play"; // play button

function changePlayState(forcedState) {
  // forced state: true: play, false: stop, undefined: toggle
  if (music.paused && forcedState !== false) {
    // start music
    if (!sourceElement.getAttribute("src")) {
      sourceElement.setAttribute("src", originalSourceUrl);
    }
    music.load(); // This restarts the stream download
    music.play();

    $(pButton).removeClass("fa-play").removeClass("fa-close").addClass("fa-pause");
  } else if (!music.paused && forcedState !== true) {
    // pause music
    sourceElement.setAttribute("src", ""); //prevents unnecisary download/playing non-live content.
    music.pause();
    // settimeout, otherwise pause event is not raised normally
    setTimeout(function () {
      music.load(); // This stops the stream from downloading
    });
    // remove pause/stop icons, add play
    $(pButton).removeClass("fa-pause").removeClass("fa-close").addClass("fa-play");
  }
}
$(pButton).click(function(){
  if (!$(this).hasClass("fa-close")) {
    changePlayState();
  }
});
