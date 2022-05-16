<!DOCTYPE html>
<html lang="en">
<head>
<?php
        //si tu veut voir les warnings ou les log pendent les error -> mets la ligne suivante en commantaire


        error_reporting(E_ERROR | E_PARSE);
        require_once("connection.php");
        session_start();

        if(isset($_POST['submit'])){
            if(!empty($_POST['time'])) {
                $selected = $_POST['time'];
            }
        }
        $local_en_cours = $_GET['localId'];
        $chart = $selected;

    
        $stmt_mes = $dbh->prepare("SELECT date(date_) as jour,max(taux) as taux_max FROM mesure where idLocal = $local_en_cours and typeData = 3 GROUP BY date(date_) ORDER BY date(date_) DESC ") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            //printf(' / '.$item['jour']);
            $diego[$cpt] = $item['taux_max'];
            $days[$cpt] = $item['jour']; 
            $cpt++;
        }
        function check_vide($item){
            return $item  ?? 0;
        }
        for ($i=0; $i < 7; $i++) { 
            $diego[$i] = check_vide($diego[$i]);
        }
#sfdhjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk
        $stmt_mes = $dbh->prepare("SELECT date(date_)as jour, max(taux) as taux_max FROM mesure where idLocal = $local_en_cours and typeData = 2 group by date(date_) ORDER BY date(date_) DESC") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $christos[$cpt] = $item['taux_max'];
            $dayt[$cpt] = $item['jour'];
            $cpt++;
        }
        for ($i=0; $i < 7; $i++) { 
            $christos[$i] = check_vide($christos[$i]);
        }
#kjlsdfh;hh;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;;;saddas
        $stmt_mes = $dbh->prepare("SELECT date(date_)as jour, max(taux) as taux_max FROM mesure where idLocal = $local_en_cours and typeData = 1 group by date(date_) ORDER BY date(date_) DESC") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $henry[$cpt] = $item['taux_max'];
            $dayh[$cpt] = $item['jour'];
            $cpt++;
        }
        for ($i=0; $i < 7; $i++) { 
            $henry[$i] = check_vide($henry[$i]);
        }

        $stmt_mes = $dbh->prepare("SELECT date(date_) as jour,min(taux) as taux_max FROM mesure where idLocal = $local_en_cours and typeData = 3 GROUP BY date(date_) ORDER BY date(date_) DESC ") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            //printf(' / '.$item['jour']);
            $diego1[$cpt] = $item['taux_max'];
            $cpt++;
        }
        for ($i=0; $i < 7; $i++) { 
            $diego1[$i] = check_vide($diego1[$i]);
        }
#sfdhjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk
        $stmt_mes = $dbh->prepare("SELECT date(date_)as jour, min(taux) as taux_max FROM mesure where idLocal = $local_en_cours and typeData = 2 group by date(date_) ORDER BY date(date_) DESC") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $christos1[$cpt] = $item['taux_max'];
            $cpt++;
        }
        for ($i=0; $i < 7; $i++) { 
            $christos1[$i] = check_vide($christos1[$i]);
        }
#kjlsdfh;hh;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;h;;;saddas
        $stmt_mes = $dbh->prepare("SELECT date(date_)as jour, min(taux) as taux_max FROM mesure where idLocal = $local_en_cours and typeData = 1 group by date(date_) ORDER BY date(date_) DESC") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $henry1[$cpt] = $item['taux_max'];
            $cpt++;
        }
        for ($i=0; $i < 7; $i++) { 
            $henry1[$i] = check_vide($henry1[$i]);
        }
        
        $title_chart = 'dernieres mesures';
        ///////GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
        //CO2
        $stmt_mes = $dbh->prepare("SELECT date(date_)as jour, avg(taux) as moyenne FROM mesure where idLocal = $local_en_cours and typeData = 3 group by date(date_) ORDER BY date(date_) DESC;") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $cm[$cpt] = $item['moyenne'];
            $cpt++;
        }
        for ($i=0; $i < $cpt; $i++) { 
            $cm[$i] = check_vide($cm[$i]);
        }
        
        //hum
        $stmt_mes = $dbh->prepare("SELECT date(date_)as jour, avg(taux) as moyenne FROM mesure where idLocal = $local_en_cours and typeData = 2 group by date(date_) ORDER BY date(date_) DESC;") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $hm[$cpt] = $item['moyenne'];
            $cpt++;
        }
        for ($i=0; $i < $cpt; $i++) { 
            $hm[$i] = check_vide($hm[$i]);
        }

        //temp
        $stmt_mes = $dbh->prepare("SELECT date(date_)as jour, avg(taux) as moyenne FROM mesure where idLocal = $local_en_cours and typeData = 1 group by date(date_) ORDER BY date(date_) DESC;") ;
        $stmt_mes->execute();
        $stmt_mes->setFetchMode(PDO::FETCH_ASSOC) ;
        //juste une function pour debug car c'est impossible de write console depuis php 
        //on remplis un tab avec les valeurs de la requete
        $cpt = 0;
        foreach ($stmt_mes as $item) {
            $tm[$cpt] = $item['moyenne'];
            $cpt++;
        }
        for ($i=0; $i < $cpt; $i++) { 
            $tm[$i] = check_vide($tm[$i]);
        }

    ?>
