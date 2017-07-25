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
<link href="<?php echo (MANAGE); ?>static/h-ui/css/countReport.css?11" rel="stylesheet" type="text/css"/>
<!--[if lt IE 9]>
<link href="static/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>如e教学管理系统</title>
</head>
<body data-schoolid="<?php echo ($arr["schoolid"]); ?>" data-page="<?php echo ($page); ?>" data-src="<?php echo (MANAGE); ?>" data-load="<?php echo (MANAGE); ?>/static/h-ui/images/loading.gif">
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
  	  	<li>统计报表 <i class="icon Hui-iconfont">&#xe6d7</i></li>
  	  	<ul class="menu">
			<li class="active"><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/0"></a>教师如e课时和课堂积分累计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/1"></a>教师课堂教学行为统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/2"></a>教师课堂教学动作时长比例表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/3"></a>教师课堂互动均衡度统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/4"></a>班级互动表现统计表</li>
			<li><a href="/index.php/Manage/Index/countReport/schoolid/<?php echo ($arr["schoolid"]); ?>/page/5"></a>年级和科目互动表现统计表</li>
  	  	</ul>
  	  	<!--<li>
  	  		<ul class="dropDown-menu menu radius box-shadow">
  	  			<li class="active">
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
  	  	<!--<li class="active">作业管理</li>-->
  	  	<!--<li><a href="/index.php/Manage/Index/examManage/schoolid/<?php echo ($arr["schoolid"]); ?>">考试管理</a></li>-->
  	  	<!--<li><a href="/index.php/Manage/Index/permissionManage/schoolid/<?php echo ($arr["schoolid"]); ?>">权限管理</a></li>-->
  	  </ul>
  	</div>
  	<div class="cb-right" style="margin-top: 61px;">
  		<div class="center countDate">
  			日期：<input id="dayfrom" class="input-text Wdate" style="width:120px;" type="text" onFocus="WdatePicker({maxDate:'#F<?php echo ($dp["$D('dayto')"]); ?>',onpicked:function(dp){dayto.focus()}})"/>
			 至   <input id="dayto" class="input-text Wdate" style="width:120px;" type="text"   onFocus="WdatePicker({maxDate:'#F<?php echo ($dp["$D('dayto')"]); ?>',onpicked:function(dp){ select_Report_date(dp) }})"/>
        </div>
  		<div class="panel panel-default schoolinfo countInfo">
			<div class="panel-header"></div>
			<div class="panel-body">
				<div class="chart-box" id="chart" style="width: 960px;height: 450px;margin-top: 34px;"></div>
			</div>
			<!--<table id="tableExcel" class="table table-border table-striped fixed">
					<thead><tr><th>姓名</th><th>课时数</th><th>使用时长</th><th>课堂互动</th><th></th></tr></thead>
			</table>-->
	   </div>
	   <!--<button type="button" class="btn">导出Excel方法五</button>-->
  	</div>
  </section>
 </section>	
 
