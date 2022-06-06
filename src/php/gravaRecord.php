<?php
    session_start();
    $cit = $_COOKIE["cid"];
    $average = $_COOKIE["avg"];

    if(isset($_SESSION['Username']) && isset($cit) && isset($average)){
      //Gravar para a BD
              
      //echo "<p>".$cit."</p>";
      //echo "<p>".$average."</p>";
      //echo $_SESSION['Username'];

      include "../html/db_conn.php";

      $fieldVal1 = mysqli_real_escape_string($conn, $_SESSION['Username']);
      $fieldVal2 = mysqli_real_escape_string($conn, $average);
      $fieldVal3 = mysqli_real_escape_string($conn, $cit);

      $inserirRecord = "INSERT INTO records (Username, AvgTime, Localidade)
      VALUES ('$fieldVal1', '$fieldVal2', '$fieldVal3')";

      mysqli_query($conn, $inserirRecord);

      $conn->close();
    }else{
      echo "<p>Não gravei nada</p>";
    }
?>