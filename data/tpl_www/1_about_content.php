<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = $rs['title'].' - '.$page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<div class="nbanner" style='background-image: url("<?php echo $rs['company_pro_banner']['filename'];?>");'>

  </div>
<div class="content">
    <div class="hgroup">
      <h3><?php echo $rs['title'];?></h3>
      <hr>
      <p><?php echo $rs['title_en'];?></p>
    </div>
    <div class="about-group clearfix">
      <span class="img"><img src="<?php echo $rs['thumb']['filename'];?>" alt=""></span>
      <div class="text-group ">
        <?php echo $rs['content'];?>
      </div>

    </div>
  </div>
<?php $this->output("block_contact","file"); ?>
<div class="feedback-group">

  <div class="content">
  <form method="post" class="form" id="postform">
    <div class="hgroup">
      <h3>商务合作</h3>
      <hr>
      <p>Business cooperation</p>
    </div>
    <div class="feedback-list clearfix">
      <dl>
        <dt>姓名：</dt>
        <dd><input type="text" name="fullname"></dd>
        <dt>公司：</dt>
        <dd><input type="text" name="company_name"></dd>
      </dl>
      <dl>
        <dt>邮箱：</dt>
        <dd><input type="text" name="email"></dd>
        <dt>电话：</dt>
        <dd><input type="text" name="mobile"></dd>
      </dl>
      <dl>
        <dt>城市：</dt>
        <dd><input type="text" name="city_name"></dd>
        <dt></dt>
        <dd></dd>
      </dl>
      <dl class="c2">
        <dt>需求：</dt>
        <dd><textarea placeholder="详细产品描述／数量等" name="content"></textarea></dd>
      </dl>
    </div>
    <div class="btn">
      <button type="submit">提  交</button>
    </div>
    </form>
  </div>
</div>

<script>

console.log(api_url('post','save'),'url')

  $("#postform").on('submit',function(e){
    e.preventDefault();
    var params = {};
    params.fullname = $("input[name=fullname]").val();
    params.company_name = $("input[name=company_name]").val();
    params.email = $("input[name=email]").val();
    params.mobile = $("input[name=mobile]").val();
    params.city_name = $("input[name=city_name]").val();
    params.content = $("textarea[name=content]").val();
    $.ajax({
      url:api_url('post','cooperation'),
      type:'post',
      dataType:'json',
      data:{'data':params},
      success:function(rs){
        if(rs.status == 'ok'){
          alert('感觉您提交的信息，我们会尽快与您联系！')
          // $.dialog.alert('感觉您提交的留言，我们会尽快处理您的留言',function(){
            // $.phpok.reload();
          // },'succeed');
        }else{
          // $.dialog.alert(rs.content);
          // return false;
        }
      }
    });
    return false;
  });
</script>

<?php $this->output("foot","file"); ?>