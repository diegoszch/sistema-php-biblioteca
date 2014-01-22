<?
    include("global.php");
    
    if($_REQUEST["acao"] == "inserir")
    {    
        
          $sql = "INSERT INTO livros(inclusao_livro,nome_livro,editora,ano,ISBN,
                      num_pag,edicao,classificacao_id,classificacao_extra) VALUES(now(),'{$_POST['nome_livro']}','{$_POST['editora']}',
                      '{$_POST['ano']}','{$_POST['ISBN']}','{$_POST['num_pag']}','{$_POST['edicao']}',{$_POST["classificacao_id"]},'{$_POST["classificacao_extra"]}')";
           $result = mysql_query($sql);
           
           $id_livro = mysql_insert_id();
                      
           foreach ($_POST['autores'] as $autor)
           {
           		$sql = "INSERT INTO autores_livros(autores_id,livros_id) VALUES({$autor},{$id_livro})";         
	           	$result = mysql_query($sql);
           }
           
           $_SESSION["msg"] = (!$result)? mysql_error() : "Registro inserido com sucesso.";            
        
    }
    else if($_REQUEST["acao"] == "alterar")
    {
        $sql = "UPDATE livros SET nome_livro='{$_POST['nome_livro']}',
                        editora='{$_POST['editora']}',ano='{$_POST['ano']}',ISBN='{$_POST['ISBN']}',
                        num_pag='{$_POST['num_pag']}',edicao='{$_POST['edicao']}',classificacao_id = {$_POST['classificacao_id']}, classificacao_extra = '{$_POST["classificacao_extra"]}'
                WHERE id='{$_POST['id']}'"; 
        $result = mysql_query($sql);
        
        $sql = "DELETE FROM autores_livros WHERE livros_id = {$_POST['id']}";
       	$result = mysql_query($sql);
        
       	foreach ($_POST['autores'] as $autor)
        {
           	$sql = "INSERT INTO autores_livros(autores_id,livros_id) VALUES({$autor},{$_POST['id']})";         
	        $result = mysql_query($sql);
        }        
        
        $_SESSION["msg"] = (!$result)? mysql_error() : "Registro alterado com sucesso.";
    }
    else if($_REQUEST["acao"] == "excluir")
    {
       $sql = "DELETE FROM livros WHERE id = {$_REQUEST['id']}";
       $result = mysql_query($sql);
       
       $sql = "DELETE FROM autores_livros WHERE livros_id = {$_REQUEST['id']}";
       $result = mysql_query($sql);
       
       $_SESSION["msg"] = (!$result)? mysql_error() : "Registro excluido com sucesso.";                       
    }
    
    header("Location: index.php?area=livros");
?>