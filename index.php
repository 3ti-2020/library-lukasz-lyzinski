<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="container">
 <div class="item header"></div>
 <div class="item sidebar1">
 <form class="pasek" action="insert.php" method="post">
    <input type="text" name="imie">
    imie
    <input type="text" name="nazwisko">
    nazwisko
    <input type="text" name="tytul">
    tytul
    <input type="text" name="ISBN">
    ISBN
    <input type="submit" value="INSERT">
 </form>
<?php

    require("connect.php");

    $result_autor = $conn->query("SELECT * FROM autorzy");
    $result_tytuly = $conn->query("SELECT * FROM tytuly");

    echo("<form action='insert1.php' class='ins' method='POST'>");
    echo("<select name='autor'>");
    while($wiersz=$result_autor->fetch_assoc() ){
        echo("<option value='".$wiersz['id_autor']."'>".$wiersz['imie']." ".$wiersz['nazwisko']."</option>");
    }
    echo("</select>");

    echo("<select name='tytul1'>");
    while($wiersz=$result_tytuly->fetch_assoc() ){
        echo("<option value='".$wiersz['id_tytul']."'>".$wiersz['tytul']."</option>");
    }
    echo("</select>");

    echo("<input type='submit' value='INSERT'>");
    echo("</form>");
?>    
 </div>
 <div class="item main">
<?php

    require("connect.php");

    $result=$conn->query("SELECT id_krzyz,imie, nazwisko, tytul, ISBN from krzyz, autorzy, tytuly where krzyz.id_autor=autorzy.id_autor and krzyz.id_tytul=tytuly.id_tytul");

    echo("<table class='tabelka'>");
    echo("<tr>
    <th>krzyz_id</th>
    <th>imie</th>
    <th>nazwisko</th>
    <th>tytul</th>
    <th>ISBN</th>
    <th>delete</th>
    </tr>");

    while($row=$result->fetch_assoc() ){

        echo("<tr class='row'>");
        echo("<td class='kol'>".$row['id_krzyz']."</td>"."<td class='kol'>".$row['imie']."</td>"."<td class='kol'>".$row['nazwisko']."</td>"."<td class='kol'>".$row['tytul']."</td>"."<td class='kol'>".$row['ISBN']."</td>"."<td class='kol'>"."<form action='delete.php' method='post'>"."<input type='hidden' name='id' value=".$row['id_krzyz'].">"."<input type='submit' value='DELETE'>"."</form>"."</td>");
        echo("</tr>");
    }

echo("</table>");


?>
</div>
</div>   
</body>
</html>
