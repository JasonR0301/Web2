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
                        $_SESSION["rouge"] = $row["rouge"];
                        $_SESSION["rouge"] = $_SESSION["rouge"] + 1;
                        $rouge = $_SESSION["rouge"];
                   }
                }

                $conn->query('SET NAMES utf8');
                $sql = "UPDATE events SET rouge='$rouge' WHERE id='$eventId'";
                $result = $conn->query($sql);
        }
    ?>
</body>
</html>