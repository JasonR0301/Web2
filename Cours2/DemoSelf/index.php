<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Héro Self</title>
</head>
<body>
    <?php
        //On crée les variables vides
        $nom = $image = "";

        //On crée les variables d'erreurs vides
        $nomErreur = "";

        //La variabe qui dit s'il y a erreurs
        $erreur = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "POST";
            //Si on entre, on est dans l'envoi du formulaire

            if(empty($_POST["nom"])){
                $nomErreur = "Le nom est requis";
                $erreur = true;
            }
            else {
                $nom = test_input($_POST["nom"]);
            }
            $nom = test_input($_POST["nom"]);
            $image = test_input($_POST["image"]);

            //Insérer dans la BD
            //Si erreurs, on réaffiche le formulaire
        }
        if($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
            echo "Erreur ou 1ère fois";
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Nom : <input type="text" name="nom">
        <span style="color:red";><?php echo $nomErreur;?></span><br>
        <br>
        Image : <input type="text" name="image"><br>
        <br>
        <input type="submit">
    </form>
    <?php
        }

        function test_input($data){
            $data = trim($data);
            $data = addslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    
</body>
</html>