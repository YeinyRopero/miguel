<?php
$dbconn = pg_connect("host=localhost dbname=maps user=postgres password=123456 port=5432")
or die('NO HAY CONEXION: ' . pg_last_error());
?>