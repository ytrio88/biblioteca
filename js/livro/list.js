
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
    ths = "Nome,autor,total,situação,Ações".split(",")
    for (let i of ths)
    t += "<label class='th'>" + i.toUpperCase() +  "</label>"
    for (let i of lista)
    {
        t += "<label class=' first'>" + i.nome + "</label>"
        t += "<label>" + i.autor + "</label>"
        t += "<label>" + i.total + "</label>"
        t += "<label>" + (((i.status == 0) ? "Sem" : "Com") + " Cópia") + "</label>"
        t += "<div class='direita last'>"
        t += "<a href='livros/consultar/" + i.id + "'>Ver</a>"
        t += "<a href='livros/editar/" + i.id + "'>Editar</a>"
        t += "</div>"
    }
    document.getElementById("lista").innerHTML = t
}
function ler()
{
    console.log(5)
    lista = getJSON("api/livro/list.php?" + document.getElementById("status").selectedIndex)
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

function gerarPdf()
{
    let d = new Date()
    d = d.getDate() + " de " + getMesNome(parseInt(d.getMonth())) + " de " + d.getFullYear()

    let array = []
    array.push([
    {style: ["th"], text: "Livro"},
    {style: ["th"], text: "Autor"},
    {style: ["th"], text: "Total"},
    {style: ["th"], text: "Situação"}])

    for (let i of lista)
        array.push(
            [i.nome, i.autor, i.total, (((i.status == 1) ? "Com" : "Sem") + " Cópia")]
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
            widths: ["*", "*", "*", "*"],
            body: array
        }
    }
    montarPdf(comeco, tabela, estilos)
}