<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidSafeRoom</title>
    <link rel="stylesheet" href="css/index.css" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/element.loader.js"></script>
    <?php
    //partie connection avec db et instentiation des variables
        require_once("connection.php");
        $local_en_cours = $_GET['localId'];
        #select local
        $stmt = $dbh->prepare("SELECT * FROM local_ where idLocal = $local_en_cours ") ;
        $stmt->execute();
        $local = $stmt->fetch();
        $nom_local = $local['nom'];
        #select mesure du local
        $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $local_en_cours and typeData = 3 ORDER BY `mesure`.`date_` DESC") ;
        $stmt->execute();
        $mesure = $stmt->fetch();
        if ($mesure==null) {
            $taux_ppm = 0;
            $date ='mesure existe pas';
        }else {
            $taux_ppm = $mesure['taux'];
            $date = $mesure['date_'];
        }
        
    ?>
</head>

<body>
<!-- Loaded header via JS-->
<div id="header"></div>

<div class="wrapper">

    <div class="container chart" data-size="300" data-value=" <?php echo $taux_ppm;?> " data-arrow="up">
        <span style="font-size: 1.6em">Local <?php echo $nom_local.' a '.$date;?></span>
        <p></p>
    </div>
</div>

</div>
</body>

<!-- Optional JavaScript -->
<!-- If needed, jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/bootstrap.bundle.js"></script> <!-- Ajout du bootstrap JS-->
<script type="text/javascript" src="js/donut.js"></script>
</html>
