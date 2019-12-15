<?php
    $id = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $colunas = explode(",", "pessoa,livro,dtemp,dtdev,inputstatus");
    $query = "select pessoa.nome as pessoa, livro.nome as livro, dtemp, dtdev, emprestimo.status as inputstatus from emprestimo, pessoa, livro, copia where idcopia = copia.id and copia.idlivro = livro.id and idpes = pessoa.id and emprestimo.id = $id";
    $result = extrair($query);	
    $t = "";	
    while($row = $result->fetch_assoc())
    {
        $t2 = "";
        if ($t != "") $t .= ",";
        $t .= "{";
        foreach($colunas as $i)
        {
            if ($t2 != "") $t2 .= ",";
            $t2 .= '"' . $i . '":"' . $row[$i] . '"';
        }
        $t .= $t2;
        $t .= "}";
    }
    echo "[$t]";