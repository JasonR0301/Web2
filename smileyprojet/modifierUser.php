<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["idUserModifier"])) {
                echo "Un id d'user est requis pour la modification";
                ?>
                <button type="button" class="btn btn-light"><a href="index.php">Retour</a></button>
                <?php
            }
            else {
                function test_input($data) {
                    $data = trim($data);
                    $data = addslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $userIdModifier = test_input($_POST["idUserModifier"]);
                $_SESSION["userIdModifier"] = $userIdModifier;

                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <form action="modifierUser2.php" method="post">
                                Nouveau nom user:<input type="text" name="newName">
                                <br>
                                <input type="submit" value="modifier">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <button type="button" class="btn btn-light"><a href="index.php">Retour</a></button>
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