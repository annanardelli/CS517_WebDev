<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript" src="../scripts/login.js">
  </script>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
        .w3-sidebar {
          z-index: 3;
          width: 250px;
          top: 43px;
          bottom: 0;
          height: inherit;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-theme-l1">Welcome</a>
  </div>
</div>

<!-- Main content-->

  <!-- Login form content -->
  <div class="w3-container w3-padding-64">
    <h2>Survey Builder</h2>
    <h3>Log In or Create an Account</h3>
    <form method="post" action="login.php?action=login" onSubmit="return validateLogin(this)">
      <fieldset>
        <legend>Login:</legend>
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" value="" size="64"><br>
        <label for="password">Password: </label>
        <input type="password" name="password" value=""><br>
        <p><i><?= $message; ?></i></p>
        <hr>
        <input type="reset" value="Reset">&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Login">
      </fieldset>
    </form>
    <a href="../controllers/newaccount.php">Create Account</a>
  </div>


  <footer id="myFooter">
    <div class="w3-container w3-theme-l2 w3-padding-32">
      <h4>Monmouth University Computer Science Department</h4>
    </div>
    <div class="w3-container w3-theme-l1">
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  </footer>

<!-- END MAIN -->
</div>

</body>
</html>
