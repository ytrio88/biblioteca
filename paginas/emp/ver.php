
<title>Cadastrar Aluno</title>
<?php
    echo '<link rel="stylesheet" href="' . $extra . 'css/basecad.css">';
?>

<!-- <link rel="stylesheet" href="css/alunocad.css"> -->
</head>
<body class="central" onload="init()">
    <?php
        require_once("paginas/nav.php");
    ?>
    <button type="button" class="pdfgen" onclick="gerarPdf()">Gerar Pdf</button>
    <div class="box outrobox2">
        <div class="titulo">Editar Livro</div>
        <div class="conteudo">
            <div class="size2 sizes">
                <div>
                    <label class="eldados" >Nome:</label>
                    <input type="text" readonly id="nome" name="nome" placeholder="Informe o nome">
                </div>
                <div>
                    <label class="eldados" >Situação:</label>
                    <select name="status" id="status">
                        <option value="0">Sem cópias</option>
                        <option value="1">Com cópias</option>
                    </select>
                </div>
            </div>
            <div class="size3 sizes">
                <div>
                    <label class="eldados">Autor:</label>
                    <input type="text" readonly  id="autor" name="autor" placeholder="Informe o autor">
                </div>
                <div>
                    <label class="eldados" >Editora:</label>
                    <input type="text" readonly  id="editora" name="editora" placeholder="Informe a editora">
                </div>
                <div>
                    <label class="eldados" >ISBN:</label>
                    <input type="text" readonly  id="isbn" name="isbn" placeholder="Informe o isbn" maxlength="13">
                </div>
            </div>
            <div class="size3 sizes">
                <div>
                    <label  class="eldados">CDD:</label>
                    <input type="text" readonly  id="cdd" name="cdd" placeholder="Informe o cdd" maxlength="4">
                </div>
                <div>
                    <label class="eldados" >Edição:</label>
                    <input type="text" readonly  id="edicao" name="edicao" maxlength="3" placeholder="Informe a edição">
                </div>
                <div>
                    <label class="eldados" >Ano:</label>
                    <input type="text" readonly  id="ano" name="ano" maxlength="4" placeholder="Informe o ano">
                </div>
            </div>
            <div class="size1 sizes">
                <div>
                    <label class="eldados" >Observação:</label>
                    <textarea type="text" readonly  id="obs" name="obs" placeholder="Informe alguma observação"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="btngrupo">
        <button type="button" class="direita2"  onclick="voltar()">Voltar</button>
        <!-- <input class="direita2"  type="submit" value="Logar"> -->
    </div>
    <?php
        require_once("paginas/footer.php");
    ?>
    <script src="../../js/validadores.js"></script>
    <script src="../../js/mask.js"></script>
    <script src="../../js/livro/ver.js"></script>