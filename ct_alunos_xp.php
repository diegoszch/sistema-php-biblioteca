<?php

    include("global.php");
    
    if($_REQUEST["acao"] == "inserir")
    {    
        
       $sql = "INSERT INTO alunos (nome_aluno,end_aluno,email_aluno,
              tel_aluno,cidade_aluno, nasc_aluno, identidade_aluno, cep_aluno) VALUES('{$_POST['nome_aluno']}','{$_POST['end_aluno']}',
              '{$_POST['email_aluno']}','{$_POST['tel_aluno']}','{$_POST['cidade_aluno']}','{$_POST['nasc_aluno']}', '{$_POST['identidade_aluno']}', '{$_POST['cep_aluno']}')";

           $result = mysql_query($sql);
           $_SESSION["msg"] = (!$result)? mysql_error() : "Registro inserido com sucesso.";                   
    }
    else if($_REQUEST["acao"] == "alterar")
    {
        
       $sql = "UPDATE alunos SET nome_aluno='{$_POST['nome_aluno']}',end_aluno='{$_POST['end_aluno']}',
          nasc_aluno='{$_POST['nasc_aluno']}',email_aluno='{$_POST['email_aluno']}',identidade_aluno='{$_POST['identidade_aluno']}',cep_aluno='{$_POST['cep_aluno']}',tel_aluno='{$_POST['tel_aluno']}',
          cidade_aluno='{$_POST['cidade_aluno']}',estado_aluno='{$_POST['estado_aluno']}' WHERE id='{$_POST['id']}'";

        $result = mysql_query($sql);        
        $_SESSION["msg"] = (!$result)? mysql_error() : "Registro alterado com sucesso.";        
    }
    else if($_REQUEST["acao"] == "excluir")
    {
           $sql = "DELETE FROM alunos WHERE id = {$_REQUEST['id']}";
           $result = mysql_query($sql);
           $_SESSION["msg"] = (!$result)? mysql_error() : "Registro excluido com sucesso.";                       
    }
    
    header("Location: index.php?area=alunos");
?>