<?php
    require_once("paginas/nav.php");
?>
<link rel="stylesheet" href="css/baselist.css">
<link rel="stylesheet" href="css/basecad.css">
<link rel="stylesheet" href="css/emplist.css">
<link rel="stylesheet" href="css/modal.css">
</head>
<body onload="init()">    
    <button type="button" class="pdfgen" onclick="gerarPdf()">Gerar Pdf</button>
    <div class="box">
        <div class="titulo">Empréstimos Feitos</div>
        <div class="pesq p4">
            <div>
                Situação:
                <select name="status" id="status">
                    <option value="0">Devolvidos</option>
                    <option value="1">Alugados</option>
                    <option value="2">Todos</option>
                </select>
            </div>
            <select name="tipo" id="tipo" onchange="mudarPesqPlaceholder(event)">
                <option value="0">Pessoa</option>
                <option value="1">Livro</option>
                <option value="2">Autor</option>
            </select>
            <input type="text" id="pesq" placeholder="Pesquisar por Nome" >
            <a href="/biblioteca/emprestimos/cadastrar">Cadastrar</a>
        </div>
        <div class="conteudo lista l5a" id="lista">
        </div>
    </div>
    <div id="modal1" class="modal size600 modal600">
        <div class="titulo">Editar Empréstimo</div>
        <div class="conteudo">
            <div class="size3 sizes">
                <div>
                    <label>Pessoa</label>
                    <input type="text" id="pessoa">
                </div>
                <div>
                    <label>Livro</label>
                    <input type="text" id="livro">
                </div>
                <div>
                    <label>Situação</label>
                    <input type="text" id="inputstatus">
                </div>
            </div>
            <div class="size2 sizes">
                <div>
                    <label>Data de Emp.</label>
                    <input type="date" id="dtemp">
                </div>
                <div>
                    <label>Data de Dev. Prevista</label>
                    <input type="date" id="dtdev">
                </div>
            </div>
            <div class="size1 sizes">
                <div>
                    <textarea id="obs"></textarea>
                </div>
            </div>
        </div>
        <div class="footer" style="text-align: right">
            <button type="button"  onclick="cancelar(1)">Voltar</button>
        </div>
    </div>
    <script src="js/modal.js"></script>
    <script src="js/emp/list.js"></script>