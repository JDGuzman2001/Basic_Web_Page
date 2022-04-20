<?php
include "db.php";
?>
<html>
    <head>
    <title>CHAT CON PHP, MYSQL Y AJAX</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Mukta+Vaani:wght@200&display=swap" rel="stylesheet">
    <script type="text/javascript">
    function ajax(){
        var req = new XMLHttpRequest();

        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }
        req.open('GET', 'chat.php', true);
        req.send();
    }


    setInterval(function(){ajax();}, 1000);

    </script>
    
    </head>
<body onload="ajax();">
<center>
<nav>
                <a href="Datos_biograficos.html" class="nav-enlace">Datos biográficos</a>
                <a href="Experiencia.html" class="nav-enlace">Experiencia</a>
                <a href="linea_de_tiempo.html" class="nav-enlace">Línea de tiempo</a>
                <a href="Material_de_interes.html" class="nav-enlace">Material de interés</a>
                <a href="http://localhost:3000/index.php" class="nav-enlace">Foro de mensajes</a>
            </nav>
</center>
            <br>
            <br>
            <center>
        <h1>Foro de mensajes</h1>
        <br>
        <br>
</center>
<div id="contenedor">
    <div id="caja-chat">
        <div id="chat"></div>
    </div>
    <form method="POST" action="index.php">
        <input type="text" name="nombre"  placeholder="Ingresa tu nombre">
        <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php 
    if (isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];


        $consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
        $ejecutar = $conexion->query($consulta);

        if ($ejecutar){
            echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
        }
    }
    ?>
</div>



</body>
</html>
    
        
