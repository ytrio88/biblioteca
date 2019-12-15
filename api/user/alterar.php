<?php    
    include "../geralDAO.php";
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $senha = $l[0];
    $login = $l[1];
    $query = "update usuario set senha = sha1(concat(md5(curdate()),md5('$senha'),md5(curdate()))) where login like '$login'";
    echo $query;
    inserir($query);
    header("Location: ../../../biblioteca/login");
?>