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
<link href="<?php echo (MANAGE); ?>static/h-ui/css/app.css?o=1212326" rel="stylesheet" type="text/css"/>
<!--[if lt IE 9]>
<link href="static/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style type="text/css">
	.tab-list{background-color:#245BDF ;border-radius:10px 10px 0 0 ;}
	.tools-list{height: 100%;}
	.tools-list .left{margin: 6px 15px;}
	.tools-list .left .o-list{background: #fff;color: #245BDF;}
	.tools-list .left .o-list ul{width: 100px;top:-2px;background: #F5F5F5;box-shadow: 0 2px 4px 0 rgba(0,0,0,0.30);}
    .tools-list .left .o-list ul li:nth-of-type(1){margin-top:10px ;}
    .tools-list .left .o-list ul li{background: #FDFEFF;color: #4A4A4A;}
    .tools-list .left .o-list ul li:hover{background: #3470FF;color: #fff;}
    .tools-list .left .o-list ul .active{background: #3470FF;color: #fff;}
    .tools-list .left .o-list ul li{border-bottom: 1px solid #f5f5f5;}

    .tools-list .subSelEvent{display: none;}
    
    .tab-art table th span{
    	font-size: 13px;
	    color: #979797;
	    letter-spacing: 0;
    }
    .tab-art table td span{cursor: pointer;}
    .tab-art table td{position: relative;}
    .StuTips{
    	    position: absolute;
    	    width: 380px;
    	    display: none;
    	    max-height: 296px;
    		overflow-y: scroll;
    	    left: 201px;
    	    z-index: 1;
    	    background:#fff;
    	    transform: translateY(-58%);
    	    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.50);
    }
    td .arrow{
    		position: absolute;
    		top:50%;
    		left: 59%;
    		display: none;
    		transform:translateY(-10px);
    	    width: 0;
		    height: 0;
		    border-top: 10px solid transparent;
		    border-right: 15px solid #ccd4cd;
		    border-bottom: 10px solid transparent;
    }
    .StuTips>table tr>.thStu{
    	background: #3470FF;
    	color: #fff;
    }
    .StuTips table th{
    	height: 20px;
    }
    .StuTips table td{
    	height: 20px;
    }
    #tablebox{position: relative;}
    #tablebox .RankBtn{
    	position: absolute;
	    right: 0;
	    top: -38px;
	    color: #fff;
	    cursor: pointer;
	    border: none;
    }
    
    .tab-art table .StuRank{
    	position: absolute;
    	border: 0;
    	display: none;
    	/*display: block;*/
    	width: 280px;
        left: 578px;
    	top: -150px;
    	height: 300px;
    	overflow-y: scroll;
    	direction: rtl; 
    	unicode-bidi: bidi-override;
    }
    .arrowRank{
    	width: 0;
	    height: 0;
	    position: absolute;
	    display: none;
	    top: 7px;
	    left: 11px;
	    transform:translateX(-10px);
	    border-top: 10px solid transparent;
	    border-left: 10px solid #f9f9f9;
	    border-bottom: 15px solid transparent;
    }
    .StuRank .table{
    	background: #fff;
    }
    .StuRank>table tr>.thStu{
    	background: #3470FF;
    	color: #fff;
    }
    .StuRank table th{
    	height: 20px;
    }
    .StuRank table td{
    	height: 20px;
    }
</style>
<title>如e教学管理系统</title>
<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/jquery.browser.min.js"></script> 
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/H-ui.min.js"></script> 

<script type="text/javascript" src="<?php echo (MANAGE); ?>lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/data.js?id=126"></script>
<script type="text/javascript" src="<?php echo (MANAGE); ?>static/h-ui/js/app.js?id=126"></script>
</head>
<body class-id="<?php echo ($classId); ?>" time-data="<?php echo ($arr["time"]); ?>">
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
  	   <div class="course-info-box"><font>时间：</font><?php echo ($arr["time"]); ?><br/>
  	   	 <font>章节：</font> <?php echo ($arr["chapter"]); ?>  	<!--<a class="a-btn">设置</a>  --> 	
  	   </div>
  	   <div class="course-fansi-box">
  	   	  <div class="title">课堂反思</div>
  	   	  <div class="fansi-box">
  	   	     <div class="level-box">
  	   	       <div class="left">自我评价</div>
  	   	       <div class="cneter">
  	   	       	   <div class="level">
  	   	       	   	<div class="clearfix">
											<span class="f-l f-14 va-m">达成目标：</span>
											<div class="star-bar star-bar-show size-M f-l va-m mr-10">
												<?php echo ($pjarr["s1"]); ?>
											</div>
										</div>
  	   	       	   </div> 
  	   	       	   <div class="level">
  	   	       	   	<div class="clearfix">
											<span class="f-l f-14 va-m"> 课堂气氛：</span>
											<div class="star-bar star-bar-show size-M f-l va-m mr-10">
												<?php echo ($pjarr["s2"]); ?>
											</div>
										</div>
  	   	       	   </div>
  	   	       	   <div class="level">
  	   	       	   	<div class="clearfix">
											<span class="f-l f-14 va-m"> 教学质量：</span>
											<div class="star-bar star-bar-show size-M f-l va-m mr-10">
												<?php echo ($pjarr["s3"]); ?>
											</div>
										</div>
  	   	       	   </div>
  	   	       	   <div class="level">
  	   	       	   	<div class="clearfix">
											<span class="f-l f-14 va-m"> 知识拓展：</span>
											<div class="star-bar star-bar-show size-M f-l va-m mr-10">
												<?php echo ($pjarr["s4"]); ?>
											</div>
										</div>
  	   	       	   </div>
  	   	       </div>
  	   	       <div class="rigth">
  	   	       	   
  	   	       </div>
  	   	     </div>
  	   	     <div class="summary-box">
  	   	     	<div class="left">课堂总结</div>
  	   	     	<div class="right">
  	   	     		<div class="textarea1"><?php echo ($pjarr["art"]); ?></div> 
  	   	     	</div>
  	   	     </div>
  	   	     
  	   	  </div>
  	   	  
  	   	  <div class="timeline-box">
  	   	      <div class="title">时光轴</div>
  	   	      <div class="timeline">
  	   	         <div class="timeline-body">
  	   	         	 <div class="top" style="width:<?php echo ($arr["w"]); ?>px; min-width:800px">
                     <?php echo ($arr["timeline"]); ?>
  	   	         	 	 
  	   	         	 </div>
  	   	         	 <div class="bottom" style="width:<?php echo ($arr["w"]); ?>px;"></div>
  	   	         </div>
  	   	      </div>
  	   	  </div>
  	   	  
          <div class="tab-box">
              <div class="title">课堂回顾</div>
              <div class="tab-list">
              	<div class="tools-list">	
	              	<div class="left leftEvent">
	              		<div class="o-list">
	              			<font>
	              				重点关注
	              				<i class="Hui-iconfont">&#xe6d5;</i>
	              			</font>
	              			<ul>
	              				<li class="active">重点关注</li>
	              				<li>拍照截图</li>
	              				<li>课堂习题</li>
	              				<li>课堂提问</li>
	              				<li>课件</li>
	              				<li>批注</li>
	              				<li>点名统计</li>
	              				<li>奖励统计</li>
	              				<li>习题统计</li>
	              				<li>手写板</li>
	              				<li>视频回顾</li>
	              				<li>分组竞赛</li>
	              				<li>投票选举</li>
	              				<li>课堂抢答</li>
	              			</ul>
	              		</div>
	              	</div>
	              	<div class="left subSelEvent">
	              		<div class="o-list">
	              			<font>
	              				第1次
	              				<i class="Hui-iconfont">&#xe6d5;</i>
	              			</font>
	              			<ul>
	              				<li class="active">第1次</li>
	              				<li >第2次</li>
	              				<li >第3次</li>
	              				<li >第4次</li>
	              			</ul>
	              		</div>
	              	</div>
              	</div>
                 <!--<div class="tab active" data-v="0" style="border-radius: 10px 0 0 0">重点关注</div>
                 <div class="tab" data-v="1">拍照/截图</div>
                 <div class="tab" data-v="2">课堂习题</div>
                 <div class="tab" data-v="3">课堂提问</div>
                 <div class="tab" data-v="4">课件</div>
                 <div class="tab" data-v="5">批注</div>
                 <div class="tab" data-v="6" style="border-radius: 0 10px 0 0">手写板</div>-->
              </div>
              <div class="tab-art ">
               <table style="width:958px; margin-left:1px; display:none" id="tablebox"> 
                </table>
                 <div class="text-art">
                    <div class="title red">本堂课重点</div>
                    <div class="box redtext">
                       不活跃的同学：<font><?php echo ($arr["NoActive"]); ?></font><br/>                     
                      互动反应速度前三名：<font><?php echo ($arr["fastest"]); ?></font><br/>
                      互动反应速度后三名：<font><?php echo ($arr["slowest"]); ?></font><br/>
                      被点名最多的同学：<font><?php echo ($arr["callname"]); ?></font><br/>
                      被奖励最多的同学：<font><?php echo ($arr["reward"]); ?></font><br/>
                      答题全错的同学：<font><?php echo ($arr["wronganswer"]); ?></font>
                    </div>
                 </div>
                 <div class="text-art">
                    <div class="title blue">本堂课重点</div>
                    <div class="box bluetext">
                       下堂课建议点名的同学：<font><?php echo ($arr["nextCallname"]); ?></font> <br/>
                       下堂课建议奖励的同学：<font><?php echo ($arr["nextReward"]); ?></font>
                    </div>
                 </div>
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
    var lessonid = "<?php echo ($arr["lessonid"]); ?>";
    coursefc(lessonid);
    $(".back").off().on("click",function(){
        window.history.back();
//      $fc.goURL("../../indexinfo/schoolid/"+localStorage.schoolid+"/teacherid/"+localStorage.teacherid);
    })
    
    $(".a-btn").off().on("click",function(){        
        SetStar(lessonid);
    })
    var tabBtn = true;
	var ul = $('.tools-list>.leftEvent>.o-list ul');
	var h = ul.height();
	$(".tools-list>.subSelEvent>.o-list>ul").on('mouseleave',function(){
		$(".tools-list>.subSelEvent>.o-list>ul").animate({
			height:"0px"
		},300);
		tabBtn = true;
	})
	$(ul).on('mouseleave',function(){
		ul.animate({
			height:"0px"
		},300);
		tabBtn = true;
	})
	var pathStr = "";     //图片路径目录
	var date = "<?php echo ($arr["time"]); ?>";
	date = date.replace(/-/g,'/');
	date = date.substring(0,10);
	date = "2017/07/12";
//  date = insert_flg(date,"/",4);
//  date = insert_flg(date,"/",7);
//  console.log(date)
    pathStr = "http://api.skyeducation.cn/EduApi/upload/" + date + "//";
	$(".tools-list>.subSelEvent>.o-list").on("mouseenter",function(){
    		var li = $(".tools-list>.subSelEvent>.o-list>ul").children("li"); 
//  		console.log(li.length)
    		if(tabBtn && li.length > 1){
				h = 31*(li.length)+20;
//				console.log(h)
				$(".tools-list>.subSelEvent>.o-list>ul").animate({
					height:h+"px"
				},300,function(){ //回掉函数
					tabBtn = false;
					li.off().on("click",function(){	
						var preIndex = $('.tools-list>.leftEvent>.o-list ul .active').index();
						var v = $(this).index();
						var lessonid = "<?php echo ($arr["lessonid"]); ?>";
						var classid = "<?php echo ($classId); ?>";
						$(this).addClass("active").siblings().removeClass("active");
        				$('.tools-list .subSelEvent .o-list font').html($(this).html()+"<i class=\"Hui-iconfont\">&#xe6d5;</i>");
					  	$(".tools-list>.subSelEvent>.o-list>ul").animate({
							height:"0px"
						},300);
						tabBtn = true;
						if(preIndex == 11){
								var str = '<tbody><tr><th>排名</th><th>组别</th><th>分数</th></tr>';
					          	classid = 1672;
					          	lessonid = 14615;
					          	$data.getGroupRaceStatistics(lessonid,classid,function(out){
					          		var data = out.data.dataList;
					          		var m = 0;
//					          		$('.tools-list .subSelEvent .o-list ul').html("");
					          		for(var k = 0;k < data.length;k++){
					          			m++;
					          			if(m == v){
					          				for(var n = 0;n < data[v].groupMaps.length;n++){
							          			str += "<tr><td>"+ data[v].groupMaps[n].ranking +"</td><td>第"+ data[v].groupMaps[n].group +"组</td><td>"+ data[v].groupMaps[n].grade +"</td></tr>";	
					          				}
					          			}else if(v == 0 && m == 1){
					          				for(var n = 0;n < data[0].groupMaps.length;n++){
							          			str += "<tr><td>"+ data[0].groupMaps[n].ranking +"</td><td>第"+ data[0].groupMaps[n].group +"组</td><td>"+ data[0].groupMaps[n].grade +"</td></tr>";	
					          				}
					          			}
					          		}
					          		str += "</tbody>";
					          		$("#tablebox").html(str);
					          	})		
						}else if(preIndex == 12){
								str = '<tbody><tr><th>字母</th><th>选项</th><th>票数</th></tr>';
					          	classid = 1767;
					          	lessonid = 14618;
					          	$data.getVoteStatistics(lessonid,classid,function(out){
					          		var data = out.data.dataList;
					          		var m = 0;
					          		for(var k = 0;k < data.length;k++){
					          			m++;
					          			if(m == v){
					          				for(var n in data[v].answerPoll){
												str += "<tr><td>"+ n +"</td><td>"+ data[v].answerValue[n] +"</td><td>"+ data[v].answerPoll[n] +"</td></tr>";	
											}
						          		}else if(v == 0 && m == 1){
						          				for(var n in data[0].answerPoll){
													str += "<tr><td>"+ n +"</td><td>"+ data[0].answerValue[n] +"</td><td>"+ data[0].answerPoll[n] +"</td></tr>";	
												}
						          		}
					          		}
					          		str += "</tbody>";
					          		$("#tablebox").html(str);
					          	})
						}
					});
				})
			}
	})
    $(".tools-list>.leftEvent>.o-list").on("mouseenter",function(){
    		var li = ul.children("li");
    		if(tabBtn){
				h = 31*(li.length)+20;
				ul.animate({
					height:h+"px"
				},300,function(){ //回掉函数
					tabBtn = false;
					li.off().on("click",function(){	
						var v = $(this).index();
						var lessonid = "<?php echo ($arr["lessonid"]); ?>";
						var classid = "<?php echo ($classId); ?>";
						
//						lessonid = "14321";
//						classid = "1783";
						
						if(v > 10 && v < 13){
							$('.tools-list .subSelEvent').show();
						}else{
							$('.tools-list .subSelEvent').hide();
						}
						
						console.log(classid)
						if(v < 6){		
							$mc.GetLessonEle(v,lessonid);
						}else if(v ==6){         //点名统计
							$("#tablebox").show();
				          	$('.tab-art .text-art').hide();
				          	lessonid = 14078;
				          	classid = 1677;
				          	$data.getCallnameStatistics(lessonid,classid,function(out){
				          		str = '<tbody><tr><th>学生列表</th><th>被点次数<span>(点名覆盖率：'+ out.data.coverage +')</span></th></tr>';
				          		var data = out.data.dataList;
				          		for(var k = 0;k < data.length;k++){
				          			str += "<tr><td>"+ data[k].name +"</td><td>"+ data[k].num +"</td></tr>";
				          		}
				          		str += "</tbody>";
				          		$("#tablebox").html(str);
				          	})	
						}else if(v == 7){         //奖励统计
							$("#tablebox").show();
				          	$('.tab-art .text-art').hide();
				          	
				          	$data.getAwardStatistics(lessonid,classid,function(out){
				          		console.log(out)
				          		str = '<tbody><tr><th>学生列表</th><th>奖励次数<span>(奖励覆盖率：'+ out.data.coverage +')</span></th></tr>';
				          		var data = out.data.dataList;
				          		for(var k = 0;k < data.length;k++){
				          			str += "<tr><td>"+ data[k].name +"</td><td>"+ data[k].num +"</td></tr>";
				          		}
				          		str += "</tbody>";
				          		$("#tablebox").html(str);
				          	})	
						}else if(v == 8){          //习题统计
							$("#tablebox").show();
				          	$('.tab-art .text-art').hide();
				          	lessonid = 14321;
				          	classid = 1783;
				          	$data.getXitiStatistics(lessonid,classid,function(out){
				          		str = '<tbody><tr><th>习题序号</th><th>正确率<span>(平均正确率：'+ out.data.accuracys +')</span></th><th>参与率<span>(平均参与率：'+ out.data.takeParts +')</span></th></tr>';
				          		var data = out.data.dataList;
				          		console.log(data)
				          		var i = 0;
				          		for(var k = 0;k < data.length;k++){ 		
				          			var praxisInfo = data[k];
				          			console.log(praxisInfo);
						            var trues = praxisInfo.trues.length == 0 ? "" : praxisInfo.trues.replace(/=/g, ":").replace(/:([\u4e00-\u9fa5\s]+),/g, ":\"$1\",").replace(/:([A-Za-z]+)\}/g, ":\"$1\"\}")
						            var falses = praxisInfo.falses.length == 0 ? "" : praxisInfo.falses.replace(/=/g, ":").replace(/:([\u4e00-\u9fa5\s]+),/g, ":\"$1\",").replace(/:([A-Za-z]+)\}/g, ":\"$1\"\}")

						            if(trues == ""){
						            	trues = "[]";
						            }
						            var arrTrue = eval("(" + trues + ")");;
						            var arrFalse = eval("(" + falses + ")");
						            var htmlStr = "";
						            var len = arrTrue.length >= arrFalse.length ? arrTrue.length : arrFalse.length;
						            
						            for(var j = 0;j < arrFalse.length;j++){
						            	arrFalse[j].answer = "(" + arrFalse[j].answer + ")";
						            }
						            
						            if(arrTrue.length < arrFalse.length){
						            	var tempDec1 = arrFalse.length - arrTrue.length;
						            	for(var m = 0;m < tempDec1;m++){
						            		arrTrue.push({'name':''});
						            	}	            	
						            }else{
						            	var tempDec2 = arrTrue.length - arrFalse.length;
						            	for(var n = 0;n < tempDec1;n++){
						            		arrFalse.push({'name':'','answer':''});
						            	}						            	
						            }
//						            console.log(arrTrue)
//						            console.log(arrFalse)
						            
						            
						            for(var i = 0;i < len;i++){
						            	htmlStr += "<tr><td class='text-c'>"+ arrTrue[i].name +"</td><td class='text-c'>"+ arrFalse[i].name  + arrFalse[i].answer  +"</td></tr>"; 
						            }
						            
				          			str += "<tr><td>" + data[k].nums + "(" +data[k].answer + ")" +"</td><td><span>"+ data[k].accuracy +"</span><div class='arrow'></div><div class='StuTips'><table class='table table-border table-striped radius'><thead><tr><th class='thStu'>正确</th><th class='thStu'>错误</th></tr></thead><tbody>"+ htmlStr +"</tbody></table></div></td><td>"+ data[k].takePart  +"</td></tr>";
				          		}
				          		
				          		var RankLen = out.data.stuaccuracys.length;
				          		var RankData = out.data.stuaccuracys;
				          		str += "<td class='RankBtn'>正确率排行榜<div class='arrowRank'></div></td><td class='StuRank'><table class='table table-border table-striped radius'><thead><tr><th class='thStu'>姓名</th><th class='thStu'>个人正确率</th></tr></thead><tbody>";
				          		for(var t = 0;t < RankLen;t++){
				          			str += "<tr><td class='text-c'>"+ RankData[t].name +"</td><td class='text-c'>"+ RankData[t].accuracy +"</td></tr>";
				          		}
				          		
				          		str += "</tbody></table></td></tr></tbody>";
				          		$("#tablebox").html(str);
				          		
				          		$("[data-toggle='tooltip']").tooltip();
				          		$('body').off().on('click',function(){
				          			$(".StuTips").hide();
				          			$(".arrow").hide();
				          		});
				          		$(".tab-art table td span").off().on("click",function(e){
				          			$(".StuTips").hide();
				          			$(".arrow").hide();
									e.stopPropagation();
				          			$(this).siblings(".StuTips").show();
				          			$(this).siblings(".arrow").show();
				          		});
				          		
				          		$('#tablebox .RankBtn').off().on('click',function(e){
				          			$('.StuRank').toggle();
				          			$('.arrowRank').toggle();
				          			e.stopPropagation(e);
				          		});
				          	})	
						}else if(v == 9){         //手写板
								$("#tablebox").show();
					          	$('.tab-art .text-art').hide();
					          	lessonid = 13737;
					          	classid=1672;
					          	pathStr = "http://api.skyeducation.cn/EduApi/upload/2017/05/26//";
					          	str = '<tbody><tr><th>学生列表</th><th>答题记录</th></tr>';
					          	$data.getRobertPen(lessonid,classid,function(out){
						          		console.log(out)
						          		var data = out.data.dataList;
						          		var dataArr = new Array;
						          		var i = 0;
						          		for(var k in data){
						          			var temp = data[k].split("|");
						          			dataArr.push(temp);
						          			str += "<tr><td>"+ k +"</td><td>"+ temp.length +"张记录，<a href='##'>查看详情</a></td></tr>";
						          		}
						          		str += "</tbody>";
						          		$("#tablebox").html(str);
						          		$("#tablebox a").off().on('click',function(){
															var index = $(this).parent().parent().index();
															var myJson = {
																				      "title": "", //相册标题
																				      "id": 123, //相册id
																				      "start": 0, //初始显示的图片序号，默认0
																				      "data": []
																				   };
						
															var tempJ = {};
						          				for(var i=0;i<dataArr[index-1].length;i++){
						          						tempJ = {};
						          						tempJ = {
																			      "alt": "当前图片" + (i+1),
																			      "pid": i, //图片id
																			      "src": pathStr + dataArr[index-1][i], //原图地址
																			      "thumb":"" //缩略图地址
																			    }
						          						myJson.data.push(tempJ);
						                 }
															layer.photos({
													        photos: myJson,
													        shift: 5,    //0-6选择
													        area:['700px','400px'],
													    });
						          				
						          		})
						          	})				
						}else if(v == 10){         //视频回顾
								$("#tablebox").show();
					          	$('.tab-art .text-art').hide();
					          	str = '<tbody><tr><th>视频</th><th>名称</th><th>时间</th></tr>';
					          	lessonid = 14625;
					          	classid=1672;
					          	pathStr = "http://api.skyeducation.cn/EduApi/upload/2017/07/19//";
					          	$data.getVideoEvent(lessonid,classid,function(out){
					          		console.log(out)
					          		var data = out.data.dataList;
					          		var ctime = "";
					          		for(var k = 0;k < data.length;k++){ 
										console.log(k);
										ctime = data[k].createtime;
										ctime = insert_flg(ctime,'年',4);
										ctime = insert_flg(ctime,'月',7);
										ctime = insert_flg(ctime,'日',10);
										ctime = insert_flg(ctime,':',13);
										ctime = insert_flg(ctime,':',16);
										console.log(data[k])
										console.log(ctime)
					          			str += "<tr><td><video width='159px' height='108px' src='"+ pathStr + data[k].filename +"' controls='controls'></video></td><td>"+ data[k].filename +"</td><td>"+ ctime +"</td></tr>";
					          		}
					          		str += "</tbody>";
					          		$("#tablebox").html(str);
					          		
					          	})
						}else if(v == 11){         //分组竞赛
								$("#tablebox").show();
					          	$('.tab-art .text-art').hide();
					          	str = '<tbody><tr><th>排名</th><th>组别</th><th>分数</th></tr>';
					          	classid = 1672;
					          	lessonid = 14615;
					          	$data.getGroupRaceStatistics(lessonid,classid,function(out){
					          		console.log(out)
					          		var data = out.data.dataList;
					          		var m = 0;
					          		$('.tools-list .subSelEvent .o-list ul').html("");
					          		for(var k = 0;k < data.length;k++){
					          			++m;
					          			$('.tools-list .subSelEvent .o-list ul').html($('.tools-list .subSelEvent .o-list ul').html() + "<li>第"+m+"次</li>");
					          			if(m == 1){
					          				for(var n = 0;n < data[0].groupMaps.length;n++){
					          					console.log(n)
							          			str += "<tr><td>"+ data[0].groupMaps[n].ranking +"</td><td>第"+ data[0].groupMaps[n].group +"组</td><td>"+ data[0].groupMaps[n].grade +"</td></tr>";	
					          				}
					          			}
//					          			var temp = data[k].split("|");
//					          			dataArr.push(temp);
//					          			str += "<tr><td>"+ k +"</td><td>"+ temp.length +"张记录，<a href='##'>查看详情</a></td></tr>";
					          		}
					          		str += "</tbody>";
					          		$("#tablebox").html(str);
					          	})				
						}else if(v == 12){         //投票选举
								$("#tablebox").show();
					          	$('.tab-art .text-art').hide();
					          	str = '<tbody><tr><th>字母</th><th>选项</th><th>票数</th></tr>';
					          	classid = 1767;
					          	lessonid = 14618;
					          	$data.getVoteStatistics(lessonid,classid,function(out){
					          		console.log(out)
					          		var data = out.data.dataList;
									var m = 0;
									$('.tools-list .subSelEvent .o-list ul').html("");
									for(var k = 0;k < data.length;k++){
										++m;
										$('.tools-list .subSelEvent .o-list ul').html($('.tools-list .subSelEvent .o-list ul').html() + "<li>第"+m+"次</li>");
										if(m == 1){
											for(var n in data[0].answerPoll){
												console.log(n)
												str += "<tr><td>"+ n +"</td><td>"+ data[0].answerValue[n] +"</td><td>"+ data[0].answerPoll[n] +"</td></tr>";	
											}
										}
									}
					          		str += "</tbody>";
					          		$("#tablebox").html(str);
					          	})				
						}else if(v == 13){         //课堂抢答
								$("#tablebox").show();
					          	$('.tab-art .text-art').hide();
					          	str = '<tbody><tr><th>抢答学生</th><th>时间</th></tr>';
					          	classid = 1672;
					          	lessonid = 14594;
					          	var showTime = $('body').attr("time-data");
					          	showTime = showTime.substring(0,10);
					          	showTime = showTime.replace('-','年');
					          	showTime = showTime.replace('-','月');
					          	showTime += "日";
					          	console.log(showTime);
					          	$data.getCompetitiveStatistics(lessonid,classid,function(out){
					          		var data = out.data.dataList;
					          		for(var k = 0;k < data.length;k++){
					          			str += "<tr><td>"+ data[k].stuName +"</td><td>"+ showTime + "&nbsp&nbsp&nbsp" + data[k].ctime +"</td></tr>";
					          		}
					          		str += "</tbody>";
					          		$("#tablebox").html(str);
					          	})				
						}
						$(this).addClass("active").siblings().removeClass("active");
        				$('.tools-list .leftEvent .o-list font').html($(this).html()+"<i class=\"Hui-iconfont\">&#xe6d5;</i>");

					  	ul.animate({
							height:"0px"
						},300);
						tabBtn = true;
					});
				})
			}
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

//	$(function(){
//   //coursefc();
//    $(".back").off().on("click",function(){
//      window.history.back();
//    })
//    $(".tab").off().on("click",function(){
//        $(".tab").removeClass("active");
//        $(this).addClass("active");
//        var v = $(this).data("v");
//        var lessonid = "<?php echo ($arr["lessonid"]); ?>";
//        var classid = "<?php echo ($classId); ?>";
//        var pathStr = "";     //图片路径目录
//        var date = "<?php echo ($date); ?>";
//        date = insert_flg(date,"/",4);
//		      date = insert_flg(date,"/",7);
////		      date = "2017/05/26";    //测试日期 
//		      pathStr = "http://api.skyeducation.cn/EduApi/upload/" + date + "//";
//        var str = "";
//        if(v == 6){
////        	$data.getRobertPen('13737','1672',function(out){   //测试课程和班级id
////        		console.log(out)
////        	})
//						$("#tablebox").show();
//        	$('.tab-art .text-art').hide();
//        	str = '<tbody><tr><th>学生列表</th><th>答题记录</th></tr>';
//        	$data.getRobertPen(lessonid,classid,function(out){
//        		console.log(out)
//        		var data = out.data.dataList;
//        		var dataArr = new Array;
//        		var i = 0;
//        		for(var k in data){
//        			var temp = data[k].split("|");
//        			dataArr.push(temp);
//        			str += "<tr><td>"+ k +"</td><td>"+ temp.length +"张记录，<a href='##'>查看详情</a></td></tr>";
//        		}
//        		str += "</tbody>";
//        		$("#tablebox").html(str);
//        		$("#tablebox a").off().on('click',function(){
//									var index = $(this).parent().parent().index();
//									var myJson = {
//														      "title": "", //相册标题
//														      "id": 123, //相册id
//														      "start": 0, //初始显示的图片序号，默认0
//														      "data": []
//														   };
//
//									var tempJ = {};
//        				for(var i=0;i<dataArr[index-1].length;i++){
//        						tempJ = {};
//        						tempJ = {
//													      "alt": "当前图片" + (i+1),
//													      "pid": i, //图片id
//													      "src": pathStr + dataArr[index-1][i], //原图地址
//													      "thumb":"" //缩略图地址
//													    }
//        						myJson.data.push(tempJ);
//               }
//									layer.photos({
//							        photos: myJson,
//							        shift: 5,    //0-6选择
//							        area:['700px','400px'],
//							    });
//        				
//        		})
//        	})
//        	
//        	
//        }else{
//        	$mc.GetLessonEle(v,lessonid);
//        }
//    })
    
//  var name = $.browser.name;
//     if (name!="chrome" && name!="firefox") {        
//       var w = $(document).width();
//       var html ="<div class='browser-msg' style=\"left:"+((w-500)/2)+"px\">当前浏览器为IE或IE内核的浏览器可能出现部分功能不支持，建议使用谷歌或者火狐 <i class=\"Hui-iconfont\">&#xe60b;</i></div>"
//       $("body").append(html);
//       $(".browser-msg>.Hui-iconfont").off().on("click",function(){
//         $(".browser-msg").remove();
//       })
//    }
//		
//	})
	
</script>