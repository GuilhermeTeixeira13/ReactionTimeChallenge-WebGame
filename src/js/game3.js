var clickedTime, createdTime, reactionTime, timeOut, JogoIniciado, audio;


function makeSoundGame3() {
  if (cont > 8) {
    const box3 = document.getElementById('game3');
    box3.style.display = 'none';

    const box4 = document.getElementById('gameHeader');
    box4.style.display = 'none';

    const finished = document.getElementById('finish');
    finished.style.display = 'block';
  }
  else {
    const box2 = document.getElementById('game2');
    box2.style.display = 'none';

    const box5 = document.getElementById('game3');
    box5.style.display = 'block';

    const box6 = document.getElementById('Game3Stats');
    box6.style.display = 'block'

    JogoIniciado = new Date();

    var random = getRandomArbitrary(3000, 7000);
    console.log("Tempo até o som aparecer: " + random);
    timeOut = setTimeout(mostraSom, random);
  }
}

function mostraSom() {
  createdTime = new Date();

  audio = new Audio('../sound/beep.mp3');
  audio.volume = 0.05;
  audio.play();

  document.getElementById("divbox3").style.display = 'block';
  document.getElementById("ClicouCedo3").innerHTML = "Click now!";
}

function divClickGame3() {
  cont++;
  clickedTime = new Date();
  reactionTime = (clickedTime - createdTime) / 1000;
  times.push(reactionTime);
  audio.pause();
  audio.currentTime = 0;

  console.log(times);
  console.log("O tempo de reação foi de -> " + reactionTime + "ms!");

  document.getElementById("ClicouCedo3").innerHTML = "Game 3<br>Click on the board as soon as your hear the sound!";
  const tryNo = document.getElementsByClassName("Try");
  if (cont == 7) {
    tryNo[6].innerHTML = "1º try: " + reactionTime + "ms";
    tryNo[15].innerHTML = "1º try: " + reactionTime + "ms";
  }
  else if (cont == 8) {
    tryNo[7].innerHTML = "2º try: " + reactionTime + "ms";
    tryNo[16].innerHTML = "2º try: " + reactionTime + "ms";
  }
  else if (cont == 9) {
    tryNo[8].innerHTML = "3º try: " + reactionTime + "ms";
    tryNo[17].innerHTML = "3º try: " + reactionTime + "ms";
  }

  document.getElementById("divbox3").style.display = 'none';
  makeSoundGame3();
}

function mudaClicouCedo3() {
  document.getElementById("ClicouCedo3").innerHTML = "Game 3<br>Click on the board as soon as your hear the sound!";
}

function demasiadoCedoGame3() {
  ClickCedo = new Date();

  if (ClickCedo - JogoIniciado != 0) { // Depois de o jogo é iniciado após se acertar na resposta, ClickCedo - JogoIniciado = 0, pois JogoIniciado > ClickCedo
    console.log("Clicou demasiado cedo.");

    document.getElementById("ClicouCedo3").innerHTML = "To soon!!!<br>Restarting...";
    setTimeout(mudaClicouCedo3, 2000);

    clearTimeout(timeOut);

    makeSoundGame3();
  }
}

function getRandomArbitrary(min, max) {
  return Math.random() * (max - min) + min;
}