<?php
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $status = $l[1];
    $pesq = $l[0];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select copia.id, data, nome as livro, copia.status from copia, livro where copia.idlivro = livro.id and livro.nome like '%$pesq%' ";
    if ($status < 2)
        $query .= " and copia.status = $status";
    // echo $query;
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