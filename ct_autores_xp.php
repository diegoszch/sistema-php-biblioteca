<?
    include("global.php");
    
    if($_REQUEST["acao"] == "inserir")
    {    
               
          $sql = "INSERT INTO autores (nome,nacionalidade) VALUES ('{$_POST['nome']}','{$_POST['nacionalidade']}');";
                   
          $result = mysql_query($sql);
          $_SESSION["msg"] = (!$result)? mysql_error() : "Registro inserido com sucesso.";                    
    }
    else if($_REQUEST["acao"] == "alterar")
    {
        $sql = "UPDATE autores SET nome='{$_POST['nome']}',nacionalidade='{$_POST['nacionalidade']}' WHERE id = {$_POST['id']};";

        $result = mysql_query($sql);        
        $_SESSION["msg"] = (!$result)? mysql_error() : "Registro alterado com sucesso.";        
    }
    else if($_REQUEST["acao"] == "excluir")
    {
        $sql = "SELECT * FROM autores WHERE id = '{$_POST["id"]}'";
        
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
        {  
           $sql = "DELETE FROM autores WHERE id = {$_REQUEST['id']}";
           $result = mysql_query($sql);
           $_SESSION["msg"] = (!$result)? mysql_error() : "Registro excluido com sucesso.";                       
        }
        else 
        {
           $_SESSION["msg"] = "Nao é possivel deletar o registro.";           
        }
    }
    
    header("Location: index.php?area=autores");
?>