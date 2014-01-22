<?
    
if(isset($_REQUEST['id']) && (!empty($_REQUEST['id'])))
{
    $sql = "SELECT * FROM usuarios WHERE id = {$_REQUEST['id']}";
    
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
}
?>
<h3>Cadastro de Usuarios</h3>
<div id="formulario">
<form id="form" action="ct_usuarios_xp.php" method="POST">
<table>
    <tr>
        <td>Nome</td>
        <td><input type="text" id="nome" name="nome" value="<?=$row["nome"];?>" /></td>
    </tr>
    <tr>
        <td>Login</td>
        <td><input type="text" id="login" name="login" value="<?=$row["login"];?>" /></td>    
    </tr>
    <tr>
        <td>Senha</td>
        <td><input type="password" id="senha" name="senha" value="<?=$row["senha"];?>" /></td>
    </tr>    
</table>
<input type="hidden" name="id" value="<?=$row["id"];?>">
<input type="hidden" name="acao" value="<?=$_REQUEST['acao']?>">
</form>    
<div>
    <a href="#" class="botao" onclick="validaForm();">Salvar</a>&nbsp;&nbsp;
    <a href="index.php?area=alunos" class="botao">Voltar</a>
</div>
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