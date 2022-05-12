var clickedTime, createdTime, reactionTime;

const btnGame1 = document.getElementById('startGame1');

btnGame1.addEventListener('click', () => {
  btnGame1.style.display = 'none';
  document.getElementById('game1Header').style.display = "none";

  const box = document.getElementById('game1');
  box.style.display = 'block';
});

function makeboxGame1() {
  randomshape();
  var random = getRandomArbitrary(3000, 7000);
  console.log(random);
  setTimeout(apareceFiguraNaTela, random);
}

function randomshape() {
  var color = ["red", "blue", "green", "yellow"];
  var codColor;
  codColor = Math.random();
  codColor = codColor * 4;
  codColor = Math.floor(codColor);
  document.getElementById("divbox1").style.backgroundColor = color[codColor];

  var randomBorderRadius;
  randomBorderRadius = getRandomArbitrary(0, 150);
  randomBorderRadius = Math.floor(randomBorderRadius);
  document.getElementById("divbox1").style.borderRadius = randomBorderRadius + "px";

  var RandommarginLeft, RandommarginTop;
  RandommarginLeft = getRandomArbitrary(0, 600);
  RandommarginLeft = Math.floor(RandommarginLeft);
  RandommarginTop = getRandomArbitrary(0, 300);
  RandommarginTop = Math.floor(RandommarginTop);

  document.getElementById("divbox1").style.marginTop = RandommarginTop + "px";
  document.getElementById("divbox1").style.marginLeft = RandommarginLeft + "px";
}

function apareceFiguraNaTela() {
  document.getElementById("divbox1").style.display = 'block';
  createdTime = new Date();
}

function divClickGame1() {
  clickedTime = new Date();
  reactionTime = (clickedTime - createdTime) / 1000;
  document.getElementById("reactionTime1").innerHTML = reactionTime + "ms";
  document.getElementById("divbox1").style.display = 'none';

  makeboxGame1();
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}