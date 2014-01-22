<?
    switch ($_REQUEST['acao'])
    {
        case "inserir":  
            include("ct_usuarios_dados.php");
            break;
        case "alterar":  
            include("ct_usuarios_dados.php");
            break;                    
        default: 
            include("ct_usuarios_lista.php");
            break;        
    }
?>

