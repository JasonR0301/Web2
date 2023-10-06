<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoteEnregistre</title>
</head>
<body>
    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            function test_input($data) {
                    $data = trim($data);
                    $data = addslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $eventId = test_input($_SESSION["eventId"]);


                $servername = "localhost";
                $usernameDB = "root";
                $passwordDB = "root";
                $dbname = "smiley";

                $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed : " . $conn->connect_error);
                }

                $conn->query('SET NAMES utf8');
                $sql = "SELECT * FROM events WHERE id='$eventId'";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                        $_SESSION["jaune"] = $row["jaune"];
                        $_SESSION["jaune"] = $_SESSION["jaune"] + 1;
                        $jaune = $_SESSION["jaune"];
                   }
                }

                $conn->query('SET NAMES utf8');
                $sql = "UPDATE events SET jaune='$jaune' WHERE id='$eventId'";
                $result = $conn->query($sql);
        }
    ?>
</body>
</html>