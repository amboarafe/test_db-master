version1:liste de departement:
    -creer index.php:
        -creer un tableau contenant l'id_dept, le nom_dept ,le nom du manager en cours . 
    -creer function.php
        -faire la fonction de connexion:db_connect
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
        -creer la fonction list_depatement qui va afficher la liste des departements avec la liste des managers en cours en utilisant comme requette:SELECT de.     dept_no, de.dept_name, em.first_name, em.last_name from departments as de
            join dept_manager as dem on dem.dept_no=de.dept_no
            join employees as em on em.emp_no=dem.emp_no where year(to_date)>=2026

version2:
    -dans index.php:
        -creer un lien qui va vers formulaire.php
    -creer formulaire.php:
        -creer un formulaire de recherche avec input pour le departement, le nom de l'employe , l'age min et max qui va ver s recherche.php

    -dans recherche.php:
        -recevoir les valeurs de la recherche
        -session_start()
        -creer in indice egal a 0 si dans recherche
        -mettre condition selon la categorie rechercher
        -recevor les donnees de la session
        -creer un lien vers prochain.php

    -dans function.php:
        -creer une fonction qui afficher 20 ligne avec les infos rechercher

    -dans prochain.php:
        -session_start()
        -creer un indice qui est egale a 1 si dans prochain
        -creer une session pour enregister les valeurs du formulaire
        -afficher les 20prochaines lignes 
        -creer un lien vers recherche.php pour les precedents

version 3:
    -update de index.php:ajouter une nouvelle colonne nombre d'employer
    -dans function.php:
        creer une fonction qui affiche le nb de'employer selon le departement