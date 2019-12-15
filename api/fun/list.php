<?php
    $status = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select id, nome, cargo,  email, status from funcionario ";
    if ($status < 2)
        $query .= " where status = $status";
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
        $t2 = "";
        switch ($row["cargo"])
        {
            case 0: $t2 = '"cargo":"Bibliotécario"'; break;
        }
        $t .= $t2;
        $t .= "}";
    }
    echo "[$t]";