<?php

include("global.php");

include("inc_mensagem.php");

?>
<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
</head>
<body id="bodylogin">
<div id="fundao">
<form id="form" action="login_xp.php" method="POST">
    <div align="center" id="login">
       <div id="sistema">Sistema LibCECB</div>
       <table border="0" cellpadding="0" cellspacing="10" class="tablelogin">
           <tr>
               <td colspan="2" class="desc"><strong>Informe usuario e senha</strong></td>
            </tr>
            <tr>
                <td class="d_desc">Login</td>
                <td><input type="text" name="login" id="login" class="input_desc" /></td>
            </tr>
            <tr>
                <td class="d_desc">Senha</td>
                <td><input type="password" name="senha" id="senha" class="input_desc" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input class="enviar" type="button" name="entrar" value="Entrar" onclick="validaForm()" /> </td>
            </tr>
        </table>       
    </div>
</form>
</div>
<script type='text/javascript'>
function validaForm()
{
    var erro = 0;
    if(document.getElementById('login').value == "")
    {
        alert("Informe o login");
        erro++;                
    }
    
    if(document.getElementById('senha').value == "")
    {
        alert("Informe a senha");
        erro++;                
    }
    
    if(erro == 0)
    {
        document.getElementById('form').submit();        
    }    
}
</script>
</body>
</html>