<script>
    //CO2
   
    var day1 ='<?php echo $diego[0]; ?>';
    var day2 ='<?php echo $diego[1]; ?>';
    var day3 ='<?php echo $diego[2]; ?>';
    var day4 ='<?php echo $diego[3]; ?>';
    var day5 ='<?php echo $diego[4]; ?>';
    var day6 ='<?php echo $diego[5]; ?>';
    var day7 ='<?php echo $diego[6]; ?>';

    var d0 = '<?php echo $days[0]; ?>';
    var d1 = '<?php echo $days[1]; ?>';
    var d2 = '<?php echo $days[2]; ?>';
    var d3 = '<?php echo $days[3]; ?>';
    var d4 = '<?php echo $days[4]; ?>';
    var d5 = '<?php echo $days[5]; ?>';
    var d6 = '<?php echo $days[6]; ?>';

    var day11 ='<?php echo $diego1[0]; ?>';
    var day21 ='<?php echo $diego1[1]; ?>';
    var day31 ='<?php echo $diego1[2]; ?>';
    var day41 ='<?php echo $diego1[3]; ?>';
    var day51 ='<?php echo $diego1[4]; ?>';
    var day61 ='<?php echo $diego1[5]; ?>';
    var day71 ='<?php echo $diego1[6]; ?>';

    var cm1 ='<?php echo $cm[0]; ?>';
    var cm2 ='<?php echo $cm[1]; ?>';
    var cm3='<?php echo $cm[2]; ?>';
    var cm4 ='<?php echo $cm[3]; ?>';
    var cm5 ='<?php echo $cm[4]; ?>';
    var cm6 ='<?php echo $cm[5]; ?>';
    var cm7 ='<?php echo $cm[6]; ?>';

    //HUM
    var hum1 ='<?php echo $christos[0]; ?>';
    var hum2 ='<?php echo $christos[1]; ?>';
    var hum3 ='<?php echo $christos[2]; ?>';
    var hum4 ='<?php echo $christos[3]; ?>';
    var hum5 ='<?php echo $christos[4]; ?>';
    var hum6 ='<?php echo $christos[5]; ?>';
    var hum7 ='<?php echo $christos[6]; ?>';

    var hm1 ='<?php echo $hm[0]; ?>';
    var hm2 ='<?php echo $hm[1]; ?>';
    var hm3 ='<?php echo $hm[2]; ?>';
    var hm4 ='<?php echo $hm[3]; ?>';
    var hm5 ='<?php echo $hm[4]; ?>';
    var hm6 ='<?php echo $hm[5]; ?>';
    var hm7 ='<?php echo $hm[6]; ?>';

    var h0 = '<?php echo $dayh[0]; ?> ';
    var h1 = '<?php echo $dayh[1]; ?> ';
    var h2 = '<?php echo $dayh[2]; ?> ';
    var h3 = '<?php echo $dayh[3]; ?> ';
    var h4 = '<?php echo $dayh[4]; ?> ';
    var h5 = '<?php echo $dayh[5]; ?> ';
    var h6 = '<?php echo $dayh[6]; ?> ';

    var hum11 ='<?php echo $christos1[0]; ?>';
    var hum21 ='<?php echo $christos1[1]; ?>';
    var hum31 ='<?php echo $christos1[2]; ?>';
    var hum41 ='<?php echo $christos1[3]; ?>';
    var hum51 ='<?php echo $christos1[4]; ?>';
    var hum61 ='<?php echo $christos1[5]; ?>';
    var hum71 ='<?php echo $christos1[6]; ?>';


    //TEMP
    var tem1 ='<?php echo $henry[0]; ?>';
    var tem2 ='<?php echo $henry[1]; ?>';
    var tem3 ='<?php echo $henry[2]; ?>';
    var tem4 ='<?php echo $henry[3]; ?>';
    var tem5 ='<?php echo $henry[4]; ?>';
    var tem6 ='<?php echo $henry[5]; ?>';
    var tem7 ='<?php echo $henry[6]; ?>';

    var tm1 ='<?php echo $tm[0]; ?>';
    var tm2 ='<?php echo $tm[1]; ?>';
    var tm3 ='<?php echo $tm[2]; ?>';
    var tm4 ='<?php echo $tm[3]; ?>';
    var tm5 ='<?php echo $tm[4]; ?>';
    var tm6 ='<?php echo $tm[5]; ?>';
    var tm7 ='<?php echo $tm[6]; ?>';


    var t0 = '<?php echo $dayt[0]; ?> ';
    var t1 = '<?php echo $dayt[1]; ?> ';
    var t2 = '<?php echo $dayt[2]; ?> ';
    var t3 = '<?php echo $dayt[3]; ?> ';
    var t4 = '<?php echo $dayt[4]; ?> ';
    var t5 = '<?php echo $dayt[5]; ?> ';
    var t6 = '<?php echo $dayt[6]; ?> ';

    var tem11 ='<?php echo $henry1[0]; ?>';
    var tem21 ='<?php echo $henry1[1]; ?>';
    var tem31 ='<?php echo $henry1[2]; ?>';
    var tem41 ='<?php echo $henry1[3]; ?>';
    var tem51 ='<?php echo $henry1[4]; ?>';
    var tem61 ='<?php echo $henry1[5]; ?>';
    var tem71 ='<?php echo $henry1[6]; ?>';

    
    var title_chart = '<?php echo $title_chart; ?> ';


