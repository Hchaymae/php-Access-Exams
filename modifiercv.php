<?php
    session_start();
    include "include/Requette.php";


    if (!isset($_SESSION["log"])){
        header("Location:authen.php");
    }

    if (isset($_POST["submitcv"])) {
        $cv = "cvs/" . basename($_FILES['cv']['name']);
    
        if ($_SESSION['niveau'] == '3eme') {
            (new Requette)->modifiCV3a($_SESSION['id'],$cv);
            //$user = (new Exercrequettes)->listeInsc3()
        } elseif ($_SESSION['niveau'] == '4eme') {
            (new Requette)->modifiCV4a($_SESSION['id'],$cv);
            //(new Exercrequettes)->modifphoto4($_SESSION['photo']);
        }
    
    
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
            if ($_FILES['cv']['size'] <= 1000000) {
                $infosfichier = pathinfo($_FILES['cv']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('pdf','PDF');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    move_uploaded_file($_FILES['cv']['tmp_name'], 'cvs/' . basename($_FILES['cv']['name']));
                    // echo "Le cv a bien été enregistrée !<br>";        
                    unlink($_SESSION["cv"]);
                    $_SESSION["cv"] = "cvs/" . $_FILES["cv"]["name"];
                    header("location:modifiercv.php?msg=ok");
                } else {
                    echo "Erreur :Extension non autorisée.<br>";
                }
            } else {
                echo "le fichier cv est trop gros<br>";
            }
        } else {
            echo "Erreur  d'envoi de cv<br>";
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
    ?>

    <?php
            if(isset($_GET['msg']) && $_GET['msg']=='ok'){
                    print'<div class="alert alert-success">
                        Votre CV a bien été modifiée
                    </div>';
            }
        ?>

    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <h1 id="description">Modifier votre CV</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="file" class="form-control" name="cv" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submitcv">Submit</button>
                <input type="reset" value="annuler" name="reset" class="btn btn-danger"><br><br>
                <a href="recap.php" class="btn btn-primary">Retour à votre Profile</a>
            </form>

        </div>
    </div>

</body>

</html>