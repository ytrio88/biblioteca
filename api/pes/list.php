<?php
    $status = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select id, nome, tel1, tel2,  email, status from pessoa ";
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
        $t .= '"telefones":"' . $row["tel1"];
        if ($row["tel2"] != "")
            $t .= ', ' . $row["tel2"];
        $t .= '"';
        $t .= "}";
    }
    echo "[$t]";