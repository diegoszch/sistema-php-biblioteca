<?php
    switch ($_REQUEST['acao'])
    {
        case "consulta":
            include("ct_consalunosxlivros_dados.php");
            break;        
        default:
            include("ct_consalunosxlivros_lista.php");
            break;
    }
?>