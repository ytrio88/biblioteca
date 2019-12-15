<?php
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "insert into livro values (" . getIdMax("livro") . ",";
    foreach ($_POST as $i)
        $query .= "'$i', ";
    $query .= 0 . ")";
    echo $query;
    inserir($query);
    header("Location: ../../../biblioteca/livros");
    