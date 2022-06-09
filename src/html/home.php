<?php
session_start();

if(isset($_SESSION['Id']) && isset($_SESSION['Username'])) {

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

  <!-- DIV LOGIN -->

  <div id="id01" class="loginmodal">
    <form method="post" class="loginmodal-content animate" action="login.php">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
          title="Close LoginModal">&times;</span>
        <img src="../img/imglogin/img_avatar2.png" alt="Avatar" class="avatar">
      </div>

      <div class="container1">
        <?php if(isset($_GET['error'])) { ?>
          <p style = "color: red;   background-color: #F2DEDE; color: red; padding: 10px; width: 97.4%; border-radius: 5px;" class = "error">  <?php  echo $_GET['error']; ?> </p>
        <?php } ?>
      

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <button type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me</label>
      </div>

      <div class="container">
        <button type="button" onclick="document.getElementById('id01').style.display='none'"
          class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>
  </div>

  <!-- DIV LOGIN -->

  <div id="id02" class="modal">
    <span onclick="document.getElementById('id02').style.display='none'" class="close"
      title="Close Modal">&times;</span>
    <formclass="modal-content" action="#">
      <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="email"><b>Username</b></label>
        <input type="text" placeholder="Enter Email" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
          <button type="button" onclick="document.getElementById('id01').style.display='none'"
            class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn">Sign Up</button>
        </div>
      </div>
      </form>
  </div>

  <script>
    // Get the modal
    var modal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>


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
        <p>Bla Bla Bla</p>
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