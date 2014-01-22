<?
    $sql = "SELECT id,id_aluno,id_livro, date_format(data_devolucao,'%d/%m/%Y') as dta_devolucao FROM locacao WHERE id = {$_REQUEST['id']}";
    $row = mysql_fetch_array(mysql_query($sql));
?>
<h3>Devolucoes</h3>
<div id="formulario">
<table>    
    <tr>        
        <td>Aluno</td>
        <td><?=retornaValor('nome_aluno','alunos',"id = {$row['id_aluno']}");?></td>
    </tr>
    <tr>
        <td>Livro</td>
        <td><?=retornaValor('nome_livro','livros',"id = {$row['id_livro']}");?></td>
    </tr>        
    <tr>
        <td>Devolucao prevista</td>
        <td><?=$row["dta_devolucao"];?></td>
    </tr>

    <?
    if(!isset($_POST['data_entrega']))
    {
    ?>
        <form name="frmdta" action="index.php?area=devolucao&acao=devolver&id=<?=$row['id'];?>" method="POST">
        <tr>
            <td>Data de entrega</td>
            <td><input type="text" name="data_entrega" id="data_entrega"></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="confirmar" value="Confirmar"></td>        
        </tr>
        </form>
    <?
    }
    else
    {
        //Faz o calculo da multa
        
        //$multa = ;
        list($from_day,$from_month, $from_year) = explode("/", $row["dta_devolucao"]); 
        list($to_day,$to_month, $to_year) = explode("/", $_POST['data_entrega']); 
          
        $from_date = mktime(0,0,0,$from_month,$from_day,$from_year); 
        $to_date = mktime(0,0,0,$to_month,$to_day,$to_year); 
          
        $days = ($to_date - $from_date)/86400; 
   
        $days = ceil($days); 
        
        $sql_m = "SELECT * FROM multa";
        $result_m = mysql_query($sql_m);
        $row_m = mysql_fetch_array($result_m);

        $multa = $row_m['valor'] * $days;
        
        
    ?>
        <form name="frmdta" action="ct_devolucao_xp.php" method="POST">
        <tr>
            <td>Data entregue</td>
            <td><?=$_POST['data_entrega'];?></td>
        </tr>
        <tr>
            <td>Valor da Multa (Por dia <?=$row_m['valor'];?>)</td>
            <td>R$ <?=$multa?></td>
        </tr>
        <tr>
            <td><input type="submit" name="Finalizar" value="Finalizar"></td>        
            <td><input type="button" name="voltar" value="Voltar" onclick="window.location.href='index.php?area=devolucao&acao=devolver&id=<?=$row['id'];?>'"></td>        
        </tr>
        <input type="hidden" name="acao" value="devolver">
        <input type="hidden" name="data_entrega" value="<?=$_REQUEST['data_entrega'];?>">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        </form>
    
    <?
    }
    ?>    
</table>
</div>