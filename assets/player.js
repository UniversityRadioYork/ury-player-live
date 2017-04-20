//I know this is untidy, i'll fix it later ;)


var music = document.getElementById("music"); // id for audio element

$(document).ready(function() {
  // variable to store HTML5 audio element
  play();
});

var pButton = document.getElementById("show-player-play"); // play button

// play button event listenter
pButton.addEventListener("click", play);

var volumeHandle = document.getElementById("volumeHandle"); // volumeHandle
var volume = document.getElementById("volume"); // volume

// volume width adjusted for volumeHandle
var volumeWidth = volume.offsetWidth - volumeHandle.offsetWidth;

// returns click as decimal (.77) of the total volumeWidth
function clickPercent(event) {
  var volumePercent = (event.clientX - getPosition(volume)) / volumeWidth;
  if (volumePercent > 1) {
    volumePercent = 1;
  } else if (volumePercent < 0) {
    volumePercent = 0;
  }
  return volumePercent;

}

// makes volumeHandle draggable
volumeHandle.addEventListener("mousedown", mouseDown, false);
window.addEventListener("mouseup", mouseUp, false);

// Boolean value so that audio position is updated only when the volumeHandle is released
var onvolumeHandle = false;

// mouseDown EventListener
function mouseDown() {
  onvolumeHandle = true;
  window.addEventListener("mousemove", movevolumeHandle, true);
  music.removeEventListener("volumeUpdate", volumeUpdate, false);
}

// mouseUp EventListener
// getting input from all mouse clicks
function mouseUp(event) {
  if (onvolumeHandle == true) {
    movevolumeHandle(event);
    window.removeEventListener("mousemove", movevolumeHandle, true);
    // change current time
    music.volume = clickPercent(event);
    music.addEventListener("volumeUpdate", volumeUpdate, false);
  }
  onvolumeHandle = false;
}
// mousemove EventListener
// Moves volumeHandle as user drags
function movevolumeHandle(event) {
  var newMargLeft = event.clientX - getPosition(volume);

  if (newMargLeft >= 0 && newMargLeft <= volumeWidth) {
    volumeHandle.style.marginLeft = newMargLeft + "px";
  }
  if (newMargLeft < 0) {
    volumeHandle.style.marginLeft = "0px";
  }
  if (newMargLeft > volumeWidth) {
    volumeHandle.style.marginLeft = volumeWidth + "px";
  }
}
// volumeUpdate
// Synchronizes volumeHandle position with current point in audio
function volumeUpdate() {
  var volumePercent = volumeWidth * (music.volume);
  volumeHandle.style.marginLeft = volumePercent + "px";
}

// getPosition
// Returns elements left position relative to top-left of viewport
function getPosition(el) {
  return el.getBoundingClientRect().left;
}

//Play and Pause
function play() {
  // start music
  volumeUpdate();
  if (music.paused) {
    music.play();
    // remove play, add pause
    pButton.className = "";
    pButton.className = "col-2 fa fa-pause";
  } else { // pause music
    music.pause();
    // remove pause, add play
    pButton.className = "";
    pButton.className = "col-2 fa fa-play";
  }
}
