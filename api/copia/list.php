<?php
    $status = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select id, data, (select nome from livro where id = idlivro) as livro, status from copia";
    if ($status < 2)
        $query .= " where status = $status";
    $result = extrair($query);	
    $t = "";	
    while($row = $result->fetch_assoc())
    {
        if ($t != "") $t .= ",";
        $t .= "{";
        $t .= '"id":"' . $row["id"] . '",';
        $t2 = "";
        switch ($row["status"])
        {
            case 0: $t2 = "Disponível"; break;
            case 1: $t2 = "Alugado"; break;
        }
        $t .= '"status":"' . $t2 . '",';
        $t .= '"livro":"' . $row["livro"] . '",';
        $t .= '"data":"' . $row["data"] . '"';
        $t .= "}";
    }
    echo "[$t]";