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
<link href="<?php echo (MANAGE); ?>static/h-ui/css/app.css?id=112" rel="stylesheet" type="text/css"/>
<link href="<?php echo (MANAGE); ?>static/h-ui/css/classinfo.css?id=112" rel="stylesheet" type="text/css"/>
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
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/My97DatePicker/4.8/WdatePicker.js"></script>

<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/app.js?124"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/data.js"></script>
</head>
<body data-url="/index.php/Manage/Index/CourseInfo/lensson/" data-page="<?php echo ($more); ?>" data-school="<?php echo ($schoolid); ?>" data-teacher="<?php echo ($teacherid); ?>" data-dayfrom="<?php echo ($dayfrom); ?>" data-dayto="<?php echo ($dayto); ?>">
<section class="all-boay">
   <header class="header">
  	 <div class="left"><img src="<?php echo (MANAGE); ?>static/h-ui/images/logo.png"/>&nbsp;如e教学管理系统</div>
  	 <div class="right">
  	 	<img src="<?php echo (MANAGE); ?>static/h-ui/images/headimg.png"/> <?php echo ($name); ?>  <i class="Hui-iconfont">&#xe6d5;</i>
  	 	<div class="outlogin">退出</div>
  	 </div>
  </header><!--进入公用模版-->
  <section class="content-body">
  	<div class="cb-left">
  	  <ul>
  	  	<li class="back">返回</li>
  	  </ul>
  	</div>
  	<div class="cb-right">
  		<div class="panel panel-default schoolinfo minSchoolinfo" style="margin-bottom: 20px;">
			<div class="panel-body">
				<div class="info-title"><?php echo ($teachername); ?>老师&nbsp&nbsp&nbsp&nbsp如e教学系统使用情况</div>
				<div class="nav">
			   	 	<!--<ul>
			   	 		<li>全校</li>
			   	 		<li>
			   	 			<select name="">
			   	 				<option value="科目">班级</option>
			   	 				<option value="科目">高二(1)班</option>
			   	 				<option value="科目">高一(3)班</option>
			   	 				<option value="科目">高二(6)班</option>
			   	 				<option value="科目">高一(2)班</option>
			   	 			</select>
			   	 			<i class="Hui-iconfont">&#xe6d5;</i>
			   	 		</li>			   	 		
			   	 	</ul>-->
			   	 	<div class="center">
  			   		日期：<input id="dayfrom" class="input-text Wdate" style="width:120px;" type="text" onFocus="WdatePicker({maxDate:'#F<?php echo ($dp["$D('dayto')"]); ?>',onpicked:function(dp){dayto.focus()}})"/>
							至       <input id="dayto" class="input-text Wdate" type="text" style="width:120px;"   onFocus="WdatePicker({maxDate:'#F<?php echo ($dp["$D('dayto')"]); ?>',onpicked:function(dp){initTeacherData()}})"/>
            </div>
			  </div>
        <div class="teacherinfo"></div> 			    
			</div>
		</div>
  	</div>
  	</section>
</section>
</body>
</html>
<script>
	$(function(){
		
			$(".back").off().on("click",function(){
				var backBtn = parseInt($('body').attr('data-page'));
				if(backBtn){
						window.location.href ="/index.php/Manage/Index/teacherManage/schoolid/" + $('body').attr('data-school');
				}else{
					  window.location.href ="/index.php/Manage/Index";
				}
				//window.location.href ="/index.php/Manage/Index/teacherManage/schoolid/" + $('body').attr('data-school');
			});
		
		  var sF = insert_flg($('body').attr('data-dayfrom'),'-',4);
		      sF = insert_flg(sF,'-',7);
		  var sE = insert_flg($('body').attr('data-dayto'),'-',4);
		      sE = insert_flg(sE,'-',7);
		  $("#dayfrom").val(sF);
			$("#dayto").val(sE);
			initTeacherData()
	   
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