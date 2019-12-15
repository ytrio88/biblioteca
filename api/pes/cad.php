<?php
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "insert into pessoa values (" . getIdMax("pessoa") . ",";
    foreach ($_POST as $i)
        $query .= "'$i', ";
    $query .= 1 . ",'" . date("Y-m-d") . "')";
    echo $query;
    inserir($query);
    header("Location: ../../../biblioteca/pessoas");
    