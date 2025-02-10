<?php
header('Content-Type: application/php');
header('Content-Disposition: attachment; filename="index.php"');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Veteriner Kliniği Kayıt</title>
</head>
<body>
    <h1>Yeni Hayvan Kaydı</h1>
    <form action="kaydet.php" method="post">
        <label for="ad">Hayvan Adı:</label>
        <input type="text" id="ad" name="ad"><br><br>
        <label for="tur">Hayvan Türü:</label>
        <input type="text" id="tur" name="tur"><br><br>
        <label for="cins">Hayvan Cinsi:</label>
        <input type="text" id="cins" name="cins"><br><br>
        <input type="submit" value="Kaydet">
    </form>
</body>
</html>