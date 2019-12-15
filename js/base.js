let lastmenuopen = 0
function getJSON(url)
{
	let respost = $.ajax({
		type: "GET",
		url: url,
		async: false
    }).responseText
	//   console.log(url)
    console.log(respost)
    // console.log(JSON.parse(respost))
	return JSON.parse(respost)
}
function lpad(num)
{
    num = parseInt(num)
    return (num < 10) ? "0" + String(num) : num
}
function checarVazio(a)
{
	for (let i of a)
	{
		console.log(i)
		console.log(document.getElementById(i).value)

		if (document.getElementById(i).value == "")
		{
			alert("Campo obrigatório em branco")
			return false
		}
	}
	return true
}
function showmenu(id)
{
	{
		if (lastmenuopen == 0)
		{
			document.getElementById(id).style.setProperty("display", "block", "important")
			lastmenuopen = id
			return
		}
		if (lastmenuopen != id)
		{
			document.getElementById(lastmenuopen).style.setProperty("display", "none", "important")
			document.getElementById(id).style.setProperty("display", "block", "important")
			lastmenuopen = id
		}
		else
		{
			document.getElementById(id).style.setProperty("display", "none", "important")
			lastmenuopen = 0
		}
	}
}
function getEstadoByNum(num)
{
	return "AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MT,MS,MG,PA,PB,PR,PE,PI,RJ,RN,RS,RO,RR,SC,SP,SE,TO".split(",")[num]
}
function getEstadoByName(estado)
{
	let nomes = "AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MT,MS,MG,PA,PB,PR,PE,PI,RJ,RN,RS,RO,RR,SC,SP,SE,TO".split(",")
	for (let i = 0; i < nomes.length; i++) 
		if (nomes[i] == estado)
			return i
}
function montarEstados()
{
    let estados = "AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MT,MS,MG,PA,PB,PR,PE,PI,RJ,RN,RS,RO,RR,SC,SP,SE,TO".split(",")
	let t = ""
	let c = 0
    for (let i of estados)
        t += "<option value='" + c++  + "'>" + i + "</option>"
    document.getElementById("estado").innerHTML = t
}
function getMesNome(i)
{
	return "Janeiro,Fevereiro,Março,Abril,Maio,Junho,Julho,Agosto,Setembro,Outubro,Novembro,Dezembro".split(",")[i]
}
function montarMeses()
{
	let nomes = "Janeiro,Fevereiro,Março,Abril,Maio,Junho,Julho,Agosto,Setembro,Outubro,Novembro,Dezembro".split(",")
	let c = 0, t = ""
    for (let i of nomes)
		t += "<option value='" + c++  + "'>" + i + "</option>"
	return t
}
function formatarData(data)
{
	let d = data.split('-')
	return d[2] + "/" + d[1] + "/" + d[0]
}
function converterData(data)
{
    return data.getFullYear() + "-" + lpad(data.getMonth()) + "-" + lpad(data.getDate()) 
}
function mergeArrays(array1, array2)
{	
    const result_array = [];
    const arr = array1.concat(array2);
    let len = arr.length;
    const assoc = {};

    while(len--) {
        const item = arr[len];

        if(!assoc[item]) 
        { 
            result_array.unshift(item);
            assoc[item] = true;
        }
    }

    return result_array;
}
function montarPdf(comeco, tabela, estilos)
{
	let conteudo = [
		comeco,
		tabela
    ]
    var pdf1 = {
        content: conteudo,
        styles: estilos
    }
    let a = pdfMake.createPdf(pdf1)
    a.open()
}
function lerDataAtual()
{
    let d = new Date()
    return d.getFullYear() + "-" + lpad(d.getMonth() + 1) + '-' + lpad(d.getDate() + 1)
}
function lerDataAtualForDateInput()
{
    let d = new Date()
    return d.getFullYear() + "-" + lpad(d.getMonth()) + '-' + lpad(d.getDate())
}
function getCep()
{
    let cep = document.getElementById("cep").value
    if (cep.length != 9)
        return
    cep = cep.split("-")[0] + cep.split("-")[1]
    console.log(cep)
    $("#endereco").val("");
    $("#bairro").val("");
    $("#cidade").val("");
    $("#uf").val("");

    //Consulta o webservice viacep.com.br/
    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
    console.log(dados)
        if (!("erro" in dados)) {
            //Atualiza os campos com os valores da consulta.
            $("#endereco").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            document.getElementById("estado").selectedIndex = getEstadoByName(dados.uf)
        } //end if.
        else {
            //CEP pesquisado não foi encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    });
}
