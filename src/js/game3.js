var clickedTime, createdTime, reactionTime, timeOut, JogoIniciado;

const btnGame3 = document.getElementById('startGame3');

btnGame3.addEventListener('click', () => {
  btnGame2.style.display = 'none';
  document.getElementById('game3Header').style.display = "none";
  const box = document.getElementById('game3');
  box.style.display = 'block';
});

function makeSoundGame3() {
  JogoIniciado = new Date();

  var random = getRandomArbitrary(3000, 7000);
  console.log("Tempo até o som aparecer: " + random);
  timeOut = setTimeout(mostraSom, random);
}

function mostraSom() {
  createdTime = new Date();

  var audio = new Audio('../sound/beep.mp3');
  audio.volume = 0.05;
  audio.play();

  document.getElementById("divbox3").style.display = 'block';
}

function divClickGame3() {
  clickedTime = new Date();
  reactionTime = (clickedTime - createdTime) / 1000;
  console.log("O tempo de reação foi de -> " + reactionTime + "ms!");

  document.getElementById("reactionTime3").innerHTML = reactionTime + "ms";
  document.getElementById("divbox3").style.display = 'none';

  makeSoundGame3();
}

function mudaClicouCedo() {
  document.getElementById("ClicouCedo").innerHTML = "";
}

function demasiadoCedoGame3() {
  ClickCedo = new Date();

  if (ClickCedo - JogoIniciado != 0) { // Depois de o jogo é iniciado após se acertar na resposta, ClickCedo - JogoIniciado = 0, pois JogoIniciado > ClickCedo
    console.log("Clicou demasiado cedo.");

    document.getElementById("ClicouCedo").innerHTML = "Ciclou Cedo!!! -> Restarting";
    setTimeout(mudaClicouCedo, 2000);

    clearTimeout(timeOut);
    makeSoundGame3();
  }
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}