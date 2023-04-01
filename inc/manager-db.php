<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
    // pour utiliser la variable globale dans la fonction
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Continent = :cont;';
    $prep = $pdo->prepare($query);
    // on associe ici (bind) le paramètre (:cont) de la req SQL,
    // avec la valeur reçue en paramètre de la fonction ($continent)
    // on prend soin de spécifier le type de la valeur (String) afin
    // de se prémunir d'injections SQL (des filtres seront appliqués)
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();
    // var_dump($prep);  pour du debug
    // var_dump($continent);

    // on retourne un tableau d'objets (car spécifié dans connect-db.php)
    return $prep->fetchAll();
}

/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets
 */

function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM Country;';
    return $pdo->query($query)->fetchAll();
}

function getCountries($id){
    global $pdo;
    $query = 'SELECT * FROM Country where id = :id;' ;
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}

function getCapital($id){
    global $pdo;
    $query = 'SELECT city.Name FROM city where id = :id;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetch()->Name;
}

//Authentification
function getAuthentification($login,$password){
    global $pdo;
    $query = "SELECT * FROM Personne where login=:login and password=:password";
    $prep = $pdo->prepare($query);
    $prep->bindValue(':login', $login);
    $prep->bindValue(':password', $password);
    $prep->execute();
    // on vérifie que la requête ne retourne qu'une seule ligne
    if($prep->rowCount() == 1){
    $result = $prep->fetch();
    return $result;
    }
    else
    return false;
}

//Ajout utilisateur
function ajoutUtil($param){
    global $pdo;
    $requete = "INSERT INTO personne (login, password, role) values (:login, :password, :role)";
    $prep = $pdo->prepare($requete);
    $prep->bindValue(':login', $param['login']);
    $prep->bindValue(':password', $param['password']);
    $prep->bindValue(':role', $param['role']);
    $prep->execute();
}

//Afficher élève
function affichEleve($listeEleve){
    global $pdo;
    $requete = 'SELECT * FROM Personne';
    $prep = $pdo->prepare($requete);
    $prep->bindValue(':elv', $listeEleve, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}

//MAJ
function getUpdateUtil($params){
    global $pdo;
    $query = "UPDATE personne set login=:login, password=:password, role=:role WHERE id=:id";
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $params['id']);
    $prep->bindValue(':login', $params['login']);
    $prep->bindValue(':password', $params['password']);
    $prep->bindValue(':role', $params['role']);
    $prep->execute();
}
function getUtilisateur($id){
    global $pdo;
    $query = 'SELECT * FROM personne where id = :id;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':id', $id);
    $prep->execute();
    $result = $prep->fetch(); 
    return $result; 
}

//Supprimer Util
function getSuppUtilisateur($id){
    global $pdo;
    $query = "DELETE FROM personne where id = $id;";
    //$prep = $pdo->prepare($query);
    //$prep->bindValue(':id', $id);
    $rowCount = $pdo->exec($query);
}