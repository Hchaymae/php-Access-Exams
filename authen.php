<?php

require('include/Requette.php');

session_start();

if(isset($_SESSION['log'])){ 
    header("location:recap.php");
}

if(isset($_POST['submit']) && !empty($_POST)){
    
    // $user = (new Requette)->ConnectVisiteur($_POST['log'],$_POST['mdp']);
    // $user1 = (new Requette)->ConnectAdmin($_POST['log'],$_POST['mdp']);
    
    // if(is_array($user) && count($user)>0){ 
    //         session_start(); // utilisateur  connectee
    //         $_SESSION['id'] = $user['id'];  
    //         $_SESSION['nom'] = $user['nom'];  
    //         $_SESSION['prenom'] = $user['prenom'];  
    //         $_SESSION['email'] = $user['email'];  
    //         $_SESSION['naissance'] = $user['naissance'];  
    //         $_SESSION['diplome'] = $user['diplome'];  
    //         $_SESSION['niveau'] = $user['niveau'];  
    //         $_SESSION['etablissement'] = $user['etablissement'];  
    //         $_SESSION['log'] = $user['log']; 
    //         $_SESSION['mdp'] = $user['mdp']; 
    //         header('location:profile.php');  //Redirection vers la page profile}
    //     }else if(is_array($user1) && count($user1)>0){
    //         session_start();
    //         $_SESSION['log'] = $user1['log']; 
    //         $_SESSION['nom'] = $user1['nom']; 
    //         $_SESSION['mdp'] = $user1['mdp'];  
    //         header("location:administration.php"); 
    //     }else{
    //         header('location:authen.php');
    //     }
    $user = (new Requette)->ConnectVisiteur($_POST["log"], $_POST["mdp"]);
    if (!$user) {
        $message = "Vous n'etes pas inscrit";
    } else {
        if ($user["log"] == "admin") {
            session_start();
            $_SESSION["id"] = $user["id"];
            $_SESSION["nom"] = $user["nom"];
            $_SESSION["log"] = $user["log"];
            $_SESSION["mdp"] = $user["mdp"];
            header("location:administration.php");
        } else {
            session_start();
            $_SESSION["id"] = $user["id"];
            $_SESSION["nom"] = $user["nom"];
            $_SESSION["prenom"] = $user["prenom"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["naissance"] = $user["naissance"];
            $_SESSION["diplome"] = $user["diplome"];
            $_SESSION["niveau"] = $user["niveau"];
            $_SESSION["etablissement"] = $user["etablissement"];
            $_SESSION["log"] = $user["log"];
            $_SESSION["mdp"] = $user["mdp"];
            $_SESSION["photo"] = $user["photo"];
            $_SESSION["cv"] = $user["cv"];
            header("location:recap.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Authentification</title>
</head>

<body>
    <?php 
        include('include/header.php');
    ?>
    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <form action="authen.php" method="post" class="center">
                <div class="mb-3">
                    <label for="" class="form-label">Login</label>
                    <input type="text" class="form-control" name="log">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="mdp">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <input type="reset" value="annuler" name="reset" class="btn btn-danger"><br>
                <div class="mt-4">
                    <p><a href="recover.php" class="btn btn-link" style="text-decoration:none;">
                            Forgot Your Password?
                        </a></p>
                </div>
                <div class="mt-4">
                    <p>Vous n'avez pas un compte <a href="inscription.php"
                            style="text-decoration : none;">Inscrivez-vous</a>
                    </p>
                </div>
            </form>
        </div>
    </div>



</body>

</html>