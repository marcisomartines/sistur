// Função que verifica se o navegador tem suporte AJAX 
function AjaxF()
{
    var ajax;	
    try
    {
	ajax = new XMLHttpRequest();
    } 
    catch(e) 
    {
	try
	{
            ajax = new ActiveXObject("Msxml2.XMLHTTP");
	}
        catch(e) {
            try 
            {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e) 
            {
                alert("Seu browser não da suporte à AJAX!");
		return false;
            }
	}
    }
    return ajax;
}
//função para gerar os relatorios dos funcionarios
function reserva()
{
    var ajax=AjaxF();
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4)
        {
            document.getElementById('relatorio').innerHTML=ajax.responseText;
        }
    }
    var dados = document.getElementById('id_tour').value;
    ajax.open("POST","../home/reservaMapa", false);
    ajax.setRequestHeader("Content-Type","text/html");
    ajax.send(dados);
}