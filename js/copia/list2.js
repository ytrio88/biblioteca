
function init()
{
    $('#pesq').bind("keyup", pesquisar)
    document.getElementById("status").selectedIndex = 0
    document.getElementById("status").addEventListener("change", function(){ler()})
    ler()
}
function montar()
{
    let t = "", contador = 0
    ths = "Livro,status,data,Ações".split(",")
    for (let i of ths)
    t += "<label class='th'>" + i.toUpperCase() +  "</label>"
    for (let i of lista)
    {
        t += "<label class=' first'>" + i.livro + "</label>"
        t += "<label>" + i.status + "</label>"
        t += "<label>" + formatarData(i.data) + "</label>"
        t += "<div class='direita last'>"
        t += "<a onclick='mostrarMsg(2); montarModal(\"" + contador++ + "\")'>Ver</a>"
        t += "</div>"
    }
    document.getElementById("lista").innerHTML = t
}
function ler()
{
    console.log(5)
    id = location.href.split("/")[5]
    lista = getJSON("../api/copia/list2.php?" + document.getElementById("status").selectedIndex + "&" + id)
    el = getJSON("../api/copia/ver.php?" + id)[0]
    document.getElementById("titulo").innerHTML = "Cópias de " + lista[0].livro + " cadastradas"
    montar()
}
function pesquisar()
{
    let p = document.getElementById("pesq").value
    let tipo = document.getElementById("tipo").selectedIndex
    lista = getJSON("api/livro/pesq.php?" + p + "&" + tipo + "&" + document.getElementById("status").selectedIndex)
    montar()
}
function mudarPesqPlaceholder(e)
{
    document.getElementById("pesq").placeholder = "Pesquisar por " + e.target[e.target.selectedIndex].innerText
}
function montarModal(id)
{
    let el = getJSON("../api/copia/ver.php?" + lista[id].id)[0]
    console.log(el.status)
    document.getElementById("modal2titulo").innerHTML = "Dados de " + el.livro
    for (let i of "livro,data,statusmodel,obscopia".split(","))
        document.getElementById(i).disabled = "disabled"
    document.getElementById("livro").value = el.livro
    document.getElementById("data").value = el.data
    let t1 = ""
    switch (parseInt(el.status)) {
        case 0: t1 = "Disponível"; break;
        case 1: t1 = "Alugado"; break;
    }
    document.getElementById("statusmodel").value = t1
    document.getElementById("obscopia").value = el.obs
}

function gerarPdf()
{
    let d = new Date()
    d = d.getDate() + " de " + getMesNome(parseInt(d.getMonth())) + " de " + d.getFullYear()

    let array = []
    array.push([
    {style: ["th"], text: "Livro"},
    {style: ["th"], text: "Situação"},
    {style: ["th"], text: "Data"}])

    for (let i of lista)
    array.push(
        [i.livro, i.status, formatarData(i.data)]
    )

    let comeco = [
        {
            text: "Relatório de Livros", style: "header"
        },
        {
            text: ["Data: ", d], style: "header", fontSize: 14
        }
    ]

    let estilos = {
        th: {
            alignment: 'center',
            color: "white",
            fillColor: "#4e73df",
            fontSize: 12
        },
        header: {
            bold: true,
            fontSize: 18,
            alignment: "center",
            margin: [0, 10, 0, 5]
        }
    }
    tabela = {
        table:
        {
            widths: ["*", "*", "*"],
            body: array
        }
    }
    // console.log(tabela)
    montarPdf(comeco, tabela, estilos)
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
    document.getElementById("hidden").value = id
    document.querySelector("#modal1").action += "?" + id
    document.getElementById("modal1").submit()
}