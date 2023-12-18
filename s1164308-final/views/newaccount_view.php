<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="../scripts/newaccount.js">
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
    <?= $message ?>

    <form method="post" action="newaccount.php?action=add" onSubmit="return validate(this)">
        <fieldset>
            <legend>Create Account:</legend>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="">
            <label for="email">Email:</label>
            <input type="text" name="email" value="">
            <label for="password">Password:</label>
            <input type="password" name="password" value="">

            <hr>

            <input type="reset" value="Reset">
            <input type="submit" value="Add">
        </fieldset>
    </form>

    <a href="../controllers/login.php">Main</a>
</body>

</html>

