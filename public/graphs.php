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
//il faut se connecter d'abord
    session_start();
    if (!isset($_SESSION["logged"])) {
        //echo 'connextion avec succes';
        header("Location : index.php");
        echo '<script>window.location = "index.php"</script>';
    }

    require_once("connection.php");
    if (empty($_POST["input_local"]) && empty($_POST["input_taux"]) && empty($_POST["input_type"])) {
    }else{

        $local = $_POST['input_local'];
        $taux = $_POST['input_taux'];
        $type = $_POST['input_type'];
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
            echo '<script>alert("Succes");</script>';
            echo '<script>window.location = "graphs.php"</script>';
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    
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

<div class="form-background">
    <form class="form" method="post">
        <fieldset>
            <legend>Ajouter une Mesure</legend>
            <div class="form-group">
                <label for="exampleInputLocal" class="form-label mt-4">Local</label>
                <select type="number" class="form-control" name="input_local" >
                    <option value="1">1503</option>
                    <option value="2">1250</option>
                    <option value="3">2101</option>
                    <option value="4">3500</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputTaux" class="form-label mt-4">Taux</label>
                <input type="number" class="form-control" name="input_taux" >
            </div>
            <div class="form-group">
                <label for="exampleInputType" class="form-label mt-4">Type</label>
                <select type="text" class="form-control" name="input_type" >
                    <option value="1">Temp</option>
                    <option value="2">Hum</option>
                    <option value="3">PPM</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </fieldset>
    </form>
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
