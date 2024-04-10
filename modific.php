<?php

    include('include/Requette.php');

    session_start();

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $naissance = $_POST['naissance'];
    $diplome = $_POST['diplome'];
    $niveau = $_POST['niveau'];
    $etablissement = $_POST['etablissement'];
    $log = $_POST['log'];
    $mdp = $_POST['mdp'];

    if($niveau == "3eme"){
        $modietu = (new Requette)->modifietud3a($id,$nom,$prenom,$email,$naissance,$diplome,$niveau,$etablissement,$log,$mdp);
        
        $_SESSION['id'] = $id;
        $_SESSION['nom'] = $nom ;
        $_SESSION['prenom'] = $prenom ;
        $_SESSION['email'] = $email;
        $_SESSION['naissance'] = $naissance;
        $_SESSION['diplome'] = $diplome;
        $_SESSION['niveau'] = $niveau ;
        $_SESSION['etablissement'] = $etablissement ;
        $_SESSION['log'] = $log ;
        $_SESSION['mdp'] = $mdp ;
       
    }else{
        $modietu = (new Requette)->modifietud4a($id,$nom,$prenom,$email,$naissance,$diplome,$niveau,$etablissement,$log,$mdp);
        $_SESSION['id'] = $id;
        $_SESSION['nom'] = $nom ;
        $_SESSION['prenom'] = $prenom ;
        $_SESSION['email'] = $email;
        $_SESSION['naissance'] = $naissance;
        $_SESSION['diplome'] = $diplome;
        $_SESSION['niveau'] = $niveau ;
        $_SESSION['etablissement'] = $etablissement ;
        $_SESSION['log'] = $log ;
        $_SESSION['mdp'] = $mdp ;
       
    }

    if($modietu){
        header('location:recap.php?modifie=ok');
    }else{
        echo 'Erreur : Modification échouée';
    }




?>