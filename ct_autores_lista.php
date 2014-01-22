<?
$area = "autores";

$pagina = $_GET["pagina"];
if($pagina == "") {
    $pagina = "1";
}

// Calculando o registro inicial
$inicio = $pagina - 1;
$inicio = $maximo * $inicio;

// Calculando o registro inicial
$inicio = $pagina - 1;
$inicio = $maximo * $inicio;

// Conta os resultados no total da minha query
$strCount = "SELECT COUNT(*) AS 'num_registros' FROM autores ";
$query    = mysql_query($strCount);
$row      = mysql_fetch_array($query);
$total    = $row["num_registros"];

// Calculando pagina anterior
$menos = $pagina - 1;

// Calculando pagina posterior
$mais = $pagina + 1;

$pgs = ceil($total / $maximo);

?>

<h3>Lista de Autores</h3>
<table id="mytable" cellspacing="0">
    <tr>
        <th scope="col">Id</th>        
        <th scope="col">Nome</th>
	<th scope="col">Nacionalidade</th>        
        <th scope="col">Alteracao</th>
        <th scope="col">Excluir</th>
    </tr>
    <?
        $sql = "SELECT * FROM autores ORDER BY id  limit {$inicio},{$maximo}";
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
        <td <?=$class_alt;?>><?=$row["nome"];?></td>
        <td <?=$class_alt;?>><?=$row["nacionalidade"];?></td>        
        <td <?=$class_alt;?>><a class="botao" href="index.php?area=autores&acao=alterar&id=<?=$row["id"];?>">Alterar</a></td>
        <td <?=$class_alt;?>><a class="botao" href="#" onclick="excluiReg(<?=$row["id"];?>)">Excluir</a></td>
    </tr>
    <form name="form<?=$row["id"];?>" id="form<?=$row["id"];?>" method="POST" action="ct_autores_xp.php">
        <input type="hidden" name="acao" value="excluir">
        <input type="hidden" name="id" value="<?=$row["id"];?>">
    </form>
    <?
    	$temp++;
        }
    ?>    
</table>
<?
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
<div><a class="botao" href="index.php?area=autores&acao=inserir">Inserir</a></div>
<script type='text/javascript'>
function excluiReg(id)
{    
   	if(confirm('Deseja realmente excluir esse registro?'))
	{
		document.getElementById("form"+id).submit();
	}
}
</script>