$(function(){

  $(".search-box").on("click",function(){
    $(this).addClass("active");
    $(this).find("input").focus();
  });
  $(document).on("click",function(e){
    if(  $(e.target).closest($(".search-box")).length===0    ){
      $(".search-box").removeClass("active");
      $(".search-box input").val("");
    }
  });

  $(".downloads-list .detail .tit").on("click",function(){
    //$(this).parents(".detail").toggleClass("open");
    if($(this).hasClass("open")){
      $(this).removeClass("open");
      $(this).next(".conn").slideUp();
    }else{
      $(this).addClass("open");
      $(this).next(".conn").slideDown();
    }
    
  });

})