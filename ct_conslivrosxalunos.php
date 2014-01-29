<?php
    switch ($_REQUEST['acao'])
    {
        case "consulta":
            include("ct_conslivrosxalunos_dados.php");
            break;
        default:
            include("ct_conslivrosxalunos_lista.php");
            break;
    }
?>