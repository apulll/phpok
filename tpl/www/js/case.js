$(function(){

  $(".case-list .box").on("click",function(){
    var $this = $(this);
    showPop($this);
  });



})


function showPop(obj){
  $("#show-detail").fadeIn();
  $("#slide").empty();
  var img = obj.attr("rel");
  var title = obj.attr("title");
  var arr= {}; //定义一数组 
  arr=img.split(";"); //字符分割 

  arr.pop();
  $(arr).each(function(n,v){
    $("#slide").append('<div class="img"><div class="nimg" style="background-image: url('+v+');"></div></div>');
  });
  $("#title").html('<span>'+title+'</span>');

  $('#slide').data('plugin_slidesjs', false);
  $('#slide').slidesjs({
    height:810
  });

  $("#show-detail .close").on("click",function(){
    $("#show-detail").fadeOut();
  });
  
}









