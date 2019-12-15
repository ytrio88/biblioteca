let lista = []
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
        t += "<a onclick='mostrarMsg(1); montarModal(\"" + contador++ + "\")'>Ver</a>"
        t += "</div>"
    }
    document.getElementById("lista").innerHTML = t
}
function montarModal(id)
{
    let el = getJSON("api/copia/ver.php?" + lista[id].id)[0]
    console.log(el.status)
    document.getElementById("modal1titulo").innerHTML = "Dados de " + el.livro
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
function ler()
{
    console.log(5)
    lista = getJSON("api/copia/list.php?" + document.getElementById("status").selectedIndex)
    montar()
}
function pesquisar()
{
    let p = document.getElementById("pesq").value
    lista = getJSON("api/copia/pesq.php?" + p + "&" + document.getElementById("status").selectedIndex)
    montar()
}
function mudarPesqPlaceholder(e)
{
    document.getElementById("pesq").placeholder = "Pesquisar por " + e.target[e.target.selectedIndex].innerText
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
    montarPdf(comeco, tabela, estilos)
}