<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo (MANAGE); ?>static/h-ui/css/H-ui.css" />

<link href="<?php echo (MANAGE); ?>lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo (MANAGE); ?>lib/icheck/icheck.css" />
<link href="<?php echo (MANAGE); ?>static/h-ui/css/app.css" rel="stylesheet" type="text/css"/>
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
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/icheck/jquery.icheck.min.js" ></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/data.js?id=1"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/app.js?is=121"></script>
</head>
<body data-schoolid="<?php echo ($arr["schoolid"]); ?>" data-src="<?php echo (MANAGE); ?>" data-load="<?php echo (MANAGE); ?>/static/h-ui/images/loading.gif">
 <section class="all-boay">
   <header class="header">
  	 <div class="left"><img src="<?php echo (MANAGE); ?>static/h-ui/images/logo.png"/>&nbsp;如e教学管理系统</div>
  	 <div class="right">
  	 	<img src="<?php echo (MANAGE); ?>static/h-ui/images/headimg.png"/> <?php echo ($name); ?>  <i class="Hui-iconfont">&#xe6d5;</i>
  	 	<div class="outlogin">退出</div>
  	 </div>
  </header><!--进入公用模版-->
  <section class="content-body" style="margin-top: 0px;">
  	<div class="cb-left">
  	  <ul>
  	  	<li><a href="/index.php/Manage/Index">总览</a></li>
  	  	<li><a href="/index.php/Manage/Index/teacherManage/schoolid/<?php echo ($arr["schoolid"]); ?>">教师统计</a></li>
  	  	<li><a href="/index.php/Manage/Index/studentManage/schoolid/<?php echo ($arr["schoolid"]); ?>">学生统计</a></li>
  	  	<li><a href="/index.php/Manage/Index/classManage/schoolid/<?php echo ($arr["schoolid"]); ?>">班级统计</a></li>
  	  	<li><a href="/index.php/Manage/Index/homeworkManage/schoolid/<?php echo ($arr["schoolid"]); ?>">作业管理</a></li>
  	  	<li class="active">考试管理</li>
  	  	<li><a href="/index.php/Manage/Index/permissionManage/schoolid/<?php echo ($arr["schoolid"]); ?>">权限管理</a></li>
  	  </ul>
  	</div>
  	<div class="cb-right" style="margin-top: 61px;">
  	</div>
  </section>
 </section>	
 
</body>	
</html>
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
  })	
</script>