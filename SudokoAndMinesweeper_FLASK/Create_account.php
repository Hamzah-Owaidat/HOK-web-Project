<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/css_Log_in.css">
    <title>Create_account</title>
</head>
<body>
    <font id="title">Mind Games</font><br>
    <div class="box_of_logIn">
    <font id="logintext">Create a new account</font><br><br>
    <?php
        $name = $email = $pass ="";
        if (isset($_POST["create"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            require("dataBase$.php");
            $select = "SELECT 1 FROM users WHERE name ='$name'";
            $result = mysqli_query($con, $select);
            if ($name == "" || $email == "" || $pass == "") {
                echo"<font color='red'>A field cannot be left empty</font>";
            } elseif(mysqli_num_rows($result) > 0){
                echo"<font color='red'>This name is already taken,<br> please change it</font>";
                $name = "";
            } elseif(strlen($pass) < 7){
                echo"<font color='red'>The password must consist of<br> at least 7 characters</font>";
            } else {
                $insert = "INSERT INTO users (name, pass, email) VALUES ('$name', '$pass', '$email')";
                mysqli_query($con, $insert);
                $Home = "Home$.php";
                header("Location: $Home");
            }
        }
    ?>
    <form method="post">
        <input type="text" class="x" id="text_box" name="name" placeholder="Name" value="<?php echo($name) ?>"><br>
        <input type="email"id="text_box" name="email"   placeholder="Email Adress" value="<?php echo($email) ?>"><br>
        <input type="password"id="text_box" name="pass" placeholder="New Password" value="<?php echo($pass) ?>"><br>
        <input id="button" name="create" type="submit" value="Sign Up"><br>
    </form>
    </div>
</body>
</html>