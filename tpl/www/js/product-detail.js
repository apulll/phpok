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
  })

  $(".pic-list>ul>li").on("click",function(){
    $(".big-box .bimg").attr({
      "src":$(this).find("img").attr("src")//,
     // "jqimg":$(this).find("img").attr("bigImg")
    });
    $(this).addClass("current").siblings("li").removeClass("current");
  });


});
