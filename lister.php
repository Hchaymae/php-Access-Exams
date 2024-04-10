<?php

    include "include/Requette.php";
    session_start();
    $Liste1 = (new Requette)->getListeetud3a();
    $Liste2 = (new Requette)->getListeetud4a();
    if($_SESSION['log']!="admin"){

        header('location:authen.php');
    }

    // if(!empty($_POST)){ //Button search clicked
    //     // echo "Button Search clicked";
    //     // echo $_POST['search'];
    //     $etudiants =searchetudiant($_POST['search']);
    // }
    // }else{
    //     $products = getAllproducts();
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <title>Liste des étudiants inscrits</title>
    <style>
    table,
    th,
    tr,
    td {
        border: 1px black solid;
        border-collapse: collapse;
    }

    td,
    th {
        padding: 5px;
    }

    img {
        width: 8rem;
    }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />


</head>

<body>
    <?php
        include('include/header.php');
    ?>
    <h1 class="text-primary">Liste des étudiants inscrits</h1><br>
    <h3 class="mx-3">Liste des étudiants 3ème année inscrits</h3><br>
    <!-- <div class="input-group mb-4 mt-3">
        <form class="d-flex" action="#" method="POST">
            <div class="form-outline">
                <input class="form-control mx-5" type="search" id="getEtud" aria-label="Search"
                    placeholder="Search..." />
            </div>
        </form>
    </div><br> -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Date de naissance</th>
                <th>Diplôme</th>
                <th>Niveau</th>
                <th>Etablissemet d'origine</th>
                <th>Photo</th>
                <th>CV</th>
                <th>Login</th>
            </tr>
        </thead>
        <tbody id="showdata">
            <?php
            foreach ($Liste1 as $etudiant) {
                echo "
                    <tr>
                        <td>" . $etudiant['id'] . "</td>
                        <td>" . $etudiant['nom'] . "</td>
                        <td>" . $etudiant['prenom'] . "</td>
                        <td>" . $etudiant['email'] . "</td>
                        <td>" . $etudiant['naissance'] . "</td>
                        <td>" . $etudiant['diplome'] . "</td>
                        <td>" . $etudiant['niveau'] . "</td>
                        <td>" . $etudiant['etablissement'] . "</td>
                        <td><img src='" . $etudiant['photo'] . "'alt='photo'></td>
                        <td><a href='" . $etudiant['cv'] . "'>Télécharger CV</a></td>
                        <td>" . $etudiant['log'] . "</td>
                    </tr>
                ";
        }
        ?>
        </tbody>


    </table>
    <br><br>

    <h3 class="mx-3">Liste des étudiants 4ème année inscrits</h3><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Date de naissance</th>
                <th>Diplôme</th>
                <th>Niveau</th>
                <th>Etablissement d'origine</th>
                <th>Photo</th>
                <th>CV</th>
                <th>Login</th>
            </tr>
        </thead>

        <tbody id="showdata">
            <?php
            foreach ($Liste2 as $etudiant) {
                echo "
                <tr>
                <td>" . $etudiant['id'] . "</td>
                <td>" . $etudiant['nom'] . "</td>
                <td>" . $etudiant['prenom'] . "</td>
                <td>" . $etudiant['email'] . "</td>
                <td>" . $etudiant['naissance'] . "</td>
                <td>" . $etudiant['diplome'] . "</td>
                <td>" . $etudiant['niveau'] . "</td>            
                <td>" . $etudiant['etablissement'] . "</td>            
                <td><img src='" . $etudiant['photo'] . "'alt='photo' ></td>
                <td><a href='" . $etudiant['cv'] . "'>Télécharger CV</a></td>
                <td>" . $etudiant['log'] . "</td>
            </tr>
                ";
        }
        ?>
        </tbody>


    </table>
    <!-- <script>
    $(document).ready(function() {
        $('#getEtud').on("keyup", function() {
            var getEtud = $(this).val();
            $.ajax({
                method: 'POST',
                url: 'searchajax.php',
                data: {
                    name: getEtud
                },
                success: function(response) {
                    $("#showdata").html(response);
                }
                complete: function() {
                    $('#loading-image').hide();
                }
            });
        });
    });
    </script> -->
</body>

</html>