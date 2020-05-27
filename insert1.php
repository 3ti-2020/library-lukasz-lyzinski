<?php
require("connect.php");

$autor=$_POST['autor'];
$tytul1=$_POST['tytul1'];

$sql = "INSERT INTO krzyz(id_krzyz, id_autor, id_tytul) VALUES (NULL , '$autor', '$tytul1')";

mysqli_query($conn,$sql);
header("Location: http://localhost/ksiazki/");

?>