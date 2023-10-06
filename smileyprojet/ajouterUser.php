<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouterUser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <form action="ajouterUser2.php" method="post">
                                Nom user:<input type="text" name="newUserName">
                                <br>
                                Mot de passe : <input type="text" name="newUserPassword">
                                <input type="submit" value="ajouter">
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
            ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>