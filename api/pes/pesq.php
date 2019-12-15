<?php
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $status = $l[2];
    $pesq = $l[0];
    $tipo = $l[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select id, nome, tel1, tel2,  email, status from pessoa where ";
    $add = "";
    switch ($tipo)
    {
        case 0: $add = " nome like '%$pesq%' "; break;
        case 1: $add = " email like '%$pesq%' "; break;
        case 2: $add = " tel1 like '%$pesq%' or tel2 like '%pesq%'"; break;
    }
    if ($status < 2)
        $query .= " $add and status = $status";
    // echo $query;
    $result = extrair($query);	
    $t = "";	
    while($row = $result->fetch_assoc())
    {
        if ($t != "") $t .= ",";
        $t .= "{";
        $t .= '"id":"' . $row["id"] . '",';
        $t .= '"status":"' . $row["status"] . '",';
        $t .= '"nome":"' . $row["nome"] . '",';
        $t .= '"email":"' . $row["email"] . '",';
        $t .= '"telefones":"' . $row["tel1"];
        if ($row["tel2"] != "")
            $t .= ', ' . $row["tel2"];
        $t .= '"';
        $t .= "}";
    }
    echo "[$t]";