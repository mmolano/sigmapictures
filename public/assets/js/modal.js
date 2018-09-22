$( ".modal_boot img" ).click(function() {
   $("#btn-anterior").show();
   $("#btn-siguiente").show();
  imagen = $(this).attr( "src");
  $( ".modal-body" ).html("<img src="+imagen+">");
  if ($('.modal_boot').find('img:first').attr( "src") == imagen) {
    $("#btn-anterior").hide();
  } 
  if ($('.modal_boot').find('img:last').attr( "src") == imagen) {
    $("#btn-siguiente").hide();
  }  
  $('#myModal').modal('show'); 
});


$("#btn-siguiente").click(function() {
  imagen = $("img[src$='"+imagen+"']").next().attr("src");
  $( ".modal-body" ).html("<img src="+imagen+">"); 
  if ($('.modal_boot').find('img:last').attr( "src") == imagen) {
    $("#btn-siguiente").hide();
  }
  if ($('.modal_boot').find('img:first').attr( "src") != imagen) {
    $("#btn-anterior").show();
  }
});

$("#btn-anterior").click(function() {
  imagen = $("img[src$='"+imagen+"']").prev().attr("src");
  $( ".modal-body" ).html("<img src="+imagen+">");
  if ($('.modal_boot').find('img:first').attr( "src") == imagen) {
    $("#btn-anterior").hide();
  }
  if ($('.modal_boot').find('img:last').attr( "src") != imagen) {
    $("#btn-siguiente").show();
  }
});
