<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="900000000">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidSafeRoom</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/element.loader.js"></script>
    <?php
    session_start();
    if (!isset($_SESSION["logged"])) {
        //echo 'connextion avec succes';
        
        echo '<script>window.location = "index.php"</script>';
    }
    //partie connection avec db et instentiation des variables
    require_once("connection.php");

    $stmt_loc = $dbh->prepare("SELECT * FROM local_ ") ;
    $stmt_loc->execute();
    $stmt_loc->setFetchMode(PDO::FETCH_ASSOC) ;

    $cpt = 0;
    foreach($stmt_loc as $row_loc)
    {
        $locals_id[$cpt] = $row_loc['idLocal'];
        $locals_names[$cpt] = $row_loc['nom'];
        $cpt++;
    }

    $local_en_cours = 1;
    #select local
    $stmt = $dbh->prepare("SELECT * FROM local_ where idLocal = $local_en_cours ");
    $stmt->execute();
    $local = $stmt->fetch();
    $nom_local = $local['nom'];
    #select mesure du local


    ?>
</head>

<body>
<!-- Loaded header via JS-->
<div id="header"></div>

<?php
    $taux_ppm = 0;
    $date_ppm = 0;
    $taux_hum = 0;
    $taux_temp = 0;
    $color = "#FFFFFF";
    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[0] and typeData = 3 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_ppm = 0;
        $date_ppm = 'mesure existe pas';
    } else {
        $taux_ppm = $mesure['taux'];
        $date_ppm = $mesure['date_'];
    }

    if($taux_temp > 24){
        $color = "#FF0000";
        #Code rouge > 24
    }
    else if ($taux_temp > 20 && $taux_temp <= 24){
    $color = "#FF7F00";
    #Code orange >20 & <=24
    }
    else if ($taux_temp >= 15 && $taux_temp<= 20){
    $color = "#00FF00";
    #Code vert >= 15 & <=20
    }
    else if ($taux_temp <= 14){
    $color = "#1B7CED";
    #Code bleu
    }
    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[0] and typeData = 2 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_hum = 0;
        $date_hum = 'mesure existe pas';
    } else {
        $taux_hum = $mesure['taux'];
    }

    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[0] and typeData = 1 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_temp = 0;
    } else {
        $taux_temp = $mesure['taux'];
    }
$datetime = new DateTime($date_ppm);

$date = $datetime->format('d/m/Y');
$time = $datetime->format('H:i:s');
?>

<div id="cadre" class="d-flex justify-content-around pad">
    <div id="svgbox" class="d-flex flex-column border border-primary rounded">
        <div class="wrapper">

            <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm; ?>" data-arrow="up">
                <span style="font-size: 1.6em">Local <?php echo $locals_names[0] . ' à ' . $time . ' le ' . $date; ?></span>
                <br>

            </div>
        </div>
        <div class="d-flex">
            <button type="button" id="taux-temp" class="flex-fill disabled btn btn-lg btn-outline-info"><?php echo $taux_temp; ?>°c</button>
            <button type="button" id="taux-hum" class="flex-fill disabled btn btn-lg btn-outline-info"><?php echo $taux_hum; ?>%HR</button>
        </div>
        <button onclick="window.location.href='<?php echo 'local.php?localId='.$locals_id[0].''?>'" class="btn btn-lg btn-primary b-info" type="button">Détails</button>

    </div>

    <?php
    $taux_ppm;
    $date_ppm;
    $taux_hum;
    $taux_temp;
    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[1] and typeData = 3 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_ppm = 0;
        $date_ppm = 'mesure existe pas';
    } else {
        $taux_ppm = $mesure['taux'];
        $date_ppm = $mesure['date_'];
    }

    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[1] and typeData = 2 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_hum = 0;
        $date_hum = 'mesure existe pas';
    } else {
        $taux_hum = $mesure['taux'];
    }

    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[1] and typeData = 1 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_temp = 0;
    } else {
        $taux_temp = $mesure['taux'];
    }
