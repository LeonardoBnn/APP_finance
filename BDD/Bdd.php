<?php 

try{
    $user='root';
    $pass='';
    $bdd=new PDO('mysql=host:localhost;dbname=Appdeoaaozuhda', $user, $pass);
}catch(PDOException $e){
    print 'error :' .$e->getMessage();
    '<br>';
    die();
}

?>