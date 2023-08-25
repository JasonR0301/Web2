<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Usager</title>
</head>

<body>
    <?php
        //On crée les variables vides
            $nom = $mdp = $confirmation = $email = $avatar = $sexe = $date = $transport = "";

        //On crée les variables d'erreurs vides
            $nomErreur = $mdpErreur = $confirmationErreur = $emailErreur = $avatarErreur = $sexeErreur = $dateErreur = $transportErreur = "";

        //Les variables qui disent s'il y a des erreurs
            $erreur = $nomGood = $mdpGood = $confirmationGood = $emailGood = $avatarGood = $sexeGood = $dateGood = $transportGood = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "POST/";
            //Si on entre, on est dans l'envoi du formulaire

            if (empty($_POST["nom"])) {
                $nomErreur = "Le nom est requis";
                $erreur = true;
            } elseif (strtolower($_POST["nom"]) == "slay") {
                $nomErreur = "Le nom n'est pas disponible.";
                $erreur = true;
            } else {
                $nom = test_input($_POST["nom"]);
                $nomGood = true;
            }
            if (empty($_POST["mdp"])) {
                $mdpErreur = "Un mot de passe est requis";
                $erreur = true;
            } else {
                $mdp = test_input($_POST["mdp"]);
                $mdpGood = true;
            }
            if (empty($_POST["confirmation"])) {
                $confirmationErreur = "La confirmation du mdp est requise";
                $erreur = true;
            } elseif ($_POST["confirmation"] != $_POST["mdp"]) {
                $confirmationErreur = "La confirmation du mdp doit être la même chose que le mdp";
                $erreur = true;
            } else {
                $confirmation = test_input($_POST["confirmation"]);
                $confirmationGood = true;
            }
            if (empty($_POST["email"])) {
                $emailErreur = "L'email est requis";
                $erreur = true;
            } else {
                $email = test_input($_POST["email"]);
                $emailGood = true;
            }
            if (empty($_POST["avatar"])) {
                $avatarErreur = "L'avatar est requis";
                $erreur = true;
            } else {
                $avatar = test_input($_POST["avatar"]);
                $avatarGood = true;
            }
            if (empty($_POST["sexe"]) || $_POST["sexe"] == "") {
                $sexeErreur = "Le sexe est requis";
                $erreur = true;
            } else {
                $sexe = test_input($_POST["sexe"]);
                $sexeGood = true;
            }
            if (empty($_POST["date"])) {
                $dateErreur = "La date est requise";
                $erreur = true;
            } else {
                $date = test_input($_POST["date"]);
                $dateGood = true;
            }
            if (empty($_POST["transport"])) {
                $transportErreur = "Le moyen de transport est requis";
                $erreur = true;
            } elseif ($_POST["transport"] == "Default") {
                $transportErreur = "Le moyen de transport est requis";
                $erreur = true;
            } else {
                $transport = test_input($_POST["transport"]);
                $transportGood = true;
            }

            //Insérer dans la BD
            //Si erreurs, on réaffiche le formulaire
        }
        if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
            echo "Erreur ou 1ère fois";
    ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            Nom : <input type="text" name="nom">
                            <span style="color:red" ;><?php echo $nomErreur; ?></span>
                            <br>
                            <br>
                            Mot de passe : <input type="password" name="mdp">
                            <span style="color:red" ;><?php echo $mdpErreur; ?></span>
                            <br>
                            <br>
                            Confirmation du mot de passe : <input type="password" name="confirmation">
                            <span style="color:red" ;><?php echo $confirmationErreur; ?></span>
                            <br>
                            <br>
                            Email : <input type="email" name="email">
                            <span style="color:red" ;><?php echo $emailErreur; ?></span>
                            <br>
                            <br>
                            Avatar : <input type="text" name="avatar">
                            <span style="color:red" ;><?php echo $avatarErreur; ?></span>
                            <br>
                            <br>
                            Sexe : Homme<input type="radio" name="sexe" value="Homme"> Femme<input type="radio" name="sexe" value="Femme"> Non-Genré<input type="radio" name="sexe" value="Non-Genré">
                            <span style="color:red" ;><?php echo $sexeErreur; ?></span>
                            <br>
                            <br>
                            Date : <input type="date" name="date">
                            <span style="color:red" ;><?php echo $dateErreur; ?></span>
                            <br>
                            <br>
                            Transport : <select name="transport">
                                            <option value="Default"></option>
                                            <option value="Auto">Auto</option>
                                            <option value="Autobus">Autobus</option>
                                            <option value="Marche">Marche</option>
                                            <option value="Vélo">Vélo</option>
                                        </select>
                            <span style="color:red" ;><?php echo $transportErreur; ?></span>
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
        if ($_SERVER["REQUEST_METHOD"])
</body>

</html>