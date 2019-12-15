<?php
    require_once("paginas/nav.php");
?>
<link rel="stylesheet" href="css/baselist.css">
</head>
<body onload="init()">    
    <button type="button" class="pdfgen" onclick="gerarPdf()">Gerar Pdf</button>
    <div class="box">
        <div class="titulo">Livros Cadastrados</div>
        <div class="pesq p4">
            <div>
                Situação:
                <select name="status" id="status">
                    <option value="0">Sem Cópias</option>
                    <option value="1">Com Cópias</option>
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
            <a href="/biblioteca/livros/cadastrar">Cadastrar</a>
        </div>
        <div class="conteudo lista l5" id="lista">
        </div>
    </div>
    <script src="js/modal.js"></script>
    <script src="js/livro/list.js"></script>