<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserMod</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $userIdModifier = $_SESSION["userIdModifier"];

                $servername = "localhost";
                $usernameDB = "root";
                $passwordDB = "root";
                $dbname = "smiley";

                $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

                $newName = $_POST["newName"];

                if ($conn->connect_error) {
                    die("Connection failed : " . $conn->connect_error);
                }
                $conn->query('SET NAMES utf8');
                $sql = "UPDATE users SET username ='$newName' WHERE idUser='$userIdModifier'";
                $result = $conn->query($sql);

                ?>
                <button type="button" class="btn btn-light"><a href="index.php">Retour</a></button>
        <?php
        }
    ?>
</body>
</html>