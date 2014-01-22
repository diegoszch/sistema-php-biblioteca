<?
    session_start();
    set_time_limit(0);
    
    $db_host = "localhost";   
    $db_user = "root";
    $db_pass = "1234";
    $db_name = "biblioteca";
    
    $multa_dia = 3;  //Valor da multa por dias atrazados


    //+Paginacao+++++++++++++++++++
    $maximo = 10;
    //-Paginacao-------------------
    
    $handle = mysql_connect($db_host,$db_user,$db_pass);   
    if(!$handle)
    {
        die("Erro ao conectar banco. ".mysql_error());        
    }
    
    mysql_select_db($db_name,$handle);
    
    function retornaValor($campo,$tabela,$condicao)
    {    
        $sql = "SELECT {$campo} FROM {$tabela} WHERE {$condicao}";
        $row = mysql_fetch_array(mysql_query($sql));  
        return $row[$campo];    
    }     
?>