<?php

require('include/Requette.php');
// require_once 'phpmailer/mail.php';

session_start();

if(isset($_SESSION['log'])){ // connectee
    header("Location:recap.php");
}

if(isset($_POST['submit'])){
        
    $prenom = $_POST['prenom'];
    $nom =  $_POST['nom'];
    $naissance =  $_POST['naissance'];
    $diplome =  $_POST['diplome'];
    echo $diplome;
    $niveau =  $_POST['niveau'];
    $etablissement =  $_POST['etablissement'];
    $email =  $_POST['email'];
    $log =  $_POST['log'];
    $mdp = $_POST['mdp'];
    @$liencv = 'cvs/'.$_FILES['cv']['name'];
    @$lienphoto =  'photos/'.$_FILES['photo']['name'];

    $check = (new Requette)->checketud($email,$log,$niveau);
    

    if(is_array($check) && count($check)>0){
        header('location:inscription.php?erreur=duplicate');
    }else{
         if ($niveau == "3eme"){
        $result = (new Requette)->ajout_etud3a($nom, $prenom, $email, $naissance, $diplome, $niveau, $etablissement, $lienphoto, $liencv,
        $log, $mdp);
        // header('location:inscription.php?msg=ok');
        if($result){
            $code = rand(100000,999999);
            $_SESSION['code'] = $code;
            $_SESSION['email'] = $email;
            require "PHPMailer/PHPMailerAutoload.php";
    
            $mail = new PHPMailer;
        
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
        
            $mail->Username='hamdounechaymae@gmail.com';
            $mail->Password='dbluhjwpojjpftol';
        
            $mail->setFrom('hamdounechaymae@gmail.com', 'Account Verification');
            $mail->addAddress($email);
        
            $mail->isHTML(true);
            $mail->Subject="Votre code de verification";
            $mail->Body="<p>Chèr(e) $prenom , </p> <h3>Votre code de vérification :  $code <br></h3>
            <br><br>
            <p>Cordialement</p>
            <b>Concours</b>";
        
                    if(!$mail->send()){
                        ?>
<script>
alert("<?php echo "Inscription impossible, E-mail invalide "?>");
</script>
<?php
                                    }else{
                                        ?>
<script>
alert("<?php echo "Inscription avec succès, Code de vérification envoyé à " . $email ?>");
window.location.replace('verification.php');
</script>
<?php
                    }
        }

        } else{
        $result= (new Requette)->ajout_etud4a($nom, $prenom, $email, $naissance, $diplome, $niveau, $etablissement, $lienphoto, $liencv,
        $log, $mdp);
        // header('location:inscription.php?msg=ok');
        if($result){
            $code = rand(100000,999999);
            $_SESSION['code'] = $code;
            $_SESSION['email'] = $email;
            require "PHPMailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;
        
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
        
            $mail->Username='hamdounechaymae@gmail.com';
            $mail->Password='dbluhjwpojjpftol';
        
            $mail->setFrom('hamdounechaymae@gmail.com', 'Account Verification');
            $mail->addAddress($email);
        
            $mail->isHTML(true);
            $mail->Subject="Votre code de vérification";
            $mail->Body="<p>Dear $nom , </p> <h3>Votre code de vérification : $code <br></h3>
            <br><br>
            <p>Cordialement</p>
            <b>Concours</b>";
        
                    if(!$mail->send()){
                        ?>
<script>
alert("<?php echo "Inscription impossible, E-mail invalide "?>");
</script>
<?php
                                    }else{
                                        ?>
<script>
alert("<?php echo "Inscription avec succès, Code de vérification envoyé à " . $email ?>");
window.location.replace('verification.php');
</script>
<?php
                    }
        }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="Favicon.png">
</head>

<body>
    <?php   include('include/header.php');   ?>

    <?php
            if(isset($_GET['supp']) && $_GET['supp']=='ok'){
                    print'<div class="alert alert-danger">
                    Compte supprimée avec succées
                    </div>';
            }
            if(isset($_GET['msg']) && $_GET['msg']=='ok'){
                print'<div class="alert alert-success">
                Compte crée avec succées
                </div>';
        }
        if(isset($_GET['erreur']) && $_GET['erreur']=='duplicate'){
            print'<div class="alert alert-danger">
            Compte déjà existe 
            </div>';
    }
        
        ?>


    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <form action="inscription.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <h2>Formulaire d'Inscription</h2>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Nom</label>
                        <input type="text" id="disabledTextInput" class="form-control" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Prénom</label>
                        <input type="text" id="disabledTextInput" class="form-control" name="prenom">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" name="email" aria-label="Username"
                            aria-describedby="basic-addon1" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" name="naissance">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="diplome">
                            <option selected>Diplôme</option>
                            <option name="diplome" value="Bac2">Bac+2</option>
                            <option name="diplome" value="Bac3">Bac+3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="niveau">
                            <option selected>Niveau</option>
                            <option name="niveau" value="3eme">3ème année</option>
                            <option name="niveau" value="4eme">4ème année</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Etablissement d'Origine</label>
                        <input type="text" id="disabledTextInput" class="form-control" name="etablissement">
                    </div>
                    <div class="input-group mb-3">
                        <label for="disabledTextInput" class="form-label">Photo</label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <div class="input-group mb-3">
                        <label for="disabledTextInput" class="form-label">CV</label>
                        <input type="file" class="form-control" name="cv">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Login</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="log">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="mdp">
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </div>
                </fieldset>
                <input type="submit" class="btn btn-primary" name="submit" value="submit">
                <input type="reset" value="annuler" name="reset" class="btn btn-danger"><br>
                <div class="mt-4">
                    <p>Vous avez déjà un compte <a href="authen.php" style="text-decoration : none;">Connectez-vous</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
<script>
const toggle = document.getElementById('togglePassword');
const password = document.getElementById('password');

toggle.addEventListener('click', function() {
    if (password.type === "password") {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
    this.classList.toggle('bi-eye');
});
</script>