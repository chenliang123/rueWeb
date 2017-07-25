<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo (MANAGE); ?>static/h-ui/css/H-ui.min.css" />

<link href="<?php echo (MANAGE); ?>lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (MANAGE); ?>static/h-ui/css/app.css?id=1234" rel="stylesheet" type="text/css"/>
<!--[if lt IE 9]>
<link href="static/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>如e教学管理系统</title>
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/jquery.browser.min.js"></script> 
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/app.js?id=122231"></script>
<script>
   $(function(){
       var name = $.browser.name;
       if (name!="chrome" && name!="firefox") {        
         var w = $(document).width();
         var html ="<div class='browser-msg' style=\"left:"+((w-500)/2)+"px\">当前浏览器为IE或IE内核的浏览器可能出现部分功能不支持，建议使用谷歌或者火狐 <i class=\"Hui-iconfont\">&#xe60b;</i></div>"
         $("body").append(html);
         $(".browser-msg>.Hui-iconfont").off().on("click",function(){
           $(".browser-msg").remove();
         })
       }
       
   	  $(".btns").off().on("click",function(){
           login();
   	  })
   	  
   	  document.onkeydown = function(ev){
   	  	var e = ev || event;
   	  	if(e && e.keyCode==13){
   	  		login();
   	  	}
   	  }
   	  
   })
</script>
</head>
<body>
</body>
 <section class="all-boay">
   <div class="login-body">
      <div class="login-head">
        <div class="left"><img src="<?php echo (MANAGE); ?>static/h-ui/images/logo.png"/>&nbsp;如e教学管理系统</div>
      </div>
      <div class="i-body">
         <div class="left"></div>
         <div class="right">
           <div class="title">用户登录</div>
           <div class="input_box">
             <img src="<?php echo (MANAGE); ?>static/h-ui/images/user.png"/>
             <input type="text" id="username" placeholder="请输入用户名"/>
           </div>
            <div class="input_box">
             <img src="<?php echo (MANAGE); ?>static/h-ui/images/pass.png"/>
             <input type="password" id="password" placeholder="请输入密码" />
           </div>
           <div class="ch"><input id="checkbox" type="checkbox"/>&nbsp;记住密码</div>
           <div class="btns">
              登录
           </div>
         </div>
      </div>
      <div class="i-bottom">北京天地群网科技发展有限公司</div>
   </div>
 </section>
</html>