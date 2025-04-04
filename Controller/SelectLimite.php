<?php
include ('BDD/Bdd.php');

$req = $bdd -> prepare("SELECT * FROM limite");
$req -> execute();

$limites = $req->fetchAll();

?>