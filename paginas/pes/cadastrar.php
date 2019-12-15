
<title>Cadastrar Funcionário</title>
<?php
    echo '<link rel="stylesheet" href="' . $extra . 'css/basecad.css">';
    echo '<link rel="stylesheet" href="' . $extra . 'css/funcad.css">';
?>

<!-- <link rel="stylesheet" href="css/alunocad.css"> -->
</head>
<body class="central" onload="init()">
    <?php
        require_once("paginas/nav.php");
    ?>
    <form action="../api/pes/cad.php" method="post" name="form" class="box outrobox2">
        <div class="titulo">Cadastrar Pessoa</div>
        <div class="conteudo">
            <div class="size1 sizes">
                <div>
                    <label >Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Informe o nome">
                </div>
            </div>
            <div class="size3 sizes">
                <div>
                    <label >Data de Nascimento:</label>
                    <input type="date" id="dtnasc" name="dtnasc">
                </div>
                <div>
                    <label >CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="Informe o cpf" maxlength="13">
                </div>
                <div>
                    <label >RG:</label>
                    <input type="text" id="rg" name="rg" placeholder="Informe o rg" maxlength="13">
                </div>
            </div>
            <div class="size2 sizes">
                <div>
                    <label >Telefone 1:</label>
                    <input type="text" id="tel1" name="tel1" maxlength="13" placeholder="Informe um telefone">
                </div>
                <div>
                    <label >Telefone 2:</label>
                    <input type="text" id="tel2" name="tel2" maxlength="13" placeholder="Informe outro telefone">
                </div>
            </div>
            <div class="size1 sizes">
                <div>
                    <label >E-mail:</label>
                    <input type="text" id="email" name="email" placeholder="Informe o email">
                </div>
            </div>
            <div class="size3 sizes">
                <div>
                    <label >CEP:</label>
                    <input type="text" id="cep" name="cep" maxlength="9" placeholder="Informe o cep">
                </div>
                <div>
                    <label >Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Informe a cidade">
                </div>
                <div>
                    <label >Estado:</label>
                    <select name="estado" id="estado"></select>
                </div>
            </div>
            <div class="size2a sizes">
                <div>
                    <label >Endereço:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Informe o endereço">
                </div>
                <div>
                    <label >Número:</label>
                    <input type="text" id="numero" name="numero" placeholder="Informe o numero">
                </div>
            </div>
            <div class="size2 sizes">
                <div>
                    <label >Complemento:</label>
                    <input type="text" id="complemento" name="complemento" placeholder="Informe o complemento">
                </div>
                <div>
                    <label >Bairro:</label>
                    <input type="text" id="bairro" name="bairro" placeholder="Informe o bairro">
                </div>
            </div>
        </div>
    </form>
    <div class="btngrupo">
        <button type="button" onclick="voltar()">Voltar</button>
        <button type="button" class="direita2" onclick="enviar()">Cadastrar</button>
        <!-- <input class="direita2"  type="submit" value="Logar"> -->
    </div>
    <?php
        require_once("paginas/footer.php");
    ?>
    <script src="../js/validadores.js"></script>
    <script src="../js/mask.js"></script>
    <script src="../js/pes/cad.js"></script>