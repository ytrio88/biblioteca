function enviar()
{
    let t = ""
    if (checarVazio("nome,editora,autor,isbn,cdd,edicao,ano".split(",")))
    {
        document.form.submit()
    }
}
function voltar()
{
    location.href = "/biblioteca/livros"
}
function init()
{
    $('#isbn').bind('keypress', validarInteiro);
    $('#cdd').bind('keypress', validarInteiro);
    $('#edicao').bind('keypress', validarInteiro);
    $('#ano').bind('keypress', validarInteiro);
    $('#autor').bind('keypress', validarTexto);
}