</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidSafeRoom</title>
    <link rel="stylesheet" href="css/index.css" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/element.loader.js"></script>
    <script type="text/javascript" src="js/graph.minmax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <?php
    //partie connection avec db et instentiation des variables
        
        #PPM
        $stmt = $dbh->prepare("SELECT * FROM local_ where idLocal = $local_en_cours ") ;
        $stmt->execute();
        $local = $stmt->fetch();
        $nom_local = $local['nom'];
        #select mesure du local CO2/PPM
        $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $local_en_cours and typeData = 3 ORDER BY `mesure`.`date_` DESC") ;
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
        $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $local_en_cours and typeData = 1 ORDER BY `mesure`.`date_` DESC") ;
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
        $stmt = $dbh->prepare("SELECT * FROM mesure where idLocal = $local_en_cours and typeData = 2 ORDER BY `mesure`.`date_` DESC") ;
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
<div id="cadre" class="d-flex justify-content-around pad">
    <div id="svgbox" class="d-flex flex-column border border-primary rounded">
    <div class="wrapper">
        <div class="container chart" data-size="300" data-value="<?php echo $taux_ppm;?>" data-arrow="up">
            <span style="font-size: 1.6em"><?php echo $date_ppm;?><br> Taux de Co2</span>
            <br>
        </div>
    </div>
    </div>
    <div id="svgbox" class="d-flex flex-column border border-primary rounded">
    <div class="wrapper">
        <div class="container chart" data-size="300" data-value=" <?php echo $taux_temp; ?> " data-arrow="up">
            <span style="font-size: 1.6em"><?php echo $date_temp;?><br> <?php if($taux_temp<0){echo "Error Temperature négative";}else{echo "Temperature";} ?></span>
            <br>
        </div>
    </div>
    </div>
    <div id="svgbox" class="d-flex flex-column border border-primary rounded">
    <div class="wrapper">
        <div class="container chart" data-size="300" data-value=" <?php echo $taux_hum; ?> " data-arrow="up">
            <span style="font-size: 1.6em"><?php echo $date_hum;?><br>Humidité</span>
            <br>
        </div>
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

<?php

