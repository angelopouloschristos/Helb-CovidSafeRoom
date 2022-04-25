<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="10">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidSafeRoom</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/element.loader.js"></script>
    <?php
    //partie connection avec db et instentiation des variables
    require_once("connection.php");

    $stmt_loc = $dbh->prepare("SELECT * FROM Local_ ") ;
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
    $stmt = $dbh->prepare("SELECT * FROM Local_ where idLocal = $local_en_cours ");
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
    $taux_ppm;
    $date_ppm;
    $taux_hum;
    $taux_temp;
    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[0] and typeData = 3 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_ppm = 0;
        $date_ppm = 'mesure existe pas';
    } else {
        $taux_ppm = $mesure['taux'];
        $date_ppm = $mesure['date_'];
    }

    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[0] and typeData = 2 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_hum = 0;
        $date_hum = 'mesure existe pas';
    } else {
        $taux_hum = $mesure['taux'];
    }

    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[0] and typeData = 1 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_temp = 0;
    } else {
        $taux_temp = $mesure['taux'];
    }
?>

<div class="d-flex justify-content-around pad">
    <div class="d-flex flex-column border border-primary rounded">
        <div class="wrapper">

            <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm; ?>" data-arrow="up">
                <span style="font-size: 1.6em">Local <?php echo $locals_names[0] . ' à ' . $date_ppm; ?></span>
                <br>

            </div>
        </div>
        <div class="align-self-center mx-auto">
            <button type="button" class="temphum disabled btn btn-lg btn-outline-info"><?php echo $taux_temp; ?>°c</button>
            <button type="button" class="temphum disabled btn btn-lg btn-outline-info"><?php echo $taux_hum; ?>%HR</button>
        </div>
        <button onclick="window.location.href='<?php echo 'local.php?localId='.$locals_id[0].''?>'" class="btn btn-lg btn-primary b-info" type="button">Détails</button>

    </div>

    <?php 
    $taux_ppm;
    $date_ppm;
    $taux_hum;
    $taux_temp;
    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[1] and typeData = 3 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_ppm = 0;
        $date_ppm = 'mesure existe pas';
    } else {
        $taux_ppm = $mesure['taux'];
        $date_ppm = $mesure['date_'];
    }

    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[1] and typeData = 2 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_hum = 0;
        $date_hum = 'mesure existe pas';
    } else {
        $taux_hum = $mesure['taux'];
    }

    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[1] and typeData = 1 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_temp = 0;
    } else {
        $taux_temp = $mesure['taux'];
    }
?>


    <div class="d-flex flex-column border border-primary rounded">
        <div class="wrapper">

            <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm; ?>" data-arrow="up">
                <span style="font-size: 1.6em">Local <?php echo $locals_names[1] . ' à ' . $date_ppm; ?></span>
                <br>

            </div>
        </div>
        <div class="align-self-center mx-auto">
            <button type="button" class="temphum disabled btn btn-lg btn-outline-info"><?php echo $taux_temp; ?>°c</button>
            <button type="button" class="temphum disabled btn btn-lg btn-outline-info"><?php echo $taux_hum; ?>%HR</button>
        </div>
        <button onclick="window.location.href='<?php echo 'local.php?localId='.$locals_id[1].''?>'" class="btn btn-lg btn-primary b-info" type="button">Détails</button>

    </div>

    <?php 
    $taux_ppm;
    $date_ppm;
    $taux_hum;
    $taux_temp;
    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[2] and typeData = 3 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_ppm = 0;
        $date_ppm = 'mesure existe pas';
    } else {
        $taux_ppm = $mesure['taux'];
        $date_ppm = $mesure['date_'];
    }

    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[2] and typeData = 2 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_hum = 0;
        $date_hum = 'mesure existe pas';
    } else {
        $taux_hum = $mesure['taux'];
    }

    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[2] and typeData = 1 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_temp = 0;
    } else {
        $taux_temp = $mesure['taux'];
    }
?>


    <div class="d-flex flex-column border border-primary rounded">
        <div class="wrapper">

            <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm; ?>" data-arrow="up">
                <span style="font-size: 1.6em">Local <?php echo $locals_names[2] . ' à ' . $date_ppm; ?></span>
                <br>

            </div>
        </div>
        <div class="align-self-center mx-auto">
            <button type="button" class="temphum disabled btn btn-lg btn-outline-info"><?php echo $taux_temp; ?>°c</button>
            <button type="button" class="temphum disabled btn btn-lg btn-outline-info"><?php echo $taux_hum; ?>%HR</button>
        </div>
        <button onclick="window.location.href='<?php echo 'local.php?localId='.$locals_id[2].''?>'" class="btn btn-lg btn-primary b-info" type="button">Détails</button>

    </div>
    



    <?php 
    $taux_ppm;
    $date_ppm;
    $taux_hum;
    $taux_temp;
    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[3] and typeData = 3 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_ppm = 0;
        $date_ppm = 'mesure existe pas';
    } else {
        $taux_ppm = $mesure['taux'];
        $date_ppm = $mesure['date_'];
    }

    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[3] and typeData = 2 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_hum = 0;
        $date_hum = 'mesure existe pas';
    } else {
        $taux_hum = $mesure['taux'];
    }

    $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $locals_id[3] and typeData = 1 ORDER BY `Mesure`.`date_` DESC");
    $stmt->execute();
    $mesure = $stmt->fetch();
    
    if ($mesure == null) {
        $taux_temp = 0;
    } else {
        $taux_temp = $mesure['taux'];
    }
?>


    <div class="d-flex flex-column border border-primary rounded">
        <div class="wrapper">

            <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm; ?>" data-arrow="up">
                <span style="font-size: 1.6em">Local <?php echo $locals_names[3] . ' à ' . $date_ppm; ?></span>
                <br>

            </div>
        </div>
        <div class="align-self-center mx-auto">
            <button type="button" class="temphum disabled btn btn-lg btn-outline-info"><?php echo $taux_temp; ?>°c</button>
            <button type="button" class="temphum disabled btn btn-lg btn-outline-info"><?php echo $taux_hum; ?>%HR</button>
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
