
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/basecad.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/modal.css">
    <?php
        session_destroy();
    ?>
</head>
<body class="central" onload="init()">
    <div class="box">
        <div class="titulo">Realizar Login</div>
        <div class="conteudo">
            <div class="size1 sizes">
                <div>
                    <label >Login:</label>
                    <input type="text" id="login" onkeypress="clickLogin(event)" placeholder="Informe o login">
                </div>
            </div>
            <div class="size1 sizes">
                <div>
                    <label >Senha:</label>
                    <input type="password" id="senha" onkeypress="clickLogin(event)" placeholder="Informe a senha">
                </div>
            </div>
        </div>
        <div class="footer">
            <button type="button" onclick="mostrarMsg(1)">Criar Conta</button>
            <button type="button"  onclick="mostrarMsg(2)">Trocar Senha</button>
            <button type="button" class="direita2" onclick="logar()">Logar</button>
            <!-- <input class="direita2"  type="submit" value="Logar"> -->
        </div>
    </div>
    <div id="modal1" class="modal modal700 size700">
        <div class="titulo">Criar Conta</div>
        <div class="conteudo">            
            <div class="size1 sizes">
                <div>
                    <label >Login:</label>
                    <input type="text" id="username" onblur="checar()" placeholder="Informe o login">
                </div>
            </div>      
            <div class="size2 sizes">
                <div>
                    <label >E-mail:</label>
                    <input type="text" id="email" onblur="checar()"  placeholder="Informe o e-mail">
                </div>
                <div>
                    <label >CPF:</label>
                    <input type="text" id="cpf" onblur="checar()"  placeholder="Informe o cpf">
                </div>
            </div>
            <div class="size2 sizes myhidden">
                <div>
                    <label >Senha:</label>
                    <input type="password" id="senha" onblur="checarSenha()" placeholder="Informe a senha">
                </div>
                <div>
                    <label >Confirmar Senha:</label>
                    <input type="password" id="senha1" onblur="checarSenha()" placeholder="Confirmar senha">
                </div>
            </div>      
            <div class="size2 sizes myhidden">
                <div>
                    <label >Pergunta Secreta:</label>
                    <input type="text" id="perg" maxlength="50" placeholder="Informe a pergunta">
                </div>
                <div>
                    <label >Informe a resposta:</label>
                    <input type="text" id="resp" maxlength="50" placeholder="Informe a resposta">
                </div>
            </div>      
        </div>
        <div class="footer">
            <button type="button" onclick="cancelar(1)">Cancelar</button>
            <button type="button" class="direita2 myhidden" onclick="criar()">Criar</button>
        </div>
    </div>
    <div class="modal modal600 size600" id="modal2">
        <div class="titulo">Recuperar Senha</div>
        <div class="conteudo">
            <div class="size3 sizes">
                <div>
                    <label>Usuário:</label>
                    <input type="text" id="usuariochange"  onblur="checarRec()">
                </div>
                <div>
                    <label>E-mail:</label>
                    <input type="text" id="emailchange"  onblur="checarRec()">
                </div>
                <div>
                    <label>CPF:</label>
                    <input type="text" id="cpfchange" onblur="checarRec()">
                </div>  
            </div>  
            <div class="size2 sizes myhidden2">
                <div>
                    <label >Pergunta Secreta:</label>
                    <input type="text" id="pergrec" readonly>
                </div>
                <div>
                    <label >Informe a resposta:</label>
                    <input type="text" id="resprec" maxlength="50" placeholder="Informe a resposta">
                </div>
            </div>    
            <div class="size2 sizes myhidden2">
                <div>
                    <label >Senha:</label>
                    <input type="password" id="senharec" onblur="checarSenha(1)" placeholder="Informe a senha">
                </div>
                <div>
                    <label >Confirmar Senha:</label>
                    <input type="password" id="senha1rec" onblur="checarSenha(1)" placeholder="Confirmar senha">
                </div>
            </div>      
        </div>
        <div class="footer">
            <button type="button" onclick="cancelar(2)">Cancelar</button>
            <button type="button" onclick="checarResposta()" class="direita2">Alterar</button>
        </div>
    </div>
    <?php
        require_once("paginas/footer.php");
    ?>
    <script src="js/jquery.js"></script>
    <script src="js/validadores.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/mask.js"></script>
    <script src="js/login.js"></script>