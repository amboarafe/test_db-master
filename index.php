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
    <div class="container">
        <div class="row">
            <div class="text-success fw-bold fs-5">tableau de personne</div>
            <div>
                <table border="1">
                    <?php
                        $departement=list_departments();
                    ?>
                    <tr class="couleur">
                        <th>numero de departement</th>
                        <th>nom du departement</th>
                        <th>nom du manager en cours</th>
                    </tr>

                    <? foreach($departement as $de){?>
                    <tr class="pastel">
                        <td class="fw-bold">
                            <? echo $de['dept_no']; ?>
                        </td>
                        <td>
                            <a  href="employe.php?indice=<? echo $de['dept_name']; ?>" class="text-decoration-none lien"><? echo $de['dept_name']; ?></a>
                        </td>
                        <td>
                            <? echo $de['first_name']; ?>
                        </td>
                    </tr>
                    <? }?>

                </table>  
            </div>
        </div>
    </div>
    <a href="formulaire.php">vers le formulaire</a>
</body>
</html>