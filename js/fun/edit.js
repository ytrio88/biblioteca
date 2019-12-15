function enviar()
{
    let t = ""
    if (checarVazio("nome,dtnasc,cpf,cargo,tel1,email,cep,cidade,estado,endereco,numero,bairro".split(",")))
    {
        document.form.submit()
    }
}
function voltar()
{
    location.href = "/biblioteca/funcionarios"
}
function init()
{
    $('#cpf').bind('keypress', validarInteiro);
    $('#tel1').bind('keypress', validarInteiro);
    $('#tel2').bind('keypress', validarInteiro);
    $('#cep').bind('keypress', validarInteiro);
    $('#numero').bind('keypress', validarInteiro);
    $('#cpf').mask("999.999.999-99");
    $('#tel1').mask("(99)999999999");
    $('#tel2').mask("(99)999999999");
    $('#cep').mask("99999-999");
    $('#cep').bind('keypress', getCep);
    montarEstados()
    ler()
}
function ler()
{
    let l = location.href.split("/biblioteca")[1].split("/")
    console.log(l[3])
    el = getJSON("../../api/fun/ver.php?" + l[3])[0]
    document.form.action += "?" + el["id"]
    document.getElementById("status").selectedIndex = parseInt(el["status"])
    l = Object.keys(el)
    l.splice(0, 1)
    l.pop()
    for (let i of l)
    {
        // console.log(i)
        document.getElementById(i).value = el[i]
    }
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