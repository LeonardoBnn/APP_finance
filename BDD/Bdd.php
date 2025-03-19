<?php 

try{
    $user='root';
    $pass='';
    $bdd=new PDO('mysql=host:localhost;dbname=wealthy', $user, $pass);

}catch(PDOException $e){
    print 'error :' .$e->getMessage();
    '<br>';
    die();
}

?>