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

                $newDate = $_POST["newEventDate"];
                $newNom = $_POST["newEventName"];
                $newLieu = $_POST["newEventLieu"];
                $newDept = $_POST["newEventDpt"];

                if ($conn->connect_error) {
                    die("Connection failed : " . $conn->connect_error);
                }
                $conn->query('SET NAMES utf8');
                $sql = "INSERT INTO `events` (`id`, `date`, `lieu`, `nom`, `dept`, `vert`, `jaune`, `rouge`) VALUES (NULL, '$newDate', '$newLieu', '$newNom', '$newDept', '0', '0', '0')";
                $result = $conn->query($sql);

                ?>
                <button type="button" class="btn btn-light"><a href="index.php">Retour</a></button>
        <?php
        }
    ?>
</body>
</html>