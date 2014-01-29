<?php
if(isset($_REQUEST['id']) && (!empty($_REQUEST['id'])))
{
    $sql = "SELECT * FROM alunos WHERE id = {$_REQUEST['id']}";

    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
}
?>
<h3>Cadastro de Alunos</h3>
<div id="formulario">
<form id="form" action="ct_alunos_xp.php" method="POST">
<table>
    <tr> 
      <td>Nome:</td>
      <td><input type="text" name="nome_aluno" size="80" value="<?=$row['nome_aluno'];?>" id="nome_aluno"></tr>
    <tr> 
      <td>Endere&ccedil;o:</td>
      <td><input type="text" name="end_aluno" size="80" value="<?=$row['end_aluno'];?>" id="end_aluno"></td>
    </tr>
    <tr> 
      <td>Email:</td>
      <td><input type="text" name="email_aluno" size="80" value="<?=$row['email_aluno'];?>" id="email_aluno"></td>
    </tr>
    <tr> 
      <td>Telefone:</td>
      <td><input type="text" name="tel_aluno" size="25" value="<?=$row['tel_aluno'];?>" id="tel_aluno"></td>
    </tr>
    <tr> 
      <td>Cidade:</td>
      <td><input type="text" name="cidade_aluno" size="80" value="<?=$row['cidade_aluno'];?>" id="cidade_aluno"></td>        
    </tr>
    <tr> 
      <td>Estado:</td>
      <td>
	<select name="estado_aluno">
	<?php 
		$sql = "SELECT * FROM estados ORDER BY uf";
		$result = mysql_query($sql);
		$selecionado = "";
		while($rowEstado = mysql_fetch_array($result))
		{
			if((!empty($row['estado_aluno']))&& isset($row['estado_aluno']))
			{
				if($row['estado_aluno'] == $rowEstado['id'])
				{
					$selecionado = "selected";
				}
				else
				{
					$selecionado = "";
				}				
			}
	?> 
		<option value="<?=$rowEstado['id'];?>" <?=$selecionado;?>><?=$rowEstado['uf'];?></option>
	<?php 
		}
	?>		
	</select>
        </td>        
    </tr>
    
    <tr> 
      <td>Data de Nascimento:</td>
      <td> 
        <input type="text" name="nasc_aluno" size="30" value="<?=$row['nasc_aluno'];?>" id="nasc_aluno">
        </td>
    </tr>
    <tr> 
      <td>Identidade:</td>
      <td> 
        <input type="text" name="identidade_aluno" size="35" value="<?=$row['identidade_aluno'];?>" id="identidade_aluno">
        </td>
    </tr>
    <tr> 
      <td>CEP:</td>
      <td> 
        <input type="text" name="cep_aluno" size="35" value="<?=$row['cep_aluno'];?>" id="cep_aluno">
        </td>
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
    if(document.getElementById('nome_aluno').value == "")
    {
        alert("Informe o nome");
        erro++;                
    }
    
    if(document.getElementById('email_aluno').value == "")
    {
        alert("Informe o email");
        erro++;                
    }
    
    if(document.getElementById('tel_aluno').value == "")
    {
        alert("Informe o Telefone");
        erro++;                
    }
    
    if(document.getElementById('cidade_aluno').value == "")
    {
        alert("Informe a cidade");
        erro++;                
    }
    
    if(document.getElementById('nasc_aluno').value == "")
    {
        alert("Informe a data de nascimento");
        erro++;                
    }

    if(document.getElementById('cep_aluno').value == "")
    {
        alert("Informe o Cep");
        erro++;
    }
    

    if(document.getElementById('identidade_aluno').value == "")
    {
        alert("Informe a identidade");
        erro++;
    }
    
    
    if(erro == 0)
    {
       document.getElementById("form").submit();        
    }    
}
</script>