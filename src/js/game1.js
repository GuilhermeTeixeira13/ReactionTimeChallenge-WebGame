var clickedTime = 0, createdTime, reactionTime, JogoIniciado, timeOut, cont = 0, random;
const times = new Array();

const btnGame1 = document.getElementById('startGame1');

btnGame1.addEventListener('click', () => {
  btnGame1.style.display = 'none';
  const box = document.getElementById('game1');
  box.style.display = 'block';

  const box2 = document.getElementById('gameHeader');
  box2.style.display = 'block';
});

function makeboxGame1() {
  if (cont > 2) {
    makeboxGame2();
  }
  else {
    JogoIniciado = new Date();

    randomshape();

    random = getRandomArbitrary(3000, 7000);
    console.log("Tempo até a figura aparecer: " + random);
    timeOut = setTimeout(apareceFiguraNaTela, random);
  }
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
  RandommarginLeft = getRandomArbitrary(0, 87);
  RandommarginLeft = Math.floor(RandommarginLeft);
  RandommarginTop = getRandomArbitrary(0, 43.5);
  RandommarginTop = Math.floor(RandommarginTop);

  document.getElementById("divbox1").style.marginTop = RandommarginTop + "%";
  document.getElementById("divbox1").style.marginLeft = RandommarginLeft + "%";
}

function apareceFiguraNaTela() {
  createdTime = new Date();
  document.getElementById("ClicouCedo1").innerHTML = "Click now!";
  document.getElementById("divbox1").style.display = 'block';
}

function mudaClicouCedo1() {
  document.getElementById("ClicouCedo1").innerHTML = "Game 1<br>Click on the figures as soon as you see them!";
}

function demasiadoCedoGame1() {
  ClickCedo = new Date();

  if (ClickCedo - JogoIniciado < random && ClickCedo - JogoIniciado != 0) { // Depois de o jogo é iniciado após se acertar na resposta, ClickCedo - JogoIniciado = 0, pois JogoIniciado > ClickCedo
    console.log("Clicou demasiado cedo.");

    document.getElementById("ClicouCedo1").innerHTML = "To soon!!!<br>Restarting...";
    setTimeout(mudaClicouCedo1, 2000);

    clearTimeout(timeOut);
    makeboxGame1();
  }
}

function divClickGame1() {
  cont++;
  clickedTime = new Date();
  reactionTime = (clickedTime - createdTime) / 1000;
  times.push(reactionTime);
  console.log(times);
  console.log("O tempo de reação foi de -> " + reactionTime + "ms!");

  document.getElementById("ClicouCedo1").innerHTML = "Game 1<br>Click on the figures as soon as you see them!";

  const tryNo = document.getElementsByClassName("Try");
  if (cont == 1) {
    tryNo[0].innerHTML = "1º: " + reactionTime + "ms";
    tryNo[9].innerHTML = reactionTime + "ms";
  }
  else if (cont == 2) {
    tryNo[1].innerHTML = "2º: " + reactionTime + "ms";
    tryNo[10].innerHTML = reactionTime + "ms";
  }
  else if (cont == 3) {
    tryNo[2].innerHTML = "3º: " + reactionTime + "ms";
    tryNo[11].innerHTML = reactionTime + "ms";
  }


  document.getElementById("divbox1").style.display = 'none';

  makeboxGame1();
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}