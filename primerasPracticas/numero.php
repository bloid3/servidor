<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="numero.php" method="post">
        Adivina el número entre el 0 y 10: 
        <input type="text" name="intento" required>
        <input type="submit" value="Adivinar">
    </form>

    <?php
        $intento = ($_POST["intento"]) ?? null;
        $contador=0;
        if(isset($_SESSION["enviar"])){
            $contador = intval($_SESSION["enviar"] + 1);   
        }
        $_SESSION["enviar"] = $contador;
        if(!isset($_SESSION["numran"])){
            $_SESSION["numran"] = rand(0,10);
        }
        if($intento != $_SESSION["numran"]){
            if($intento < $_SESSION["numran"]){
                echo "<br> el numero aleatorio es mayor";
            }
            else{
                echo "<br> el número aleatorio es menor";
            }
        }
        else{
            echo "<br> Efectivamente: " . $_SESSION["numran"] . " es el número aleatorio y advinarlo te ha llevado " . $_SESSION["enviar"] . " intentos";
            session_destroy();
            echo "<a href='numero.php'> <br>Volver a intentarlo</a>";
        }
    ?>
</body>
</html>