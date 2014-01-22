<?
    include("global.php");
    
    if($_REQUEST["acao"] == "devolver")
    {
        
        $sql = "UPDATE locacao SET data_entrega = STR_TO_DATE('{$_POST['data_entrega']}','%d/%m/%Y')
                WHERE id='{$_POST['id']}'"; 

        $result = mysql_query($sql);
        $_SESSION["msg"] = (!$result)? mysql_error() : "Registro alterado com sucesso.";
    }
    
    else if($_REQUEST["acao"] == "excluir")
    {
        $sql = "DELETE FROM locacao WHERE id = {$_REQUEST['id']}";
       $result = mysql_query($sql);
       $_SESSION["msg"] = (!$result)? mysql_error() : "Registro excluido com sucesso.";
    }  
    
    header("Location: index.php?area=devolucao");
?>