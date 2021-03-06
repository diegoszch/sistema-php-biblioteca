<?php    
$area = "alunos";

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

if($pagina == "") {
    $pagina = "1";
}


if(!empty($_REQUEST['filtroVal']))
{
    $where = " WHERE {$_REQUEST['filtro']} like '%{$_REQUEST['filtroVal']}%' ";
}
else
{
    $where = "";
}


// Calculando o registro inicial
$inicio = $pagina - 1;
$inicio = $maximo * $inicio;

// Calculando o registro inicial
$inicio = $pagina - 1;
$inicio = $maximo * $inicio;

// Conta os resultados no total da minha query
$strCount = "SELECT COUNT(*) AS 'num_registros' FROM alunos {$where} ";
$query    = mysql_query($strCount);
$row      = mysql_fetch_array($query);
$total    = $row["num_registros"];

// Calculando pagina anterior
$menos = $pagina - 1;

// Calculando pagina posterior
$mais = $pagina + 1;

$pgs = ceil($total / $maximo);

$sel['0'] = "";
$sel['1'] = "";
if(!empty ($_REQUEST['filtro']))
{
    switch ($_REQUEST['filtro'])
    {
        case "identidade_aluno":
            $sel['0'] = "selected";
            break;
        default:
            $sel['1'] = "selected";
            break;
    }
}


?>
<h3>Lista de Alunos</h3>
<form name="filtro" method="GET" action="<?=$_SERVER['PHP_SELF'];?>">
<div id="filtro">
     Filtro: <input type="text" name="filtroVal" value="<?=$_REQUEST['filtroVal']?>">
     <select name="filtro">
         <option value="identidade_aluno" <?=$sel['0'];?>>Identidade</option>
         <option value="nome_aluno" <?=$sel['1'];?>>Nome</option>
     </select>
     <input type="submit" name="procurar" value="Procurar" />
     <input type="hidden" name="area" value="<?=$_REQUEST['area']?>">
     <input type="hidden" name="pagina" value="<?=$pagina?>">
</div>
</form>
<table id="mytable" cellspacing="0">    
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Cidade</th>
        <th scope="col">Alteracao</th>
        <th scope="col">Excluir</th>
    </tr>
    <?php
    
        $sql = "SELECT id, nome_aluno,cidade_aluno FROM alunos {$where} ORDER BY id  limit {$inicio},{$maximo}";
        
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
        <td <?=$class_alt;?>><?=$row["id"];?></td>
        <td <?=$class_alt;?>><?=$row["nome_aluno"];?></td>
        <td <?=$class_alt;?>><?=$row["cidade_aluno"];?></td>
        <td <?=$class_alt;?>><a class="botao" href="index.php?area=alunos&acao=alterar&id=<?=$row["id"];?>">Alterar</a></td>
        <td <?=$class_alt;?>><a href="#" class="botao" onclick="excluiReg(<?=$row["id"];?>)">Excluir</a></td>
    </tr>
        <form name="form<?=$row["id"];?>" id="form<?=$row["id"];?>" method="POST" action="ct_alunos_xp.php">
                <input type="hidden" name="acao" value="excluir">
                <input type="hidden" name="id" value="<?=$row["id"];?>">
        </form>
    <?php
            $temp++;
        }
    ?>    
</table>
<?php
if($pgs > 1 ) {
    echo "<div>";
    // Mostragem de pagina
    if($menos > 0) {
        echo "<a href='?area={$area}&pagina=$menos' class='texto_paginacao'>anterior</a> ";
    }

    // Listando as paginas
    for($i=1;$i <= $pgs;$i++) {
        if($i != $pagina) {
            echo "  <a href='?area={$area}&pagina={$i}' class='texto_paginacao'>{$i}</a>";
        } else {
            echo "<strong lass='texto_paginacao_pgatual'>{$i}</strong>";
        }
    }

    if($mais <= $pgs) {
        echo "   <a href='?area={$area}&pagina={$mais}' class='texto_paginacao'>proxima</a>";
    }
    echo "</div>";
}
?>
<br />
<div><a class="botao" href="index.php?area=alunos&acao=inserir">Inserir</a></div>

<script type='text/javascript'>
function excluiReg(id)
{    
   	if(confirm('Deseja realmente excluir esse registro?'))
	{
		document.getElementById("form"+id).submit();
	}
}
</script>