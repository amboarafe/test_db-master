<?
include "function.php";
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
<body>
    <form action="recherche.php" method="post">
        <div class="mb-3">
            <label for="nom" class="from-label">Nom de l'employer rechercher</label>
            <input type="text" name="nom" class="from-control" id="nom" placeholder="Votre nom">
        </div> 
        <div class="mb-3">
            <label for="departement" class="from-label">Nom du departement rechercher</label>
            <input type="text" name="departement" class="from-control" id="departement" placeholder="Votre departement">
        </div> 
        <div class="mb-3">
            <label for="min" class="from-label">age max rechercher</label>
            <input class="from-control" class="max" id="min" placeholder="max">
        </div> 
        <div class="mb-3">
            <label for="max" class="from-label">age max rechercher</label>
            <input class="from-control" class="max" id="min" placeholder="max">
        </div> 
        <button class="btn btn-danger" type="submit">valider</button>
    </form>
    
</body>