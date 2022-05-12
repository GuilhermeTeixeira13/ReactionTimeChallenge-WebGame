var clickedTime, createdTime, reactionTime;

const btnGame3 = document.getElementById('startGame3');

btnGame3.addEventListener('click', () => {
  btnGame2.style.display = 'none';
  document.getElementById('game3Header').style.display = "none";

  const box = document.getElementById('game3');
  box.style.display = 'block';
});

function makeSoundGame3() {
  var random = getRandomArbitrary(3000, 7000);
  console.log(random);
  setTimeout(mostraSom, random);
}

function mostraSom() {
  document.getElementById("divbox3").style.display = 'block';
  var audio = new Audio('../sound/beep.mp3');
  audio.volume = 0.05;
  audio.play();
  createdTime = new Date();
}

function divClickGame3() {
  clickedTime = new Date();
  reactionTime = (clickedTime - createdTime) / 1000;
  document.getElementById("reactionTime3").innerHTML = reactionTime + "ms";
  document.getElementById("divbox3").style.display = 'none';

  makeSoundGame3();
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}