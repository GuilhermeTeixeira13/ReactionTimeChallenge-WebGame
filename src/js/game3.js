var clickedTime, createdTime, reactionTime, timeOut, JogoIniciado;


function makeSoundGame3() {
  if (cont > 8) {
    const box3 = document.getElementById('game3');
    box3.style.display = 'none';

    const finished = document.getElementById('finish');
    finished.style.display = 'block';
  }
  else {
    const box2 = document.getElementById('game2');
    box2.style.display = 'none';

    const box3 = document.getElementById('game3');
    box3.style.display = 'block';

    JogoIniciado = new Date();

    var random = getRandomArbitrary(3000, 7000);
    console.log("Tempo até o som aparecer: " + random);
    timeOut = setTimeout(mostraSom, random);
  }
}

function mostraSom() {
  createdTime = new Date();

  var audio = new Audio('../sound/beep.mp3');
  audio.volume = 0.05;
  audio.play();

  document.getElementById("divbox3").style.display = 'block';
}

function divClickGame3() {
  cont++;
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