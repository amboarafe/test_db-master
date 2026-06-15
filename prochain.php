<?php
session_start();
include "function.php";

$choix= $_SESSION['choix'];
$info= $_SESSION['info'];
$partie=2;

$liste = [];
if ($choix !== null) {
    $liste = list_formulaire($partie, $choix, $info);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/bootstrap-icons.css">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container mt-5">

    <h2>Résultats de la recherche :</h2>

    <?php
    // On utilise la variable $liste définie plus haut
    if (!empty($liste)) {
        foreach($liste as $li){
            echo "<p class='alert alert-info'>";
            echo "<strong>" . $li['emp_no'] . "</strong> - ";
            echo $li['first_name'] . " ";
            echo $li['last_name'] . " | ";
            echo $li['birth_date'] . " | ";
            echo $li['gender'] . " | "; // Note : Souvent 'gender' au lieu de 'sex' dans la base employees, à vérifier
            echo $li['hire_date'];
            echo "</p>";
        }
    } else {
        echo "<div class='alert alert-danger'>Aucun résultat trouvé ou aucun critère saisi.</div>";
    }
    ?>
    <a href="recherche.php" class="text-decoration-none lien fw-bold">precedent</a>
</body>
</html>