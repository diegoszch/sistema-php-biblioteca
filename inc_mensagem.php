<?php   
   if(!empty($_SESSION["msg"])) 
   {

      echo "<div id='mensagem'>{$_SESSION["msg"]}</div>";
   }
   if(isset($_SESSION["msg"]))
   {
     unset($_SESSION["msg"]);
   }    
?>