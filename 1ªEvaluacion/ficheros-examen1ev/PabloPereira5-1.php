<html>
    <title>EJERCICIO5 PABLO PEREIRA</title>
    <?php
        session_start();
        if ($_SESSION["user"] != "pablo" && md5($_SESSION["pass"]) != $_SESSION["contrahash"]) {
            header("Location: http://localhost/examen/PabloPereira5-login.php");
        }
    ?>
<head>
<meta charset="utf-8">
</head>
<body>

<!-- Si no ha sido validado el usuario y la contraseña deberá redirigir
 al login
-->
<a href=PabloPereira5-login.php>Inicio</a>
</form>
</body>
</html>
