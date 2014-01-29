<?php
    switch ($_REQUEST['acao'])
    {        
        case "devolver":
            include("ct_devolucao_dados.php");
            break;
        default: 
            include("ct_devolucao_lista.php");
            break; 
    }
?>