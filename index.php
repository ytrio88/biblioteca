
<?php

    session_start();
    if (!isset($_SESSION["login"]))
    {
        if ($_SERVER["REQUEST_URI"] != "/biblioteca/login")
        {
            header("Location: ../biblioteca/login");
            return;
        }
    }    
        
    $lista = explode("/", explode("biblioteca/", $_SERVER["REQUEST_URI"])[1]);
    require_once("paginas/header.php");
    
    // var_dump($lista);
    if (sizeof($lista) == 1)
    {
        // echo $lista;
        switch ($lista[0])
        {
            case "": require_once("paginas/menu.php"); break;
            case "login": require_once("paginas/login.php"); break;
            case "livros": require_once("paginas/livro/index.php"); break;
            case "emprestimos": require_once("paginas/emp/index.php"); break;
            case "copias": require_once("paginas/copia/index.php"); break;
            case "funcionarios": require_once("paginas/fun/index.php"); break;
            case "pessoas": require_once("paginas/pes/index.php"); break;
        }
            
    }
    else
    {
        $pedaco = "";
        switch ($lista[0])
        {
            case "livros": $pedaco = "livro"; break;
            case "funcionarios": $pedaco = "fun"; break;
            case "pessoas": $pedaco = "pes"; break;
            case "emprestimos": $pedaco = "emp"; break;
            case "copias": $pedaco = "copia"; break;
        }
        if (is_numeric($lista[1]))
            require_once("paginas/$pedaco/listar.php");
        else
            switch ($lista[1])
            {
                case "cadastrar": require_once("paginas/$pedaco/cadastrar.php"); break;
                case "editar": require_once("paginas/$pedaco/editar.php"); break;
                case "consultar": require_once("paginas/$pedaco/ver.php"); break;
            }
            
    }
?>