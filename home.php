<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<script src="jquery.min.js"></script>

<head>
<title>
Tour de Force
</title>
</head>
<body id = "main">
<?php
include 'connect.php'; 
   $sql_name = mysql_query("Select name from images") or die(mysql_error());
   while($row = mysql_fetch_array($sql_name,MYSQL_BOTH))
{
    ?> <button class="btn" onclick="show($(this))"><?php echo $row["name"] ;?></button> 
<?php
}
?>
<script type="text/javascript" src="ajax.js"></script>
</body>
</html>