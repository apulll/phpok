$(function(){

  // $(".search-box").on("click",function(){
  //   $(this).addClass("active");
  //   $(this).find("input").focus();
  // });
  // $(document).on("click",function(e){
  //   if(  $(e.target).closest($(".search-box")).length===0    ){
  //     $(".search-box").removeClass("active");
  //     $(".search-box input").val("");
  //   }
  // })

function Slide(opts) {
  var default = {
    obj:null,
    left:null,
    right:null
  }
  this.options = $.extend({},default,opts)
  this.init()
}
Slide.prototype = {
  init: function() {

    this.bindEvent();
  },
  bindEvent: function() {
    this.options.obj.on(left,'click',function(e){

    })
    this.options.obj.on(right,'click',function(e){
      
    })
  },

}


})