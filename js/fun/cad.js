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