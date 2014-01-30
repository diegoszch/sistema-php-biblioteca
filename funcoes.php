<?php

function retornaValor($campo,$tabela,$condicao)
{
	$sql = "SELECT {$campo} FROM {$tabela} WHERE {$condicao}";
	$row = mysql_fetch_array(mysql_query($sql));
	return $row[$campo];
}