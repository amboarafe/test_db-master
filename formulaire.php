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
        <p for="nom" class="form-label">Nom de l'employé recherché</p>
        <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre nom">
    </div> 
    <div class="mb-3">
        <p for="departement" class="form-label">Nom du département recherché</p>
        <input type="text" name="departement" class="form-control" id="departement" placeholder="Votre département">
    </div> 
    <div class="mb-3">
        <p for="min" class="form-label">Âge min recherché</p>
        <input type="number" class="form-control" name="min" id="min" placeholder="min">
    </div> 
    <div class="mb-3">
        <p for="max" class="form-label">Âge max recherché</p>
        <input type="number" class="form-control" name="max" id="max" placeholder="max">
    </div> 
    <button class="btn btn-danger" type="submit">Valider</button>
</form>
</body>