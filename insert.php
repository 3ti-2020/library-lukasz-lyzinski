<?php
require("connect.php");

$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];

$sql="INSERT into autorzy(id_autor, imie, nazwisko) values (NULL,'$imie', '$nazwisko') ";

mysqli_query($conn,$sql);
header("Location: http://localhost/ksiazki/");

?>

<?php
require("connect.php");

$tytul=$_POST['tytul'];
$ISBN=$_POST['ISBN'];

$sql="INSERT into tytuly(id_tytul, tytul, ISBN) values (NULL,'$tytul', '$ISBN') ";

mysqli_query($conn,$sql);
header("Location: http://localhost/ksiazki/");

?>



