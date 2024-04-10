<?php
require('BD.php');
require('Exceptionusers.php');

class Requette{
    
    public function ajout_etud3a($nom,$prenom,$email,$naissance,$diplome,$niveau,$etablissement,$photo,$cv,$log,$mdp){
        
        $conn = (new BD)->connect();
        // $photo = $_POST['photo'];
        // Tester si le fichier a été envoyé sans erreur
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            // Tester la taille du fichier
            if ($_FILES['photo']['size'] <= 1000000) {
                // Tester si l'extension est autorisée
                
                $infofichier = pathinfo($_FILES['photo']['name']);
                $extension_upload = $infofichier['extension'];
                $extension_autorisees  = array('jpg','jpeg','png');
                $target_dir = "photos/";
                $target_file = $target_dir.basename($_FILES['photo']['name']);

                if(in_array($extension_upload,$extension_autorisees)){
                    // stocker le fichier définitivement dans le dossier "photo"
                    move_uploaded_file($_FILES['photo']['tmp_name'],$target_file);
                    
                } else {
                    echo 'Erreur :Extension non autorisée.';
                }
            } else {
                echo 'Erreur :Fichier est trop gros';
            }
        } else {
            echo 'Erreur :Erreur d\'envoi.';
        }


        // $cv = $_POST['cv'];        
        // Tester si le fichier a été envoyé sans erreur
        if (isset($_FILES['cv']) and $_FILES['cv']['error'] == 0) {
            // Tester la taille du fichier
            if ($_FILES['cv']['size'] <= 1000000) {
                // Tester si l'extension est autorisée
                $infofichier = pathinfo($_FILES['cv']['name']);
                $extension_upload = $infofichier['extension'];
                $extension_autorisees  = array('pdf');
                $target_dir = 'cvs/';
                $target_file = $target_dir.basename($_FILES['cv']['name']);

                if(in_array($extension_upload,$extension_autorisees)){
                    
                    move_uploaded_file($_FILES['cv']['tmp_name'],$target_file);
                } else {
                    echo 'Erreur :Extension non autorisée.';
                }
            } else {
                echo 'Erreur :Fichier est trop gros';
            }
        } else {
            echo 'Erreur :Erreur d\'envoi.';
        }

