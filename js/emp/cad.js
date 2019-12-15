let pessoas = [], copias = [], livros = [], toCad = [], idlivro = 0
function enviar()
{
    let t = ""
    if (document.getElementById("idpes").value == 0)
    {
        alert("Alguém deve ser escolhido")
        return
    }
    if (toCad.length == 0)
    {
        alert("Algum livro deve ser escolhido")
        return
    }
    for (let i of toCad)
    {
        if (t != "") t += ","
        t += i.id
    }
    document.getElementById("idcopia").value = t
    document.form.submit()
}
function voltar()
{
    location.href = "/biblioteca/livros"
}
function init()
{
    pessoas = getJSON("../api/pes/list.php?1")
    livros = getJSON("../api/livro/list.php?1")
    montarLista(1, pessoas)
    montarLivros()
    console.log(new Date(lerDataAtual()))
    console.log()
    d = new Date(new Date(lerDataAtual()).getTime() + 10000 * 360 * 24 * 7 - 10000 * 360 * 21)
    document.getElementById("dtemp").value = lerDataAtualForDateInput()
    document.getElementById("dtdev").value = converterData(d)
}
function montarLivros()
{
    let t = "", contador = 0
    for (let i of livros)
        t += "<div class='livrosGrid'><label>" + i.nome + "</label><img onclick='add(" + contador++ + ")' src='../recursos/plus.PNG' alt=''></div>"
    document.getElementById("listaLivros").innerHTML = t
}
function pesquisar(event)
{
    let p = event.target.value
    let tipo = document.getElementById("tipo").selectedIndex
    livros = getJSON("../api/livro/pesq.php?" + p + "&" + tipo + "&" + 1)
    montarLivros()
}
function add(i)
{
    idlivro = i
    copias = getJSON("../api/copia/list2.php?2&" + livros[i].id)
    montarCopias()
    mostrarMsg(3)
}
function montarCopias()
{    
    let t = "", contador = 0
    let tipo = 3
    aux = copias
    if (toCad.length != 0)
    for (let i of toCad)
    {
        c = 0
        for (let j of aux)
        {
            if (i.id != j.id)
                c++
            else
            {
                aux.splice(c,1)
                break
            }
        }
    }
    for (let i of aux)
    {
        t += "<label class='radios radiosCopy' " +  ((i.status == "Alugado") ? "style='color: gray'" : '' ) + "> <input class='r" + tipo + "' " + ((contador == 0) ? " checked='checked' " : "") + " type='radio'value='" + contador++ + "' name='l" + tipo + "' " + ((i.status == "Alugado") ? "disabled='disabled'" : "") + "><label onclick='selRadio(event)'>" + i.id + "</label><label onclick='selRadio(event)'>" + i.status + "</label></label>"
    }

    document.getElementById("lista3").innerHTML = t
}
function montarLista(tipo, lista)
{
    let t = "", contador = 0
    for (let i of lista)
        t += "<label class='radios' > <input class='r" + tipo + "' " + ((contador == 0) ? " checked='checked' " : "") + " type='radio'value='" + contador++ + "' name='l" + tipo + "'>" + i.nome + "</label>"
    document.getElementById("lista" + tipo).innerHTML = t
}
function selCopia()
{
    let contador = 0
    let l3 = document.getElementsByName("l3")
    for (let i of l3)
    {
        if (i.checked && !i.disabled)
        {
            toCad.push(copias[contador])
            montarOutraLista()
            cancelar(3)
            return
        }
        else
            contador++
    }
    cancelar(3)
}
function selPes()
{
    let pes = document.getElementsByClassName("r1")
    for (let i of pes)
        if (i.checked != "")
            pes = pessoas[i.value]
    document.getElementById("pessoa").value = pes.nome
    document.getElementById("idpes").value = pes.id
    cancelar(1)
}
function montarOutraLista()
{
    let t = "", contador = 0
    for (let i of toCad)
        t += "<div onclick='remove(" + contador++ + ")' class='g3'><div>" + i.id +"</div><div>" + i.livro +"</div><img src='../recursos/minus.PNG' alt=''></div>"
    document.getElementById("listaSel").innerHTML = t   
}
function remove(i)
{
    toCad.splice(i, 1)
    montarOutraLista()
}
function cad()
{
    location.href = "../pessoas/cadastrar"
}
function selRadio(event)
{
    event.target.parentElement.firstElementChild.checked = "checked"
}