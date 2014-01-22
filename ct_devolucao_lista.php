<h3>Lista de devolucoes</h3>
<table id="mytable" cellspacing="0">
    <tr>        
        <th scope="col">Aluno</th>
        <th scope="col">Livro</th>
        <th scope="col">Devolucao prevista</th>
        <th scope="col">Devolver</th>
        <th scope="col">Excluir</th>
    </tr>
    <?
    //
        $sql = "SELECT id,id_aluno,id_livro, date_format(data_devolucao,'%d/%m/%Y') as dta_devolucao FROM locacao WHERE data_entrega IS NULL ORDER BY data_devolucao";
        
        $result = mysql_query($sql);
        $temp = 0;
        while($row = mysql_fetch_array($result))
        {
            if(($temp % 2) == 0 )
            {
                    $class = "spec";
                    $class_alt = "";
            }
            else
            {
                    $class = "specalt";
                    $class_alt = "class='alt'";
            }
    ?>
    <tr>
        <td <?=$class_alt;?>><?=retornaValor('nome_aluno','alunos',"id = {$row['id_aluno']}");?></td>
        <td <?=$class_alt;?>><?=retornaValor('nome_livro','livros',"id = {$row['id_livro']}");?></td>
        <td <?=$class_alt;?>><?=$row["dta_devolucao"];?></td>
        <td <?=$class_alt;?>><a class="botao" href="index.php?area=devolucao&acao=devolver&id=<?=$row["id"];?>">Devolver</a></td>
        <td <?=$class_alt;?>><a class="botao" href="#" onclick="excluiReg(<?=$row["id"];?>)">Excluir</a></td>
    </tr>
    <form name="form<?=$row["id"];?>" id="form<?=$row["id"];?>" method="POST" action="ct_devolucao_xp.php">
        <input type="hidden" name="acao" value="excluir">
        <input type="hidden" name="id" value="<?=$row["id"];?>">
    </form>
    <?
        $temp++;
        }
    ?>    
</table>
<script type='text/javascript'>
function excluiReg(id)
{    
   	if(confirm('Deseja realmente excluir esse registro?'))
	{
		document.getElementById("form"+id).submit();
	}
}
</script>