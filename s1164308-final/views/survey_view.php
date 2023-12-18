<!DOCTYPE html>
<html lang="en">
<head>
    <title>Survey Form</title>
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
<body class="w3-light-grey">

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

    <div class="w3-container w3-teal">
        <h2 style="margin-top: 20px;"><?=$survey_title ?></h2>
    </div>

    <div class="w3-container w3-padding">
        <form method='post' action='survey.php' class="w3-container w3-card-4 w3-white">
            <fieldset>
                <legend class="w3-teal">Questions:</legend>

                <?php foreach ($questions as $question) : ?>
                    <div class="w3-row w3-margin">
                        <label for="question<?= $question['question_id'] ?>" class="w3-col s12 m6 l4 w3-padding-small">
                            <?= $question['question_text']; ?>
                        </label>
                        <?php if ($question['question_type'] == 'text'): ?>
                            <textarea id="question<?= $question['question_id'] ?>" name="responses[<?= $question['question_id'] ?>]" class="w3-input w3-col s12 m6 l8" rows="1" cols="50"></textarea>
                        <?php elseif ($question['question_type'] == 'checkbox'): ?>
                            <?php foreach ($question['choices'] as $choice): ?>
                                <input type="checkbox" id="choice<?= $choice['choice_id'] ?>" name="responses[<?= $question['question_id'] ?>][]" value="<?= $choice['choice_text'] ?>" class="w3-check w3-col s12 m6 l4">
                                <label for="choice<?= $choice['choice_id'] ?>" class="w3-col s12 m6 l8"><?= $choice['choice_text'] ?></label>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Add other input types based on question type (e.g., radio) -->
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

            </fieldset>

            <div class="w3-margin-top">
                <input type="submit" value="Submit Survey" class="w3-button w3-teal">
            </div>
            <p><?php $message ?></p>
        </form>
    </div>

</body>
</html>



