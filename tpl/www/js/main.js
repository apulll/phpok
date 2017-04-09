(function(){

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

function Slide(obj,opts) {
  var defaultOpts = {
    left:'.case-list__btn__left',
    right:'.case-list__btn__right',
    li:'.case-list__li',
    distance:250,
    showNum:3 
  }
  this.obj = $(obj);

  this.options = $.extend({},defaultOpts,opts)
  this.init()
}
Slide.prototype = {
  init: function() {
    

    this.bindEvent();
    console.log(this.obj)
  },
  bindEvent: function() {
    var _this = this;
    var li = this.obj.find(this.options.li);
    console.log(li)
    var li_length = li.length;
    var $wrapper = this.obj.find('.case-list__wrapper');

    var ac = li_length - this.options.showNum ;

    if(ac < 0) return;
    var dif = ac *250;

    this.obj.on('click',this.options.left,function(e){
      var ml = parseInt($wrapper.css('margin-left'));
      console.log(ml)
      if(dif == Math.abs(ml)) return ;
      $wrapper.animate({
        marginLeft:ml-250
      })
    })
    this.obj.on('click',this.options.right,function(e){
      var ml = parseInt($wrapper.css('margin-left'));
      console.log(ml)
      if(!Math.abs(ml)) return ;
      $wrapper.animate({
        marginLeft:ml+250
      })
    })
  },

}

$.fn.slide= function(options) {
  var $this = $(this);
  options = options || {};
  console.log($this);
  for (var i = 0; i < $this.length; i++) {
    var obj = Math.random()*1000;
    obj = new Slide($this[i], options);
    obj.init()
  }
  
  
}

})()