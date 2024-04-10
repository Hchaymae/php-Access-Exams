<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "concours");
$sql1 = "SELECT * FROM etud3a WHERE nom LIKE '%" . $_POST['nom'] . "%'";
$sql2 = "SELECT * FROM etud4a WHERE nom LIKE '%" . $_POST['nom'] . "%'";
$result3 = mysqli_query($conn, $sql1);
$result4 = mysqli_query($conn, $sql2);
echo '
    <br>
    <br>
    <div id="loading-image"> 
        <div class="spinner-border text-secondary" role="status"> 
        </div>
        <span> Patientez s\'il vous plait ...</span>
    </div>
    ';
    if (mysqli_num_rows($result3) > 0) {
        while ($etud = mysqli_fetch_assoc($result3)) {
            echo "
                <tr>
                <td>" . $etud['id'] . "</td>
                <td>" . $etud['nom'] . "</td>
                <td>" . $etud['prenom'] . "</td>
                <td>" . $etud['email'] . "</td>
                <td>" . $etud['naissance'] . "</td>
                <td>" . $etud['diplome'] . "</td>
                <td>" . $etud['niveau'] . "</td>
                <td>" . $etud['etablissement'] . "</td>
                <td>" . $etud['log'] . "</td>
                <td>" . $etud['photo'] . "</td>
                <td>" . $etud['cv'] . "</td>
                </tr>
            ";
        }
    }
    elseif (mysqli_num_rows($result4) > 0){
        while ($etud = mysqli_fetch_assoc($result4)) {
            echo "
                <tr>
                <td>" . $etud['id'] . "</td>
                <td>" . $etud['nom'] . "</td>
                <td>" . $etud['prenom'] . "</td>
                <td>" . $etud['email'] . "</td>
                <td>" . $etud['naissance'] . "</td>
                <td>" . $etud['diplome'] . "</td>
                <td>" . $etud['niveau'] . "</td>
                <td>" . $etud['etablissement'] . "</td>
                <td>" . $etud['log'] . "</td>
                <td>" . $etud['photo'] . "</td>
                <td>" . $etud['cv'] . "</td>
                </tr>
            ";
        }
    }
else {
    echo "<tr><td>Aucun résultat trouvé</td></tr>";
}