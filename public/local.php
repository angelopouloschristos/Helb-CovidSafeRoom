<!DOCTYPE html>
<html lang="en">
<head>
<?php
        //si tu veut voir les warnings ou les log pendent les error -> mets la ligne suivante en commantaire
        #error_reporting(E_ERROR | E_PARSE);
        require_once("connection.php");
        $local_en_cours = $_GET['localId'];

        $stmt_mes = $dbh->prepare("SELECT * FROM Mesure where idLocal = $local_en_cours and typeData = 3 ORDER BY `Mesure`.`date_` DESC") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $diego[$cpt] = $item['taux'];
            $cpt++;
        }
        function check_vide($item){
            return $item  ?? 0;
        }
        for ($i=0; $i < 7; $i++) { 
            $diego[$i] = check_vide($diego[$i]);
        }
#sfdhjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk
        $stmt_mes = $dbh->prepare("SELECT * FROM Mesure where idLocal = $local_en_cours and typeData = 2 ORDER BY `Mesure`.`date_` DESC") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $christos[$cpt] = $item['taux'];
            $cpt++;
        }
        for ($i=0; $i < 7; $i++) { 
            $christos[$i] = check_vide($christos[$i]);
        }
#kjlsdfh;hh;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;;;saddas
        $stmt_mes = $dbh->prepare("SELECT * FROM Mesure where idLocal = $local_en_cours and typeData = 1 ORDER BY `Mesure`.`date_` DESC") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $henry[$cpt] = $item['taux'];
            $cpt++;
        }
        for ($i=0; $i < 7; $i++) { 
            $henry[$i] = check_vide($henry[$i]);
        }

    ?>
<script>
    
    var day1 ='<?php echo $diego[0]; ?>';
    var day2 ='<?php echo $diego[1]; ?>';
    var day3 ='<?php echo $diego[2]; ?>';
    var day4 ='<?php echo $diego[3]; ?>';
    var day5 ='<?php echo $diego[4]; ?>';
    var day6 ='<?php echo $diego[5]; ?>';
    var day7 ='<?php echo $diego[6]; ?>';

    var hum1 ='<?php echo $christos[0]; ?>';
    var hum2 ='<?php echo $christos[1]; ?>';
    var hum3 ='<?php echo $christos[2]; ?>';
    var hum4 ='<?php echo $christos[3]; ?>';
    var hum5 ='<?php echo $christos[4]; ?>';
    var hum6 ='<?php echo $christos[5]; ?>';
    var hum7 ='<?php echo $christos[6]; ?>';

    var tem1 ='<?php echo $henry[0]; ?>';
    var tem2 ='<?php echo $henry[1]; ?>';
    var tem3 ='<?php echo $henry[2]; ?>';
    var tem4 ='<?php echo $henry[3]; ?>';
    var tem5 ='<?php echo $henry[4]; ?>';
    var tem6 ='<?php echo $henry[5]; ?>';
    var tem7 ='<?php echo $henry[6]; ?>';

</script>
    <meta charset="UTF-8" http-equiv="refresh" content="10">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidSafeRoom</title>
    <link rel="stylesheet" href="css/index.css" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/element.loader.js"></script>
    <script type="text/javascript" src="js/graph.minmax.js"></script>
