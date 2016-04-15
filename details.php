<?php
include "connect.php";
 //selection of database
 
   if(isset($_POST['name']))
      {
        $name = mysql_escape_string($_POST['name']);
       $sql = sprintf("SELECT times,todo FROM day WHERE name ='%s'",
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