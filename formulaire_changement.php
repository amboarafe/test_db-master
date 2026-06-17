<?php
session_start();
include "function.php";
$indice=$_SESSION['indice'];

$sql = "SELECT em.first_name ,de.dept_name, em.hire_date from employees em 
join dept_emp dm on em.emp_no=dm.emp_no
join departments de on de.dept_no=dm.dept_no
where em.emp_no=$indice ";

$req=mysqli_query(dbconnect(),$sql);

while($em=mysqli_fetch_assoc($req) ){
echo "nom du departement: " . $em['dept_name'] . "<br>";
echo "date d'embauche: " . $em['hire_date'];

             
}?>            


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>FORMULAIRE DE CHANGEMENT DE DEPARTEMENT</h1>
    <form action="traitement_changement.php" method="post">
        <h3>choix du departement</h3>
        <select name="new_dept" >
            <option value="">selectionner</option>
            <?
            foreach(nom_dept() as $nom){?>
               <option value="<? echo $nom['dept_name'] ?>"><? echo $nom['dept_name'] ?></option> 
            <? }
            ?>
        </select>

        <h3>entrer la date de debut</h3>
        <input type="date" name="date">

        <h3>entrer la date actuel</h3>
        <input type="date" name="date_actuel">
        <button type="submit">changer</button>
    </form>
</body>
</html>