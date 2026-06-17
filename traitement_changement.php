<?
session_start();
include "function.php";
$indice=$_SESSION['indice'];
$new_dept=$_POST['new_dept'];
$date=$_POST['date'];
$sql="SELECT first_name , last_name from employees where emp_no=$indice";
$req=mysqli_query(dbconnect(),$sql);
$date_actuel=$_POST['date_actuel'];
if($date<$date_actuel){?>
    <div>
        <H1>ERREUR</H1>
        la date date du debut du nouveau departement est anterieur a celle de la date actuel
        
    </div>
    <a href="formulaire_changement.php">retour vers le forulaire de changement</a>
<? }
else{
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>nom du nouveau departement</th>
            
        </tr>
        <tr>
            <?
            while($em=mysqli_fetch_assoc($req) ){
                ?>
            <td><?echo $em['first_name']?></td>
            <td><?echo $em['last_name']?></td>
            <td><?echo $new_dept?></td>
            <? }
            ?>
        </tr>
    </table>
    <a href="formulaire_changement.php">retour vers le formulaire de changement</a>
    
</body>
</html>
<? }?>