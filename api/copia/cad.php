<?php
    include "../geralDAO.php";
    // var_dump($_POST);
    $id = getIdMax("copia");
    for ($i=0; $i < intval($_POST["total"]); $i++) 
    {
        $query = "insert into copia values (".  $id++ . "," . $_POST["hidden"] . ",0,'', '" . date("Y-m-d") . "')";
        echo "$query <br>";        
        inserir($query);
    }
    $query = "update livro set status = 1 where id = " . $_POST["hidden"];     
    inserir($query);
    header("Location: ../../../biblioteca/copias/" . $_POST["hidden"]);
    