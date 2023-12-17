document.addEventListener('DOMContentLoaded', () => {
  const jsVideoFile = document.getElementById('js-video-file');
  const jsPlayButton = document.getElementById('js-play-button');


  if (jsVideoFile) {
    const ToggleVideoPlay = () => {
      jsVideoFile.paused ? jsVideoFile.play() : jsVideoFile.pause();
      jsPlayButton.classList.toggle('video-file__play-button--disabled');
    }

    jsPlayButton.addEventListener('click', () => {
      ToggleVideoPlay();
    })
    jsVideoFile.addEventListener('click', () => {
      ToggleVideoPlay();
    })
  }
});