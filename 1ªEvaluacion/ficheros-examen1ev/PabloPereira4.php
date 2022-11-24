<html>
    <?php
        session_start();
    ?>
<head>
<meta charset="utf-8">
<title>Lista de la compra</title>
</head>
<body>
<h1>Lista de la compra</h1>
<form method=post action="PabloPereira4.php">
<label>Producto:</label>
<input type="text" name="producto" />
<br>
<input type="submit" name="enviar" value="Enviar" />
<input type="submit" name="borrar" value="Borrar todo" />
<?php
    if (isset($_POST["enviar"])) {
        echo "<br>";
        if ($_POST["producto"] != "" && !array_key_exists("lista", $_SESSION)) {
            echo $_POST["producto"];
           $_SESSION["lista"] =  $_POST["producto"];     
        } else if ($_POST["producto"] != "" && array_key_exists("lista", $_SESSION)) {
            $_SESSION["lista"] = $_SESSION["lista"] . "<br>" . $_POST["producto"];
            echo $_SESSION["lista"];
        }
        if (empty($_POST["producto"])) {
            echo $_SESSION["lista"];
        }
    } else if (isset($_POST["borrar"])) {
        $_SESSION["lista"] = "";
        echo "<br>Lista vaciada";
    }
?>
</form>
</body>
</html>
