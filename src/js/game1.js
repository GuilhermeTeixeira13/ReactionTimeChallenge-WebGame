var clickedTime, createdTime, reactionTime, record = 99999;

const btn = document.getElementById('startGame1');

btn.addEventListener('click', () => {
  // 👇️ hide button
  btn.style.display = 'none';
  document.getElementById('game1Header').style.display = "none";

  // 👇️ show div
  const box = document.getElementById('game1');
  box.style.display = 'block';
});

function makebox() {
  randomshape();
  var random = getRandomArbitrary(3000, 7000);
  setTimeout(apareceFiguraNaTela, random);
}

function randomshape() {
  var color = ["red", "blue", "green", "yellow"];
  var codColor;
  codColor = Math.random();
  codColor = codColor * 4;
  codColor = Math.floor(codColor);
  document.getElementById("divbox").style.backgroundColor = color[codColor];

  var randomBorderRadius;
  randomBorderRadius = getRandomArbitrary(0, 150);
  randomBorderRadius = Math.floor(randomBorderRadius);
  document.getElementById("divbox").style.borderRadius = randomBorderRadius + "px";

  var RandommarginLeft, RandommarginTop;
  RandommarginLeft = getRandomArbitrary(0, 600);
  RandommarginLeft = Math.floor(RandommarginLeft);
  RandommarginTop = getRandomArbitrary(0, 300);
  RandommarginTop = Math.floor(RandommarginTop);

  document.getElementById("divbox").style.marginTop = RandommarginTop + "px";
  document.getElementById("divbox").style.marginLeft = RandommarginLeft + "px";
}

function apareceFiguraNaTela() {
  document.getElementById("divbox").style.display = 'block';
  createdTime = new Date();
}

function divClick() {
  clickedTime = new Date();
  reactionTime = (clickedTime - createdTime) / 1000;
  document.getElementById("reactionTime").innerHTML = reactionTime + "ms";
  document.getElementById("divbox").style.display = 'none';

  makebox();
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}