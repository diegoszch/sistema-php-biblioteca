<?php
    $sql = "SELECT * FROM alunos WHERE id = {$_GET['id_aluno']}";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
?>

<h3>Locacoes</h3>
<div id="formulario">
<form id="form" action="ct_locacao_xp.php" method="POST">
<input type="hidden" name="id_aluno" value="<?=$_GET['id_aluno'];?>" />
<table>
    <tr>
        <td>Nome do Aluno</td>
        <td><?=$row['nome_aluno'];?></td>
    </tr>
    <tr>
        <td>Identidade</td>
        <td><?=$row['identidade_aluno'];?></td>
    </tr>
    <tr>
        <td>Data de Nascimento</td>
        <td><?=$row['nasc_aluno'];?></td>
    </tr>
    <tr>
        <td>Livro</td>
        <td>
        <select name="id_livro">
            <?php
                $sql = "SELECT * FROM livros";
                $result = mysql_query($sql);

                while ($row = mysql_fetch_array($result)) {
                    $sql_ret = "select count(*) as conta FROM locacao WHERE id_livro = {$row['id']} AND data_entrega is NULL";
                    $result_ret = mysql_query($sql_ret);
                    $retorno_ret =  mysql_fetch_array($result_ret);

                    if($retorno_ret['conta'] == 0)
                    {
                	echo "<option value={$row['id']}>{$row['nome_livro']}</option>";
                    }                   
                }
            ?>
        </select>            
        </td>
    </tr>
    <tr>
        <td>Data retirada</td>
        <td>
            <input type="text" name="data_retirada" id="data_retirada" size="10" maxlength="10" value="<?=date('d/m/Y');?>">dd/mm/yyyy
        </td>
    </tr>
    <tr>
        <td>Data para devolucao</td>
        <td>
            <input type="text" name="data_devolucao" id="data_devolucao" size="10" maxlength="10">dd/mm/yyyy
        </td>
    </tr>
</table>
<input type="hidden" name="acao" value="locacao">
</form>
<div>
    <a href="#" class="botao" onclick="validaForm();">Salvar</a>&nbsp;&nbsp;
    <a href="index.php?area=locacao" class="botao">Voltar</a>
</div>
</div>
<script type='text/javascript'>
function validaForm()
{
    var erro = 0;
    if(document.getElementById('data_retirada').value == "")
    {
        alert("Informe a data de retirada");
        erro++;
    }

    if(document.getElementById('data_devolucao').value == "")
    {
        alert("Informe a data de devolucao");
        erro++;
    }
    if(erro == 0)
    {
       document.getElementById("form").submit();
    }
}
</script>
