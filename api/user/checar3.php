<?php    
    include "../geralDAO.php";
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $cpf = $l[0];
    $email = $l[1];
    $login = $l[2];
    $query = "select if(count(usuario.id) = 0, 0 , usuario.id) as resp, if(count(usuario.id) = 0, 0 , perg) as perg from funcionario, usuario where cpf like '$cpf' and email like '$email' and login like '$login' and idpes = funcionario.id";
    // echo $query;
    $result = extrair($query);	    
    while($row = $result->fetch_assoc())  
        echo '[{"r":"' . $row["resp"] . '","p":"' . $row["perg"] . '"}]';
?>