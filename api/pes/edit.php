<?php
    $id = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    // var_dump($_POST);
    $query = "";
    foreach ($_POST as $i=>$j)
    {
        if ($query != "") $query .= ", ";
        $query .= "$i = '$j'";
    }
    $query = "update pessoa set " . $query . " where id = $id";
    inserir($query);
    header("Location: ../../../biblioteca/pessoas");