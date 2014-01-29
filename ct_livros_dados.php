<?php    
if(isset($_REQUEST['id']) && (!empty($_REQUEST['id'])))
{
    $sql = "SELECT * FROM livros WHERE id = {$_REQUEST['id']}";

    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
}
?>
<h3>Cadastro de Livros</h3>
<div id="formulario">
<form id="form" action="ct_livros_xp.php" method="POST">
 <table>
    <tr> 
      <td>Nome:</td>
      <td> 
        <input type="text" name="nome_livro" size="80" value="<?=$row['nome_livro'];?>" id="nome_livro">
        </td>
    </tr>
    <tr> 
      <td>Editora:</td>
      <td> 
        <input type="text" name="editora" size="30" value="<?=$row['editora'];?>" id="editora">
        </td>
    </tr>
    <tr> 
      <td>Ano:</td>
      <td> 
        <input type="text" name="ano" size="10" value="<?=$row['ano'];?>" id="ano">
        </td>
    </tr>
    <tr> 
      <td>ISBN:</td>
      <td> 
        <input type="text" name="ISBN" size="30" value="<?=$row['ISBN'];?>" id="ISBN">
        </td>
    </tr>
    <tr> 
      <td>N&uacute;mero de P&aacute;ginas:</td>
      <td> 
        <input type="text" name="num_pag" size="10" value="<?=$row['num_pag'];?>" id="num_pag">
        </td>
    </tr>
    <tr> 
      <td>Edi&ccedil;&atilde;o:</td>
      <td> 
        <input type="text" name="edicao" size="10" value="<?=$row['edicao'];?>" id="edicao">
        </td>
    </tr>
    <tr> 
      <td>Autores:</td>
      <td> 
        <select name="autores[]" multiple="multiple">        
	<?php 
		$sql = "SELECT * FROM autores ORDER BY id";
		$result = mysql_query($sql);
		$selecionado = "";
		while($rowAutores = mysql_fetch_array($result))
		{
			$sql_teste = "SELECT * FROM autores_livros WHERE autores_id = {$rowAutores['id']} and livros_id = {$row['id']}";
			$result_teste = mysql_query($sql_teste);
			
			if(mysql_num_rows($result_teste) > 0)
			{			
				$selecionado = "selected";
				}
			else
			{
				$selecionado = "";			
			}
	?> 
			<option value="<?=$rowAutores['id'];?>" <?=$selecionado;?>><?=$rowAutores['nome'];?></option>
	<?php 
		}
	?>			
        </select>
        </td>
    </tr>
    <tr>
      <td>Classificacao:</td>
      <td>
        <select name="classificacao_id">
	<?php
		$sql = "SELECT * FROM classificacao ORDER BY id";
		$result = mysql_query($sql);
		$selecionado = "";
		while($rowEstado = mysql_fetch_array($result))
		{
			if((!empty($row['classificacao_id']))&& isset($row['classificacao_id']))
			{
				if($row['classificacao_id'] == $rowEstado['id'])
				{
					$selecionado = "selected";
				}
				else
				{
					$selecionado = "";
				}
			}
	?>
		<option value="<?=$rowEstado['id'];?>" <?=$selecionado;?>><?=$rowEstado['id']."-".$rowEstado['nome'];?></option>
	<?php
		}
	?>
        </select>
        </td>
    </tr>
    <tr>
      <td>Classificacao Extra</td>
      <td>
        <input type="text" name="classificacao_extra" size="50" value="<?=$row['classificacao_extra'];?>" id="classificacao_extra">
        </td>
    </tr>


</table>
<input type="hidden" name="id" value="<?=$row["id"];?>">
<input type="hidden" name="acao" value="<?=$_REQUEST['acao']?>">
</form>
<div>
    <a href="#" class="botao" onclick="validaForm();">Salvar</a>&nbsp;&nbsp;
    <a href="index.php?area=livros" class="botao">Voltar</a>
</div>
</div>
<script type='text/javascript'>
function validaForm()
{
    var erro = 0;
    if(document.getElementById('nome_livro').value == "")
    {
        alert("Informe o nome do livro");
        erro++;                
    }   
    
    if(document.getElementById('editora').value == "")
    {
        alert("Informe a editora");
        erro++;                
    }
    
    if(document.getElementById('ano').value == "")
    {
        alert("Informe o ano");
        erro++;                
    }
    
    if(document.getElementById('ISBN').value == "")
    {
        alert("Informe o ISBN");
        erro++;                
    }

    if(document.getElementById('num_pag').value == "")
    {
        alert("Informe o numero de paginas");
        erro++;
    }
    

    if(document.getElementById('edicao').value == "")
    {
        alert("Informe a edicao");
        erro++;
    }
    
    if(erro == 0)
    {
       document.getElementById("form").submit();        
    }    
}
</script>