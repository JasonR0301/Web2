<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DbExercice</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "jay";
        $password = "gamer0301";
        $db = "joueurs";
        //Create connection
            $conn = new mysqli( $servername, $username, $password, $db );
        //Check connection
            if($conn->connect_error) {
                die( "Connectionfailed:".$conn->connect_error );
        }
        echo "Connected successfully";

        $sql = "SELECT id, nom, numero, age, ppg FROM joueurs";
        $result = $conn->query($sql);
        if ($result -> num_rows > 0) {
        //output data of each row
            while ($row = $result->fetch_assoc()) {
            echo "id: ".$row["id"]. " - Nom: " . $row["nom"]. " - Numero: " . $row["numero"]. " - Age: " . $row["age"]. " - PPG: " . $row["ppg"]."<br>";
        }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>

</body>
</html>