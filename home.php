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
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  /* <img src="<?php echo $row["image"]?>"height=320 width=480 >*/
   if(! $conn )
   {
      die('Could not connect: ' . mysql_error());
   }
   mysql_select_db("studentadmin", $conn);
   $sql_name = mysql_query("Select name from images") or die(mysql_error());
   while($row = mysql_fetch_array($sql_name,MYSQL_BOTH))
{
    ?> <button class="btn" onclick="show($(this))"><?php echo $row["name"] ;?></button> 
<?php
}
?>
<script type="text/javascript">
 function show(obj){
  var name=obj.html();
  console.log(name);
  $.ajax({
    type:  'POST',
    url: "img.php",
    dataType: 'json',
    data: {'name': name },
    cache: false,
    success: function(data){
      console.log(data);
      $('#container').remove();

     $('<div id="container" ></div>').appendTo('#main');
   //   image = ;
 //     $('.img').empty();
      $('<div class = "img"><img src=" '+data[0].image+' " height=320 width=480 ></div>').appendTo('#container');
      console.log(data[0].image);
      des = '<p>'+data[0].description+'</p>';
      $('<div class = "des"><p>  '+data[0].description+' </p></div>').appendTo('#container');


    },
    error: function(data){
      console.log("error " + data);
      $('#container').remove();
    }

  })

 }
</script>
</body>
</html>