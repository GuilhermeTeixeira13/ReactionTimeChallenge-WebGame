<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/sign.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

    <title>Registration Form Using HTML5 and CSS3</title>
</head>
<body>

    <div class="signup-form">
        <img src="../img/user.png" >
        <form action="signup-check.php" method="post">
        <?php if(isset($_GET['error'])) { ?>
          <p style = "color: red;   background-color: #F2DEDE; color: red; padding: 10px; width: 97.4%; border-radius: 5px;" class = "error">  <?php  echo $_GET['error']; ?> </p>
        <?php } ?>
        <?php if(isset($_GET['success'])) { ?>
          <p style = "color: rgb(0,128,0);  background-color: rgb(50,205,50); padding: 10px; width: 97.4%; border-radius: 5px;" class = "error">  <?php  echo $_GET['success']; ?> </p>
        <?php } ?>
            <input type="text" placeholder=" Username" class="txt" name="username">
            <input type="password" placeholder=" Password" class="txt" name="psw">
            <input type="password" placeholder=" Confirm Password" class="txt" name="psw-repeat">
            <input type="submit" value="Create a Account" class="btn" name="btn-save">
            <a href="loginpage.php"> Already Have a Account</a>
            <a style = "color: red;" href="game.php">Cancel</a>
        </form>
    </div>
    
</body>
</html>