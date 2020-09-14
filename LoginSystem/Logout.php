<?php
  require 'Core.inc.php';
  session_destroy();
  header('Location: '.$http_referer);
 
?>