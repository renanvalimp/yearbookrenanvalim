<?php
 function conn_mysql(){

      $conn = new PDO('mysql:host=br-cdbr-azure-south-a.cloudapp.net;dbname=yearbooksrenandb',
    'b26b7fdade0889',
    '9b9dd333',array(PDO::ATTR_PERSISTENT => false));
      return $conn;
   }
?>