<?php
require('include/Requette.php');

session_start();

if($_SESSION['log']=="admin"){
   header('location:administration.php');
}

if($_SESSION['niveau'] == "3eme"){
    $etuda= (new Requette)->getetud3aid($_SESSION['id']);
}else{
    $etuda = (new Requette)->getetud4aid($_SESSION['id']);

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
    <title>Profile</title>
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/"> -->
    <style>
    img {
        width: 8rem;
        height: 8rem;
    }
    </style>
</head>

<body>
    <?php   include('include/header.php');   ?>

    <div class="container">

        <h2>Bienvenu <span class="text-primary"><?php   echo $_SESSION['log'];   ?></span> dans votre profile</h2>

    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Les Informations Personnelles</h2>
            <div>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier</a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#examplesupp">Supprimer le compte</a>
            </div>
        </div>
        <?php
            if(isset($_GET['modifie']) && $_GET['modifie']=='ok'){
                    print'<div class="alert alert-success">
                    Compte modifiée avec succées
                    </div>';
            }
        ?>
        <?php   
            foreach($etuda as $etud)  {       
        ?>



        <table>
            <tr>
                <th> Id </th>
                <th> : <?php echo $etud['id'] ;?>
                </th>
            </tr>

            <tr>
                <th> Nom </th>
                <th> : <?php echo $etud['nom'] ;?>
                </th>
            </tr>

            <tr>
                <th> Prénom </th>
                <th> : <?php echo $etud['prenom'] ;?>
                </th>
            </tr>

            <tr>
                <th> E-mail </th>
                <th> : <?php echo $etud['email'] ;?>
                </th>
            </tr>

            <tr>
                <th> Date de naissance </th>
                <th> : <?php echo $etud['naissance'] ;?>
                </th>
            </tr>

            <tr>
                <th> Diplôme </th>
                <th> : <?php echo $etud['diplome'] ;?>
                </th>
            </tr>

            <tr>
                <th> Niveau </th>
                <th> : <?php echo $etud['niveau'] ;?>
                </th>
            </tr>

            <tr>
                <th> Etablissement d'origine </th>
                <th> : <?php echo $etud['etablissement'] ;?>
                </th>
            </tr>
            <tr>
                <th>
                    <img src=<?php echo $etud['photo'] ;?> alt="photo">
                </th>
            </tr>
            <tr>
                <td>
                    <a href=<?php echo $etud['cv'] ;?> style="text-decoration : none;"><input type="image"
                            src="images/PDF.jpg" height="40px" width="40px" border="0" value="generer un word" /></a>
                </td>
            </tr>
            <tr>
                <th> Login </th>
                <th> : <?php echo $etud['log'] ;?>
                </th>
            </tr>
            <tr>
                <th> Mot de passe </th>
                <th> : <?php echo $etud['mdp'] ;?>
                </th>
            </tr>
            <tr>
                <td>
                    <a href="pdf.php" style="text-decoration : none;"><button type="button"
                            class="btn btn-success  mt-3 mb-3" name="pdf">Télécharger le reçu de
                            l'inscription</button></a>
                </td>
            </tr>

        </table>
    </main>
    <!-- Modal Modification-->
    <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="modific.php" method="post">
                        <div class="form-group   mb-2">
                            <input type="text" name="id" class="form-control" value="<?php  echo $etud['id'];  ?>"
                                placeholder="ID">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="nom" class="form-control" placeholder="nouveau nom..."
                                value="<?php  echo $etud['nom'];  ?>">
                        </div>
                        <div class=" form-group mb-2">
                            <input type="text" name="prenom" class="form-control" placeholder="nouveau email..."
                                value="<?php  echo $etud['prenom'];  ?>">
                        </div>
                        <div class=" form-group mb-2">
                            <input type="text" name="email" class="form-control" placeholder="nouveau prenom..."
                                value="<?php  echo $etud['email'];  ?>">
                        </div>
                        <div class=" form-group mb-2">
                            <input type="date" name="naissance" class="form-control"
                                value="<?php  echo $etud['naissance'];  ?>">
                        </div>
                        <div class=" form-group mb-2">
                            <input type="text" name="diplome" class="form-control" placeholder="nouveau diplome"
                                value="<?php  echo $etud['diplome'];  ?>">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="niveau" class="form-control" placeholder="nouveau niveau..."
                                value="<?php  echo $etud['niveau'];  ?>">
                        </div>
                        <div class=" form-group mb-2">
                            <input type="text" name="etablissement" class="form-control"
                                placeholder=" L'Etablissement d'origine..."
                                value="<?php  echo $etud['etablissement'];  ?>">
                        </div>
                        <div class="input-group mb-3">
                            <a href="modifierphoto.php">
                                <input type="button" class="form-control  btn btn-primary" name="photo"
                                    value="Modifier la photo">
                            </a>
                        </div>
                        <div class="input-group mb-3">
                            <a href="modifiercv.php">
                                <input type="button" class="form-control  btn btn-primary" name="cv"
                                    value="Modifier le CV">
                            </a>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="log" class="form-control" placeholder="nouveau login..."
                                value="<?php  echo $etud['log'];  ?>">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="mdp" class="form-control" placeholder="noveau mot de passe..."
                                value="<?php  echo $etud['mdp'];  ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php  }?>

    <!-- Modal Suppression-->
    <div class=" modal fade" id="examplesupp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer le compte</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center><b>Êtes-Vous sûr?</b></center>

                </div>
                <div class="modal-footer">
                    <form action="supprime.php" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <input type="submit" class="btn btn-primary" value="Supprimer" name="supprimer">
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>