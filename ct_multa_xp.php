<?php

    include("global.php");

    $sql = "UPDATE multa SET valor='{$_POST['valor']}'";

    $result = mysql_query($sql);
    $_SESSION["msg"] = (!$result)? mysql_error() : "Registro alterado com sucesso.";

    header("Location: index.php?area=multa");
    
?>
