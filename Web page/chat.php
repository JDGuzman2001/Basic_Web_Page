<?php
    include "db.php";
    $consulta = "SELECT * FROM chat ORDER BY id DESC";
    $ejecutar = $conexion->query($consulta);
     while($fila = $ejecutar->fetch_array()):
?>
<div id="datos-chat">
    <span style="color: #c41c1c;"><?php echo $fila['nombre'];?>: </span>
    <span style="color: black;"><?php echo $fila['mensaje'];?></span>
    <span style="float: right;"><?php echo formatearFecha($fila['fecha']);?></span>
</div>
<?php endwhile;?>