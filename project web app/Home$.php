<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\css_Home.css">
    <title>Home</title>
</head>
<body>
<?php
    require("header.php");
?>
<div class="homhead">
    <?php
        require("dataBase$.php");
        $name = $_POST["name"];
        $pass = $_POST["pass"];
    ?>
<div id="sudoku"><div id="hover"><a  href="http://127.0.0.1:5000/Sudoku">play now</a><p id="cap">SUDOKU</p></div></div>
<div id="Minesweeper"><div id="hover"><a href="http://127.0.0.1:5000/Minesweeper">play now</a><p id="cap">MINESWEEPER</p></div></div>
</div>
</body>
</html>