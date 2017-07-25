<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo (MANAGE); ?>static/h-ui/css/H-ui.min.css?is=115" />

<link href="<?php echo (MANAGE); ?>lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (MANAGE); ?>static/h-ui/css/app.css?is=16" rel="stylesheet" type="text/css"/>
<link href="<?php echo (MANAGE); ?>static/h-ui/css/calendar.css?is=117" rel="stylesheet" type="text/css"/>
<link href="<?php echo (MANAGE); ?>static/h-ui/css/index.css?is=11" rel="stylesheet" type="text/css"/>
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
<!--<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/My97DatePicker/4.8/WdatePicker.js"></script>-->
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/echarts/echarts.min.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/calendar.js?id=121125"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/app.js?id=12116"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/chartMonth.js?id=21128"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/data.js"></script>
</head>
<body data-schoolid="<?php echo ($schoolid); ?>" data-month="0" data-week="0" data-day="">
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
  	  	<li class="active">总览</li>
  	  	<li><a href="/index.php/Manage/Index/teacherManage/schoolid/<?php echo ($schoolid); ?>">教师统计</a></li>
  	  	<li><a href="/index.php/Manage/Index/studentManage/schoolid/<?php echo ($schoolid); ?>">学生统计</a></li>
  	  	<li><a href="/index.php/Manage/Index/classManage/schoolid/<?php echo ($schoolid); ?>">班级统计</a></li>
  	  	<li>统计报表 <i class="icon Hui-iconfont">&#xe6d7</i></li>
  	  	<ul class="menu">
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/0"></a>教师如e课时和课堂积分累计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/1"></a>教师课堂教学行为统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/2"></a>教师课堂教学动作时长比例表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/3"></a>教师课堂互动均衡度统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/4"></a>班级互动表现统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/5"></a>年级和科目互动表现统计表</li>
  	  	</ul>
  	  	<!--<li>
  	  		<ul class="dropDown-menu menu radius box-shadow">
  	  			<li>
  	  				统计报表<i class="arrow Hui-iconfont"></i>
  	  				<ul class="menu">
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/0"></a>教师如e课时和课堂积分累计表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/1"></a>教师课堂教学行为统计表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/2"></a>教师课堂教学动作时长比例表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/3"></a>教师课堂互动均衡度统计表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/4"></a>班级互动表现统计表</li>
  	  					<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($schoolid); ?>/page/5"></a>年级和科目互动表现统计表</li>
  	  				</ul>
  	  			</li>
  	  		</ul>
  	  	</li>-->
  	  	<!--<li><a href="/index.php/Manage/Index/homeworkManage/schoolid/<?php echo ($schoolid); ?>">作业管理</a></li>-->
  	  	<!--<li><a href="/index.php/Manage/Index/examManage/schoolid/<?php echo ($schoolid); ?>">考试管理</a></li>-->
  	  	<!--<li><a href="/index.php/Manage/Index/permissionManage/schoolid/<?php echo ($schoolid); ?>">权限管理</a></li>-->
  	  </ul>
  	</div>
  	<div class="cb-right index-right">
	    <div class="panel panel-default no-info">
	    	<h4>今日暂无数据</h4>
	    </div>
  		<div class="panel panel-default schoolinfo">
			<div class="panel-header panel-header-indexWg"><i></i>使用情况总览<span>查看历史</span></div>
			<div class="panel-body panel-body-index">
				<div class="info">
					<div class="left"></div>
					<div class="right">
						使用教师：<span>无</span>
					</div>
				</div>
				<div class="info">
					<div class="left"></div>
					<div class="right">
						使用课时：<span>无</span>
					</div>
				</div>
				<div class="info">
					<div class="left"></div>
					<div class="right">
						使用时长：<span>无</span>
					</div>
				</div>
				<div class="info">
					<div class="left"></div>
					<div class="right">
						课堂互动：<span>无</span>
					</div>
				</div>
			</div>
			<div class="datainfor">
				<div class="panel panel-default personinfo">
						<div class="panel-header">使用系统人数</div>
						<table class="table table-border table-striped fixed">
	     						<thead><tr><th>姓名</th><th>课时数</th><th>使用时长</th><th>课堂互动</th><th></th></tr></thead>
	     				</table>
						<div class="panel-body">	
							<table class="table table-border table-striped">
	     						<thead><tr><th>姓名</th><th>课时数</th><th>使用时长</th><th>课堂互动</th><th></th></tr></thead>
	     						<tbody></tbody>
	    					</table>
						</div>
						
				</div>
				<div class="pie">
					    <div class="panel panel-default numPerson">
					    	<div class="panel-header">使用人数占比</div>
					    	<div class="panel-body">
					    		<div id="piePerson" style="width:338px;height:228px;"></div>
					    	</div>
					    </div>
					    <div class="panel panel-default numTime">
					    	<div class="panel-header">使用课时占比</div>
					    	<div class="panel-body">
					    		<div id="pieTime" style="width:338px;height:228px;"></div>
					    	</div>
					    </div>
				</div>
			</div>
  		</div>
		<div class="panel panel-default daydata">
			<div class="panel-header">
				<?php echo ($schoolname); ?>系统使用情况
				<ul>
					<li>使用人数</li>
					<li class="active">使用课时</li>
					<li>使用时长</li>
					<li>课堂互动</li>
				</ul>
			</div>
			<div class="infoTab">
			   	 	<span class="weekBtn">周</span><i></i><span class="monthBtn">月</span>
			</div>
			<div class="panel-body">
			   <div class="chart-body">
			   	 <!--<div class="chart-title" data-month="0" data-week="0">
			   	 	<font id="upweek">上一周<i class="Hui-iconfont">&#xe67d;</i></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   	 	一周内系统使用情况&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   	 	<font id="nextweek"><i class="Hui-iconfont">&#xe63d;</i>下一周</font>
			   	 </div>-->
			   	 <!--<div class="monthTitle" data-month="0" data-week="0">
			   	 	<font id="upmonth"></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   	 	近一月系统使用情况&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   	 	<font id="nextmonth"></font>
			   	 </div>-->
			   	 <div class="chart-box" id="chart"></div>
			   	 <div class="chart-box" id="chartMonth"></div>
			   	 <div class="account">说明：上图为全校教师<span class="date">一周</span>内每天使用系统的<span class="item">使用课时数</span>趋势。</div>
			   </div>
			   <!--<footer class="chartFooter">
			   		<i></i><span>如e课时</span><i></i><span>课表课时</span>
			   </footer>-->
			   <div class="info-body">
			   	 <div class="info-body-title">
			   	 	<!--获取当天设备使用的情况-->
			   	 </div>
			   	 <div class="info-box">
			   	 	<div class="panel-box">
			   	 		<div class="panel panel-default">
							<div class="panel-header">提问次数</div>
							<div class="panel-body" id="handon">
								
							</div>
						</div>
			   	 	</div>
			   	 	
			   	 	<div class="panel-box">
			   	 		<div class="panel panel-default">
							<div class="panel-header">出题次数</div>
							<div class="panel-body" id="xiti">
								<!--<div class="pb-sub">
								   <div class="top"  style="bottom: 50px;">20</div>
								   <div class="center less" style="height: 30px;"></div>
								   <div class="bottom">当日</div>
								</div>
								<div class="pb-sub">
									 <div class="top"  style="bottom: 100px;">80</div>
								     <div class="center history" style="height: 80px;"></div>
									<div class="bottom">历史平均</div>
								</div>-->
							</div>
						</div>
			   	 	</div>
			   	 	
			   	 	<div class="panel-box">
			   	 		<div class="panel panel-default">
							<div class="panel-header">点名次数</div>
							<div class="panel-body" id="callname">
								<!--<div class="pb-sub">
								   <div class="top"  style="bottom: 120px;">100</div>
								   <div class="center many" style="height: 100px;"></div>
								   <div class="bottom">当日</div>
								</div>
								<div class="pb-sub">
									 <div class="top"  style="bottom: 100px;">20</div>
								     <div class="center history" style="height: 80px;"></div>
									<div class="bottom">历史平均</div>
								</div>-->
							</div>
						</div>
			   	 	</div>
			   	 	
			   	 	<div class="panel-box">
			   	 		<div class="panel panel-default">
							<div class="panel-header">奖励次数</div>
							<div class="panel-body" id="reward">
								<!--<div class="pb-sub">
								   <div class="top"  style="bottom: 120px;">100</div>
								   <div class="center many" style="height: 100px;"></div>
								   <div class="bottom">当日</div>
								</div>
								<div class="pb-sub">
									 <div class="top"  style="bottom: 100px;">20</div>
								     <div class="center history" style="height: 80px;"></div>
									<div class="bottom">历史平均</div>
								</div>-->
							</div>
						</div>
			   	 	</div>
			   	 	
			   	 	<div class="panel-box">
			   	 		<div class="panel panel-default">
							<div class="panel-header">拍照次数</div>
							<div class="panel-body" id="photo">
								<!--<div class="pb-sub">
								   <div class="top"  style="bottom: 120px;">100</div>
								   <div class="center many" style="height: 100px;"></div>
								   <div class="bottom">当日</div>
								</div>
								<div class="pb-sub">
									 <div class="top"  style="bottom: 100px;">20</div>
								     <div class="center history" style="height: 80px;"></div>
									<div class="bottom">历史平均</div>
								</div>-->
							</div>
						</div>
			   	 	</div>
			   	 	
			   	 	<div class="panel-box">
			   	 		<div class="panel panel-default">
							<div class="panel-header">批注次数</div>
							<div class="panel-body" id="draw">
								<!--<div class="pb-sub">
								   <div class="top"  style="bottom: 120px;">100</div>
								   <div class="center many" style="height: 100px;"></div>
								   <div class="bottom">当日</div>
								</div>
								<div class="pb-sub">
									 <div class="top"  style="bottom: 100px;">20</div>
								     <div class="center history" style="height: 80px;"></div>
									<div class="bottom">历史平均</div>
								</div>-->
							</div>
						</div>
			   	 	</div>
			   	 	
			   	 	
			   	 	<div class="info-btn">
			   	 		<a  id="info" data-url="/index.php/Manage/Index/indexinfo/schoolid/<?php echo ($schoolid); ?>">查看详情</a>
			   	 	</div>
			   	 	
			   	 </div>
			   </div>
			</div>
		</div>
  	</div>
  </section>
  <div class="dev"></div>
 </section>
