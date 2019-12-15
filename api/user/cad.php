<?php
    include "../geralDAO.php";    
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $login = $l[0];
    $senha = $l[1];
    $perg = str_replace("%20"," ", $l[2]);
    $resp = str_replace("%20"," ", $l[3]);
    $id = $l[4];

    // var_dump($_POST);
    $query = "insert into usuario values (" . getIdMax("usuario") . ",";
    $query .= "'" . $login . "',";
    $query .= "sha1(concat(md5(curdate()),md5($senha),md5(curdate()))),";
    $query .= "md5(curdate()),1,$id,'$perg','$resp')";
    echo $query;
    inserir($query);
    header("Location: ../../../biblioteca/login");
    
    