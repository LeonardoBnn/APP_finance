<?php
include ('BDD/Bdd.php');

$req = $bdd -> prepare("SELECT * FROM categorie");
$req -> execute();

$categories = $req->fetchAll();

?>