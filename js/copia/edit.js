function enviar()
{
    let t = ""
    if (checarVazio("nome,editora,autor,isbn,cdd,edicao,ano".split(",")))
    {
        document.form.submit()
    }
}
function redirect(i)
{
    let t = ""
    switch (i)
    {
        case 0: t = "livros"; break;
        case 1: t = "copias"; break;
    
    }
    location.href = "/biblioteca/" + t
}
function limparInput()
{
    document.getElementById("total").value = ""
}
function addCopias()
{
    let total = document.getElementById("total").value
    if (total == "")
    {
        alert("Algum valor deve ser informado")
        return
    }
    total = parseInt(total)
    if (total > 10)
    {
        alert("Só é possível inserir\n10 livros por vez.")
        return
    }
    document.getElementById("hidden").value = location.href.split("/")[6]
    document.querySelector("#modal1").action += "?" + location.href.split("/")[6]
    document.getElementById("modal1").submit()
}
function init()
{
    ler()
    $('#isbn').bind('keypress', validarInteiro);
    $('#cdd').bind('keypress', validarInteiro);
    $('#edicao').bind('keypress', validarInteiro);
    $('#ano').bind('keypress', validarInteiro);
    $('#total').bind('keypress', validarInteiro);
    $('#autor').bind('keypress', validarTexto);
}
function ler()
{
    let l = location.href.split("/biblioteca")[1].split("/")
    console.log(l[3])
    el = getJSON("../../api/livro/ver.php?" + l[3])[0]
    document.form.action += "?" + el["id"]
    document.getElementById("status").selectedIndex = parseInt(el["status"])
    l = Object.keys(el)
    l.splice(0, 1)
    l.pop()
    for (let i of l)
    {
        console.log(i)
        document.getElementById(i).value = el[i]
    }
}