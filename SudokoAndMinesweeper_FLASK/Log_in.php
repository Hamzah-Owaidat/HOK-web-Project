<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="css/css_Log_in.css">
    <title>Log in</title>
</head>
<body>
    <font id="title">Mind Games</font><br>
    <div class="box_of_logIn">
    <font id="logintext">Log in</font><br><br>
    <?php
         $name = $pass = "";
        if (isset($_POST["Log_in"])) {
            require("dataBase$.php");
            $name = $_POST["name"];
            $pass = $_POST["pass"];
            $select = "SELECT * FROM users WHERE pass = '$pass' AND name = '$name'";
            $result = mysqli_query($con, $select);
            if (mysqli_num_rows($result) > 0) {
                $Home ="Home$.php";
                header("Location: $Home");
            }
            else {
                echo"<font color='red'>The name or password is incorrect</font>";
            }
        }    
    ?>
    <br>
    <form method="post" action="Home$.php">
    <input type="text" class="x" id="text_box" name = "name" placeholder="Name" value="<?php echo($name) ?>"></input><br>
    <input type="password" id="text_box" name = "pass" placeholder="Password" value="<?php echo($pass) ?>"></input><br>
    <input id="button" name="Log_in" type="submit" value="Log in"><br>
    </form>
    <a href = "Create_account.php">Create a new account</a href>
    </div>
</body>
</html>
 