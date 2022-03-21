<?php

//connexion.php

// on défini les paramètre de connexion à la DB
//**************   local   */
$host='127.0.0.1';
$user='root';
$pass='';
$db='helb_covidsaferoom';

//***************   server */
#$host='mysql';
#$user='default';
#$pass='lkiawsdkjsdfbkjzsdlkjasdf';
#$db='helb_covidsaferoom';

// Définition des variables de connexion
$dsn = "mysql:host={$host};dbname={$db}";
$dbh = null;
//**************************************
// connexion à mysql et à la db
//**************************************
try 
{
	$dbh = new PDO($dsn, $user, $pass); //db handle
	$dbh->exec('SET NAMES utf8');
} 
catch (PDOException $e) 
{
	die( "Erreur ! : " . $e->getMessage() );
}
