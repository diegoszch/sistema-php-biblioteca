<?
    
if(isset($_REQUEST['id']) && (!empty($_REQUEST['id'])))
{
    $sql = "SELECT * FROM autores WHERE id = {$_REQUEST['id']}";
    
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
}
?>
<h3>Cadastro de Autores</h3>
<div id="formulario">
<form id="form" action="ct_autores_xp.php" method="POST">
<table>
    <tr>
        <td>Nome</td>
        <td><input type="text" id="nome" name="nome" value="<?=$row["nome"];?>" /></td>
    </tr>
    <tr>
        <td>Nacionalidade</td>
        <td><input type="text" id="nacionalidade" name="nacionalidade" value="<?=$row["nacionalidade"];?>" /></td>    
    </tr>
</table>
<input type="hidden" name="id" value="<?=$row["id"];?>">
<input type="hidden" name="acao" value="<?=$_REQUEST['acao']?>">
</form>
<div>
    <a href="#" class="botao" onclick="validaForm();">Salvar</a>&nbsp;&nbsp;
    <a href="index.php?area=autores" class="botao">Voltar</a>
</div>
</div>
<script type='text/javascript'>
function validaForm()
{
    var erro = 0;
    if(document.getElementById('nacionalidade').value == "")
    {
        alert("Informe o nacionalidade");
        erro++;                
    }
    
    if(document.getElementById('nome').value == "")
    {
        alert("Informe o nome");
        erro++;                
    }
    
    if(erro == 0)
    {
       document.getElementById("form").submit();        
    }    
}
</script>