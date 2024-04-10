<?php
    session_start();
    include "include/Requette.php";

    if (!isset($_SESSION["log"])){
        header("Location:authen.php");
    }

    if (isset($_POST["submitphoto"])) {
        $photo = "photos/" . basename($_FILES['photo']['name']);
    
        if ($_SESSION['niveau'] == '3eme') {
            (new Requette)->modifiphoto3a($_SESSION['id'],$photo);
            //$user = (new Exercrequettes)->listeInsc3()
        } elseif ($_SESSION['niveau'] == '4eme') {
            (new Requette)->modifiphoto4a($_SESSION['id'],$photo);
            //(new Exercrequettes)->modifphoto4($_SESSION['photo']);
        }
    
    
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            if ($_FILES['photo']['size'] <= 1000000) {
                $infosfichier = pathinfo($_FILES['photo']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg','JPG', 'png','PNG','JPEG', 'jpeg');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'photos/' . basename($_FILES['photo']['name']));
                        unlink($_SESSION["photo"]);
                        $_SESSION["photo"] = "photos/" . $_FILES["photo"]["name"];
                        header("location:modifierphoto.php?msg=ok");
                    // echo "L'image a bien été enregistrée !<br>";
                } else {
                    echo "Erreur :Extension non autorisée.<br>";
                }
            } else {
                echo "le fichier image est trop gros<br>";
            }
        } else {
            echo "Erreur  d'envoi de l'image<br>";
        }
       
    }





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Photo</title>
</head>

<body>
    <?php
        include('include/header.php');
        if(isset($_GET['msg']) && $_GET['msg'] == 'ok'){
            print'<div class="alert alert-success">
                Votre image a bien été modifiée
            </div>';
    }
    ?>

    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <h1 id="description">Modifier votre photo</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="file" class="form-control" name="photo" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submitphoto">Submit</button>
                <input type="reset" value="annuler" name="reset" class="btn btn-danger"><br><br>
                <a href="recap.php" class="btn btn-primary">Retour à votre Profile</a>
            </form>
        </div>
    </div>

</body>

</html>