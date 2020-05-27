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
    <input type="text" name="">
    <input type="submit" value="INSERT">
 </form>    
 </div>
 <div class="item main">
<?php

    require("connect.php");

    $result=$conn->query("SELECT id_krzyz,imie, nazwisko, tytul, ISBN FROM krzyz, autorzy, tytuly WHERE krzyz.id_autor=autorzy.id AND krzyz.id_tytul=tytuly.id");

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
