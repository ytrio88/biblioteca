<?php
    $status = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "select emprestimo.id as id, pessoa.nome as pessoa, livro.nome as livro, dtemp, dtdev2 as dev, dtdev as dtprev, emprestimo.status as status from emprestimo, pessoa, livro, copia where idcopia = copia.id and copia.idlivro = livro.id and idpes = pessoa.id";
    if ($status < 2)
        $query .= " and emprestimo.status = $status";
    $result = extrair($query);	
    // echo $query;
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