<?php

    switch ($_REQUEST['acao'])
    {
        case "inserir":
            include("ct_livros_dados.php");
            break;
        case "alterar":
            include("ct_livros_dados.php");
            break;
        default:         	
            include("ct_livros_lista.php");
            break; 
    }
?>