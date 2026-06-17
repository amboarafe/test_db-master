<?php

session_start();
include("function.php");
$nom=$_GET["indice"];
$_SESSION['nom']=$nom;


$sql="SELECT employees.emp_no,employees.first_name,employees.last_name,dept_emp.from_date,dept_emp.to_date,departments.dept_name from dept_emp inner join employees on employees.emp_no = dept_emp.emp_no inner join departments on departments.dept_no = dept_emp.dept_no where dept_name='%s'";
$sql=sprintf($sql,"$nom");
$req=mysqli_query(dbconnect(),$sql);
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
    <div class="text-success fw-bold fs-5">Liste des employes</div>
    <table width="1000" border=1>
        <?php while($ligne=mysqli_fetch_assoc($req)) { ?>
            <tr class="pastel">                        
                <td class="lien"><a href="fiche.php?indice=<?php echo $ligne["emp_no"]; ?>"><?php echo $ligne["first_name"]; ?></a></td>
                <td><?php echo $ligne["last_name"]; ?></td>
                <td><?php echo $ligne["from_date"]; ?></td>
                <td><?php echo $ligne["to_date"]; ?></td>
            </tr>
        <?php } ?>
    </table>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>