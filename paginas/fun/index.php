<?php
    require_once("paginas/nav.php");
?>
<link rel="stylesheet" href="css/baselist.css">
<link rel="stylesheet" href="css/funlist.css">
</head>
<body onload="init()">    
    <button type="button" class="pdfgen" onclick="gerarPdf()">Gerar Pdf</button>
    <div class="box">
        <div class="titulo">Funcionários Cadastrados</div>
        <div class="pesq p4">
            <div>
                Situação:
                <select name="status" id="status">
                    <option value="0">Evadido</option>
                    <option value="1">Ativo</option>
                    <option value="2">Tudo</option>
                </select>
            </div>
            <select name="tipo" id="tipo" onchange="mudarPesqPlaceholder(event)">
                <option value="0">Nome</option>
                <option value="1">Email</option>
                <option value="2">Telefone</option>
            </select>
            <input type="text" id="pesq" placeholder="Pesquisar por Nome" >
            <a href="/biblioteca/funcionarios/cadastrar">Cadastrar</a>
        </div>
        <div class="conteudo lista l4" id="lista">
        </div>
    </div>
    <script src="js/modal.js"></script>
    <script src="js/fun/list.js"></script>