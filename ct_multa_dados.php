<?php

$sql = "SELECT valor FROM multa";

$result = mysql_query($sql);
$row = mysql_fetch_array($result);

?>
<h3>Multa por dia</h3>
<div id="formulario">
<form id="form" action="ct_multa_xp.php" method="POST">
<table>
    <tr>
        <td>Valor</td>
        <td><input type="text" id="valor" size="7" name="valor" value="<?=$row["valor"];?>" /></td>
    </tr>    
</table>
</form>
<div>
    <a href="#" class="botao" onclick="validaForm();">Salvar</a>&nbsp;&nbsp;    
</div>
</div>
<script type='text/javascript'>
function validaForm()
{
    var erro = 0;
    if(document.getElementById('valor').value == "")
    {
        alert("Informe o valor");
        erro++;
    }
    if(erro == 0)
    {
       document.getElementById("form").submit();
    }
}
</script>