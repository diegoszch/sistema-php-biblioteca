<?php
    switch ($_REQUEST['acao'])
    {
        case "locar":
            include("ct_locacao_dados.php");
            break;
        default:
            include("ct_locacao_lista.php");
            break;
    }
?>