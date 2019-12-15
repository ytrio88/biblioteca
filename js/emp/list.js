
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
    ths = "pessoa,livro,alugado,devolução,Ações".split(",")
    for (let i of ths)
    t += "<label class='th'>" + i.toUpperCase() +  "</label>"
    for (let i of lista)
    {
        t += "<label class=' first'>" + i.pessoa + "</label>"
        t += "<label>" + i.livro + "</label>"
        t += "<label>" + formatarData(i.alugado) + "</label>"
        t += "<label>" + ((i.dev != "") ? formatarData(i.dev) : "Não dev.") + "</label>"
        t += "<div class='direita last'>"
        t += "<a onclick='mostrarMsg(1); ler1(" + i.id + ")'>Ver</a>"
        t += "<a onclick='devolver(" + i.id + ")'>Devolver</a>"
        t += "</div>"
    }
    document.getElementById("lista").innerHTML = t
}
function ler1(id)
{
    el = getJSON("api/emp/ver.php?" + id)[0]
    for (let i of "pessoa,livro,dtemp,dtdev,inputstatus".split(","))
    {
        document.getElementById(i).value = el[i]
        document.getElementById(i).disabled = "disabled"

    }
    document.getElementById("inputstatus").value = (el.inputstatus == 1) ? "Alugado" : "Devolvido"
    if (el.inputstatus == 2)    
        document.getElementById("btndev").disabled =  "disabled"   
}
function ler()
{
    console.log(5)
    lista = getJSON("api/emp/list.php?" + document.getElementById("status").selectedIndex)
    montar()
}
function pesquisar()
{
    let p = document.getElementById("pesq").value
    let tipo = document.getElementById("tipo").selectedIndex
    lista = getJSON("api/emp/pesq.php?" + p + "&" + tipo + "&" + document.getElementById("status").selectedIndex)
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
        {style: ["th"], text: "Pessoa"},
        {style: ["th"], text: "Livro"},
        {style: ["th"], text: "Data Emp."},
        {style: ["th"], text: "Data Dev Prev"},
        {style: ["th"], text: "Data Dev"},
        {style: ["th"], text: "Situação"}
    ])

    for (let i of lista)
        array.push(
            [i.pessoa, i.livro, formatarData(i.alugado), formatarData(i.dtprev), ((i.dev != "") ? formatarData(i.dev) : "Não Dev."), (i.status == 0) ? "Devolvido" : "Alugado"]
        )

    let comeco = [
        {
            text: "Relatório de Empréstimos", style: "header"
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
            widths: ["*", "*", "*", "*", "*", "*"],
            body: array
        }
    }
    montarPdf(comeco, tabela, estilos)
}
function devolver(id)
{
    location.href = "api/emp/devolver.php?" + id
}