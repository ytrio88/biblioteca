<?php
    $status = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select * from (SELECT livro.id as id, nome, count(copia.id) as total, autor, livro.status from livro left join copia on idlivro = livro.id group by idlivro) as t1 ";
    if ($status < 2)
        $query .= " where status = $status";
    $result = extrair($query);	
    // echo $query;
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