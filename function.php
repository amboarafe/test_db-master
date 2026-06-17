<?php
function dbconnect(){
    static $connect=null;
    if($connect===null){
        $connect=mysqli_connect('localhost','root','','employees');
        if(!$connect){
            die('Erreur de connexion a la base de donnee : '. mysqli_connect_error());
        }
        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}
    
function list_departments(){
    $sql="SELECT de.dept_no, de.dept_name, em.first_name, em.last_name from departments as de
    join dept_manager as dem on dem.dept_no=de.dept_no
    join employees as em on em.emp_no=dem.emp_no where year(to_date)>=2026 ";
    $news_req=mysqli_query(dbconnect(),$sql);
    $result=array();
    while($news=mysqli_fetch_assoc($news_req)){
        $result[]=$news;
    }
    mysqli_free_result($news_req);
    return $result;
}  
function nombre_emp($id_dept){
    $sql="SELECT count(emp_no)as nb from dept_emp where dept_no='$id_dept' group by dept_no";
    $news_req=mysqli_query(dbconnect(),$sql);
    $result=array();
    while($news=mysqli_fetch_assoc($news_req)){
        $result[]=$news;
    }
    mysqli_free_result($news_req);
    return $result;
} 

function nom_dept(){
    $sql="SELECT dept_name from departments";
    $news_req=mysqli_query(dbconnect(),$sql);
    $result=array();
    while($news=mysqli_fetch_assoc($news_req)){
        $result[]=$news;
    }
    mysqli_free_result($news_req);
    return $result;
}

function list_formulaire($partie, $choix, $info){
    $db = dbconnect();
    // Sécurisation basique contre les injections SQL
    $info = mysqli_real_escape_string($db, $info); 
    $sql = "";
    if($partie ==1){
        $saut=20;
    }
    if($partie ==2){
        $saut=40;
    }
    if($choix == 0){
        $sql = "SELECT * from employees where first_name LIKE '%$info%' LIMIT $saut,10";
    }

    if($choix == 1){
        $sql = "SELECT e.* FROM employees e 
                JOIN dept_emp de ON e.emp_no = de.emp_no 
                JOIN departments d ON de.dept_no = d.dept_no 
                WHERE d.dept_name LIKE '%$info%' LIMIT $saut, 10";
    }

    // Extraction de l'année de naissance pour calculer l'âge
    if($choix == 2){
        $sql = "SELECT * from employees where (YEAR(CURDATE()) - YEAR(birth_date)) >= $info LIMIT $saut, 10";
    }

    if($choix == 3){
        $sql = "SELECT * from employees where (YEAR(CURDATE()) - YEAR(birth_date)) <= $info LIMIT $saut, 10";
    }

    if(empty($sql)) return array();

    $news_req = mysqli_query($db, $sql);
    $result = array();
    
    if($news_req){
        while($news = mysqli_fetch_assoc($news_req)){
            $result[] = $news;
        }
        mysqli_free_result($news_req);
    }
    
    return $result;
}
?>