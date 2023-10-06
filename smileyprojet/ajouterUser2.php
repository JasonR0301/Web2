<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AjoutEnCours</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $servername = "localhost";
                $usernameDB = "root";
                $passwordDB = "root";
                $dbname = "smiley";

                $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

                $newName = $_POST["newUserName"];
                $newPassword = $_POST["newUserPassword"];

                if ($conn->connect_error) {
                    die("Connection failed : " . $conn->connect_error);
                }
                $conn->query('SET NAMES utf8');
                $sql = "INSERT INTO `users` (`idUser`, `username`, `password`) VALUES (NULL, '$newName', SHA1('$newPassword'))";
                $result = $conn->query($sql);

                ?>
                <button type="button" class="btn btn-light"><a href="index.php">Retour</a></button>
        <?php
        }
    ?>
</body>
</html>