$(function(){
  $('#banner').slidesjs({
    play:{
      auto:true
     // interval:3000
    }
  });


  // $('#case-slide-1').slidesjs({
  //   play:{
  //     width: 242,
  //     auto:false,
  //     navigation: false
  //    // interval:3000
  //   }
  // });

creatNotice();
// creatSlide("#case-slide-1");
// creatSlide("#case-slide-2");
// creatSlide("#case-slide-3");



})


function creatNotice(){
  $("#notice-list").data("g",0);
  var leg = $("#notice-list li").length;
  $("#notice-list ul").append($("#notice-list ul").html());

  var index;
  setInterval(function(){
    index = parseInt($("#notice-list").data("g"));

    if(index>leg){
      $("#notice-list>ul").css({
        "top":0
      });
      index = 1;
    }
    $("#notice-list>ul").animate({
      "top":-index*40
    });
    index++;

    $("#notice-list").data("g",index);

  },1000);

}


function creatSlide(obj){
  var $obj = $(obj);
  $obj.data("g",0);
  var leg = $("li",$obj).length;
  $("ul",$obj).append($("ul",$obj).html());
  var iw = $("li",$obj).outerWidth();
  console.log(iw);
  $(".index-case-list",$obj).css("width",iw*leg*2);

  var index;
  var st = setInterval(function(){

    index = parseInt($obj.data("g"));
    if(index>leg){
      $(".index-case-list",$obj).css({
        "left":0
      });
      index = 1;
    }
    console.log(index*iw);
    $(".index-case-list",$obj).stop().animate({
      "left":-index*iw
    });
    index++;
    $obj.data("g",index);
    
  },1000);

}


