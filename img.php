<?php
include "connect.php";
 //selection of database
 $db_select= mysql_select_db(DB_NAME,$connection);
 
 if(!$db_select)
   die("cannot select the database".mysql_error());

   if(isset($_POST['name']))
      {
        $name = mysql_escape_string($_POST['name']);
       $sql = sprintf("SELECT image,description FROM images WHERE name ='%s'",
            mysql_real_escape_string($name));
        $results = mysql_query($sql,$connection);
         if(!$results){
             die("database query failed".mysql_error());
              }
              $data = array();
        while($row=mysql_fetch_assoc($results)) {
             $data[]=$row;  

          } 
          echo json_encode($data);  
   } 
?>