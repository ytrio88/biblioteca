let iduser = 0
function init()
{
    $('#cpf').bind('keypress', validarInteiro);
    $('#cpf').mask('999.999.999-99');
    $('#cpfchange').bind('keypress', validarInteiro);
    $('#cpfchange').mask('999.999.999-99');
}
function checarSenha(tipo)
{
    let inc = tipo == 0 ? "" : "rec"
    let senha = document.getElementById("senha" + inc).value
    let senha1 = document.getElementById("senha1" + inc).value
    if (senha1 == "" && senha != "")
        return
    if (senha != senha1)
    {
        alert("As senhas informadas\ndevem ser iguais")
        return
    }
}
function clickLogin(event)
{
    if (event.keyCode == 13)
        logar()
}
function checarRec()
{
    let cpf = document.getElementById("cpfchange").value
    let email = document.getElementById("emailchange").value
    let usuario = document.getElementById("usuariochange").value
    let resp = 0, o = null
    if (cpf != "" && email != "" && usuario != "")
        o = getJSON("api/user/checar3.php?" +  cpf + "&" + email + "&" + usuario)[0]
        document.getElementById("pergrec").value = o.p
    resp = o.r
    console.log(o)
    document.styleSheets[3].cssRules[4].style.display = resp != 0 ? "grid": "none"
    let calc = resp != 0 ? 406 : 234
    document.styleSheets[3].cssRules[5].style.top = "calc(50vh - " + calc + "px/2)"
}
function checarResposta()
{
    let usuario = document.getElementById("usuariochange").value
    let resprec = document.getElementById("resprec").value
    let senharec = document.getElementById("senharec").value
    let resp = 0
    if (resprec != "" && senharec != "")
        resp = getJSON("api/user/checar4.php?" + resprec)[0].r
    if (resp == 0)
    {
        alert("Resposta da pergunta secreta\nestá incorreta")
        return
    }
    location.href = "api/user/alterar.php?" + senharec + "&" + usuario
}
function checar()
{
    let cpf = document.getElementById("cpf").value
    let email = document.getElementById("email").value
    let resp = 0
    if (cpf != "" && email != "")
        resp = getJSON("api/user/checar2.php?" +  cpf + "&" + email)[0].r
        console.log(resp)
    iduser = resp
    document.styleSheets[3].cssRules[3].style.display = resp != 0 ? "grid": "none"
    let calc = resp != 0 ? 492 : 320
    document.styleSheets[3].cssRules[2].style.top = "calc(50vh - " + calc + "px/2)"
    // console.log(document.styleSheets[3].cssRules[2].style.top)
}
function criar()
{
    let login = document.getElementById("username").value
    let senha = document.getElementById("senha").value
    let perg = document.getElementById("perg").value
    let resp = document.getElementById("resp").value
    if (checarVazio("login,senha,perg,resp".split(",")))
        location.href = "api/user/cad.php?" + login + "&" + senha + "&" + perg + "&" + resp + "&" + iduser
}
function logar()
{
    let login = document.getElementById("login").value
    let senha = btoa(document.getElementById("senha").value)
    if(checarVazio("login,senha".split(",")))
        resp = getJSON("api/user/checar.php?" + login + "&" + senha)[0].r
    else
        return
    if (resp == 0)
    {
        alert("Usuário inexistente")
        return
    }
    if (resp == 1)
    {
        alert("Senha incorreta")
        return
    }
    if (resp == 2)
    {
        location.href = "/biblioteca"
    }
}