<?php
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "insert into funcionario values (" . getIdMax("funcionario") . ",";
    foreach ($_POST as $i)
        $query .= "'$i', ";
    $query .= 1 . ",'" . date("Y-m-d") . "')";
    echo $query;
    inserir($query);
    header("Location: ../../../biblioteca/funcionarios");
    