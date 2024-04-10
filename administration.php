<?php

require('include/Requette.php');

session_start();

if($_SESSION['log']!="admin"){

    header('location:authen.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <title>Profile</title>
</head>

<body>
    <?php   include "include/header.php" ;   ?>

    <div class="container">
        <h1>Bienvenu <span class="text-primary"><?php   echo $_SESSION['log'];   ?></span> dans votre profile</h1>
        <br><br>
        <div class="container">
            <div>
                <h2>Chercher étudiants par Nom</h2>
                <div>
                    <input type="text" class="form-control" name="nom" id="search"
                        placeholder="Tapez le Nom d'étudiant ... ">
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date de naissance</th>
                                <th scope="col">Diplome</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Etablissement d'origine</th>
                                <th scope="col">Photo</th>
                                <th scope="col">CV</th>
                                <th scope="col">login</th>
                            </tr>
                        </thead>

                        <tbody id="output">
                        </tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <br><br>
    </div>
    <a href="lister.php" class="btn btn-primary mt-3 " style="text-decoration:none ; margin-left : 3rem;">Liste des
        étudiants</a>
    <br><br><br>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#search").keypress(function() {
            $('#loading-image').show();
            $.ajax({
                type: 'POST',
                url: 'search.php',
                data: {
                    nom: $("#search").val(),
                },
                success: function(data) {
                    $("#output").html(data);
                },
                complete: function() {
                    $('#loading-image').hide();
                }
            });
        });
    });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>