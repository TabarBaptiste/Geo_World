<?php
include("listeEleves.php");
if (isset($_GET['delete']) ){
    $id = $_GET['delete'];
    getSuppUtilisateur($id);
    echo "Utilisateur supprimé";
  }
?>