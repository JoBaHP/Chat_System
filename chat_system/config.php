<?php

//cinfiguring db connection

$dbhost = 'localhost';
$dbname ='chat'
$dbpass = '';

try{
$db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
}catch( PDOException $e ) {
    echo $e->getMessage();
}

?>