<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidSafeAnalysis</title>
    <link rel="stylesheet" href="css/index.css" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/element.loader.js"></script>
</head>

<body>
<!-- Loaded header via JS-->
<div id="header"></div>

<div id="bodygraph">
<div class="multi-graph margin">
    750 PPM
    <div class="graph" data-name="Dangereux"
         style="--percentage : 0; --fill: red ;">
    </div>
    <div class="graph" data-name="Attention"
         style="--percentage : 75; --fill: orange ;">
    </div>
    <div class="graph" data-name="Tout est bon"
         style="--percentage : 0; --fill: green ;">
    </div>
</div>
</div>
</body>

<!-- Optional JavaScript -->
<!-- If needed, jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/bootstrap.bundle.js"></script> <!-- Ajout du bootstrap JS-->

</html>