function voltar()
{
    location.href = "/biblioteca/funcionarios"
}
function init()
{
    ler()
}
function ler()
{
    montarEstados()
    let l = location.href.split("/biblioteca")[1].split("/")
    console.log(l[3])
    el = getJSON("../../api/fun/ver.php?" + l[3])[0]
    document.getElementById("status").selectedIndex = parseInt(el["status"])
    l = Object.keys(el)
    l.splice(0, 1)
    l.pop()
    for (let i of l)
    {
        // console.log(i)
        document.getElementById(i).value = el[i]
    }
    document.getElementById("status").disabled = "disabled"
}