
<title>Cadastrar Aluno</title>
<?php
    echo '<link rel="stylesheet" href="' . $extra . 'css/basecad.css">';
    echo '<link rel="stylesheet" href="' . $extra . 'css/modal.css">';
    echo '<link rel="stylesheet" href="' . $extra . 'css/empcad.css">';
?>

<!-- <link rel="stylesheet" href="css/alunocad.css"> -->
</head>
<body class="central" onload="init()">
    <?php
        require_once("paginas/nav.php");
    ?>
    <form action="../api/emp/cad.php" method="post" name="form" class="box outrobox2">
        <div class="titulo">Registrar Empréstimo</div>
        <div class="conteudo">
            <div class="size1 sizes">
                <div>
                    <input type="text" id="pessoa" value="0" placeholder="clique para selecionar a pessoa"   onkeypress="filtrar()" onclick="mostrarMsg(1)">
                    <input type="hidden" name="idpes" id="idpes">
                </div>
            </div>
            <div class="size2 sizes">
                <div>
                    <div class="size2 sizes stipo">
                            <select id="tipo">
                                <option value="0">Título</option>
                                <option value="1">Autor</option>
                            </select>
                            <input type="text" id="pesq" onkeyup="pesquisar(event)">      
                    </div>
                    <div id="listaLivros" class="lista listGroup"></div>
                </div>
                <div>
                    <div class="g3 infos">
                        <input class="infodisplay" readonly type="text" value="Id">      
                        <input  class="infodisplay"  readonly type="text" value="Título">   
                        <div></div>   
                    </div>
                    <div id="listaSel" class="lista listGroup"></div>
                </div>
                <input type="hidden" name="idcopia" id="idcopia">
            </div>
            <input type="hidden" id="idfun" name="idfun">
            <div class="size2 sizes">
                <div>
                    <label >Data de Empréstimo:</label>
                    <input type="date" id="dtemp" name="dtemp" readonly>
                </div>
                <div>
                    <label >Data de Devolução:</label>
                    <input type="date" id="dtdev" name="dtdev" readonly>
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
    <div id="modal1" class="modal modal600 size600">
        <div class="titulo">Selecionar Pessoa</div>
        <div class="conteudo">
            <div class="lista" id="lista1"></div>
        </div>
        <div class="footer">
            <button type="button" onclick="cancelar(1)">Voltar</button>
            <button type="button" class="direita2" onclick="selPes()">Selecionar</button>
            <button type="button" class="direita2" onclick="cad()">Cadastrar Pessoa</button>
        </div>
    </div>    
    <div id="modal2" class="modal modal600 size600">
        <div class="titulo">Selecionar Livro</div>
        <div class="conteudo">
            <div class="sizes size2">
                <div>
                    <select id='tipo'>
                        <option value="0">Nome</option>
                        <option value="1">Autor</option>
                    </select>
                </div>
                <div>
                    <input type="text" id="selLivroPesq" id="pesq" onkeyup="pesquisar(event)" placeholder="Pesquisar por nome">
                </div>
            </div>
            <hr>
            <div class="lista" id="lista4"></div>
        </div>
        <div class="footer">
            <button type="button" onclick="cancelar(2)">Voltar</button>
            <button type="button" class="direita2" onclick="selLivro()">Selecionar</button>
        </div>
    </div>
    <div id="modal3" class="modal modal600 size600">
        <div class="titulo">Selecionar Cópia</div>
        <div class="conteudo">
            <div class="radiosCopy">
                <div></div>
                <div>Id</div>
                <div>Status</div>
            </div>
            <hr>
            <div class="lista" id="lista3"></div>
        </div>
        <div class="footer">
            <button type="button" onclick="cancelar(3)">Voltar</button>
            <button type="button" class="direita2" onclick="selCopia()">Selecionar</button>
        </div>
    </div>
    <div class="btngrupo">
        <button type="button" onclick="voltar()">Voltar</button>
        <button type="button" class="direita2" onclick="enviar()">Cadastrar</button>
        <!-- <input class="direita2"  type="submit" value="Logar"> -->
    </div>
    <?php
        require_once("paginas/footer.php");
    ?>
    <script src="../js/validadores.js"></script>
    <script src="../js/modal.js"></script>
    <script src="../js/mask.js"></script>
    <script src="../js/emp/cad.js"></script>