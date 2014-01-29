<?php
    switch ($_REQUEST['acao'])
    {
        case "inserir":
            include("ct_alunos_dados.php");
            break;
        case "alterar":
            include("ct_alunos_dados.php");
            break;
        default: 
            include("ct_alunos_lista.php");
            break; 
    }
?>