
function sair()
{
    location.href = "api/user/deslogar.php"
}
function redirect(tipo)
{
    tipo = parseInt(tipo), t = ""
    switch (tipo)
    {
        case 1: t = "funcionarios"; break;
        case 2: t = "usuarios"; break;
        case 3: t = "livros"; break;
        case 4: t = "copias"; break;
        case 5: t = "pessoas"; break;
        case 6: t = "emprestimos"; break;
    }
    location.href = "/biblioteca/" + t
}