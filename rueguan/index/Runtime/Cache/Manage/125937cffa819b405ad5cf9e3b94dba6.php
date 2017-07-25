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
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/app.js"></script>
</head>
<body>
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
				<div class="info-title"><?php echo ($showday); ?>共有<?php echo ($arr["classnum"]); ?>个班级使用如e课堂系统</div>
				<div class="teacher-list" <?php echo ($arr["style"]); ?>>
					<div class="left">使用班级</div>
					<div class="center">
						<a class="all <?php echo SetActive(0);?>"  data-id="0">全部</a>
						<?php if(is_array($classlist)): $i = 0; $__LIST__ = $classlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="teacher <?php echo (SetActive($vo["id"])); ?>" data-active="0" data-id="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?> 
					</div>
					<?php echo ($arr["btn"]); ?>
				</div>
                
                <?php echo ($html); ?>
			    
			</div>
		</div>
  	</div>
  	</section>
</section>
</body>
</html>
<script>
	$(function(){	
		var obj = $(".teacher-list>.right");		
		obj.off().on("click",function(){
			 var childnum = $(".teacher-list>.center").children("a").length;
			 if(childnum<=10){
			 	layer.msg('没有更多的班级啦~~');
			 }
			 else
			 {
			    var hang = Math.ceil(childnum/10);
			    var type = obj.attr("data-type");
			    if(type==1){
			    	$(".teacher-list").animate({
			    		height:(hang*45)+"px"
			    	},function(){
			    		obj.attr("data-type","0").html("收起");
			    	})
			    }
			    else{
			    	$(".teacher-list").animate({
			    		height:(45)+"px"
			    	},function(){
			    		obj.attr("data-type","1").html("更多");
			    	})
			    }
			 }
		});
		
		$(".teacher-list>.center>a").off().on("click",function(){
			var classid = $(this).data("id");
			var url = "/index.php/Manage/Index"+"/indexinfo/schoolid/<?php echo ($arr["schoolid"]); ?>/day/<?php echo ($arr["day"]); ?>";
			var more = $("#showmore").attr("data-type");

			
			$fc.goURL(url+"/classid/"+classid+"/more/"+more);             
		});
		
		$(".back").off().on("click",function(){
			window.location.href ="/index.php/Manage/Index";
		});

      	 
      	 
		 $(".class-box").off().on("click",function(){
  	        var lenssonid = $(this).data("id");
  	        $fc.goURL("/index.php/Manage/Index/CourseInfo/lensson/"+lenssonid);
        })

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