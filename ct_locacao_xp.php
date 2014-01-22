<?
    include("global.php");

    if($_REQUEST["acao"] == "locacao")
    {
        $sql = "INSERT INTO locacao(id_aluno,id_livro,id_usuario,data_retirada,data_devolucao) VALUES({$_POST['id_aluno']},{$_POST['id_livro']},{$_SESSION['usuario']['id']},
                      STR_TO_DATE('{$_POST['data_retirada']}','%d/%m/%Y'),STR_TO_DATE('{$_POST['data_devolucao']}','%d/%m/%Y'))"; 

        $result = mysql_query($sql);
        $_SESSION["msg"] = (!$result)? mysql_error() : "Registro inserido com sucesso.";
    }
    header("Location: index.php?area=locacao");
?>