<?php
$area = "consalunosxlivros";

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

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
$strCount = "SELECT COUNT(*) AS 'num_registros' FROM locacao WHERE id_aluno = {$_GET["id_aluno"]} ";
$query    = mysql_query($strCount);
$row      = mysql_fetch_array($query);
$total    = $row["num_registros"];

// Calculando pagina anterior
$menos = $pagina - 1;

// Calculando pagina posterior
$mais = $pagina + 1;

$pgs = ceil($total / $maximo);


?>
<h3>Alunos X Livros</h3>
<table id="mytable" cellspacing="0">
    <tr>
        <th scope="col">Livro</th>
        <th scope="col">Data de Retirada</th>
    </tr>
    <?php

        $sql = "SELECT liv.nome_livro as nome,  date_format(loc.data_retirada,'%d/%m/%Y') as data_retirada FROM locacao as loc,livros as liv WHERE loc.id_livro = liv.id AND loc.id_aluno = {$_GET["id_aluno"]} ORDER BY loc.id  limit {$inicio},{$maximo}";

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
        <td <?=$class_alt;?>><?=$row["nome"];?></td>
        <td <?=$class_alt;?>><?=$row["data_retirada"];?></td>
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
        echo "<a href='?area={$area}&pagina=$menos&id_aluno={$_GET["id_aluno"]}' class='texto_paginacao'>anterior</a> ";
    }

    // Listando as paginas
    for($i=1;$i <= $pgs;$i++) {
        if($i != $pagina) {
            echo "  <a href='?area={$area}&pagina={$i}&id_aluno={$_GET["id_aluno"]}' class='texto_paginacao'>{$i}</a>";
        } else {
            echo "<strong lass='texto_paginacao_pgatual'>{$i}</strong>";
        }
    }

    if($mais <= $pgs) {
        echo "   <a href='?area={$area}&pagina={$mais}&id_aluno={$_GET["id_aluno"]}' class='texto_paginacao'>proxima</a>";
    }
    echo "</div>";
}
?>
<br />
<div><a class="botao" href="index.php?area=consalunosxlivros">Voltar</a></div>
