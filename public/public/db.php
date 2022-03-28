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

    session_start();
    if (!isset($_SESSION["logged"])) {
        //echo 'connextion avec succes';
        header("Location : index.php");
        echo '<script>window.location = "index.php"</script>';
    }

    //partie connection avec db et instentiation des variables
    require_once("connection.php");
        $stmt_batiment = $dbh->prepare("SELECT * FROM batiment ") ;
        $stmt_batiment->execute();

        $stmt_local = $dbh->prepare("SELECT * FROM local_ ") ;
        $stmt_local->execute();

        $stmt_mesure = $dbh->prepare("SELECT * FROM mesure ") ;
        $stmt_mesure->execute();

	$stmt_admin = $dbh->prepare("SELECT * FROM administrateur ") ;
        $stmt_admin->execute();
    ?>
</head>

<body>
<!-- Loaded header via JS-->
<div id="header"></div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="c1" onclick="showMe('table_admin','SwitchAdmin')" id="SwitchAdmin" checked >
        <label class="form-check-label" for="flexSwitchCheckChecked">Table Admin</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input"  type="checkbox" name="c1" onclick="showMe('table_batiment','SwitchBatiment')" id="SwitchBatiment" checked>
        <label class="form-check-label" for="flexSwitchCheckDefault">Table batiment</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="c1" onclick="showMe('table_local','SwitchLocal')" id="SwitchLocal" checked >
        <label class="form-check-label" for="flexSwitchCheckChecked">Table Local</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="c1" onclick="showMe('table_mesure','SwitchMesure')" id="SwitchMesure" checked >
        <label class="form-check-label" for="flexSwitchCheckChecked">Table Mesure</label>
    </div>
    <?php

    echo '<table class="table table-hover" id="table_admin" >';
    echo '<tr><th>email</th><th>mdp</th></tr>';
    while ($row = $stmt_admin->fetch(PDO::FETCH_ASSOC))
    {
	//echo '$row['idAdmin']';
        echo '<tr>';
        $email = $row['email'];
        $mdp = $row['mdp'];

        echo '<td>';
        print_r( $email);
        echo '</td>';
        echo '<td>';
        print_r($mdp);
        echo '</td>';
        echo '</tr>';
    }
    echo '</table> </br>';

    //-------------------------------- AFFICHAGE TABLE BATIMENT --------------------------------//
    echo '<table class="table table-hover" id="table_batiment" >';
    echo '<tr><th>idBatiment</th><th>nomBatiment</th></tr>';
    while ($row = $stmt_batiment->fetch(PDO::FETCH_ASSOC))
    {
        echo '<tr>';
        $id = $row['idBatiment'];
        $nom = $row['nomBatiment'];

        echo '<td>';
        print_r( $id);
        echo '</td>';
        echo '<td>';
        print_r($nom);
        echo '</td>';
        echo '</tr>';
    }
    echo '</table> </br>';
    //-------------------------------- AFFICHAGE TABLE LOCAL --------------------------------//
    echo '<table class="table table-hover" id="table_local"  >';
    echo '<tr><th>idLocal</th><th>capteur</th><th>nom</th><th>nomBatiment</th></tr>';
    while ($row = $stmt_local->fetch(PDO::FETCH_ASSOC))
    {
        echo '<tr>';
        $id = $row['idLocal'];
        $capteur = $row['capteur'];
        $nom = $row['nom'];
        $idBatiment = $row['idBatiment'];

        echo '<td>';
        print_r( $id);
        echo '</td>';
        echo '<td>';
        print_r($capteur);
        echo '</td>';
        echo '<td>';
        print_r($nom);
        echo '</td>';
        echo '<td>';
        print_r($idBatiment);
        echo '</td>';
        echo '</tr>';
    }
    echo '</table> </br>';

    //-------------------------------- AFFICHAGE TABLE MESURE --------------------------------//
    echo '<table class="table table-hover" id="table_mesure"  >';
    echo '<tr><th>idMesure</th><th>taux</th><th>typeData</th><th>date_</th><th>idLocal</th</tr>';
    while ($row = $stmt_mesure->fetch(PDO::FETCH_ASSOC))
    {
        echo '<tr>';
        $id = $row['idMesure'];
        $taux = $row['taux'];
        $type = $row['typeData'];
        $date_ = $row['date_'];
        $idLocal = $row['idLocal'];

        echo '<td>';
        print_r( $id);
        echo '</td>';
        echo '<td>';
        print_r($taux);
        echo '</td>';
        echo '<td>';
        print_r($type);
        echo '</td>';
        echo '<td>';
        print_r($date_);
        echo '</td>';
        echo '<td>';
        print_r($idLocal);
        echo '</td>';
        echo '</tr>';
    }
    echo '</table> </br>';


