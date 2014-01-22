<?
$area = "conslivrosxalunos";

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
$strCount = "SELECT COUNT(*) AS 'num_registros' FROM locacao WHERE id_livro = {$_GET["id_livro"]} ";
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
        <th scope="col">Aluno</th>
        <th scope="col">Identidade</th>
    </tr>
    <?

        $sql = "SELECT alu.nome_aluno as nome,alu.identidade_aluno as identidade FROM locacao as loc,alunos as alu WHERE loc.id_aluno = alu.id AND loc.id_livro  = {$_GET["id_livro"]} ORDER BY loc.id  limit {$inicio},{$maximo}";

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
        <td <?=$class_alt;?>><?=$row["identidade"];?></td>
    </tr>
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
        echo "<a href='?area={$area}&pagina=$menos&id_livro={$_GET["id_livro"]}' class='texto_paginacao'>anterior</a> ";
    }

    // Listando as paginas
    for($i=1;$i <= $pgs;$i++) {
        if($i != $pagina) {
            echo "  <a href='?area={$area}&pagina={$i}&id_livro={$_GET["id_livro"]}' class='texto_paginacao'>{$i}</a>";
        } else {
            echo "<strong lass='texto_paginacao_pgatual'>{$i}</strong>";
        }
    }

    if($mais <= $pgs) {
        echo "   <a href='?area={$area}&pagina={$mais}&id_livro={$_GET["id_livro"]}' class='texto_paginacao'>proxima</a>";
    }
    echo "</div>";
}
?>
<br />
<div><a class="botao" href="index.php?area=conslivrosxalunos">Voltar</a></div>
