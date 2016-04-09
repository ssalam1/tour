<?php
define("HOST","localhost");
define("US_NAME","root");
define("PASS_W","");
define("DB_NAME","studentadmin");

$connection = mysql_connect(HOST,US_NAME,PASS_W);
mysql_set_charset('UTF-8');
if(!$connection)
  die("cannot connect to database".mysql_error());
?>
