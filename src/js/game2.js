var clickedTime, createdTime, reactionTime, JogoIniciado, timeOut;

const btnGame2 = document.getElementById('startGame2');

btnGame2.addEventListener('click', () => {
  btnGame2.style.display = 'none';
  document.getElementById('game2Header').style.display = "none";
  const box = document.getElementById('game2');
  box.style.display = 'block';
});

function makeboxGame2() {
  JogoIniciado = new Date();

  randomBackground();

  var random = getRandomArbitrary(3000, 7000);
  console.log("Tempo até o som aparecer: " + random);
  timeOut = setTimeout(mudaFundo, random);
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

function mudaClicouCedo() {
  document.getElementById("ClicouCedo").innerHTML = "";
}

function demasiadoCedoGame2() {
  ClickCedo = new Date();

  if (ClickCedo - JogoIniciado != 0) { // Depois de o jogo é iniciado após se acertar na resposta, ClickCedo - JogoIniciado = 0, pois JogoIniciado > ClickCedo
    console.log("Clicou demasiado cedo.");

    document.getElementById("ClicouCedo").innerHTML = "Ciclou Cedo!!! -> Restarting";
    setTimeout(mudaClicouCedo, 2000);

    clearTimeout(timeOut);
    makeboxGame2();
  }
}

function divClickGame2() {
  clickedTime = new Date();
  reactionTime = (clickedTime - createdTime) / 1000;
  console.log("O tempo de reação foi de -> " + reactionTime + "ms!");

  document.getElementById("reactionTime2").innerHTML = reactionTime + "ms";
  document.getElementById("divbox2").style.display = 'none';

  makeboxGame2();
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}