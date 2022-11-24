<html>
<title>EJERCICIO5 PABLO PEREIRA</title>
    <?php
        session_start();
        $contrasenahash = md5("pereira");
        $_SESSION["contrahash"] = $contrasenahash;
    ?>
<head>
<meta charset="utf-8">
</head>
<body>
<!-- Mostrar solo si no se ha facilitado ya usuario y contraseña correctos:
-->
<?php
    if(!array_key_exists("user", $_POST) && !array_key_exists("password", $_POST)) {
        $_POST["user"] = "";
        $_POST["password"] = "";
        echo <<< FIN
        <form method=post action=PabloPereira5-login.php>
        <label>Nombre:</label>
        <input type="text" name="user"/>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password"/>
        <br>
        <input type="submit" value="Login" />
        FIN;
    } else {
        if ($_POST["user"] == "pablo" && md5($_POST["password"]) == $contrasenahash) {
            echo "Acceso Correcto";
            echo <<< FIN
            <br><a href=PabloPereira5-1.php>Opción Uno</a>
            <br><a href=PabloPereira5-2.php>Opción Dos</a>
            FIN;
            $_SESSION["user"] = $_POST["user"];
            $_SESSION["pass"] = $_POST["password"];
            echo <<< DIE
            <form action=PabloPereira5-login.php method=post>
            <br><input type="button"  name="destroy" value="LogOut">
            DIE;
            if (isset($_POST["destroy"])) {
                echo "HOLA";
                session_destroy();
            }
            echo "</form>";
        } else {
            echo <<< FIN
                <form method=post action=PabloPereira5-login.php>
                <label>Nombre:</label>
                <input type="text" name="user"/>
                <br>
                <label>Contraseña:</label>
                <input type="password" name="password"/>
                <br>
                <input type="submit" value="Login" />
            FIN;
        }
    }
    echo "</form>";
?>


<!-- y un botón o enlace de logout -->
</body>
</html>