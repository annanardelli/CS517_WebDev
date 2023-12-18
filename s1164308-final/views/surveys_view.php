<!DOCTYPE html>
<html lang="en">
<head>
    <title>Surveys</title>
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
    <a href="home.php" class="w3-bar-item w3-button w3-theme-l1">Home</a>
    <a href="newsurvey.php" class="w3-bar-item w3-button w3-theme-l1">New Survey</a>
    <a href="surveyresponseslist.php" class="w3-bar-item w3-button w3-theme-l1">Survey Responses</a>
    <a href="../controllers/login.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Log Out</a>
  </div>
</div>

  <!-- Surveys content -->
  <div class="w3-container w3-padding-64">
    <table width='100%'>
      <tr>
        <td align='left'>Surveys</td>
      </tr>
    </table>
    <table width='100%' border="1">
      <tr><th>Survey Title</th><th>Link</th></tr>
      <?php
        foreach ($surveys as $survey) {
          echo '<tr><td>' . $survey['survey_name'] . '</td>';
          echo '<td><a href="survey.php?survey_id=' . $survey['survey_id'] . '">Take Survey</a></td>';
        }
      ?>
    </table>
    <p>Total: <?php echo sizeof($surveys) ?></p>
    <hr>
    <p><i><?php echo $message; ?></i></p>
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
