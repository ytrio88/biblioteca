
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/basecad.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/menu.css">
    
</head>
<body class="central" onload="init()">
    <div class="box"
        <?php if ($_SESSION["cargo"] == 9) echo "style='margin-top: calc(50vh - 318px/2)'"; ?>
    >
        <div class="titulo">Menu</div>
        <div class="conteudo">
            <?php
                if ($_SESSION["cargo"] == 9)
                    echo '
                        <div class="size1 sizes">
                            <div>
                                <button type="button" onclick="redirect(1)">Funcionários</button>
                            </div>
                        </div>                
                    ';
            ?>
            <div class="size2 sizes">
                <div>
                    <button type="button" onclick="redirect(3)">Livros</button>
                </div>
                <div>
                    <button type="button" onclick="redirect(4)">Cópias</button>
                </div>
            </div>
            <div class="size2 sizes">
                <div>
                    <button type="button" onclick="redirect(5)">Pessoas</button>
                </div>
                <div>
                    <button type="button" onclick="redirect(6)">Empréstimos</button>
                </div>
            </div>
            <div class="size1 sizes">
                <div>
                    <button type="button" onclick="sair()">Deslogar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        require_once("paginas/footer.php");
    ?>
    <script src="js/jquery.js"></script>
    <script src="js/validadores.js"></script>
    <script src="js/menu.js"></script>