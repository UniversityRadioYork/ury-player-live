// Detect if we're on a mobile, because it probably won't autoplay.
window.mobileAndTabletcheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};

var playRequested = true; // Is the user currently expect the player to be playing?
var playState = false; // Is the player playing?
var streamOnline = false; // Is the stream online or offline?

var playerElement = document.getElementById("player-element"); // The HTML audio element
var sourceElement = document.querySelector("source"); // The source tag for the audio element
var sourceURL = sourceElement.getAttribute("src"); // The URL of the audio stream.
var pButton = "#show-player-play"; // Play/Pause/Stop button

function changePlayState(state) {
  //Only modify audio player if we're making a change.
  if (state != playState) {
    if (state) {
      // Start playerElement
      sourceElement.setAttribute("src", sourceURL);
      playerElement.load(); // This restarts the stream download
      playerElement.play();
      playState = true;
      $("#show-player-text").text("LIVE STREAM");
      // Remove play/stop icons, add pause
      $(pButton).removeClass("fa-play").removeClass("fa-close").addClass("fa-pause");
    } else {
      // Pause playerElement
      sourceElement.setAttribute("src", ""); // Prevents unnecessary download/playing non-live content.
      playerElement.pause();
      playState = false;
      // setTimeout, otherwise pause event is not raised normally
      setTimeout(function () {
        playerElement.load(); // This stops the stream from downloading
      });
      // Remove pause/stop icons, add play
      $(pButton).removeClass("fa-pause").removeClass("fa-close").addClass("fa-play");
    }
  }
}

//Detection for lack of stream
function updateScreen(mobileOnLoad) {
  if (playerElement.paused && playRequested) {
    $.ajax({
      url: sourceURL,
      timeout : 1000,
      cache: false,
      error: function (xhr, textStatus, errorThrown)
      {
        if (textStatus == "timeout") {
          //It's probably icecast being stupid.
          streamOnline = true;
          if (mobileOnLoad) {
            playRequested = false;
            $("#show-player-text").text("PRESS PLAY!");
          } else {
            changePlayState(true);
          }
        } else {
          streamOnline = false;
          changePlayState(false);
          // Remove pause/play icons, add stop
          $("#show-player-play").removeClass("fa-play").removeClass("fa-pause").addClass("fa-close");
          $("#show-player-text").text("STREAM OFFLINE");
        }
      },
      success: function()
      {
        streamOnline = true;
        changePlayState(true);
      }
    });
  }
  setTimeout(function(){ updateScreen(); }, 10000);
}

$(pButton).click(function(){
  // Disable the play button if the stream is offline.
  if (streamOnline) {
    playRequested = !playState;
    changePlayState(!playState);
  }
});

$(document).ready(function(){
  //Force user to click on play button to start,
  //since iOS etc. won't auto play.
  updateScreen(window.mobileAndTabletcheck());
});
