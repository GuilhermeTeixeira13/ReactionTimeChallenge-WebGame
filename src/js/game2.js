var clickedTime, createdTime, reactionTime;

const btnGame2 = document.getElementById('startGame2');

btnGame2.addEventListener('click', () => {
  btnGame2.style.display = 'none';
  document.getElementById('game2Header').style.display = "none";

  const box = document.getElementById('game2');
  box.style.display = 'block';
});

function makeboxGame2() {
  randomBackground();
  var random = getRandomArbitrary(3000, 7000);
  console.log(random);
  setTimeout(mudaFundo, random);
}

function randomBackground() {
  var color = ["red", "blue", "green", "yellow"];
  var codColor;
  codColor = Math.random();
  codColor = codColor * 4;
  codColor = Math.floor(codColor);
  document.getElementById("divbox2").style.backgroundColor = color[codColor];
}

function mudaFundo() {
  document.getElementById("divbox2").style.display = 'block';
  createdTime = new Date();
}

function divClickGame2() {
  clickedTime = new Date();
  reactionTime = (clickedTime - createdTime) / 1000;
  document.getElementById("reactionTime2").innerHTML = reactionTime + "ms";
  document.getElementById("divbox2").style.display = 'none';

  makeboxGame2();
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}