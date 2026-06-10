<?php
include "function.php";

// 1. On définit une requête par défaut pour éviter que $sql soit vide au départ
$sql = "SELECT * from employees LIMIT 20, 10";

if(isset($_POST['nom'])){
    $nom = $_POST['nom'];
    $sql = "SELECT * from employees where first_name='$nom' LIMIT 20, 10 ";
}

// Attention : Filtrer par département nécessite une jointure si on veut afficher des employés !
if(isset($_POST['departement'])){
    $departement = $_POST['departement'];
    // Exemple de jointure pour que les colonnes first_name, last_name existent toujours
    $sql = "SELECT e.* FROM employees e 
            JOIN dept_emp de ON e.emp_no = de.emp_no 
            JOIN departments d ON de.dept_no = d.dept_no 
            WHERE d.dept_name='$departement' LIMIT 20, 10";
}

if(isset($_POST['min'])){
    $min = $_POST['min'];
    $sql = "SELECT * from employees where 2026-birth_date>=$min LIMIT 20, 10";
}

if(isset($_POST['max'])){
    $max = $_POST['max'];
    // Correction du signe >= en <=
    $sql = "SELECT * from employees where 2026-birth_date<=$max LIMIT 20, 10";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php // Correction de la balise <? en <?php
    $liste = list_formulaire($sql);
    
    // On vérifie que $liste est bien un tableau et n'est pas vide avant de boucler
    if (!empty($liste) && is_array($liste)) {
        foreach($liste as $li){
            // Ajout de balises <p> ou <br> pour éviter que tout soit collé sur une seule ligne
            echo "<p>";
            echo $li['emp_no'] . " - ";
            echo $li['first_name'] . " ";
            echo $li['last_name'] . " | ";
            echo $li['birth_date'] . " | ";
            echo $li['sex'] . " | ";
            echo $li['hire_date'];
            echo "</p>";
        }
    } else {
        echo "Aucun résultat trouvé ou erreur dans la requête.";
    }
    ?>
</body>
</html>