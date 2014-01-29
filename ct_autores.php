<?php
    switch ($_REQUEST['acao'])
    {
        case "inserir":  
            include("ct_autores_dados.php");
            break;
        case "alterar":  
            include("ct_autores_dados.php");
            break;                    
        default: 
            include("ct_autores_lista.php");
            break;        
    }
?>

