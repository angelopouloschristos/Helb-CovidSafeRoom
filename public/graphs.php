<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidSafeRoom</title>
    <link rel="stlesheet" href="css/graph.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/element.loader.js"></script>
    <script type="text/javascript" src="js/graph.minmax.js"></script>
</head>
<body>
<div id="header"></div>
</br>

<div class="d-flex justify-content-center"><h1>Vous regardez le local 1</h1></div>
<?php
    require_once("connection.php");
    $stmt_loc = $dbh->prepare("SELECT * FROM Local_ ") ;
    $stmt_loc->execute();
    $stmt_loc->setFetchMode(PDO::FETCH_ASSOC) ;


    foreach($stmt_loc as $row_loc)
    {
        echo '<a href= "local.php?localId='.$row_loc['idLocal'].' ">Local: '.$row_loc['nom'].'</a></br>' ;
    }
    
?>

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

</body>

<!-- Optional JavaScript -->
<!-- If needed, jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/bootstrap.bundle.js"></script> <!-- Ajout du bootstrap JS-->

<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
<script src='https://codepen.io/grayghostvisuals/pen/GqovBM/a08e0d79c150ff5030f9b6afaa137749.js'></script>
<script  src="js/graph.minmax.js"></script>

</html>
