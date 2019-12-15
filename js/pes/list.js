
function init()
{
    $('#pesq').bind("keyup", pesquisar)
    document.getElementById("status").selectedIndex = 1
    document.getElementById("status").addEventListener("change", function(){ler()})
    ler()
}
function montar()
{
    let t = ""
    ths = "Nome,email,telefones,Ações".split(",")
    for (let i of ths)
    t += "<label class='th'>" + i.toUpperCase() +  "</label>"
    for (let i of lista)
    {
        t += "<label class=' first'>" + i.nome + "</label>"
        t += "<label>" + i.email + "</label>"
        t += "<label>" + i.telefones + "</label>"
        t += "<div class='direita last'>"
        t += "<a href='pessoas/consultar/" + i.id + "'>Ver</a>"
        t += "<a href='pessoas/editar/" + i.id + "'>Editar</a>"
        t += "</div>"
    }
    document.getElementById("lista").innerHTML = t
}
function ler()
{
    console.log(5)
    lista = getJSON("api/pes/list.php?" + document.getElementById("status").selectedIndex)
    montar()
}
function pesquisar()
{
    let p = document.getElementById("pesq").value
    let tipo = document.getElementById("tipo").selectedIndex
    lista = getJSON("api/pes/pesq.php?" + p + "&" + tipo + "&" + document.getElementById("status").selectedIndex)
    if (lista.length == 0)
        ler()
    else
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
    {style: ["th"], text: "Nome"},
    {style: ["th"], text: "E-mail"},
    {style: ["th"], text: "Telefone"},
    {style: ["th"], text: "Situação"}])

    for (let i of lista)
        array.push(
            [i.nome, i.email, i.telefones, ((i.status == 1) ? "Ativo" : "Desativado")]
        )

    let comeco = [
        {
            text: "Relatório de Funcionários", style: "header"
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
            widths: ["auto","auto","*","*"],
            body: array
        }
    }
    montarPdf(comeco, tabela, estilos)
}