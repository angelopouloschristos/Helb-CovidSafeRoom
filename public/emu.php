<?php
require_once("connection.php");

$cpt = 0;
$time = 60*5; //-> in seconds

function insert_data($local_,$type_,$dbh){
    $local = $local_;
    $taux = 0;

    if ($type_==1) {//temp
        $taux = rand(-15,40);
    }else if($type_ == 2){//hum
        $taux = rand(0,100);
    }elseif ($type_ == 3) { //PPM
        $taux = rand(0,900);
    }

    $type = $type_;
    $date = date('Y-m-d H:i:s');

    $data = [
        'taux' => $taux,
        'typeData' => $type,
        'date_' => $date,
        'idLocal' => $local,
    ];

    try
    {
        $stmt = $dbh->prepare("INSERT INTO Mesure (taux,typeData,date_,idLocal) values (:taux,:typeData,:date_,:idLocal)");
        $stmt->execute($data);
        echo '  succes  ';
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}


while ($cpt <= 10) {

    insert_data(1,1,$dbh);
    insert_data(1,2,$dbh);
    insert_data(1,3,$dbh);

    insert_data(2,1,$dbh);
    insert_data(2,2,$dbh);
    insert_data(2,3,$dbh);
    
    insert_data(3,1,$dbh);
    insert_data(3,2,$dbh);
    insert_data(3,3,$dbh);

    insert_data(4,1,$dbh);
    insert_data(4,2,$dbh);
    insert_data(4,3,$dbh);

    echo '   waiting    ';
    sleep($time);
}


?>