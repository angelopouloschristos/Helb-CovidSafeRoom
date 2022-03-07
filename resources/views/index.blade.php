<!DOCTYPE html>
<html>
<head>
<title>Super Page</title>
</head>
<body>
    <h1>Scanne moi</h1>
</body>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<div id="qrcode"></div>
<script type="text/javascript">
    new QRCode(document.getElementById("qrcode"), "http://127.0.0.1/Helb-Temperatures%20-%20Copy/resources/views/id.blade.php");
</script>



</html>