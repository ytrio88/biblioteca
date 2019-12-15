<nav>
<?php
    echo '
    
    <li class="li-info">Usuário:</li>
    <li id="loginnav"  class="li-info">' . $_SESSION["login"] . '</li>
    <li class="li-info">Cargo:</li>
    <li class="li-info" id="cargonav">' . ($_SESSION["cargo"] == 9 ? "Adminstrador" : "Bibliotecário") . '</li><hr>
    
    ';
    if ($_SESSION["cargo"] == 9)
        require_once("adm.php");
    require_once("fun.php");

?>
    <li><a  class="lialone" href="/biblioteca">Menu</a></li>
</nav>