//--------------------------------PARTIE AJOUTER MESURE----------------------//
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
            $stmt = $dbh->prepare("INSERT INTO mesure (taux,typeData,date_,idLocal) values (:taux,:typeData,:date_,:idLocal)");
            $stmt->execute($data);
            echo '<script>alert("Succes");</script>';
            echo '<script>window.location = "db.php"</script>';
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    //--------------------------------PARTIE UPDATE MESURE----------------------/

    if (empty($_POST["update_mesure"]) && empty($_POST["update_taux"]) && empty($_POST["update_type"]) && empty($_POST["update_date"]) && empty($_POST["update_local"])) {
    }else{
        $id_mesure = $_POST['update_mesure'];
        $update_taux = $_POST['update_taux'];
        $update_type = $_POST['update_type'];
        $update_date = date('Y-m-d H:i:s');
        $update_local = $_POST['update_local'];



        try
        {
            $sql = 'UPDATE mesure SET taux = :taux,typeData = :type_data, date_ = :date, idLocal= :id_local   WHERE idMesure = :id_mesure';

            $statement = $dbh->prepare($sql);

            $statement->bindParam(':taux', $update_taux);
            $statement->bindParam(':type_data', $update_type);
            $statement->bindParam(':date', $update_date);
            $statement->bindParam(':id_local', $update_local);
            $statement->bindParam(':id_mesure', $id_mesure);


            $statement->execute();
            echo '<script>alert("Succes");</script>';
            echo '<script>window.location = "db.php"</script>';
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    ?>


<div class="form-background">

</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <!--         FORM MESURE               -->
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

        <div class="col-md-6">
            <!--         FORM update MESURE               -->
            <?php
                $stmt_mesure = $dbh->prepare("SELECT * FROM mesure ") ;
                $stmt_mesure->execute();

                $stmt_local = $dbh->prepare("SELECT * FROM local_ ") ;
                $stmt_local->execute();
            ?>
            <form class="form" method="post">
                <fieldset>
                    <legend>Modifier une Mesure</legend>
                    <div class="form-group">
                        <label for="exampleInputLocal" class="form-label mt-4">ID</label>
                        <select type="number" class="form-control" name="update_mesure" >
                            <?php
                            while ($row = $stmt_mesure->fetch(PDO::FETCH_ASSOC)){
                                $id = $row['idMesure'];
                                echo "<option value=\"$id\">$id</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTaux" class="form-label mt-4">Taux</label>
                        <input type="number" class="form-control" name="update_taux" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputType" class="form-label mt-4">Type</label>
                        <select type="text" class="form-control" name="update_type" >
                            <option value="1">Temp</option>
                            <option value="2">Hum</option>
                            <option value="3">PPM</option>
                        </select>
                        <label for="exampleInputType" class="form-label mt-4">Date</label>
                        <input type="date" class="form-control" name="update_date">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTaux" class="form-label mt-4">Local</label>
                        <select type="text" class="form-control" name="update_local" >
                            <?php
                            while ($row = $stmt_local->fetch(PDO::FETCH_ASSOC)){
                                $id = $row['idLocal'];
                                $nom = $row['nom'];
                                echo "<option value=\"$id\">$id $nom</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="update" class="btn btn-primary">Modifier</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>


</body>

<script>
    function showMe (box,id) {

        var chbox = document.getElementById(id);
        if (chbox.checked){
            var vis = "block";
        }else{
            var vis = "none";
        }
        document.getElementById(box).style.display = vis;

    }

</script>
<!-- Optional JavaScript -->
<!-- If needed, jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/bootstrap.bundle.js"></script> <!-- Ajout du bootstrap JS-->
<script type="text/javascript" src="js/donut.js"></script>
</html>
