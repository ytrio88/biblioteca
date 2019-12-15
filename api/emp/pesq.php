<?php
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $status = $l[2];
    $pesq = $l[0];
    $tipo = $l[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select * from (select emprestimo.id as id, autor, pessoa.nome as pessoa, livro.nome as livro, dtemp, dtdev2 as dev, dtdev as dtprev, emprestimo.status as status from emprestimo, pessoa, livro, copia where idcopia = copia.id and copia.idlivro = livro.id and idpes = pessoa.id) as t1 ";
    $add = "";
    switch ($tipo)
    {
        case 0: $add = " pessoa like '%$pesq%' "; break;
        case 1: $add = " livro like '%$pesq%' "; break;
        case 2: $add = " autor like '%$pesq%' "; break;
    }
    if ($status < 2)
        $query .= " where $add and emprestimo.status = $status";
    else
        $query .= "where " . $add;
    // echo $query;
    $result = extrair($query);	
    $t = "";	
    while($row = $result->fetch_assoc())
    {
        if ($t != "") $t .= ",";
        $t .= "{";
            $t .= '"id":"' . $row["id"] . '",';
            $t .= '"status":"' . $row["status"] . '",';
            $t .= '"pessoa":"' . $row["pessoa"] . '",';
            $t .= '"livro":"' . $row["livro"] . '",';
            $t .= '"alugado":"' . $row["dtemp"] . '",';
            $t .= '"dtprev":"' . $row["dtprev"] . '",';
            $t .= '"dev":"' . $row["dev"] . '"';
        $t .= "}";
    }
    echo "[$t]";