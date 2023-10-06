<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventMod</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $eventIdModifier = $_SESSION["eventIdModifier"];

                $servername = "localhost";
                $usernameDB = "root";
                $passwordDB = "root";
                $dbname = "smiley";

                $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

                $newName = $_POST["newName"];
                $newLieu = $_POST["newLieu"];
                $newDate = $_POST["newDate"];
                $newDept = $_POST["newDept"];
                $newVert = $_POST["newVert"];
                $newYellow = $_POST["newYellow"];
                $newRed = $_POST["newRed"];

                if ($conn->connect_error) {
                    die("Connection failed : " . $conn->connect_error);
                }
                $conn->query('SET NAMES utf8');
                $sql = "UPDATE events SET nom ='$newName', lieu='$newLieu', date='$newDate', dept='$newDept', vert='$newVert', jaune='$newYellow', rouge='$newRed' WHERE id='$eventIdModifier'";
                $result = $conn->query($sql);

                ?><button type="button" class="btn btn-light"><a href="index.php">Retour</a></button>
    <?php    
    }
    ?>
</body>
</html>