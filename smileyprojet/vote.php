<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page De Vote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
            if (empty($_POST["idEvent"]))
            $_SESSION["eventId"] = $_POST["idEvent"];
            $eventIsGood = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //echo "POST";

            if (empty($_POST["idEvent"])) {
                echo "Un id d'event est requis";
                ?>
                <form action="index.php" method="post">
                    <input type="submit" value="Retour">
                </form>
                <?php
            }
            else {
                function test_input($data) {
                    $data = trim($data);
                    $data = addslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $eventId = test_input($_POST["idEvent"]);

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

                if ($result->num_rows < 1) {
                    ?> <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-12 my-5">
                                    <?php echo "Vous devez entrer un id d'event valide!" ?>
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-dark"><a href="index.php">Retour</a></button>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                else {
                    $eventIsGood = true;
                }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $eventIsGood == true) {
            ?>
                <div class="container">
                    <div class="row justify-content-center">
                        Veuillez-noter votre appréciation s'il vous plaît!
                        <br>
                        <br>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-4">
                            <form  action="phpVote/vert.php" method="post">
                                <input type="image" src="./img/vert.png" alt="Heureux" width="200" height="200">
                            </form>
                        </div>
                        <div class="col-xl-4 col-4">
                            <form  action="phpVote/jaune.php" method="post">
                                <input type="image" src="./img/yellow.png" alt="Neutre" width="200" height="200">
                            </form>
                        </div>
                        <div class="col-xl-4 col-4">
                            <form  action="phpVote/rouge.php" method="post">
                                <input type="image" src="./img/red.png" alt="Mauvaise" width="200" height="200">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <br>
                            <br>
                            <a href="index.php" class="btn btn-primary">Retour</a>
                        </div>
                    </div>
                </div>
                <?php        
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>