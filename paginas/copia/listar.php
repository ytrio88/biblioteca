<?php
    require_once("paginas/nav.php");
?>
<link rel="stylesheet" href="../css/baselist.css">
<link rel="stylesheet" href="../css/basecad.css">
<link rel="stylesheet" href="../css/modal.css">
<link rel="stylesheet" href="../css/copialist.css">
</head>
<body onload="init()">    
    <button type="button" class="pdfgen" onclick="gerarPdf()">Gerar Pdf</button>
    <div class="box">
        <div class="titulo" id="titulo">Cópias Cadastradas</div>
        <div class="pesq p4">
            <div>
                Situação:
                <select name="status" id="status">
                    <option value="0">Disponível</option>
                    <option value="1">Alugado</option>
                    <option value="2">Todos</option>
                </select>
            </div>
            <select name="tipo" id="tipo" onchange="mudarPesqPlaceholder(event)">
                <option value="0">Nome</option>
                <option value="1">Autor</option>
                <option value="2">Editora</option>
                <option value="3">ISBN</option>
            </select>
            <input type="text" id="pesq" placeholder="Pesquisar por Nome" >
            <a onclick="mostrarMsg(1)">Cadastrar</a>
        </div>
        <div class="conteudo lista l5" id="lista">
        </div>
    </div>
    <form action="../api/copia/cad.php" id="modal1" class="modal modal500 size500" method="POST">
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
    <div id="modal2" class="modal modal500 size500" >
        <div class="titulo" id="modal2titulo"></div>
        <div class="conteudo">
            <div class="size1 sizes">
                <div>
                    <label>Livro:</label>
                    <input type="text" id="livro" >
                </div>
            </div>
            <div class="size2 sizes">
                <div>
                    <label>Status:</label>
                    <input type="text" id="statusmodel" >
                </div>
                <div>
                    <label>Data Aquisição:</label>
                    <input type="date" id="data" >
                </div>
            </div>
            <div class="size1 sizes">
                <div>
                    <label>Observação:</label>
                    <textarea type="text" id="obscopia" ></textarea>
                </div>
            </div>
        </div>
        <div class="footer">            
            <button type="button" class="direita"onclick="cancelar(2)">Voltar</button>
        </div>
    </div>
    <script src="../js/modal.js"></script>
    <script src="../js/copia/list2.js"></script>