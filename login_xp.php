<?
    include("global.php");
    
    $sql = "SELECT * FROM usuarios WHERE login = '{$_POST["login"]}' AND senha = '{$_POST["senha"]}'";
    $result = mysql_query($sql);
    
    if(mysql_num_rows($result) == 1) // Usuario encontrado
    {
        $linha = mysql_fetch_array($result);
        
        $_SESSION["usuario"]["logado"] = 1;
        $_SESSION["usuario"]["id"] = $linha["id"];
        $_SESSION["usuario"]["login"]  = $linha["login"]; 
    }
    else 
    {
        $_SESSION["msg"] = "Usuario ou senha inválidos.";
        
        if(isset($_SESSION["usuario"]))
        {
            unset($_SESSION["usuario"]);        
        }
    }
    
    header("Location: index.php");
?>