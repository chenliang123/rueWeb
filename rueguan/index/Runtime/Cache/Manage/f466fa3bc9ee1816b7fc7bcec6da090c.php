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
<link href="<?php echo (MANAGE); ?>static/h-ui/css/app.css?id=1" rel="stylesheet" type="text/css"/>
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
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/echarts/echarts.min.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/ofixedtable.js?id=12"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/data.js?id=121145"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/app.js?id=1238"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/teacher.js?id=q10"></script>
</head>
<body data-schoolid="<?php echo ($arr["schoolid"]); ?>" data-src="<?php echo (MANAGE); ?>" data-load="<?php echo (MANAGE); ?>/static/h-ui/images/loading.gif" data-ajax="/index.php/Manage/Index">
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
  	  	<li class="active">教师统计</li>
  	    <li><a href="/index.php/Manage/Index/studentManage/schoolid/<?php echo ($arr["schoolid"]); ?>">学生统计</a></li>
  	  	<li><a href="/index.php/Manage/Index/classManage/schoolid/<?php echo ($arr["schoolid"]); ?>">班级统计</a></li>
  	  	<li>统计报表 <i class="icon Hui-iconfont">&#xe6d7</i></li>
  	  	<ul class="menu">
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/0"></a>教师如e课时和课堂积分累计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/1"></a>教师课堂教学行为统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/2"></a>教师课堂教学动作时长比例表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/3"></a>教师课堂互动均衡度统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/4"></a>班级互动表现统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/5"></a>年级和科目互动表现统计表</li>
  	  	</ul>
  	  	<!--<li>
  	  		<ul class="dropDown-menu menu radius box-shadow">
  	  			<li>
  	  				统计报表<i class="arrow Hui-iconfont"></i>
  	  				<ul class="menu">
  	  					<li class="active"><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/0"></a>教师如e课时和课堂积分累计表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/1"></a>教师课堂教学行为统计表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/2"></a>教师课堂教学动作时长比例表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/3"></a>教师课堂互动均衡度统计表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/4"></a>班级互动表现统计表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/5"></a>年级和科目互动表现统计表</li>
  	  				</ul>
  	  			</li>
  	  		</ul>
  	  	</li>-->
  	  	<!--<li><a href="/index.php/Manage/Index/homeworkManage/schoolid/<?php echo ($arr["schoolid"]); ?>">作业管理</a></li>-->
  	  	<!--<li><a href="/index.php/Manage/Index/examManage/schoolid/<?php echo ($arr["schoolid"]); ?>">考试管理</a></li>-->
  	  	<!--<li><a href="/index.php/Manage/Index/permissionManage/schoolid/<?php echo ($arr["schoolid"]); ?>">权限管理</a></li>-->
  	  </ul>
  	</div>
  	<div class="cb-right" style="margin-top: 61px;">
  		<div class="panel panel-default schoolinfo">
  			<div class="panel-body"> 			   
  			   <div class="tools-list">
  			   	<div class="left">

  			   		<div class="o-list"><font data-id="0">科目<i class="Hui-iconfont">&#xe6d5;</i></font>
  			   		  <ul>
  			   		   <?php echo ($arr["course"]); ?>
  			   		  
  			   		  </ul>  			   			
  			   		</div>
  			   		<div class="o-list"><font data-id="0">年级<i class="Hui-iconfont">&#xe6d5;</i></font>
  			   		  <ul>
  			   		    <?php echo ($arr["grade"]); ?>
  			   		  </ul> 			   			
  			   		</div>
  			   	</div>
  			   	<div class="center">
  			   		日期：<input id="dayfrom" class="input-text Wdate" style="width:120px;" type="text" onFocus="WdatePicker({maxDate:'#F<?php echo ($dp["$D('dayto')"]); ?>',onpicked:function(dp){dayto.focus()}})"/>
					    至   <input id="dayto" class="input-text Wdate" style="width:120px;" type="text"   onFocus="WdatePicker({maxDate:'#F<?php echo ($dp["$D('dayto')"]); ?>',onpicked:function(dp){ selectdate(dp) }})"/>
                 </div>
                 <div class="right">
                 	<input type="text" id="keyword" placeholder="请输入教师姓名" class="search-box" /><i class="Hui-iconfont"  id="searchbtn" style="font-size: 1.5em; position: relative;top: 5px; cursor: pointer;">&#xe709;</i>
                 </div>
  			   </div>
  			</div>
  		</div>  
  		<div class="panel panel-default schoolinfo" style="margin-top: 20px;">
  			<div class="hidePanel"></div>
  			<div class="panel-header">
  				<div class="header-optin">
  					<a data-type="0" data-name="教师">教师&nbsp;<i class="Hui-iconfont">&#xe6d5;</i></a>
  					<a data-type="1" data-name="指标">指标&nbsp;<i class="Hui-iconfont">&#xe6d5;</i></a>
  					<a data-type="2" style="width:80px" id="TableData">导出数据</>
  				</div>
  			</div>
  			<div class="panel-body" id="list-box" style="padding: 0px;">  			   
  			   <div class="table-body" id="table-body" style=" overflow:auto;width:960px;float:left;">
  			      <table id="tbTest2" class="table-box" cellpadding="0" cellspacing="0" style="text-align:center;width:2600px;">
					<tr style="background: #FFFFFF;">
					   <th style="width: 100px; text-align: center;"></th>
					   <th class="header-click" data-type="lessonInCT" data-sort="0" data-index="1">课表课时<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="lesson" data-sort="0" data-index="2" >如e课时<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>	
					   <th class="header-click" data-type="file" data-sort="0" data-index="3">文件数量<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="handon" data-sort="0" data-index="4">提问次数<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="callname" data-sort="0" data-index="5">点名次数<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="reward" data-sort="0" data-index="6">奖励次数<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="xiti" data-sort="0" data-index="7">习题数量<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="xiti2" data-sort="0" data-index="8" >设置答案习题<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="photo" data-sort="0" data-index="9" >拍照次数<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="draw" data-sort="0" data-index="10">批注次数<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
             <th class="header-click" data-type="time_avg" data-sort="0" data-index="11">课均使用时长<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
             <th class="header-click" data-type="file_avg" data-sort="0" data-index="12">课均课件<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
             <th class="header-click" data-type="handon_avg" data-sort="0" data-index="13" >课均提问<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
             <th class="header-click" data-type="xiti_avg" data-sort="0" data-index="14">课均出题<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px"/></th>
             <th class="header-click" data-type="callname_avg" data-sort="0" data-index="15">课均点名<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
             <th class="header-click" data-type="reward_avg" data-sort="0" data-index="16" >课均奖励<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px"/></th>
             <th class="header-click" data-type="photo_avg" data-sort="0" data-index="17">课均拍照<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
             <th class="header-click" data-type="draw_avg" data-sort="0" data-index="18">课均批注<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
             <th class="header-click" data-type="xiti2_avg" data-sort="0" data-index="19" >课均设答案题<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
             <th class="header-click" data-type="ratioDevice" data-sort="0" data-index="20" >系统使用率<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="ratioHandon" data-sort="0" data-index="21" >提问参与度<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="ratioXiti" data-sort="0" data-index="22">习题参与度<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="ratioXitiRight" data-sort="0" data-index="23">习题正确率<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="ratioCallname" data-sort="0" data-index="24">点名覆盖率<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>
					   <th class="header-click" data-type="ratioReward" data-sort="0" data-index="25">奖励覆盖率<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>	
					   <th class="header-click" data-type="xitiAnswerSetRatio" data-sort="0" data-index="26">答案设置率<img src="<?php echo (MANAGE); ?>static/h-ui/images/desc.png" height="15" style="margin-left:2px;display:none"/></th>			
					</tr>
					
				
					<tbody id="tbodyhtml"></tbody>
				</table>
  			   </div>
  			</div>
  		</div>
  	</div>
  </section>
 </section>	
 
</body>	
</html>
<script>
	$(function(){
		//初始化数据为一周
		getNowWeek();
		selectdate();          //执行了初始化数据
//	    initialization("0","0","0","0");

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