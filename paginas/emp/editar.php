
<title>Cadastrar Aluno</title>
<?php
    echo '<link rel="stylesheet" href="' . $extra . 'css/basecad.css">';
    echo '<link rel="stylesheet" href="' . $extra . 'css/modal.css">';
    echo '<link rel="stylesheet" href="' . $extra . 'css/livroedit.css">';
?>

<!-- <link rel="stylesheet" href="css/alunocad.css"> -->
</head>
<body class="central" onload="init()">
    <?php
        require_once("paginas/nav.php");
    ?>
    <form action="/biblioteca/api/livro/edit.php" method="post" name="form" class="box outrobox2">
        <div class="titulo">Editar Livro</div>
        <div class="conteudo">
            <div class="size2 sizes">
                <div>
                    <label >Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Informe o nome">
                </div>
                <div>
                    <label >Situação:</label>
                    <select name="status" id="status">
                        <option value="0">Sem cópias</option>
                        <option value="1">Com cópias</option>
                    </select>
                </div>
            </div>
            <div class="size3 sizes">
                <div>
                    <label >Autor:</label>
                    <input type="text" id="autor" name="autor" placeholder="Informe o autor">
                </div>
                <div>
                    <label >Editora:</label>
                    <input type="text" id="editora" name="editora" placeholder="Informe a editora">
                </div>
                <div>
                    <label >ISBN:</label>
                    <input type="text" id="isbn" name="isbn" placeholder="Informe o isbn" maxlength="13">
                </div>
            </div>
            <div class="size3 sizes">
                <div>
                    <label >CDD:</label>
                    <input type="text" id="cdd" name="cdd" placeholder="Informe o cdd" maxlength="4">
                </div>
                <div>
                    <label >Edição:</label>
                    <input type="text" id="edicao" name="edicao" maxlength="3" placeholder="Informe a edição">
                </div>
                <div>
                    <label >Ano:</label>
                    <input type="text" id="ano" name="ano" maxlength="4" placeholder="Informe o ano">
                </div>
            </div>
            <div class="size1 sizes">
                <div>
                    <label >Observação:</label>
                    <textarea type="text" id="obs" name="obs" placeholder="Informe alguma observação"></textarea>
                </div>
            </div>
        </div>
    </form>
    <form action="../../api/copia/cad.php" id="modal1" class="modal modal500 size500" method="POST">
        <div class="titulo">Adicionar Cópias</div>
        <div class="conteudo">
            <div class="size1 sizes">
                <label>Total de Cópias</label>
                <input type="text" id="total" name="total" maxlength="2">
                <input type="hidden" name="hidden" id="hidden">
            </div>
        </div>
        <div class="footer">            
            <button type="button" onclick="cancelar(1); limparInput()">Voltar</button>
            <button type="button" class="direita2" onclick="addCopias()">Adicionar Cópias</button>
        </div>
    </form>
    <div class="btngrupo">
        <button type="button" onclick="redirect(0)">Voltar</button>
        <button type="button" class="direita2" onclick="mostrarMsg(1)">Adicionar Cópias</button>
        <button type="button" class="direita2" onclick="redirect(1)">Cópias</button>
        <button type="button" class="direita2" onclick="enviar()">Alterar</button>
        <!-- <input class="direita2"  type="submit" value="Logar"> -->
    </div>
    <?php
        require_once("paginas/footer.php");
    ?>
    <script src="../../js/validadores.js"></script>
    <script src="../../js/mask.js"></script>
    <script src="../../js/modal.js"></script>
    <script src="../../js/livro/edit.js"></script>