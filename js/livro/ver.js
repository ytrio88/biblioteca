function voltar()
{
    location.href = "/biblioteca/livros"
}
function init()
{
    ler()
}
function ler()
{
    let l = location.href.split("/biblioteca")[1].split("/")
    console.log(l[3])
    el = getJSON("../../api/livro/ver.php?" + l[3])[0]
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

function gerarPdf()
{
    let d = new Date()
    d = d.getDate() + " de " + getMesNome(parseInt(d.getMonth())) + " de " + d.getFullYear()

    eldados = document.getElementsByClassName("eldados")
    console.log(eldados)

    let array = 
    [
        //linha da tabela
        [
            {
                table: 
                {
                    widths: ["*", "*"],
                    body: [[
                        criarCelula(eldados[0].innerText, el["nome"]),
                        criarCelula(eldados[1].innerText, (((el["status"] == 1)?"Com":"Sem") + " Cópia"))
                    ]]
                },layout: "noBorders"      
            }
        ],
        [
            {
                table: 
                {
                    widths: ["*", "*", "*"],
                    body: [[
                        criarCelula(eldados[2].innerText, el.autor),
                        criarCelula(eldados[3].innerText, el.editora),
                        criarCelula(eldados[4].innerText, el.isbn)
                    ]]
                },layout: "noBorders"      
            }
        ],
        [
            {
                table: 
                {
                    widths: ["*", "*", "*"],
                    body: [[
                        criarCelula(eldados[5].innerText, el.cdd),
                        criarCelula(eldados[6].innerText, el.edicao),
                        criarCelula(eldados[7].innerText, el.ano)
                    ]]
                },layout: "noBorders"      
            }
        ],
        [{table: criarLinha([[8,"obs"]]),layout: "noBorders"}]        //fim da linha da tabela
    ]

    let comeco = [
        {
            text: ["Informações do livro ", el.nome], style: "header"
        },
        {
            text: ["Data: ", d], style: "header", fontSize: 14
        }
    ]
    let estilos = {
        h1:
        {
            bold: true, margin: [0,0,0,0], fontSize: 10
        },
        header: {
            bold: true,
            fontSize: 14,
            alignment: "center",
            margin: [0, 10, 0, 5]
        }
    }
    tabela = {
        table:
        {
            widths: ["*"],
            body: array
        },
        layout: "noBorders"
    }
    
    montarPdf(comeco, tabela, estilos)
}
function criarLinha(str)
{
    let tamanho = str.length, contador = 0, aux = [], aux2 = []
    while (contador < tamanho)
    {
        i = str[contador]
        console.log(i)
        console.log(eldados[i[0]].innerText)
        aux.push("*")
        aux2.push(criarCelula(eldados[i[0]].innerText, el[i[1]]))
        contador++
    }
    let t = {
        widths: aux,
        body: [aux2]
    }  
    return t
}
function criarCelula(titulo, info)
{
    return {
        table:
        {
            widths: ["*"],
            body:[[{text: titulo, style: "th"}], [{table: {widths:["*"], body: [[{text: ((info == "") ? "   " : info), fontSize: 14, margin: [3,5,3,5]}]]}}
                
                ]]
        },
        layout: "noBorders"
    } 
}