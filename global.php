<?php
    session_start();
    set_time_limit(0);
    
    $db_host = "localhost:3307";   
    $db_user = "root";
    $db_pass = "";
    $db_name = "biblioteca";

    $maximo = 10;  // Paginacao
    
    $handle = mysql_connect($db_host,$db_user,$db_pass);   
    if(!$handle)
    {
        die("Erro ao conectar banco. ".mysql_error());        
    }
    
    mysql_select_db($db_name,$handle);
    
	
    error_reporting (E_ERROR | E_WARNING );
    
	include "funcoes.php";
	
?>