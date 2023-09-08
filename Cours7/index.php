<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConnectBD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php

        $_SESSION["connexion"] = true;
        echo "La connexion est réussie". $_SESSION["connexion"];

        $erreur = false;

        if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
    ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            Username : <input type="text" name="username">
                            <br>
                            <br>
                            Email : <input type="email" name="email">
                            <br>
                            <br>
                            Mot de passe : <input type="password" name="mdp">
                            <br>
                            <br>
                            <input type="submit">
                        </form>
                        <?php
        }

                            function test_input($data) {
                                $data = trim($data);
                                $data = addslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }
                        ?>
                    </div>
                </div>
            </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "POST";
            //Si on entre on est dans l'envoi du formulaire
            $user = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['mdp'];

            $password = sha1($password, false);
            //echo $password;

            //Vérifier si l'usager est dans la BD
                $servername = "localhost";
                $usernameDB = "root";
                $passwordDB = "root";
                $dbname = "connect";

            //Create connection
                $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
            //Check connection
                if ($conn->connect_error) {
                    die("Connection failed : " . $conn->connect_error);
                }

                $sql = "SELECT * FROM usagers WHERE user='$user' AND email='$email' AND password='$password'";
                //echo $sql;
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<h1>Connecté</h1>";
                    $_SESSION["connexion"] = true;
    ?>
                    <a href="index.php" class="btn btn-primary" id="retour">Retour au formulaire</a>
    <?php
                }
                else {
                    echo "<h2>Nom d'usager, email ou mdp incorrect</h2>";
                }
                $conn->close();
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>