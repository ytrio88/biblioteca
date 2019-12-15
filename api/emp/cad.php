<?php
    include "../geralDAO.php";
    session_start();
    $login = $_SESSION["login"];
    $query = "select id from usuario where login like '$login'";
    $result = extrair($query);
    while($row = $result->fetch_assoc())
    {
        $_POST["idfun"] = $row["id"];
    }
    // var_dump($_POST);
    $idemp =  getIdMax("emprestimo");
    echo $query . "<br>";

    $ids = explode(",", $_POST["idcopia"]);
    foreach ($ids as $i)
    {
        $query = "insert into emprestimo values (" . $idemp++ . ",";
        $_POST["idcopia"] = $i;
        foreach ($_POST as $j)
            $query .= "'$j', ";
        $query .= 1 . ", null)";
        echo $query . "<br>";
        inserir($query);
        $query = "update copia set status = 1 where id = $i";
        echo $query . "<br>";
        inserir($query);
    }

    header("Location: ../../../biblioteca/emprestimos");
    