<?php
    include("global.php");
    
    if($_REQUEST["acao"] == "inserir")
    {    
        
        $sql = "SELECT * FROM usuarios WHERE login = '{$_POST["login"]}'";
        
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
        {  
           $_SESSION["msg"] = "Este login já esta sendo usado por outro usuario.";
        }
        else 
        {
           $sql = "INSERT INTO usuarios (nome,login,senha) VALUES ('{$_POST['nome']}','{$_POST['login']}','{$_POST['senha']}');";
                    
           $result = mysql_query($sql);
           $_SESSION["msg"] = (!$result)? mysql_error() : "Registro inserido com sucesso.";            
        }
    }
    else if($_REQUEST["acao"] == "alterar")
    {
        $sql = "UPDATE usuarios SET nome='{$_POST['nome']}',login='{$_POST['login']}',senha='{$_POST['senha']}' WHERE id = {$_POST['id']};";

        $result = mysql_query($sql);        
        $_SESSION["msg"] = (!$result)? mysql_error() : "Registro alterado com sucesso.";        
    }
    else if($_REQUEST["acao"] == "excluir")
    {
        $sql = "SELECT * FROM usuarios WHERE id = '{$_POST["id"]}'";
        
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
        {  
           $sql = "DELETE FROM usuarios WHERE id = {$_REQUEST['id']}";
           $result = mysql_query($sql);
           $_SESSION["msg"] = (!$result)? mysql_error() : "Registro excluido com sucesso.";                       
        }
        else 
        {
           $_SESSION["msg"] = "Nao é possivel deletar o registro.";           
        }
    }
    
    header("Location: index.php?area=usuarios");
?>