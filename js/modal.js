function mostrarMsg(tipo)
{
		document.getElementById("modal" + tipo).style.display = "block"
		div = document.createElement('div')
		div.className="fundo"		
		div.setAttribute("id", "fundo" + tipo);
		document.getElementById("modal" + tipo).insertAdjacentElement("beforebegin", div); 
}
function cancelar(tipo)
{
	document.getElementById("modal" + tipo).style.display = "none"
	$("#fundo" + tipo).remove()
}