</body>	
</html>
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/jquery.browser.min.js"></script> 
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/icheck/jquery.icheck.min.js" ></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/layer/2.4/layer.js"></script>
<!--<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/echarts/echarts.min.js?123"></script>-->
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/echarts/myechart.js?123"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/data.js?id=2"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/app.js?is=126"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/report.js?is=131"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/tableToExcel.js?is=121"></script>
<script>
	
	function select_Report_date(obj){
//		var coure = $(".o-list:eq(0)>font").attr("data-id");
//		var grade = $(".o-list:eq(1)>font").attr("data-id");
		var sF = $("#dayfrom").val();
		var sT = $("#dayto").val();
		sF = new Date(sF.replace(/-/g, "/"));
		sT = new Date(sT.replace(/-/g, "/"));
		var days = sT.getTime() - sF.getTime();
		days= parseInt(days / (1000 * 60 * 60 * 24)) + 1;

		var dayfrom = $("#dayfrom").val().replace(/-/g, "");
		var dayto = $("#dayto").val().replace(/-/g, "");
	    if(dayfrom=="") dayfrom="0";
	    if(dayto=="") dayto="0";
	    if(dayfrom!=""&&dayto!=""){
	    	layer.msg('玩命加载中....');
			getReportData(dayfrom,dayto,days);
	    }	
	}
	
	function getReportData(dayfrom,dayto,days){
		var schoolid = $('body').attr('data-schoolid');
		var page = $('body').attr('data-page');
    	var html = "";
		if(page == '0'){
			var course = [];      //科目
			var myData = [];      //图数据
			var perArr = [];
			var hours = [];
			var maxX = 0;
			$data.getReport1(dayfrom,dayto,days,schoolid,function(out){
		    	var dataArr = out.data;
		    	$(".panel-header").html("教师如e课时和课堂积分累计表");
//		    	html = "<div class='panel-header'>教师如e课时和课堂积分累计表</div><table class='table table-border table-striped fixed-Rep'><thead><tr><th>姓名</th><th>年级</th><th>科目</th><th>课表课时数</th><th>如e课时数</th><th>如e课时数比例</th><th>课堂积分</th><th>课均积分</th></tr></thead></table><div class='panel-body'><table class='table table-border table-striped'><thead><tr><th>姓名</th><th>年级</th><th>科目</th><th>课表课时数</th><th>如e课时数</th><th>如e课时数比例</th><th>课堂积分</th><th>课均积分</th></tr></thead><tbody>";
		    	var tempIndex = 0;
		    	for(var i in dataArr){
		    		if(!course.contains(dataArr[i].courseName)){
		    			course.push(dataArr[i].courseName);
		    		}
		    		tempIndex = course.indexOf(dataArr[i].courseName)
		    		perArr.push(tempIndex);
		    		perArr.push(dataArr[i].ruyiNum);
		    		perArr.push(dataArr[i].pointAverage);
		    		perArr.push(dataArr[i].teacherName);
		    		myData.push(perArr);
		    		perArr = [];
		    		if(parseInt(dataArr[i].ruyiNum) > maxX){
		    			maxX = parseInt(dataArr[i].ruyiNum);
		    		}	
//		    		html += "<tr><td>"+ dataArr[i].teacherName +"</td><td>"+ dataArr[i].gradeName +"</td><td>"+ dataArr[i].courseName +"</td><td>"+ dataArr[i].classNum +"</td><td>"+ dataArr[i].ruyiNum +"</td><td>"+ dataArr[i].ruyiRatio +"</td><td>"+ dataArr[i].pointSum +"</td><td>"+ dataArr[i].pointAverage +"</td></tr>"
		    	}
		    	maxX = parseInt(maxX*1.5);
		    	for(var j = 0;j <= maxX;j++){
		    		hours.push(j);
		    	}
		    	indexChart(myData,hours,course);
//		    	html += "</tbody></table></div></div>";
//		    	$('.countInfo').html(html);
		    	layer.msg('数据请求成功');
//		    	$('.btn').off().on('click',function(){
//		    		method5('tableExcel');
//		    	});
		    });
	   }else if(page == '1'){
	   		$data.getReport2(dayfrom,dayto,days,schoolid,function(out){
	   			$(".panel-header").html("教师课堂教学行为统计表");
		    	var dataArr = out.data;
		    	console.log(dataArr)
		    	var nameData = [];
		    	var pageArr = [];
		    	var interArr = [];
		    	var tiwenArr = [];
		    	var callArr = [];
		    	var questArr = [];
		    	var rewardArr = [];
		    	var photoArr = [];
		    	var pizhuArr = [];
//		    	html = "<div class='panel-header'>教师课堂教学行为统计表</div><table class='table table-border table-striped fixed-Rep'><thead><tr><th>教师姓名</th><th>年级</th><th>科目</th><th>如e课时数</th><th>讲授课件数<br/>(平均每课时)</th><th>互动次数<br/>(平均每课时)</th><th>提问次数<br/>(平均每课时)</th><th>点名次数<br/>(平均每课时)</th><th>出题次数<br/>(平均每课时)</th><th>奖励次数<br/>(平均每课时)</th><th>拍照次数<br/>(平均每课时)</th><th>批注次数<br/>(平均每课时)</th></tr></thead></table><div class='panel-body'><table class='table table-border table-striped'><thead><tr><th>教师姓名</th><th>年级</th><th>科目</th><th>如e课时数</th><th>讲授课件页数<br/>(平均每课时)</th><th>互动次数<br/>(平均每课时)</th><th>提问次数<br/>(平均每课时)</th><th>点名次数<br/>(平均每课时)</th><th>出题次数<br/>(平均每课时)</th><th>拍照次数<br/>(平均每课时)</th><th>批注次数<br/>(平均每课时)</th></tr></thead><tbody>";

		    	for(var i in dataArr){
		    		nameData.push(dataArr[i].teacherName);
		    		pageArr.push(dataArr[i].ave_ppt);
		    		interArr.push(dataArr[i].ave_interaction);
		    		tiwenArr.push(dataArr[i].ave_question);
		    		callArr.push(dataArr[i].ave_callName);
		    		questArr.push(dataArr[i].ave_xiti);
		    		photoArr.push(dataArr[i].ave_photo);
		    		pizhuArr.push(dataArr[i].ave_postil);
//		    		html += "<tr><td>"+ dataArr[i].teacherName +"</td><td>"+ dataArr[i].gradeName +"</td><td>"+ dataArr[i].courseName +"</td><td>"+ dataArr[i].ruyiNum +"</td><td>"+ dataArr[i].ave_ppt +"</td><td>"+ dataArr[i].ave_interaction +"</td><td>"+ dataArr[i].ave_question +"</td><td>"+ dataArr[i].ave_callName +"</td><td>"+ dataArr[i].ave_xiti +"</td><td>"+ dataArr[i].ave_award +"</td><td>"+ dataArr[i].ave_photo +"</td><td>"+ dataArr[i].ave_postil +"</td></tr>"
		        }
		    	indexChart2(nameData,pageArr,interArr,tiwenArr,callArr,questArr,rewardArr,photoArr,pizhuArr);
//		    	html += "</tbody></table></div></div>";
//		    	$('.countInfo').html(html);
		    	layer.msg('数据请求成功');
		    });
	   }else if(page == '2'){
	   		$data.getReport3(dayfrom,dayto,days,schoolid,function(out){
		    	var dataArr = out.data;
//		    	console.log(dataArr)
				$(".panel-header").html("教师课堂教学动作时长比例表");
//		    	html = "<div class='panel-header'>教师课堂教学动作时长比例表</div><table class='table table-border table-striped fixed-Rep'><thead><tr><th>教师姓名</th><th>年级</th><th>科目</th><th>如e课时数</th><th>讲授课件时长比例<br/>(平均每课时)</th><th>提问时长比例<br/>(平均每课时)</th><th>出题时长比例<br/>(平均每课时)</th><th>其他如e时长比例<br/>(平均每课时)</th><th>非如e时长比例<br/>(平均每课时)</th></tr></thead></table><div class='panel-body'><table class='table table-border table-striped'><thead><tr><th>教师姓名</th><th>年级</th><th>科目</th><th>如e课时数</th><th>讲授课件页数</th><th>互动次数</th><th>提问次数</th><th>点名次数</th><th>出题次数</th></tr></thead><tbody>";
				var nameData = [];
				var teachArr = [];
				var askArr = [];
				var xitiArr = [];
				var elseArr = [];
				var noArr = [];
				var bAdd = true;
		    	for(var i in dataArr){
		    		if(parseInt(dataArr[i].ave_ppt_ratio) == 0 && parseInt(dataArr[i].ave_handon_ratio) == 0 && parseInt(dataArr[i].ave_xiTi_ratio) == 0 && parseInt(dataArr[i].ave_qtruyi_radio) == 0 && parseInt(dataArr[i].ave_noruyi_ratio) == 0){
		    			bAdd = false;
		    		}
		    			
					if(bAdd){
						nameData.push(dataArr[i].teacherName);
			    		teachArr.push(parseFloat(dataArr[i].ave_ppt_ratio).toFixed(2)-0);
			    		askArr.push(parseFloat(dataArr[i].ave_handon_ratio).toFixed(2)-0);
			    		xitiArr.push(parseFloat(dataArr[i].ave_xiTi_ratio).toFixed(2)-0);
			    		elseArr.push(parseFloat(dataArr[i].ave_qtruyi_radio).toFixed(2)-0);
			    		noArr.push(parseFloat(dataArr[i].ave_noruyi_ratio).toFixed(2)-0);
					}
		    		bAdd = true;
//		    		html += "<tr><td>"+ dataArr[i].teacherName +"</td><td>"+ dataArr[i].gradeName +"</td><td>"+ dataArr[i].courseName +"</td><td>"+ dataArr[i].lessonNums +"</td><td>"+ dataArr[i].ave_ppt_ratio +"</td><td>"+ dataArr[i].ave_handon_ratio +"</td><td>"+ dataArr[i].ave_xiTi_ratio +"</td><td>"+ dataArr[i].ave_qtruyi_radio +"</td><td>"+ dataArr[i].ave_noruyi_ratio +"</td></tr>";
		    	}
//		    	html += "</tbody></table></div></div>";
//		    	$('.countInfo').html(html);
				indexChart3(nameData,teachArr,askArr,xitiArr,elseArr,noArr);
		    	layer.msg('数据请求成功');
//		    	console.log(out)
		    });
	   }else if(page == '3'){
	   		$data.getReport4(dayfrom,dayto,days,schoolid,function(out){
		    	var dataArr = out.data;
		    	console.log(dataArr)
		    	$(".panel-header").html("教师课堂互动均衡度统计表");
//		    	html = "<div class='panel-header'>教师课堂互动均衡度统计表</div><table class='table table-border table-striped fixed-Rep'><thead><tr><th>姓名</th><th>年级</th><th>科目</th><th>如e课时数</th><th>学生课均参与互动均衡度</th><th>学生课均被点名均衡度</th><th>学生课均获奖励均衡度</th></tr></thead></table><div class='panel-body'><table class='table table-border table-striped'><thead><tr><th>姓名</th><th>年级</th><th>科目</th><th>如e课时数</th><th>学生课均参与互动均衡度</th><th>学生课均被点名均衡度</th><th>学生课均获奖励均衡度</th></tr></thead><tbody>";
		    	var nameData = [];
		    	var interArr = [];
		    	var callArr = [];
		    	var rewardArr = [];
		    	for(var i in dataArr){
		    		nameData.push(dataArr[i].teacherName);
		    		interArr.push(dataArr[i].ave_interaction);
		    		callArr.push(dataArr[i].ave_callName);
		    		rewardArr.push(dataArr[i].ave_award);
//		    		html += "<tr><td>"+ dataArr[i].teacherName +"</td><td>"+ dataArr[i].gradeName +"</td><td>"+ dataArr[i].courseName +"</td><td>"+ dataArr[i].ruyiNum +"</td><td>"+ dataArr[i].ave_interaction +"</td><td>"+ dataArr[i].ave_callName +"</td><td>"+ dataArr[i].ave_award +"</td></tr>"
		    	}
		    	indexChart4(nameData,interArr,callArr,rewardArr);
//		    	html += "</tbody></table></div></div>";
//		    	$('.countInfo').html(html);
		    	layer.msg('数据请求成功');
//		    	console.log(out)
		    });
	   }else if(page == '4'){
	   		$data.getReport5('20170500','20170531','32',schoolid,function(out){
		    	var dataArr = out.data.dataList;
		    	console.log(dataArr)
		    	$(".panel-header").html("班级学生互动表现统计表");
//		    	html = "<div class='panel-header'>班级学生互动表现统计表</div><table class='table table-border table-striped fixed-Rep'><thead><tr><th>班级</th><th>学生数</th><th>课表课时数</th><th>如e课时数</th><th>课均互动次数</th><th>课均互动参与度</th><th>课均不活跃学生数</th><th>课均参与互动均衡度</th></tr></thead></table><div class='panel-body'><table class='table table-border table-striped'><thead><tr><th>姓名</th><th>年级</th><th>科目</th><th>课表课时数</th><th>如e课时数</th><th>如e课时数比例</th><th>课堂积分</th><th>课均积分</th></tr></thead><tbody>";
		    	for(var i=0;i < dataArr.length;i++){
//		    		html += "<tr><td>"+ dataArr[i].classname +"</td><td>"+ dataArr[i].studentnum +"</td><td>"+ dataArr[i].classNum +"</td><td>"+ dataArr[i].ruyinum +"</td><td>"+ dataArr[i].ave_interaction +"</td><td>"+ dataArr[i].ave_takePart +"</td><td>"+ dataArr[i].ave_noActive +"</td><td>"+ dataArr[i].ave_balance +"</td></tr>"
		    	}
//		    	html += "</tbody></table></div></div>";
//		    	$('.countInfo').html(html);
				indexChart5();
		    	layer.msg('数据请求成功');
		    	console.log(out)
		    });
	   }else if(page == '5'){
	   		$data.getReport6(dayfrom,dayto,days,schoolid,function(out){
		    	var dataArr = out.data.dataList;
//		    	console.log(dataArr)
				$(".panel-header").html("年级和科目学生互动表现统计表");
//		    	html = "<div class='panel-header'>年级和科目学生互动表现统计表</div><table class='table table-border table-striped fixed-Rep'><thead><tr><th>年级</th><th>科目</th><th>课表课时数</th><th>如e课时数</th><th>课均互动次数</th><th>课均互动参与度</th><th>课均不活跃学生数</th><th>课均参与互动均衡度</th></tr></thead></table><div class='panel-body'><table class='table table-border table-striped'><thead><tr><th>姓名</th><th>年级</th><th>科目</th><th>课表课时数</th><th>如e课时数</th><th>如e课时数比例</th><th>课堂积分</th><th>课均积分</th></tr></thead><tbody>";
		    	for(var i=0;i < dataArr.length;i++){
//		    		html += "<tr><td>"+ dataArr[i].gradeName +"</td><td>"+ dataArr[i].coursename +"</td><td>"+ dataArr[i].classNum +"</td><td>"+ dataArr[i].ruyinum +"</td><td>"+ dataArr[i].ave_interaction +"</td><td>"+ dataArr[i].ave_takePart +"</td><td>"+ dataArr[i].ave_noActive +"</td><td>"+ dataArr[i].ave_balance +"</td></tr>"
		    	}
//		    	html += "</tbody></table></div></div>";
//		    	$('.countInfo').html(html);
				indexChart6();
		    	layer.msg('数据请求成功');
		    	console.log(out)
		    });
	   }
	}
	
  function init(){
    var d = getPreviousMonthStartEnd(0);
    getNowMonth();    //设置日期
	var sF = $("#dayfrom").val();
	var sT = $("#dayto").val();
	sF = new Date(sF.replace(/-/g, "/"));
	sT = new Date(sT.replace(/-/g, "/"));
	var days = sT.getTime() - sF.getTime();
	days= parseInt(days / (1000 * 60 * 60 * 24)) + 1;
    
    //设置导航栏颜色
    var page = $('body').attr('data-page');
    page = page*1;
    $('.content-body .cb-left .menu li').removeClass('active').eq(page).addClass('active');
    //获取报表数据
    getReportData(d.start,d.end,days);
    
    //初始化下拉箭头，使其展开
    $('.content-body .cb-left .menu').height('248px');
    isFold = true;
    $('.content-body .cb-left ul li i').html("&#xe6d5");
  }
  
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
    //初始化数据报表
    init();
  })	
</script>