<?php    
    include "../geralDAO.php";
    $l = explode("&", explode("?", $_SERVER["REQUEST_URI"])[1]);
    $login = $l[0];
    $senha = base64_decode($l[1]);
    $query = "select count(id) as resp from usuario where login like '$login'";
    $result = extrair($query);	    
    while($row = $result->fetch_assoc())
    {
        if ($row["resp"] == 0)
            echo '[{"r":"0"}]';
        else
        {
            $query = "select count(id) as resp from usuario where senha like sha1(concat(sub, md5('$senha'),sub))";
            $result = extrair($query);	
            // echo $query;    
            while($row = $result->fetch_assoc())
            {
                if ($row["resp"] == 0)
                    echo '[{"r":"1"}]';
                else
                {
                    session_start();
                    $_SESSION["login"] = $login;
                    $query = "select tipo from usuario where login like '$login'";
                    $result = extrair($query);	    
                    while($row = $result->fetch_assoc())    
                        $_SESSION["cargo"] = $row["tipo"];
                    echo '[{"r":"2"}]';                    
                }
            }
        }
    }
?>