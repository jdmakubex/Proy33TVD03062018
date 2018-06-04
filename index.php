<?php
$conexion = mysql_connect("localhost","root","root");
 mysql_select_db("oxxo",$conexion);
 $sql="INSERT INTO contacto(name, email, phone, messaje)VALUES('Juan','jd@jd.com','123456789','Hola')";
 mysql_query($sql);
?>