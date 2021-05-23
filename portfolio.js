$("index.html").ready(function(){

    $("#hidden").click(function(){

      if($("#hidden").text() == "Menu"){
        $("#hidden").text("X");
      }else{
        $("#hidden").text("Menu");
      }

      $("li").toggle("slow");
    });
});
