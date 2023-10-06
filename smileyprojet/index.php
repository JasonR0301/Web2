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

        $mdp = $name = "";

        $erreur = $nomGood = $mdpGood = false;

        $userErreur = $mdpErreur = $connErreur = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //echo "POST";

            if (empty($_POST["username"])) {
                $userErreur = "Un username est requis";
                $erreur = true;
            }
            else {
                $name = test_input($_POST["username"]);
                $nomGood = true;
            }
            if (empty($_POST["mdp"])) {
                $mdpErreur = "Le mot de passe est requis";
                $erreur = true;
            }
            else {
                $mdp = test_input($_POST["mdp"]);
                $mdpGood = true;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
    ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-12 mx-5 my-5">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            Utilisateur : <input type="text" name="username" value=<?php echo $name ?>>
                            <span style="color:red" ;><?php echo $userErreur; ?></span>
                            <br>
                            <br>
                            Mot de passe : <input type="password" name="mdp">
                            <span style="color:red" ;><?php echo $mdpErreur; ?></span>
                            <br>
                            <br>
                            <span style="color:red" ;><?php echo $connErreur; ?></span>
                            <br>
                            <input type="submit" value="Connexion">
                        </form>
                    </div>
                </div>
            </div>
                        <?php
        }

                            function test_input($data) {
                                $data = trim($data);
                                $data = addslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }
                        ?>
               
    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST" && $nomGood == true && $mdpGood == true) {

            $_SESSION["connecter"] = "oui";
            //Si on entre on est dans l'envoi du formulaire
            $user = $name;
            $password = $mdp;

            $password = sha1($password, false);
            //echo $password;

            //Vérifier si l'usager est dans la BD
                $servername = "localhost";
                $usernameDB = "root";
                $passwordDB = "root";
                $dbname = "smiley";

            //Create connection
                $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
            //Check connection
                if ($conn->connect_error) {
                    die("Connection failed : " . $conn->connect_error);
                }

                $conn->query('SET NAMES utf8');
                $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
                //echo $sql;
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $_SESSION["connexion"] = true;

                    $conn->query('SET NAMES utf8');
                    $sql = "SELECT * FROM events";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        
                            ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-12 col-12 mx-5 my-5">
                                        <h1>Liste des évênements</h1>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                                        echo "id: ".$row["id"]. " - Nom: " . $row["nom"]. " - Date: " . $row["date"]. " - Lieu: " . $row["lieu"]. " - Departement: " . $row["dept"]. " - Vert: " . $row["vert"]. " - Jaune: " . $row["jaune"]. " - Rouge: " . $row["rouge"]. "<br>"; }?>
                                        <form action="vote.php" method="post">
                                            Entrer un id d'évênement pour voter <input type="number" name="idEvent">
                                            <input class="mx-2" type="submit" value="Valider">
                                        </form>
                                        <br>
                                        <form action="modifier.php" method="post">
                                            Entrer un id d'évênement pour modifier <input type="number" name="idEventModifier">
                                            <input class="mx-2" type="submit" value="Valider">
                                        </form>
                                        <br>
                                        <form action="ajouterEvent.php" method="post">
                                                Cliquer ici pour un ajout d'évênement : <input type="submit" value="ajouterEvent">
                                        </form>
                                        <br>
                                        <form action="supprimerEvent.php" method="post">
                                            Entrer un id d'évênement pour supprimer <input type="number" name="idEventSupprimer">
                                            <input class="mx-2" type="submit" value="Valider">
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-12 mx-5 my-5">
                                        <h1>Liste des usagers</h1>
                            <?php       
                                        $conn->query('SET NAMES utf8');
                                        $sql = "SELECT * FROM users";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "id: ".$row["idUser"]. " - Username: " . $row["username"]. "<br>";
                                                }?>
                                                <br>
                                                <form action="modifierUser.php" method="post">
                                                    Entrer un id d'usager pour modifier <input type="number" name="idUserModifier">
                                                    <input class="mx-2" type="submit" value="Valider">
                                                </form>
                                                <br>
                                                <form action="ajouterUser.php" method="post">
                                                    Cliquer ici pour ajouter un utilisateur : <input type="submit" value="ajouterUser">
                                                </form>
                                                <br>
                                                <form action="supprimerUser.php" method="post">
                                                    Entrer un id d'utilisateur pour supprimer <input type="number" name="idUserSupprimer">
                                                    <input class="mx-2" type="submit" value="Valider">
                                                </form>
                                            <?php
                                            
                                        }
                            ?>
                                    </div>
                                </div>
                            </div>
                            <!--echo "id: ".$row["id"]. " - Nom: " . $row["nom"]. " - Date: " . $row["date"]. " - Lieu: " . $row["lieu"]. " - Departement: " . $row["dept"]. " - Vert: " . $row["vert"]. " - Jaune: " . $row["jaune"]. " - Rouge: " . $row["rouge"]. "<br><br>";-->
    <?php
                        
    ?>
                        <!--<form action="<#php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            Entrer un id d'évênement <input type="number" name="idEvent">
                            <br>
                            <br>
                            <input type="submit" value="Valider">
                        </form>
                        <br>-->
    <?php
                    }

                    $_SESSION["connexion"] = true;
                }
                else {
                    $connErreur = "Le mot de passe ou le nom d'usager est invalide";
                    ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-12 mx-5 my-5">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            Utilisateur : <input type="text" name="username" value=<?php echo $name ?>>
                            <span style="color:red" ;><?php echo $userErreur; ?></span>
                            <br>
                            <br>
                            Mot de passe : <input type="password" name="mdp">
                            <span style="color:red" ;><?php echo $mdpErreur; ?></span>
                            <br>
                            <br>
                            <span style="color:red" ;><?php echo $connErreur; ?></span>
                            <br>
                            <input type="submit" value="Connexion">
                        </form>
                    <?php
                }
                $conn->close();
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>