            try{
                $requette = "INSERT INTO `etud3a`(`nom`, `prenom`, `email`, `naissance`, `diplome`, `niveau`, `etablissement`, `photo`, `cv`, `log`, `mdp`) VALUES ('".$nom."','".$prenom."','".$email."','".$naissance."','".$diplome."','".$niveau."','" .$etablissement. "','".$photo."','".$cv."','".$log."','".$mdp."')";
                $conn->query($requette);
                return true;
            }catch(ExceptionInsertion $e){
                $e->__toString('Erreur d\'insertion de données dans BD');
            }
    }

    public function ajout_etud4a($nom,$prenom,$email,$naissance,$diplome,$niveau,$etablissement,$photo,$cv,$log,$mdp){
        
        $conn = (new BD)->connect();
        // @$photo = $_POST['photo'];
        // Tester si le fichier a été envoyé sans erreur
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            // Tester la taille du fichier
            if ($_FILES['photo']['size'] <= 1000000) {
                // Tester si l'extension est autorisée
                
                $infofichier = pathinfo($_FILES['photo']['name']);
                $extension_upload = $infofichier['extension'];
                $extension_autorisees  = array('jpg','jpeg','png');
                $target_dir = "photos/";
                $target_file = $target_dir.basename($_FILES['photo']['name']);

                if(in_array($extension_upload,$extension_autorisees)){
                    // stocker le fichier définitivement dans le dossier "photo"
                    move_uploaded_file($_FILES['photo']['tmp_name'],$target_file);
                } else {
                    echo 'Erreur :Extension non autorisée.';
                }
            } else {
                echo 'Erreur :Fichier est trop gros';
            }
        } else {
            echo 'Erreur :Erreur d\'envoi.';
        }


        // @$cv = $_POST['cv'];
        // Tester si le fichier a été envoyé sans erreur
        if (isset($_FILES['cv']) and $_FILES['cv']['error'] == 0) {
            // Tester la taille du fichier
            if ($_FILES['cv']['size'] <= 1000000) {
                // Tester si l'extension est autorisée
                $infofichier = pathinfo($_FILES['cv']['name']);
                $extension_upload = $infofichier['extension'];
                $extension_autorisees  = array('pdf');
                $target_dir = 'cvs/';
                $target_file = $target_dir.basename($_FILES['cv']['name']);

                if(in_array($extension_upload,$extension_autorisees)){
                    // stocker le fichier définitivement dans le dossier "photo"
                    move_uploaded_file($_FILES['cv']['tmp_name'],$target_file);
                } else {
                    echo 'Erreur :Extension non autorisée.';
                }
            } else {
                echo 'Erreur :Fichier est trop gros';
            }
        } else {
            echo 'Erreur :Erreur d\'envoi.';
        }

            
        try{
            $requette = "INSERT INTO `etud4a`(`nom`, `prenom`, `email`, `naissance`, `diplome`, `niveau`, `etablissement`, `photo`, `cv`, `log`, `mdp`) VALUES ('".$nom."','".$prenom."','".$email."','".$naissance."','".$diplome."','".$niveau."','".$etablissement."','".$photo."','".$cv."','".$log."','".$mdp."')";
            $conn->query($requette);
            return true;
        }catch(ExceptionInsertion $e){
            $e->__toString('Erreur d\'insertion de données dans BD');
        }
    }

    // public function ConnectVisiteur($log,$mdp){
    //     $conn = (new BD)->connect();

    //     $requette = "SELECT * FROM `etud3a` WHERE `log` = '".$log."' AND `mdp` = '".$mdp."'";
    //     $resultat = $conn->query($requette);
    //     if($resultat){            
    //         $user = $resultat->fetch();
    //         return $user;
    //     }else{
    //         $requette = "SELECT * FROM `etud4a` WHERE `log` = '".$log."' AND `mdp` = '".$mdp."'";
    //         $resultat=$conn->query($requette);
    //         $user = $resultat->fetch();
    //         return $user;
    //     }
    // }
    public function ConnectVisiteur($log, $mdp)
    {
        $conn = (new BD)->connect();

        $requette = "SELECT * FROM `etud3a` WHERE `log`='" . $log . "' AND `mdp`='" . $mdp . "'";
        $resultat = $conn->query($requette);
        $etudiant = $resultat->fetch();
        if (is_array($etudiant) && count($etudiant) > 0)
            return $etudiant;
        else {
            $requette = "SELECT * FROM `etud4a` WHERE `log`='" . $log . "' AND `mdp`='" . $mdp . "'";
            $resultat = $conn->query($requette);
            $etudiant = $resultat->fetch();
            if (is_array($etudiant) && count($etudiant) > 0){
                return $etudiant;
            } else {
                $requette = "SELECT * FROM `admin` WHERE `log`='" . $log . "' AND `mdp`='" . $mdp . "'";
                $resultat = $conn->query($requette);
                $admin = $resultat->fetch();
                if ($admin)
                    return $admin;
                else
                    return False;
            }
        }
    }
           
        
    
            
    public function ConnectAdmin($log,$mdp){
        $conn = (new BD)->connect();

        $resultat=$conn->query("SELECT * FROM `admin` WHERE `mdp` = '".$mdp."' AND `log` = '".$log."'");
        $user1 = $resultat->fetch();
        return $user1;
    }
    public function getListeetud3a()
    {
        $conn = (new BD)->connect();

        $requette = "SELECT * FROM `etud3a`";
        $resultat = $conn->query($requette);
        $Liste = $resultat->fetchAll();
        return $Liste;
    }

    public function getListeetud4a()
    {
        $conn = (new BD)->connect();

        $requette = "SELECT * FROM `etud4a`";
        $resultat = $conn->query($requette);
        $Liste = $resultat->fetchAll();
        return $Liste;
    }

    public function modifietud3a($id,$nom,$prenom,$email,$naissance,$diplome,$niveau,$etablissement,$log,$mdp){
        
        $conn = (new BD)->connect();
        
            $requette = "UPDATE `etud3a` SET `id`='".$id."',`nom`='".$nom."',`prenom`='".$prenom."',`email`='".$email."',`naissance`='".$naissance."',`diplome`='".$diplome."',`niveau`='".$niveau."',`etablissement`='".$etablissement."',`log`='".$log."',`mdp`='".$mdp."'";
            
            $resultat = $conn->query($requette);

            return $resultat;
        }

    public function modifietud4a($nom,$prenom,$email,$naissance,$diplome,$niveau,$etablissement,$log,$mdp){
        
        $conn = (new BD)->connect();
            $requette = "UPDATE `etud4a` SET `id`='".$id."',`nom`='".$nom."',`prenom`='".$prenom."',`email`='".$email."',`naissance`='".$naissance."',`diplome`='".$diplome."',`niveau`='".$niveau."',`etablissement`='".$etablissement."',`log`='".$log."',`mdp`='".$mdp."'";
    
            $resultat = $conn->query($requette);

            return $resultat;
        }

    //Modification photo
    public function modifiphoto3a($id,$photo){
        $conn=(new BD )->connect();
        $requette = "UPDATE `etud3a` SET `photo`='".$photo."' WHERE `id`='".$id."'";
        $resultat = $conn->query($requette);
    }
    public function modifiphoto4a($id,$photo){
        $conn=(new BD )->connect();
        $requette = "UPDATE `etud4a` SET `photo`='".$photo."' WHERE `id`='".$id."'";
        $resultat = $conn->query($requette);
    }

    //Modification CV
    public function modifiCV3a($id,$cv){
        $conn=(new BD )->connect();
        $requette = "UPDATE `etud3a` SET `cv`='".$cv."' WHERE `id`='".$id."'";
        $resultat = $conn->query($requette);
    }
    public function modifiCV4a($id,$cv){
        $conn=(new BD )->connect();
        $requette = "UPDATE `etud4a` SET `cv`='".$cv."' WHERE `id`='".$id."'";
        $resultat = $conn->query($requette);
    }

    public function suppcompte3a($id){
        $conn=(new BD )->connect();

        $requette = "DELETE FROM `etud3a` WHERE `id` = '".$id."'";
        $resultat = $conn->query($requette);
        
        return $resultat;
    }

    public function suppompte4a($id){
        $conn=(new BD )->connect();

        $requette = "DELETE FROM `etud4a` WHERE `id` = '".$id."'";
        $resultat = $conn->query($requette);
        return $resultat;
    }



    public function checketud($email,$log,$niveau){
        $conn=(new BD )->connect();
        
        if($niveau == "3eme"){
            $requette = "SELECT `email`,`log`  FROM `etud3a` WHERE `email` LIKE '".$email."' AND `log` LIKE '".$log."'";
            $resultat = $conn->query($requette);
            $user= $resultat->fetchAll();
            return $user;
        }else{
            $requette = "SELECT `email`,`log` FROM `etud4a` WHERE `email` LIKE '".$email."' AND `log` LIKE '".$log."'";
            $resultat = $conn->query($requette);
            $user = $resultat->fetchAll();
            return $user;
        }
        
    }

    public function recover($email){
        $conn=(new BD )->connect();
        // if($niveau == "3eme"){
            $requette = "SELECT `email` FROM `etud3a` WHERE `email` LIKE '".$email."'";
            $resultat = $conn->query($requette);
            $user= $resultat->fetchAll();
            return $user;
        // }
        // }else{
        //     $requette = "SELECT `email`,`status` FROM `etud4a` WHERE `email` LIKE '".$email."'";
        //     $resultat = $conn->query($requette);
        //     $user= $resultat->fetchAll();
        //     return $user;
        // }
    }


    // public function searchetud3a($name)
    // {

    //     $conn = (new BD)->connect();

    //     $requette = "SELECT * FROM etud3a WHERE nom LIKE '%$name%'" ;

    //     $resultat = $conn->query($requette);
    //     $data = $resultat -> fetchAll();

    //     return $data;
    // }
    // public function searchetud4a($name)
    // {

    //     $conn = (new BD)->connect();

    //     $requette = "SELECT * FROM etud4a WHERE nom LIKE '%$name%'" ;

    //     $resultat = $conn->query($requette);
    //     $data = $resultat -> fetchAll();

    //     return $data;
    // }

    public function getetud3aid($id){
        $conn = (new BD )->connect();
      
          //2-  Creation de la requette
      
          $requette ="SELECT * FROM etud3a WHERE id=$id";
          //3-  Execution de la requette
          
          $resultat = $conn -> query($requette); // execution de la requette par la fonction query 
          
          //4- Resultat de la requette
      
          $etud = $resultat -> fetchAll(); //tableau
          // var_dump($categories);
          return $etud;
      
      }
      
    public function getetud4aid($id){
        $conn = (new BD )->connect();
      
          //2-  Creation de la requette
      
          $requette ="SELECT * FROM etud4a WHERE id=$id";
          //3-  Execution de la requette
          
          $resultat = $conn -> query($requette); // execution de la requette par la fonction query 
          
          //4- Resultat de la requette
      
          $etud = $resultat -> fetchAll(); //tableau
          // var_dump($categories);
          return $etud;
      
      }

}