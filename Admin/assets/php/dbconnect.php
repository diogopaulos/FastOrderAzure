<?php 
  $dsn = "mysql:host=fastorderdb.mysql.database.azure.com;dbname=bdfastorder";
  $user = "FastOrderAdmin";
  $passwd = "";
  $connect = new PDO($dsn, $user, $passwd);
?>