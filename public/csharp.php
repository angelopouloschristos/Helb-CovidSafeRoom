<?php
require_once("connection.php");
date_default_timezone_set('Europe/Brussels');

$taux = $_GET["taux"];
$type = $_GET["type"];
$local = $_GET["local"];
$date = date('Y-m-d H:i:s');

$data = [
        'taux' => $taux,
        'typeData' => $type,
        'date_' => $date,
        'idLocal' => $local,
    ];

try
{
	$stmt = $dbh->prepare("INSERT INTO mesure (taux,typeData,date_,idLocal) values (:taux,:typeData,:date_,:idLocal)");
	$stmt->execute($data);
	echo '  succes  ';
}
catch (PDOException $e)
{
	echo $e->getMessage();
}

?>