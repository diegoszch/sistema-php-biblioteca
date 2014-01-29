<?php

$area = "conslivrosxalunos";

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

if($pagina == "") {
    $pagina = "1";
}

$tables_extras = "";

if(!empty ($_REQUEST['filtroVal']))
{
     switch ($_REQUEST['filtro'])
    {
        case "autor":
            $tables_extras = ",autores,autores_livros ";
            $where = " WHERE livros.id = autores_livros.livros_id AND autores_livros.autores_id = autores.id AND autores.nome like '%{$_REQUEST['filtroVal']}%' ";
            $sel['0'] = "selected";
            break;
        case "classificacao":
            $tables_extras = ",classificacao ";
            $where = " WHERE livros.classificacao_id = classificacao.id AND classificacao.nome like '%{$_REQUEST['filtroVal']}%'";
            $sel['1'] = "selected";
            break;
        default:
            $where = " WHERE {$_REQUEST['filtro']} like '%{$_REQUEST['filtroVal']}%' ";
            break;
    }
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
$strCount = "SELECT COUNT(*) AS 'num_registros' FROM livros {$tables_extras} {$where} ";
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
$sel['2'] = "";
if(!empty ($_REQUEST['filtro']))
{
    switch ($_REQUEST['filtro'])
    {
        case "autor":
            $sel['0'] = "selected";
            break;
        case "classificacao":
            $sel['1'] = "selected";
            break;
        default:
            $sel['2'] = "selected";
            break;
    }
}


?>
<h3>Lista de Livros</h3>
<form name="filtro" method="GET" action="<?=$_SERVER['PHP_SELF'];?>">
<div id="filtro">
     Filtro: <input type="text" name="filtroVal" value="<?=$_REQUEST['filtroVal']?>">
     <select name="filtro">
         <option value="autor" <?=$sel['0'];?>>Autor</option>
         <option value="classificacao" <?=$sel['1'];?>>Classificacao</option>
         <option value="nome_livro" <?=$sel['2'];?>>Nome</option>
     </select>
     <input type="submit" name="procurar" value="Procurar" />
     <input type="hidden" name="area" value="<?=$_REQUEST['area']?>">
     <input type="hidden" name="pagina" value="<?=$_REQUEST['pagina']?>">
</div>
</form>
<table id="mytable" cellspacing="0">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Data de inclusao</th>
        <th scope="col">Nome do livro</th>
        <th scope="col">Selecionar</th>
    </tr>
    <?php

        $sql = "SELECT livros.id,date_format(livros.inclusao_livro,'%d/%m/%Y') as inclusao_livro,
                      livros.nome_livro FROM livros {$tables_extras} {$where}  ORDER BY inclusao_livro  limit {$inicio},{$maximo}";

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
        <td <?=$class_alt;?>><?=$row["inclusao_livro"];?></td>
        <td <?=$class_alt;?>><?=$row["nome_livro"];?></td>
        <td <?=$class_alt;?>><a class="botao" href="index.php?area=<?=$area;?>&acao=consulta&id_livro=<?=$row["id"];?>">Selecionar</a></td>
    </tr>    
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
