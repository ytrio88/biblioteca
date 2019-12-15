<?php
    require_once("paginas/nav.php");
?>
<link rel="stylesheet" href="css/baselist.css">
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="css/basecad.css">
<link rel="stylesheet" href="css/copialist.css">
</head>
<body onload="init()">    
    <button type="button" class="pdfgen" onclick="gerarPdf()">Gerar Pdf</button>
    <div class="box">
        <div class="titulo">Cópias Cadastradas</div>
        <div class="pesq p2a">
            <div>
                Situação:
                <select name="status" id="status">
                    <option value="0">Disponível</option>
                    <option value="1">Alugado</option>
                    <option value="2">Todos</option>
                </select>
            </div>
            <input type="text" id="pesq" placeholder="Pesquisar por Nome" >
        </div>
        <div class="conteudo lista l5" id="lista">
        </div>
    </div>
    <div id="modal1" class="modal modal500 size500" >
        <div class="titulo" id="modal1titulo"></div>
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
            <button type="button" class="direita"onclick="cancelar(1)">Voltar</button>
        </div>
    </div>
    <script src="js/modal.js"></script>
    <script src="js/copia/list.js"></script>