<?php    
    include "../geralDAO.php";
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $resp = $l[0];
    $query = "select count(id) as resp from usuario where resp like '$resp'";
    // echo $query;
    $result = extrair($query);	    
    while($row = $result->fetch_assoc())  
        echo '[{"r":"' . $row["resp"] . '"}]';
?>