if (isset($_SESSION["logged"])) {
  if ($_SESSION["logged"] == true) {
      
    print_r('
    <div id="graphs" class="d-flex justify-content-center aspect-ratio">
      <div id="graphs" style="width: 600px; height: 300px;" class="d-flex justify-content-center" >
          <canvas id="myChart1"></canvas>
      </div>
      <div id="graphs" style="width: 600px; height: 300px;" class="d-flex justify-content-center" >
          <canvas id="myChartTemp"></canvas>
      </div>
      <div id="graphs" style="width: 600px; height: 300px;" class="d-flex justify-content-center" >
          <canvas id="myChartHum"></canvas>
      </div>
    </div>

    ');


  }
  
}



?>

</div>

<script>


const data = {
  labels: [d6, d5, d4, d3, d2, d1, d0],
  datasets: [
    {
      label: 'Maximum',
      data: [day7, day6, day5, day4, day3, day2, day1 ],
      borderColor: '#ff0000',//red
      backgroundColor: '#ff0000',
    },
    {
      label: 'Minimum',
      data: [day71, day61, day51, day41, day31, day21, day11 ],
      borderColor: '#ecfc00',//yellow
      backgroundColor: '#ecfc00',
    },
    {
      label: 'Moyenne',
      data: [cm7, cm6, cm5, cm4, cm3, cm2, cm1 ],
      borderColor: '#fc7e00',//orange
      backgroundColor: '#fc7e00',
    }
  ]
};

const dataTemp = {
  labels: [ h6, h5, h4, h3, h2, h1, h0 ],
  datasets: [
    {
      label: 'Maximum',
      data: [tem7, tem6, tem5, tem4, tem3, tem2, tem1],
      borderColor: '#ff0000',//red
      backgroundColor: '#ff0000',
    },
    {
      label: 'Minimum',
      data: [tem71, tem61, tem51, tem41, tem3, tem2, tem1],
      borderColor: '#ecfc00',//yellow
      backgroundColor: '#ecfc00',
    },
    {
      label: 'Moyenne',
      data: [tm7, tm6, tm5, tm4, tm3, tm2, tm1 ],
      borderColor: '#fc7e00',//orange
      backgroundColor: '#fc7e00',
    }
  ]
};
const dataHum = {
  labels: [ t6, t5, t4, t3, t2, t1, t0 ],
  datasets: [
    {
      label: 'Maximum',
      data: [hum7, hum6, hum5, hum4, hum3, hum2, hum1],
      borderColor: '#ff0000',//red
      backgroundColor: '#ff0000',
    },
    {
      label: 'Minimum',
      data: [hum71, hum61, hum51, hum41, hum31, hum21, hum11],
      borderColor: '#ecfc00',//yellow
      backgroundColor: '#ecfc00',
    },
    {
      label: 'Moyenne',
      data: [hm7, hm6, hm5, hm4, hm3, hm2, hm1 ],
      borderColor: '#fc7e00',//orange
      backgroundColor: '#fc7e00',
    }
  ]
};


const config = {
  type: 'line',
  data: data,
  options: {
    responsive: true,
      maintainAspectRatio: false,

      plugins: {
      legend: {
        position: 'top'
      },
      title: {
        display: true,
        text: 'Graphiques Co2'
      }
    },
  },
};
const configTemp = {
  type: 'line',
  data: dataTemp,
  options: {
    responsive: true,
      maintainAspectRatio: false,

      plugins: {
      legend: {
        position: 'top'
      },
      title: {
        display: true,
        text: 'Graphiques Temperature'
      }
    }
  },
};
const configHum = {
  type: 'line',
  data: dataHum,
  options: {
    responsive: true,
      maintainAspectRatio: false,

      plugins: {
      legend: {
        position: 'top'
      },
      title: {
        display: true,
        text: 'Graphiques Humidite'
      }
    }
  },
};

var myChart1 = new Chart(
    document.getElementById('myChart1'),
    config
);

var myChart2 = new Chart(
    document.getElementById('myChartTemp'),
    configTemp
);
var myChart2 = new Chart(
    document.getElementById('myChartHum'),
    configHum
);

</script>




</body>

<!-- Optional JavaScript -->
<!-- If needed, jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/bootstrap.bundle.js"></script> <!-- Ajout du bootstrap JS-->
<script type="text/javascript" src="js/donut-local.js"></script>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
<script src='https://codepen.io/grayghostvisuals/pen/GqovBM/a08e0d79c150ff5030f9b6afaa137749.js'></script>
<!--<script  src="js/graph.minmax.js"></script>-->
</html>
