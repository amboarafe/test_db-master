<?php
session_start();
include "function.php";
$numero=$_GET["indice"];
$_SESSION['indice']=$numero;
$sql="SELECT employees.*,titles.title,salaries.salary,salaries.from_date,salaries.to_date from employees inner join titles on titles.emp_no = employees.emp_no inner join salaries on salaries.emp_no= employees.emp_no where employees.emp_no = '%s';";
$sql=sprintf($sql,$numero);
$req=mysqli_query(dbconnect(),$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Fiche de L'employe</h1>
    <table border=1 width="1000">
        <tr class=couleur>
                <td><p>No</p></td>
                <td><p>Birth date</p></td>
                <td><p>First name</p></td>
                <td><p>Last name</p></td>
                <td><p>Gender</p></td>
                <td><p>Hire date</p></td>
                <td><p>Title</p></td>
                <td><p>Salary</p></td>
                <td><p>From date</p></td>
                <td><p>To date</p></td>
        </tr>
        <?php while($ligne=mysqli_fetch_assoc($req)) { ?>
            <tr class=pastel>
                <td><?php echo $ligne["emp_no"]; ?></td>
                <td><?php echo $ligne["birth_date"]; ?></td>
                <td><?php echo $ligne["first_name"]; ?></td>
                <td><?php echo $ligne["last_name"]; ?></td>
                <td><?php echo $ligne["gender"]; ?></td>
                <td><?php echo $ligne["hire_date"]; ?></td>
                <td><?php echo $ligne["title"]; ?></td>
                <td><?php echo $ligne["salary"]; ?></td>
                <td><?php echo $ligne["from_date"]; ?></td>
                <td><?php echo $ligne["to_date"]; ?></td>
            </tr>
        <?php } ?>
    </table>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <form action="formulaire_changement.php" method="get">
        <button class="btn btn-warning" type="submit" >changer de departement</button>
    </form>
    

</body>
</html>