?>


    <div id="svgbox" class="d-flex flex-column border border-primary rounded">
        <div class="wrapper">

            <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm; ?>" data-arrow="up">
                <span style="font-size: 1.6em">Local <?php echo $locals_names[1] . ' à ' . $time . ' le ' . $date; ?></span>
                <br>

            </div>
        </div>
        <div class="d-flex">
            <button type="button" id="taux-temp" class="flex-fill disabled btn btn-lg btn-outline-info"><?php echo $taux_temp; ?>°c</button>
            <button type="button" id="taux-hum" class="flex-fill disabled btn btn-lg btn-outline-info"><?php echo $taux_hum; ?>%HR</button>
        </div>
        <button onclick="window.location.href='<?php echo 'local.php?localId='.$locals_id[1].''?>'" class="btn btn-lg btn-primary b-info" type="button">Détails</button>

    </div>

    <?php
    $taux_ppm;
    $date_ppm;
    $taux_hum;
    $taux_temp;
    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[2] and typeData = 3 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_ppm = 0;
        $date_ppm = 'mesure existe pas';
    } else {
        $taux_ppm = $mesure['taux'];
        $date_ppm = $mesure['date_'];
    }

    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[2] and typeData = 2 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_hum = 0;
        $date_hum = 'mesure existe pas';
    } else {
        $taux_hum = $mesure['taux'];
    }

    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[2] and typeData = 1 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_temp = 0;
    } else {
        $taux_temp = $mesure['taux'];
    }
?>


    <div id="svgbox" class="d-flex flex-column border border-primary rounded">
        <div class="wrapper">

            <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm; ?>" data-arrow="up">
                <span style="font-size: 1.6em">Local <?php echo $locals_names[2] . ' à ' . $time . ' le ' . $date; ?></span>
                <br>

            </div>
        </div>
        <div class="d-flex">
            <button type="button" id="taux-temp" class="flex-fill disabled btn btn-lg btn-outline-info"><?php echo $taux_temp; ?>°c</button>
            <button type="button" id="taux-hum" class="flex-fill disabled btn btn-lg btn-outline-info"><?php echo $taux_hum; ?>%HR</button>
        </div>
        <button onclick="window.location.href='<?php echo 'local.php?localId='.$locals_id[2].''?>'" class="btn btn-lg btn-primary b-info" type="button">Détails</button>

    </div>




    <?php
    $taux_ppm;
    $date_ppm;
    $taux_hum;
    $taux_temp;
    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[3] and typeData = 3 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_ppm = 0;
        $date_ppm = 'mesure existe pas';
    } else {
        $taux_ppm = $mesure['taux'];
        $date_ppm = $mesure['date_'];
    }

    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[3] and typeData = 2 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_hum = 0;
        $date_hum = 'mesure existe pas';
    } else {
        $taux_hum = $mesure['taux'];
    }

    $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $locals_id[3] and typeData = 1 ORDER BY `mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();

    if ($mesure == null) {
        $taux_temp = 0;
    } else {
        $taux_temp = $mesure['taux'];
    }
?>


    <div id="svgbox" class="d-flex flex-column border border-primary rounded">
        <div class="wrapper">

            <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm; ?>" data-arrow="up">
                <span style="font-size: 1.6em">Local <?php echo $locals_names[3] . ' à ' . $time . ' le ' . $date; ?></span>
                <br>

            </div>
        </div>
        <div class="d-flex">
            <button type="button" id="taux-temp" class="flex-fill disabled btn btn-lg btn-outline-info"><?php echo $taux_temp; ?>°c</button>
            <button type="button" id="taux-hum" class="flex-fill disabled btn btn-lg btn-outline-info"><?php echo $taux_hum; ?>%HR</button>
        </div>
        <button onclick="window.location.href='<?php echo 'local.php?localId='.$locals_id[3].''?>'" class="btn btn-lg btn-primary b-info" type="button">Détails</button>
    </div>


</div>

</div>
</body>

<!-- Optional JavaScript -->
<!-- If needed, jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/bootstrap.bundle.js"></script> <!-- Ajout du bootstrap JS-->
<script type="text/javascript" src="js/donut.js"></script>
</html>
