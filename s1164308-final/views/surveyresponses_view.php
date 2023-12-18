<!DOCTYPE html>
<html lang="en">
<head>
    <title>Survey Responses</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        body {
          font-family: "Roboto", sans-serif;
          background-color: #f1f1f1;
          color: #333;
        }
        h2 {
          background-color: #009688;
          color: #fff;
          padding: 10px;
          margin-top: 20px;
        }
        h3 {color: #009688;}
        ul {list-style-type: none;
          padding: 0;}
        li {margin-bottom: 5px;}
        p {color: #009688;}
    </style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="home.php" class="w3-bar-item w3-button w3-theme-l1">Home</a>
    <a href="surveys.php" class="w3-bar-item w3-button w3-theme-l1">Surveys</a>
    <a href="newsurvey.php" class="w3-bar-item w3-button w3-theme-l1">New Survey</a>
    <a href="surveyresponseslist.php" class="w3-bar-item w3-button w3-theme-l1">Survey Responses</a>
    <a href="../controllers/login.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Log Out</a>
  </div>
</div>

<!-- Survey Header -->
<h2><?php echo $survey_title ?></h2>

<!-- Responses Section -->
<div class="w3-container w3-padding-32">
<h3>Responses</h3>
<?php
foreach ($questions as $question) {
    $question_id = $question['question_id'];
    $question_text = $question['question_text'];

    echo "<h3>$question_text</h3>";
    
    // Check if responses exist for the current question
    if (isset($responses[$question_id])) {
        echo "<ul>";
        
        foreach ($responses[$question_id] as $response) {
            echo "<li>$response</li>";
        }

        echo "</ul>";
    } else {
        echo "<p>No responses for this question.</p>";
    }
}
?>
</div>
</body>
</html>

