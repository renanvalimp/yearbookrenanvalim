<?php
 function conn_mysql(){

      $conn = new PDO('mysql:host=br-cdbr-azure-south-a.cloudapp.net;dbname=yearbooksrvalimdb',
    'b2417e8709a89b',
    '0a5180c0',array(PDO::ATTR_PERSISTENT => false));
      return $conn;
   }
?>