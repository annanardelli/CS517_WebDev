<!DOCTYPE html>
<html lang="en">
<head>
<title>Survey Builder</title>
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
    <a href="#" class="w3-bar-item w3-button w3-theme-l1"></a>
    <a href="../controllers/surveys.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Surveys</a>
    <a href="../controllers/newsurvey.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">New Survey</a>
    <a href="../controllers/surveyresponseslist.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Survey Responses</a>
    <a href="../controllers/login.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Log Out</a>
  </div>
</div>

<!-- Main content-->

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Survey Builder</h1>
      <p>Welcome to the Survey Builder! Here you can respond to surveys, create surveys of your own, and view others'
      responses to your surveys.</p>
      <p>Click an option from the bar above to begin.</p>
    </div>
  </div>
  <img src="../images/survey.jpeg" width="300" style="margin-left: 50px"> </img>
  <div class="w3-row">
    <div class="w3-twothird w3-container">
      <h2 class="w3-text-teal">About the Project</h2>
      <p>This project was created by Anna Nardelli using php, mySQL, CSS, and JavaScript.
        It is the final project for CS517: Engineering Web-Based Systems at Monmouth University.
        This course was taken in the Fall 2023 Semester.</p>
    </div>

    <div class="w3-row">
    <div class="w3-row">
    <div class="w3-row">
    <div class="w3-twothird w3-container">
      <h2 class="w3-text-teal">About the Creator</h2>
      <p>Anna Nardelli is a student at Monmouth University. After graduating in May 2023
        with a Bachelors of Computer Science, she is currently pursuing a Masters of Computer Science
        and is expected to graduate in May 2024. After graduation, Anna wants to pursue a career in
        machine learning.</p>
      <h4 class="w3-text-teal">Connect with Anna</h4>
      <a href="https://github.com/annanardelli" class="w3-bar-item w3-button w3-hide-small w3-hover-white">GitHub</a>
      <a href="https://www.linkedin.com/in/anna-nardelli/" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Linkedin</a>
    </div>
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