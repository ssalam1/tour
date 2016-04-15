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
      console.log("error in the Ajax" + data);
      $('#container').remove();
    }

  })
   $.ajax({
    type:  'POST',
    url: "details.php",
    dataType: 'json',
    data: {'name': name },
    cache: false,
    success: function(data){
      console.log(data);
      for (var i = data.length - 1; i >= 0; i--) {
        $('<p>'+data[i].times + data[i].todo+'</p>').appendTo('#container');
        
      }
    
    },
    error: function(data){
      console.log("error in the Ajax" + data);
      
    }

  })


 }