</head>
<body>

    <?php
    //partie connection avec db et instentiation des variables
        
        #PPM
        $stmt = $dbh->prepare("SELECT * FROM Local_ where idLocal = $local_en_cours ") ;
        $stmt->execute();
        $local = $stmt->fetch();
        $nom_local = $local['nom'];
        #select mesure du local CO2/PPM
        $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $local_en_cours and typeData = 3 ORDER BY `Mesure`.`date_` DESC") ;
        $stmt->execute();
        $mesure = $stmt->fetch();
        $taux_ppm;
        $date_ppm;
        if ($mesure==null) {
            $taux_ppm = 0;
            $date_ppm ='mesure existe pas';
        }else {
            $taux_ppm = $mesure['taux'];
            $date_ppm = $mesure['date_'];
        }
        //temp
        $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $local_en_cours and typeData = 1 ORDER BY `Mesure`.`date_` DESC") ;
        $stmt->execute();
        $mesure = $stmt->fetch();
        $taux_temp;
        $date_temp;
        if ($mesure==null) {
            $taux_temp = 0;
            $date_temp ='mesure existe pas';
        }else {
            $taux_temp = $mesure['taux'];
            $date_temp = $mesure['date_'];
        }
        //HUM
        $stmt = $dbh->prepare("SELECT * FROM Mesure where idLocal = $local_en_cours and typeData = 2 ORDER BY `Mesure`.`date_` DESC") ;
        $stmt->execute();
        $mesure = $stmt->fetch();
        $taux_hum;
        $date_hum;
        if ($mesure==null) {
            $taux_hum = 0;
            $date_hum ='mesure existe pas';
        }else {
            $taux_hum = $mesure['taux'];
            $date_hum = $mesure['date_'];
        }


    ?>

<!-- Loaded header via JS-->
<div id="header"></div>
<div class="d-flex justify-content-around">
    <h1>Local <?php echo $nom_local ?></h1>
</div>
<div class="d-flex justify-content-around">
    <div class="wrapper">
        <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm;?>" data-arrow="up">
            <span style="font-size: 1.6em"><?php echo $date_ppm;?><br> Taux de Co2</span>
            <br>
        </div>
    </div>

    <div class="wrapper">
        <div class="container chart" data-size="300" data-value=" <?php if($taux_temp<0){echo 0;}else{echo $taux_temp;} ?> " data-arrow="up">
            <span style="font-size: 1.6em"><?php echo $date_temp;?><br> <?php if($taux_temp<0){echo "Error Temperature negatif";}else{echo "Temperature";} ?></span>
            <br>
        </div>
    </div>

    <div class="wrapper">
        <div class="container chart" data-size="300" data-value=" <?php echo $taux_hum; ?> " data-arrow="up">
            <span style="font-size: 1.6em"><?php echo $date_hum;?><br>Humidité</span>
            <br>
        </div>
    </div>
    <div class="wrapper" style="display: none;">
        <div class="container chart" data-size="300" data-value=" <?php echo 0; ?> " data-arrow="up">
            <span style="font-size: 1.6em"><?php echo $date_hum;?></span>
            <br>
        </div>
    </div>
</div>

<!------------------------------------                 TOP ROW              --------------------------------->

<div class="d-flex justify-content-center">
    <div class="line-chart">
        <div class="aspect-ratio">
            <canvas id="chartDataLocal1" style="display: inline-block; width: 600px; height: 300px;" width="600" height="300"></canvas>
            <canvas id="chartMaximaLocal1" style="display: inline-block; width: 600px; height: 300px;" width="600" height="300"></canvas>
            <canvas id="chartMinimaLocal1" style="display: inline-block; width: 600px; height: 300px;" width="600" height="300"></canvas>
        </div>
    </div>
</div>

<!------------------------------------                 BOTTOM ROW              --------------------------------->
<div class="d-flex justify-content-center">
    <div class="line-chart">
        <div class="aspect-ratio">
            <canvas id="chartMoyenne1" style="display: inline-block; width: 600px; height: 300px;" width="600" height="300"></canvas>
            <canvas id="chartEcartType1" style="display: inline-block; width: 600px; height: 300px;" width="600" height="300"></canvas>
            <canvas id="chartMediane1" style="display: inline-block; width: 600px; height: 300px;" width="600" height="300"></canvas>
        </div>
    </div>
</div>



</div>
</body>

<!-- Optional JavaScript -->
<!-- If needed, jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/bootstrap.bundle.js"></script> <!-- Ajout du bootstrap JS-->
<script type="text/javascript" src="js/donut-local.js"></script>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
<script src='https://codepen.io/grayghostvisuals/pen/GqovBM/a08e0d79c150ff5030f9b6afaa137749.js'></script>
<script  src="js/graph.minmax.js"></script>
</html>
