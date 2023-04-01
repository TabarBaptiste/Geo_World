<?php
require_once('inc/manager-db.php');
print_r($_POST);
// on teste si nos variables sont définies et remplies
if (
    isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !
    empty($_POST['password'])
) {
    // on appele la fonction getAuthentification en lui passant en paramètre le login et password
    //la fonction retourne les caractéristiques du salaries si il est connu sinon elle retourne false
    $result = getAuthentification($_POST['login'], $_POST['password']);
    //print_r($result);
    // si le résulat n'est pas false
    if ($result) {
        // on la démarre la session
        session_start();
        // on enregistre les paramètres de notre visiteur comme variables de session
        $_SESSION['login'] = $result->login;
        $_SESSION['password'] = $result->password;
        $_SESSION['role'] = $result->role;
        print_r($_SESSION);
        // on redirige notre visiteur vers une page de notre section membre
        header('location: home.php');

    }
    //si le résultat est false on redirige vers la page d'authentification
    else {
        echo "oui";
        //header ('location: erreur.php');
        header('location: authentificationPays.php');
    }
}
//si nos variables ne sont pas renseignées on redirige vers la page d'authentification
else {
    //header ('location: erreur.php');
    header('location: authentificationPays.php');
}
?>