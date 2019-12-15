<?php
    $id = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $colunas = explode(",","livro,obs,status,data");
    $query = "select nome as livro, copia.obs, copia.status, copia.data from copia, livro where idlivro = livro.id and copia.id = $id";
    $result = extrair($query);	
    $t = "";	
    // echo $query;
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