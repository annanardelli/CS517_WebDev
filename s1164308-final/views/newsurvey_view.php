<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="../scripts/newsurvey.js">
  </script>
    <title>Create an Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        legend {
            font-weight: bold;
            font-size: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: #ccc;
            margin: 15px 0;
        }

        input[type="reset"],
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="reset"] {
            background-color: #ccc;
            margin-right: 10px;
        }

        input[type="reset"]:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #4caf50;
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="home.php" class="w3-bar-item w3-button w3-theme-l1">Home</a>
    <a href="surveys.php" class="w3-bar-item w3-button w3-theme-l1">Surveys</a>
    <a href="surveyresponseslist.php" class="w3-bar-item w3-button w3-theme-l1">Survey Responses</a>
    <a href="../controllers/login.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Log Out</a>
  </div>
</div>

    <?= $message ?>

    <form method="post" action="newsurvey.php?action=add" onSubmit="return validate(this)">
        <fieldset>
            <legend>Create a New Survey:</legend>
            <label for="name">Survey Name:</label>
            <input type="text" id="name" name="name" value="">
            <hr>

            <input type="reset" value="Reset">
            <input type="submit" value="Add">
        </fieldset>
    </form>

    <form method="post" action="newsurvey.php?action=addQuestion" onSubmit="return validateQuestion(this)">
        <fieldset>
            <legend>Add Question:</legend>
            <label for="name">Question:</label>
            <input type="text" id="question_text" name="question_text" value="">

            <label for="yesNoCheckbox">Required:</label>
            <input type="checkbox" name="is_required" id="is_required" value="yes">
            <label for="yesNoCheckbox">Yes</label>
            <hr>

            <input type="reset" value="Reset">
            <input type="submit" value="Add">
        </fieldset>
    </form>
</body>

</html>