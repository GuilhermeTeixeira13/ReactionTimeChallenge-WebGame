<?php
session_start();

if(isset($_SESSION['Username'])) {

?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <title>Reaction Time Challenge</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/game.css">
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyBKlv1WTb2TlKbEhNmGPoMhAQEcT3tchCk"></script>
</head>

<body>
  
  <div class="navbar">
    <a href="home.php" id="title">REACTION TIME CHALLENGE</a>
    <a id="userNameNavBar"> <?php echo $_SESSION['Username']; ?></a>
    <a  href="logout.php" id="logOutRef">LOG OUT</a>
  </div>


  <div class="main">

    <button onclick="makeboxGame1()" id="startGame1">
      <h1 id="textoPrinDoButton">REACTION TIME CHALLENGE
      </h1>
      <p class="textoSecDoButton">3 attempts in each of 3 different game modes</p>
      <p class="textoSecDoButton">Click anywhere to start.</p>
    </button>

    <div id="gameHeader">
      <div id="Game1Stats">
        <h2>Game 1</h2>
        <p><span class="Try">1º-><br></span></p>
        <p><span class="Try">2º-><br></span></p>
        <p><span class="Try">3º-><br></span></p>
      </div>
      <div id="Game2Stats">
        <h2>Game 2</h2>
        <p><span class="Try">1º-><br></span></p>
        <p><span class="Try">2º-><br></span></p>
        <p><span class="Try">3º-><br></span></p>
      </div>
      <div id="Game3Stats">
        <h2>Game 3</h2>
        <p><span class="Try">1º-><br></span></p>
        <p><span class="Try">2º-><br></span></p>
        <p><span class="Try">3º-><br></span></p>
      </div>
    </div>

    <div id="game1">
      <p id="ClicouCedo1">Game 1<br>Click on the figures as soon as you see them!</p>
      <div id="divgame1" onclick="demasiadoCedoGame1()">
        <div id="divbox1" onclick="divClickGame1()"></div>
      </div>
    </div>


    <div id="game2">
      <p id="ClicouCedo2">Game 2<br>Click on the board as soon as a new color appears!</p>
      <div id="divgame2" onclick="demasiadoCedoGame2()">
        <div id="divbox2" onclick="divClickGame2()"></div>
      </div>
    </div>


    <div id="game3">
      <p id="ClicouCedo3">Game 3<br>Click on the board as soon as your hear the sound!</p>
      <div id="divgame3" onclick="demasiadoCedoGame3()">
        <div id="divbox3" onclick="divClickGame3()"></div>
      </div>
    </div>


    <div id="finish">
      <table border="1" class="containertable">
        <tr>
          <td colspan="3">Game 1</td>
          <td colspan="3">Game 2</td>
          <td colspan="3">Game 3</td>
        </tr>
        <tr>
          <td class="Try"></td>
          <td class="Try"></td>
          <td class="Try"></td>
          <td class="Try"></td>
          <td class="Try"></td>
          <td class="Try"></td>
          <td class="Try"></td>
          <td class="Try"></td>
          <td class="Try"></td>
        </tr>
      </table>
      <div id="statsFinais">
        <h1>Average reaction time: </h1>
        <form action="../php/gravaRecord.php">
          <input type="text" id="avg" name="avg" value="" readonly><br><br>
          <input type="submit" class="submitButton" value="SUBMIT TO RECORDS">
          <p id="advice">(The submission won't work if you are not logged in.)</p>
        </form>
      </div>
    </div>

    <div id="infos">
      <div id="AboutTheTest">
        <h3>About the test</h3>
        <div id="AbouttestText">
          <p>This is a simple tool to measure your reaction time.</p>
          <p>In addition to measuring your reaction time, this test is affected by the latency of your computer and monitor. Using a fast computer and low latency / high framerate monitor will improve your score.</p>
          <p>This test consists of a series of 3 games, in which you will have 3 attempts in each one.</p>
          <p>In the first one, you will have to click on the figure that appears on the screen.</p>
          <p>In the second, you will have to click on the canvas as soon as it changes color.</p>
          <p>In the third, you will have to click on the canvas as soon as you hear a sound.</p>
          <p>At the end of the test, you will get your average reaction time and you can submit it to our DataBase (if you are logged in).</p>
          <p>If you're time is among the best 10, it will apear in the "Records", otherwise you can check your ranking by clicking in "SHOW ALL TIMES".</p>
        </div>
      </div>
      <div id="Records">
        <h3>Records</h3>
        <?php
          include "../html/db_conn.php";

          $getData = "SELECT Username, AvgTime, Localidade
                      FROM records
                      ORDER BY AvgTime ASC limit 10";

          $result = $conn->query($getData);
          if ($result->num_rows > 0) {
            echo "<table id='recordsTable'>";
            echo "<thead><tr><th>Ranking</th><th>Username</th><th>Average Time</th><th>Localidade</th></tr></thead>";
            echo "<tbody>";
            $x = 0;
            while($row = $result->fetch_assoc()) {
              if($x == 0)
                echo "<tr id='top1'><td>" . $x+1 . "º</td><td>" . $row["Username"]. "</td><td>" . $row["AvgTime"]. " ms</td><td>" . $row["Localidade"]. "</td></tr>";
              else if($x == 1)
                echo "<tr id='top2'><td>" . $x+1 . "º</td><td>" . $row["Username"]. "</td><td>" . $row["AvgTime"]. " ms</td><td>" . $row["Localidade"]. "</td></tr>"; 
              else if($x == 2)
                echo "<tr id='top3'><td>" . $x+1 . "º</td><td>" . $row["Username"]. "</td><td>" . $row["AvgTime"]. " ms</td><td>" . $row["Localidade"]. "</td></tr>";   
              else
                echo "<tr><td>" . $x+1 . "º</td><td>" . $row["Username"]. "</td><td>" . $row["AvgTime"]. " ms</td><td>" . $row["Localidade"]. "</td></tr>"; 
              $x += 1;
            }
            echo "</tbody>";
            echo "</table>";
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
        <form action="../php/pdf.php" method="POST">
          <button type="submit" class="RecordsButton">SHOW ALL TIMES</button>
        </form> 
      </div>
    </div>
  </div>

  <h7 id="playingFrom"></h7>

  <script src="../js/localiza.js"></script>
  <script src="../js/game1.js"></script>
  <script src="../js/game2.js"></script>
  <script src="../js/game3.js"></script>
</body>

</html>

<?php
}else {
    header("Location: game.php");
    exit();
}

?>