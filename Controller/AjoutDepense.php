<?php

include('../BDD/Bdd.php');

if(isset($_POST['ajouter']))
{
    $Montant = $_POST['Montant'];
    $Cat_id = $_POST['Cat_id'];
    
    $req = $bdd->prepare("INSERT INTO depense (Montant, Cat_id) VALUES (:Montant, :Cat_id)");
    
        $req->bindParam(':Montant', $Montant);
        $req->bindParam(':Cat_id', $Cat_id);
        
    $req->execute();

    header('Location:http://127.0.0.1/APP_finance/');
}

?>