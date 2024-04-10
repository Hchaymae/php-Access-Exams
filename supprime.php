<?php

include "include/Requette.php";

session_start();


if($_SESSION['niveau'] == "3eme"){
    if($_POST['supprimer']){
        $supp = (new Requette)->suppcompte3a($_SESSION['id']);
        unlink($_SESSION['photo']);
        unlink($_SESSION['cv']);
        session_destroy();
        if($supp){
            header('location:inscription.php?supp=ok');
        }else{
            echo ' Suppression échouée';
        }
    }
}else{
    if($_POST['supprimer']){
        $supp = (new Requette)->suppompte4a($_SESSION['id']);
        session_destroy();
        unlink($_SESSION['photo']);
        unlink($_SESSION['cv']);
        if($supp){
            header('location: inscription.php?supp=ok');
        }else{
            echo ' Suppression échouée';
        }
    }
}