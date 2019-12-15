<?php
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $status = $l[2];
    $pesq = $l[0];
    $tipo = $l[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select * from (SELECT idlivro as id, nome, isbn, count(copia.id) as total, autor, livro.status from livro left join copia on idlivro = livro.id group by idlivro) as t1 where ";
    $add = "";
    switch ($tipo)
    {
        case 0: $add = " nome like '%$pesq%' "; break;
        case 1: $add = " autor like '%$pesq%' "; break;
        case 2: $add = " editora like '%$pesq%' "; break;
        case 3: $add = " isbn like '%$pesq%' "; break;
    }
    if ($status < 2)
        $query .= " $add and status = $status";
    else
        $query .= $add;
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
            $t .= '"total":"' . $row["total"] . '",';
            $t .= '"autor":"' . $row["autor"] . '"';
        $t .= "}";
    }
    echo "[$t]";