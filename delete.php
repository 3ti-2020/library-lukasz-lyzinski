<?php
require("connect.php");

$id=$_POST['id'];

$del="DELETE from krzyz where id_krzyz='$id' ";

mysqli_query($conn,$del);
header("Location: http://localhost/ksiazki/");

?>