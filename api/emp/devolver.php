<?php
    $id = explode("?", $_SERVER["REQUEST_URI"])[1];
    include "../geralDAO.php";
    $query = "update copia set status = 0  where id = (select idcopia from emprestimo where id = $id)";
    inserir($query);
    
    $query = "update emprestimo set status = 0, dtdev2 = '" . date("Y-m-d") . "' where id = $id";
    inserir($query);    
    header("Location: ../../../biblioteca/emprestimos"); 