</body>
</html>
<script>
	$(function(){
		$(".chart-box").css( 'width', $(".chart-box").width() );
		indexchart();
		var name = $.browser.name;	
	    if (name!="chrome" && name!="firefox") {        
	         var w = $(document).width();
	         var html ="<div class='browser-msg' style=\"left:"+((w-500)/2)+"px\">当前浏览器为IE或IE内核的浏览器可能出现部分功能不支持，建议使用谷歌或者火狐 <i class=\"Hui-iconfont\">&#xe60b;</i></div>"
	         $("body").append(html);
	         $(".browser-msg>.Hui-iconfont").off().on("click",function(){
	           $(".browser-msg").remove();
	         })
	    }
	
	//查看历史
	$('.schoolinfo .panel-header-indexWg span').off().on('click',function(){
		var schoolid = $("body").data("schoolid");
		var start = "20170101";
		var end = new Date();
		var month = end.getMonth();	
		var day = end.getDate();
		month = toTwo(month+1);
		day = toTwo(day);
		end = "2017" + month + day;
		var dataArr = new Array();
		var tempArr = new Array();
		$data.weekdata(start,end,schoolid,function(out){
			var data = out.data.dayDataList;			
			var len = data.length;
			for(var i = 0;i < len;i++){
				if(data[i].isData == '1'){
					data[i].day = insert_flg(data[i].day,'/','4');
					data[i].day = insert_flg(data[i].day,'/','7');
					dataArr.push({
						date:data[i].day,
						value:" "
					});
					tempArr.push(data[i].day);
				}
			}
			
		var index =	layer.open({
						  type: 1,				
						  area: ['450px', '515px'], //宽高
						  title:'历史记录',
						  content: '<div id="ca"></div>'
						});
		    $('#ca').calendar({
		        width: 431,
		        height: 420,
		        selectedRang:['2017/01/01',new Date()],
		        data: dataArr,
		        onSelected: function (view, date, data) {
		        	var month = date.getMonth();	
					var day = date.getDate();
					month = toTwo(month+1);
					day = toTwo(day);
					var myDate = "2017/" + month + "/" + day;
		            var res =  $.inArray(myDate,tempArr);
		            var cDate = "2017" + month + day;
		            if(res > -1){
		            	console.log(res)
		            	//选择日期后初始化首页数据
		            	$mc.GetStateDay(cDate,cDate);
		            	layer.close(index);	
		            }
		        },
//		        viewChange: function (view, date, data) {
//		            console.log('view:' + view)
//		            console.log('date:' + date);
//		            console.log('data:' + data);
//		        },
		    });	

		});		
	})
	    	    
	    //进入首页滚动条位置
	    
	   // $('html,body').animate({scrollTop:220},500);
	  
//		indexChartMonth();
		//周和月数据切换
		$('#chartMonth').css('display','none')
		$('.weekBtn').on('click',function(){
			$(".chart-body .account .date").html("一周");
			$('.weekBtn').css('color','#315EDB ');
			$('.monthBtn').css('color','#303030');
			$('.chart-title').css('display','block');
			$('.monthTitle').css('display','none');
			$('#chart').css('display','block');
			$('#chartMonth').css('display','none');
		})
		$('.monthBtn').on('click',function(){
			$(".chart-body .account .date").html("一个月");
			$('.weekBtn').css('color','#303030');
			$('.monthBtn').css('color','#315EDB');
			$('.chart-title').css('display','none');
			$('.monthTitle').css('display','block');
			$('#chart').css('display','none');
			$('#chartMonth').css('display','block');
		})

	})
</script>