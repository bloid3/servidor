<html>
    <?php
        session_start();
    ?>
<head>
    <title>PABLOPEREIRA3</title>
<meta charset="utf-8">
</head>
<body>
<?php
    if (!array_key_exists("nombre", $_POST) || !array_key_exists("edad", $_POST) || !array_key_exists("genero", $_POST)) {
        echo <<< FIN
        <form method="post" action="ejercicio3.php">
        <label>Nombre:</label>
        <input type="text" name="nombre"/>
        <label>Edad:</label>
        <input type="number" name="edad" min="16" max="90" />
        <label>Género:</label>
        <select name="genero">
        <option value=""></option>
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
        <option value="X">No binario</option>
        </select>
        <br>
        <input type="submit" value="Enviar" name="enviar"/>
        FIN;
    } else {
        echo <<< FIN
        <form method="post" action="ejercicio3.php">
        <label>Nombre:</label>
        <input type="text" name="nombre" value=$_POST[nombre]>
        <label>Edad:</label>
        <input type="number" name="edad" min="16" max="90" value=$_POST[edad]>
        <label>Género:</label>
        <select name="genero"value=$_POST[genero]>
        <option value=""></option>
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
        <option value="X">No binario</option>
        </select>
        <br>
        <input type="submit" value="Enviar" name="enviar"/>
        FIN;
    }
?>
<?php
    if (isset($_POST["enviar"])) {
        if (empty($_POST["nombre"]) || empty($_POST["edad"]) || empty($_POST["genero"])) {
            if (empty($_POST["nombre"])) {
                echo "<br>No has introducido nombre";
                $_SESSION["nombre"] = "";
            } else {
                echo "<br>Nombre: " . $_POST["nombre"];
                $_SESSION["nombre"] = $_POST;
            }
            if (empty($_POST["edad"])) {
                echo "<br>No has introducido la edad";
                $_SESSION["edad"] = "";
            } else {
                echo "<br>Edad: " . $_POST["edad"];
            }
            if (empty($_POST["genero"])) {
                echo "<br>No has introducido genero";
                $_SESSION["genero"] = "";
            } else {
                echo "<br>Género: " . $_POST["genero"];
            }
        } else {
            echo "<br>Todo correcto " . $_POST["nombre"];
            echo "<br>Nombre: " . $_POST["nombre"];
            echo "<br>Edad: " . $_POST["edad"];
            echo "<br>Género: " . $_POST["genero"];
        }
    }
?>
</form>
</body>
</html>
