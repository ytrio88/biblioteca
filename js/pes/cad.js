function enviar()
{
    let t = ""
    if (checarVazio("nome,dtnasc,cpf,tel1,email,cep,cidade,estado,endereco,numero,bairro".split(",")))
    {
        document.form.submit()
    }
}
function voltar()
{
    location.href = "/biblioteca/pessoas"
}
function init()
{
    montarEstados()
    $('#nome').bind('keypress', validarTexto);
    $('#cidade').bind('keypress', validarTexto);
    $('#email').bind('keypress', validarEmail);
    $('#cep').bind('keypress', validarInteiro);
    $('#tel1').bind('keypress', validarInteiro);
    $('#tel1').mask("(99)999999999");
    $('#tel2').bind('keypress', validarInteiro);
    $('#tel2').mask("(99)999999999");
    $('#cpf').bind('keypress', validarInteiro);
    $('#cpf').mask('999.999.999-99');
    $('#cep').mask('99999-999');
    $('#cep').bind('keypress', validarInteiro);
    $('#cep').bind('keypress', getCep);
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