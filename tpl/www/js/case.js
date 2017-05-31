$(function(){

  $(".case-list .box").on("click",function(){
    var $this = $(this);
    showPop($this);
  });

  $(".product-img-tmb-list-li").on('click', '.product-img-tmb', function(event) {
    console.log(111)
    var url = ''
    url = $(this).attr('_src');
    showDetail(url)
  })

})

function showDetail(url){
  $("#show-detail").fadeIn();
  $("#slide").empty();
  var img = url;

  var arr= {}; //定义一数组
  arr=img.split(";"); //字符分割

  arr.pop();
  $(arr).each(function(n,v){
    $("#slide").append('<div class="img"><div class="nimg" style="background-image: url('+v+');"></div></div>');
  });


  $('#slide').data('plugin_slidesjs', false);
  $('#slide').slidesjs({
    height:810
  });

  $("#show-detail .close").on("click",function(){
    $("#show-detail").fadeOut();
  });
}


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









