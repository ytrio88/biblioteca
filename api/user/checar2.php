<?php    
    include "../geralDAO.php";
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $cpf = $l[0];
    $email = $l[1];
    $query = "select id as resp from funcionario where cpf like '$cpf' and email like '$email'";
    $result = extrair($query);	    
    while($row = $result->fetch_assoc())  
        echo '[{"r":"' . $row["resp"] . '"}]';
?>