var isFold = false;
$(function(){
	var h = $(window).height();
	$(".cb-left").css({"height":(h-61)+"px"});	
	$(".cb-right").css({"min-height":(h-61)+"px"});

    $(".header>.right").off().on("click",function(){
    	 var dis = $(this).children(".outlogin").css("display");
    	 if (dis=="none")  {
    	 	$(this).children(".outlogin").fadeIn().off().on("click",function(){
    	 		$.post("/index.php/Manage/Ajax/OutLogin",{},function(out){
    	 			console.log(out);
    	 			$fc.goURL("/index.php/Manage/Index/login");
    	 		})
    	 	});

      	} 
    	else $(this).children(".outlogin").fadeOut();
    })
    $('.content-body>.cb-left>ul>li').eq(4).off().on('click',function(){
    	if(!isFold){
    		$('.content-body .cb-left ul li i').html("&#xe6d5");
    		$('.menu').animate({height: '248px'}, "slow");
    		isFold = true;
    	}else{
    		$('.content-body .cb-left ul li i').html("&#xe6d7");
    		$('.menu').animate({height: '0px'}, "slow");
    		isFold = false;
    	}
		
    });
});


function indexchart(){		
	var week = $("body").attr("data-week");
	var month = $("body").attr("data-month");
	var d = getPreviousWeekStartEnd(week);
//	只获取近一个月的数据
	var m = getPreviousMonthStartEnd(month);

	//console.log(m.start)
	//console.log(m.end)

//	$mc.GetDateWeek(d.start,d.end);
//	$mc.GetDateMonth(m.start,m.end);
	
	//新改首页初始化一周数据
	$mc.GetStateDay(d.start,d.end);
	
    //给查看详情挂载点击事件
    $("#info").off().on("click",function(){
    	 var url = $(this).data("url");
         var day = $("body").attr("data-day");
     	 $fc.goURL(url+"/day/"+day+"/classid/0");
    })

}

function login(){
	 console.log($("#checkbox").is(':checked'));
	 var username = $("#username").val();
	 var password = $("#password").val();
	 if (username=="") layer.msg("请输入用户名或手机号");
	 else if (password=="")  layer.msg("请输入登录密码");
	 else{
	 	 $.post("../Ajax/Login",{
	 	 	"username":username,
	 	 	"password":password,
	 	 	"ismemory":$("#checkbox").is(':checked')
	 	 },function(out){
	 	 	if (out==0) layer.msg("用户名错误");
	 	 	else if (out==1)  layer.msg("密码错误");
	 	 	else
	 	 	{
	 	 	    $fc.goURL("index");
	 	 	}
	 	 })
	 }
}

$mc = {
	//获取使用课时
	 GetDateWeek:function(start,end){	 	
		var schoolid = $("body").data("schoolid");
		console.log(start,end);
		$data.weekdata(start,end,schoolid,function(out){
		   var arr = out.data.dayDataList;
		   var dateArr = new Array();
		   var dataArr = new Array();
		   $.each(arr,function(i,a){
		   	   dateArr.push($mc.SetDateWeek(i,a.day.toString()));	
		   	   dataArr.push(a.lessonCount);   	  
		   });
		   indexChart(dateArr,dataArr,1);
		})
	 },
	 //获取使用人数
	 GetWeekPerson:function(start,end){	 	
		var schoolid = $("body").data("schoolid");
		$data.weekdata(start,end,schoolid,function(out){
		   var arr = out.data.dayDataList;
		   var dateArr = new Array();
		   var dataArr = new Array();
		   console.log(arr)
		   $.each(arr,function(i,a){
		   	   dateArr.push($mc.SetDateWeek(i,a.day.toString()));	
		   	   dataArr.push(a.teacherNum);   	  
		   });
		   indexChart(dateArr,dataArr,0);
		})
	 },
	 //获取使用时长
	 GetWeekTime:function(start,end){	 	
		var schoolid = $("body").data("schoolid");
		$data.weekdata(start,end,schoolid,function(out){
		   var arr = out.data.dayDataList;
		   var dateArr = new Array();
		   var dataArr = new Array();
		   $.each(arr,function(i,a){
		   	   dateArr.push($mc.SetDateWeek(i,a.day.toString()));	
		   	   dataArr.push(a.minute);   	  
		   });
		   indexChart(dateArr,dataArr,2);
		})
	 },
	 //获取课堂互动
	 GetWeekInter:function(start,end){	 	
		var schoolid = $("body").data("schoolid");
		$data.weekdata(start,end,schoolid,function(out){
		   var arr = out.data.dayDataList;
		   var dateArr = new Array();
		   var dataArr = new Array();
		   console.log(arr)
		   $.each(arr,function(i,a){
		   	   dateArr.push($mc.SetDateWeek(i,a.day.toString()));	
		   	   dataArr.push(a.countNum);   	  
		   });
		   indexChart(dateArr,dataArr,3);
		})
	 },
	 GetMonthPerson:function(start,end){	 	
		var schoolid = $("body").data("schoolid");
		$data.weekdata(start,end,schoolid,function(out){
		   var arr = out.data.dayDataList;
		   var dateArr = new Array();
		   var dataArr = new Array();
		   $.each(arr,function(i,a){
		   	   dateArr.push($mc.SetDateMonth(i,a.day.toString()));	
		   	   dataArr.push(a.teacherNum);   	  
		   });
		   indexChartMonth(dateArr,dataArr,0);
		})
	 },
	 GetDateMonth:function(start,end){	 	
		var schoolid = $("body").data("schoolid");
		$data.weekdata(start,end,schoolid,function(out){
		   var arr = out.data.dayDataList;
		   var dateArr = new Array();
		   var dataArr = new Array();
		   $.each(arr,function(i,a){
		   	   dateArr.push($mc.SetDateMonth(i,a.day.toString()));	
		   	   dataArr.push(a.lessonCount);   	  
		   });
		   indexChartMonth(dateArr,dataArr,1);
		})
	 },
	 GetMonthTime:function(start,end){	 	
		var schoolid = $("body").data("schoolid");
		$data.weekdata(start,end,schoolid,function(out){
		   var arr = out.data.dayDataList;
		   var dateArr = new Array();
		   var dataArr = new Array();
		   $.each(arr,function(i,a){
		   	   dateArr.push($mc.SetDateMonth(i,a.day.toString()));	
		   	   dataArr.push(a.minute);   	  
		   });
		   indexChartMonth(dateArr,dataArr,2);
		})
	 },
	 GetMonthInter:function(start,end){	 	
		var schoolid = $("body").data("schoolid");
		$data.weekdata(start,end,schoolid,function(out){
		   var arr = out.data.dayDataList;
		   var dateArr = new Array();
		   var dataArr = new Array();
		   $.each(arr,function(i,a){
		   	   dateArr.push($mc.SetDateMonth(i,a.day.toString()));	
		   	   dataArr.push(a.countNum);   	  
		   });
		   indexChartMonth(dateArr,dataArr,3);
		})
	 },
	 GetDataToday:function(today,datalist,avg){
	 	console.log(today)
	 	$("body").attr("data-day",today);
         $.each(datalist,function(i,a){         	
         	  if (today==a.day) {
         	  	  $(".info-body-title").html("&nbsp;&nbsp;"+today.substr(0,4)+"年"+today.substr(4,2)+"月"+today.substr(6,2)+"日；使用课时数："+a.lesson+"，使用率："+ toDecimal2(a.lessonRatio)+"%")
                  $("#handon").html(SetHtml(a.handon,avg.nhandon));
                  $("#xiti").html(SetHtml(a.xiti,avg.nxiti));
                  $("#callname").html(SetHtml(a.callname,avg.ncallname));
                  $("#reward").html(SetHtml(a.reward,avg.nreward));
                  $("#photo").html(SetHtml(a.photo,avg.npic));
                  $("#draw").html(SetHtml(a.draw,avg.ndraw));
         	  	  return false;
         	  }
        });
         function SetHtml(todaypx,avgpx){
             var html ="<div class=\"pb-sub\">"+
						   "<div class=\"top\"  style=\"bottom: "+(parseInt(SetPX(todaypx))+20)+"px;\">"+todaypx+"</div>"+
						   "<div class=\"center "+(todaypx>=avgpx?"many":"less")+"\" style=\"height: "+ parseInt(SetPX(todaypx))+"px;\"></div>"+
						   "<div class=\"bottom\">当日</div>"+
						"</div>"+
						"<div class=\"pb-sub\">"+
							 "<div class=\"top\"  style=\"bottom: "+(parseInt(SetPX(avgpx))+20)+"px;\">"+avgpx+"</div>"+
						     "<div class=\"center history\" style=\"height: "+ parseInt(SetPX(avgpx))+"px;\"></div>"+
							"<div class=\"bottom\">历史平均</div>"+
						"</div>";
			return html;
         }
         function SetPX(px){         	
		    var p =0;
		    if (px>0) {p = parseInt(px)+20}
		    else if (px>=150) {p=150}    

            if (p>=150) p=150;

		    return p;
		 }

	 },
	 SetDateWeek:function(i,d){
	 	 var str = d.substr(2,2)+"/"+d.substr(4,2)+"/"+d.substr(6,2);
	 	 str = "20" + str;
	 	 var week ="";
	 	 
	 	var d=new Date();
		var weekday=new Array(7)
		weekday[0]="周日"
		weekday[1]="周一"
		weekday[2]="周二"
		weekday[3]="周三"
		weekday[4]="周四"
		weekday[5]="周五"
		weekday[6]="周六"
        var day = new Date(Date.parse(str)).getDay();
//      var day = endTime.getDay();
	 	 if (i==0) week =weekday[day];
	 	 else if (i==1) week =weekday[day];
	 	 else if (i==2) week =weekday[day];
	 	 else if (i==3) week =weekday[day];
	 	 else if (i==4) week =weekday[day];
	 	 else if (i==5) week =weekday[day];
	 	 else if (i==6) week =weekday[day];
	 	 return str + week;
	 },
	 SetDateMonth:function(i,d){
//	 	console.log(d)
	 	 var str = d.substr(4,4);
	 	 var year = d.substr(2,2);
	 	 var month = d.substr(4,2);
	 	 var res = insert_flg(d,"/",4);
	 	 res = insert_flg(res,"/",7);
//	 	 $('.chart-body .monthTitle span').html(year + '年' + month);
//		console.log(str)
	 	 return res;
	 },
	 GetStateDay:function(start,end){
	 	var schoolid = $("body").data("schoolid");
	 	$data.getSchoolStatByDay(start,end,schoolid,function(out){
	 		console.log(out)
	 		var isToday = out.data.isData;
	 		var todayData = out.data.dataOfToday;
	 		var teacherList = out.data.dayList;
//		    var avg = out.data.avg;
			try{
				var dataDate = todayData.day;
				dataDate = insert_flg(dataDate,"年",4);
				dataDate = insert_flg(dataDate,"月",7);
				dataDate = insert_flg(dataDate,"日",10);
				$(".schoolinfo .panel-header-indexWg i").html(dataDate);
				
				
				//初始化首页饼图
				var useNum = todayData.teachernum;
				var NoUse =  out.data.teachernums - todayData.teachernum;
				var useTime = todayData.lessonCount;
				var NoTime = out.data.classnums - todayData.lessonCount;			
				indexCharPia(useNum,NoUse,useTime,NoTime);
			}catch(err){}
		    //如果isToday=2表示获取的不是今天的数据
		    if(isToday == "0"){
		    	$('.cb-right .no-info').show();
		    	$('.datainfor').hide();
		    	$('.daydata').hide();
		    }else if(isToday == "1"){
		    	$('.cb-right .no-info').hide();
		    	$('.datainfor').show();
		    	$('.daydata').show();
		    }else if(isToday == "2"){
		    	$('.cb-right .no-info').show();
		    	$('.datainfor').show();
		    	$('.daydata').show();
		    }
		    console.log(todayData)
		    $('.schoolinfo .panel-body .info').eq(0).find('span').html(todayData.teachernum);
		    $('.schoolinfo .panel-body .info').eq(1).find('span').html(todayData.lessonCount);
		    $('.schoolinfo .panel-body .info').eq(2).find('span').html(todayData.minute);
		    $('.schoolinfo .panel-body .info').eq(3).find('span').html(todayData.countNum);
	 		
	 		//添加首页表格数据
	 		var html = "";
	 		for(var i =0;i < teacherList.length;i++){
	 			html += '<tr class="text-c"><td>' + teacherList[i].teacherName + '</td><td>' + teacherList[i].lessonCount + '</td><td>' + teacherList[i].minute +'</td><td>' + teacherList[i].countNum + '</td><td class="name-click" date="'+ teacherList[i].day +'" teacher-id="'+ teacherList[i].teacherId +'" teacher-name="'+ teacherList[i].teacherName +'">查看详情</td>';
	 		}
	 		$('.personinfo .panel-body tbody').html(html);
	 		var myDate = todayData.day;      //有数据日期
	 		//点击详情跳转
			$(".name-click").on("click",function(){
				var name = $(this).attr('teacher-name');;
				var id = $(this).attr('teacher-id');
				var schoolid = $('body').attr("data-schoolid");
	       		$fc.goURL('/index.php/Manage/Index/teacherinfo/schoolid/'+ schoolid +'/dayfrom/'+ myDate +'/dayto/'+ myDate +'/classid/0/more/0/$teachername/' + name + '/$teacherid/' + id);
		    }); 
		    
		    //填充首页表格数据
		   var fromDateWeek = getWeekDate(myDate);
		   var fromDateMonth = getWeekMonth(myDate);
		   console.log(fromDateMonth)
		   
		   $mc.GetDateWeek(fromDateWeek,myDate);	//默认获取使用课时
		   $mc.GetDateMonth(fromDateMonth,myDate);
		   //图表切换
			$(".daydata .panel-header ul li").off().on('click',function(){
				var index=$(this).index();
				$(this).addClass("active").siblings().removeClass("active");
				if(index == 0){
					$mc.GetWeekPerson(fromDateWeek,myDate);
					$mc.GetMonthPerson(fromDateMonth,myDate);
					$(".chart-body .account .item").html("使用人数");
				}else if(index == 1){
					$mc.GetDateWeek(fromDateWeek,myDate);
					$mc.GetDateMonth(fromDateMonth,myDate);
					$(".chart-body .account .item").html("使用课时数");
				}else if(index == 2){
					$mc.GetWeekTime(fromDateWeek,myDate);
					$mc.GetMonthTime(fromDateMonth,myDate);
					$(".chart-body .account .item").html("使用时长");
				}else if(index == 3){
					$mc.GetWeekInter(fromDateWeek,myDate);
					$mc.GetMonthInter(fromDateMonth,myDate);
					$(".chart-body .account .item").html("课堂互动次数");
				}
			});
	 	})
    },
	 GetLessonEle:function(v,lessonid){ //v=0 重点关注,1:课堂提问,2.课堂习题,3拍照/截图,4课件,5.批注
        if(v==0){
        	$("#tablebox").hide();
        	$(".text-art").show();
        }
        else{
        	layer.load(2);
        	$("#tablebox").show();
        	$(".text-art").hide();
        	$.post("/index.php/Manage/Ajax/GetLessonElement",{
        		"lessonid":lessonid,
        		"v":v
        	},function(out){
//      		console.log(out);
        		$("#tablebox").html(out);
        		layer.closeAll('loading');

        	})
        }
	 }
}
function showName(obj){
     var name = $(obj).data("name");
     if(name==""||name=="、") layer.msg('没有学生');
	 else layer.alert(name);
}

function showImg(obj){
	var myJson = {
					  "title": "", //相册标题
					  "id": 456, //相册id
					  "start": 0, //初始显示的图片序号，默认0
					  "data": []
				  };
	var  tempJ = {
//			      "alt": "当前图片" + (i+1),
			      "pid": 1, //图片id
			      "src": obj.src, //原图地址
			      "thumb":"" //缩略图地址
				}
	myJson.data.push(tempJ);
	layer.photos({
		        photos: myJson,
		        shift: 0,    //0-6选择
		        area:['700px','400px'],
		   });
}

$fc = {
	goURL:function(url){
		window.location.href = url;
	},
	local:{
		Set: function (name, value) {				
           localStorage.setItem(name, value);           
	    },
	    Get: function (name) {
	        return localStorage.getItem(name);
	    },
	    Del: function (name) {
	        localStorage.removeItem(name);
	    }
	}
}

//获取从传过来的日期起前一周起止日期
function getWeekDate(mydate){
	mydate = insert_flg(mydate,'-','4');
	mydate = insert_flg(mydate,'-','7');
	console.log(mydate)
	var now = new Date();
    var nowTime = now.getTime();
    var day = now.getDay();
    var oneDayLong = 24 * 3600 * 1000;
  
	var end = now.getFullYear() + "" + getNum_0((now.getMonth() + 1)) + "" + getNum_0(now.getDate());

	var myend = end;
	myend = insert_flg(myend,'-','4');
	myend = insert_flg(myend,'-','7');
	console.log(myend)
	var dayNum =  GetDateDiff(mydate,myend);
	
	var PreTime = nowTime - ( 6 + dayNum)* oneDayLong;
	
	
    var pre = new Date(PreTime);
    var now = new Date(nowTime);
    
    var start = pre.getFullYear() + "" + getNum_0((pre.getMonth() + 1)) + "" + getNum_0(pre.getDate());
//	console.log(start)
	return start
}

//获取从传过来的日期起前一个月起止日期
function getWeekMonth(mydate){
	mydate = insert_flg(mydate,'-','4');
	mydate = insert_flg(mydate,'-','7');
	console.log(mydate)
	var now = new Date();
    var nowTime = now.getTime();
    var day = now.getDay();
    var oneDayLong = 24 * 3600 * 1000;
  
	var end = now.getFullYear() + "" + getNum_0((now.getMonth() + 1)) + "" + getNum_0(now.getDate());

	var myend = end;
	myend = insert_flg(myend,'-','4');
	myend = insert_flg(myend,'-','7');
	console.log(myend)
	var dayNum =  GetDateDiff(mydate,myend);
	
	var PreTime = nowTime - ( 29 + dayNum)* oneDayLong;
	
	
    var pre = new Date(PreTime);
    var now = new Date(nowTime);
    
    var start = pre.getFullYear() + "" + getNum_0((pre.getMonth() + 1)) + "" + getNum_0(pre.getDate());
	console.log(start)
	return start
}

function GetDateDiff(startDate,endDate)  
{  
    var startTime = new Date(Date.parse(startDate.replace(/-/g,   "/"))).getTime();     
    var endTime = new Date(Date.parse(endDate.replace(/-/g,   "/"))).getTime();
    var dates = Math.abs((startTime - endTime))/(1000*60*60*24);  
//   console.log(dates)
    return  dates;    
}
function getPreviousWeekStartEnd(week){
	var now = new Date();
    now.setDate(now.getDate() -(week * 7));
    var nowTime = now.getTime();
    var day = now.getDay();
    var oneDayLong = 24 * 3600 * 1000;
    
//  var MondayTime = nowTime - (day - 1) * oneDayLong;
//  var SundayTime = nowTime + (7 - day) * oneDayLong;
//
//  var monday = new Date(MondayTime);
//  var sunday = new Date(SundayTime);
	
	var PreTime = nowTime - 6 * oneDayLong;

    var pre = new Date(PreTime);
    var now = new Date(nowTime);
    
    var start = pre.getFullYear() + "" + getNum_0((pre.getMonth() + 1)) + "" + getNum_0(pre.getDate());
    var end = now.getFullYear() + "" + getNum_0((now.getMonth() + 1)) + "" + getNum_0(now.getDate());
	return {start,end}
}
function getPreviousMonthStartEnd(month){
	var now = new Date();

//  now.setMonth(now.getMonth() - month);
    var nowTime = now.getTime();
    var oneDayLong = 24 * 3600 * 1000;
    var PreTime = nowTime - 29 * oneDayLong;
    var pre = new Date(PreTime);
    
    
//  var lastDay = getLastDay(now.getFullYear(),now.getMonth()+1);
	console.log(now)
    var start = pre.getFullYear() + "" + getNum_0((pre.getMonth() + 1)) + "" + getNum_0(pre.getDate());
    var end = now.getFullYear() + "" + getNum_0((now.getMonth() + 1)) + "" + toTwo(now.getDate());
    
	return {start,end}
}
function getLastDay(year,month) {        
     var new_year = year;    //取当前的年份         
     var new_month = month++;//取下一个月的第一天，方便计算（最后一天不固定）         
     if(month>12) {        
      new_month -=12;        //月份减         
      new_year++;            //年份增         
     }        
     var new_date = new Date(new_year,new_month,1);                //取当年当月中的第一天         
     return (new Date(new_date.getTime()-1000*60*60*24)).getDate();//获取当月最后一天日期         
}  


function getNum_0(num)
{
    if (num / 1 > 9) return num;
    else return "0" + num;
}

function indexChart(dateArr,dataArr,num){
	for(var t = 0;t < dateArr.length;t++){
		dateArr[t] = insert_flg(dateArr[t],"\n",10);	
	}
	var str = "如e课时";
	if(num == 0){
		str = "使用人数";
	}else if(num == 1){
		str = "使用课时";
	}else if(num == 2){
		str = "使用时长";
	}else if(num == 3){
		str = "课堂互动";
	}
	var myChart  = echarts.init(document.getElementById("chart"));
	option = {			   
		    tooltip : {
		        trigger: 'axis',
		    },
		    legend: {
			        orient: 'horizontal',
			        left: '830px',
			        top:"10px",
			        data: [str]
			},
		    grid: {
		        left: '3%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
		    xAxis : {

		            type : 'category',
		            boundaryGap : false,
		            triggerEvent: true,
		            data :dateArr,// ['周一','周二','周三','周四','周五']
		    },
		    yAxis : [
		        {
		        	name:str,
		            type : 'value',
		            axisLine:{show:false}
		        }
		    ],
		    series : [
		        {
		            name:str,
		            type:'line',
		            stack: str,
		            smooth:true,
//		            symbol:'emptytriangle',    //也可是图片链接
		            symbolSize:8,
//		            markPoint:{data:[ {
//						            	name: '最大值',
//								        type: 'max'
//								      }]},
		            itemStyle :{normal:{ color:'#295ffe',  lineStyle:{color:'#295ffe'  },label : {show: true}}},		            
		            data:dataArr
		        }
		    ]
	};		
	
	myChart.setOption(option);
	//tooltips自动循环
	var tempTimer = null;
	var app = {};
    app.currentIndex = -1;
    tempTimer = setInterval(fnTime, 1000);
    function fnTime(){
    	var dataLen = option.series[0].data.length;
        // 取消之前高亮的图形
        myChart.dispatchAction({
            type: 'downplay',
            seriesIndex: 0,
            dataIndex: app.currentIndex
        });
        app.currentIndex = (app.currentIndex + 1) % dataLen;
        // 高亮当前图形
        myChart.dispatchAction({
            type: 'highlight',
            seriesIndex: 0,
            dataIndex: app.currentIndex
        });
        // 显示 tooltip
        myChart.dispatchAction({
            type: 'showTip',
            seriesIndex: 0,
            dataIndex: app.currentIndex
        });
    }
    //鼠标移入移出控制定时器循环
    $('.chart-body .chart-box canvas').on('mouseenter',function(){
    	clearInterval(tempTimer);
    })
    $('.chart-body .chart-box canvas').on('mouseout',function(){
    	tempTimer = setInterval(fnTime, 1000);
    })
}




var isNav = (window.navigator.appName.toLowerCase().indexOf("netscape")>=0);
var isIE = (window.navigator.appName.toLowerCase().indexOf("microsoft")>=0);
function coursefc(){
  $(".textarea").off().on("click",function(){
  	  $("#text-div").hide();
  	  $(".textarea").animate({
  	  	  height:"150px"
  	  },200,function(){
  	  	  $(".text-box,.text-box>textarea").animate({height:"140px"},200,function(){
  	  	  	 
  	  	  });
  	  	  $(".btn-list").show(200,function(){
  	  	  	  $(".closes").off().on("click",function(){ //关闭按钮
  	  	  	  	  $(".textarea").animate({
  	  	  	  	  	 height:"40px"		  	  	  	  	  	
  	  	  	  	  },200,function(){
  	  	  	  	  	  $(".text-box,.text-box>textarea").animate({height:"0px"},200,function(){
  	  	  	  	  	  	  // console.log($("#myid").val());
  	  	  	  	  	  	    $("#text-div").show();
  	  	  	  	  	  	    $(".btn-list").hide();
  	  	  	  	  	  })
  	  	  	  	  })
  	  	  	  });
  	  	  	  $(".saves").off().on("click",function(){ //保存按钮
  	  	  	  	  //发送ajax请求 
  	  	  	  	  $(".textarea").animate({
  	  	  	  	  	 height:"40px"		  	  	  	  	  	
  	  	  	  	  },200,function(){
  	  	  	  	  	  $(".text-box,.text-box>textarea").animate({height:"0px"},200,function(){
  	  	  	  	  	  	  // console.log($("#myid").val());
  	  	  	  	  	  	    $("#text-div").show().html($("#myid").val());
  	  	  	  	  	  	    $(".btn-list").hide();
  	  	  	  	  	  })
  	  	  	  	  })
  	  	  	  })
  	  	  });
  	  })
  	  
  })

 
}

function setFocus() {
       var range = this.createTextRange(); //建立文本选区
        range.moveStart('myid', this.value.length); //选区的起点移到最后去
        range.collapse(true);
       range.select();
}
function myfocus(myid) {
    if(isNav){
          document.getElementById(myid).focus();// 获取焦点  
  
    }else{
       setFocus.call(document.getElementById(myid));
    }
}

function toDecimal2(x) { 
      var f = parseFloat(x); 
      if (isNaN(f)) { 
        return false; 
      } 
      var f = Math.round(x*100)/100; 
      var s = f.toString(); 
      var rs = s.indexOf('.'); 
      if (rs < 0) { 
        rs = s.length; 
        s += '.'; 
      } 
      while (s.length <= rs + 2) { 
        s += '0'; 
      } 
      return s; 
 }





 function BrowserName(){
 	 var name = $.browser.name;
 	 console.log(name);
 	 if (name!="chrome" && name!="firefox") {
 	 	 alert("123");
 	 	 var w = $(document).width();
 	 	 var html ="<div class='browser-msg' style=\"left:"+((w-500)/2)+"px\">当前浏览器为IE或IE内核的浏览器可能出现部分功能不支持，建议使用谷歌或者火狐 <i class=\"Hui-iconfont\">&#xe60b;</i></div>"
 	 	 $("body").append(html);
 	 	 $(".browser-msg>.Hui-iconfont").off().on("click",function(){
 	 	 	 $(".browser-msg").remove();
 	 	 })
 	 }
 }



 function getTableData(strName){
	var obj = $("#tbodyhtml");
	var len = $('#tbTest2 tr th').length;
	var thArr = [];
	var str = '';
	var index = 0;
	for(var t = 1;t < len;t++){
		str = $('#tbTest2 tr th').eq(t).css("display");
		if(str != "none"){
			str = $('#tbTest2 tr th').eq(t).html();
			index = str.indexOf("<");
			str = '"' + str.slice(0,index) + '"';
			thArr.push(str);
		}
	}
	thArr.unshift('"' + strName + '"')
	var json ="{\"data\":[";
	var trjson ="";
	
	for (var i = 0; i <obj.children("tr").length; i++) {
	    var _tr = obj.children("tr:eq("+i+")")
        var _tr_display = _tr.css("display");
      
	    if(_tr_display!="none"){
	    	trjson +="{\"id\":\""+_tr.data("id")+"\",\"name\":\""+_tr.data("name")+"\",";
	    	var tdjson ="";
            for(var j=1; j<_tr.children("td").length; j++){
            	var _td = _tr.children("td:eq("+j+")");
            	var _td_display = _td.css("display");
            	if(_td_display!="none"){
            		tdjson += "\""+_td.data("field")+"\":\""+_td.html()+"\",";
            	}
       		}      
        	if(tdjson.length>0) tdjson = tdjson.substr(0,tdjson.length-1);     
         	trjson += tdjson+"},";        
	    }	 
	}
	 if(trjson.length>0) trjson = trjson.substr(0,trjson.length-1);  

     var outjson = json+trjson+"],\"title\":["+ thArr +"]}";
     
     return outjson;
}
 
function toTwo(n){
	return n < 10 ?  '0' + n : '' + n;
}
function getNowWeek(){
	var now = new Date();		
	var strNow = now.getFullYear()+"-"+toTwo(now.getMonth()+1)+"-"+toTwo(now.getDate());
	console.log(strNow)
//	var preD =  getFirstDayOfWeek(now);
//	var strPre = preD.getFullYear()+"-"+toTwo(preD.getMonth()+1)+"-"+toTwo(preD.getDate());
	
	var preD = new Date(now.getTime() - 7 * 24 * 3600 * 1000);
	var strPre = preD.getFullYear()+"-"+toTwo(preD.getMonth()+1)+"-"+toTwo(preD.getDate());
	console.log(strPre);
	$("#dayfrom").val(strPre);
	$("#dayto").val(strNow);
}
function getNowMonth(){
	var now = new Date();		
	var strNow = now.getFullYear()+"-"+toTwo(now.getMonth()+1)+"-"+toTwo(now.getDate());
	console.log(strNow)
//	var preD =  getFirstDayOfWeek(now);
//	var strPre = preD.getFullYear()+"-"+toTwo(preD.getMonth()+1)+"-"+toTwo(preD.getDate());
	
	var preD = new Date(now.getTime() - 30 * 24 * 3600 * 1000);
	var strPre = preD.getFullYear()+"-"+toTwo(preD.getMonth()+1)+"-"+toTwo(preD.getDate());
	console.log(strPre);
	$("#dayfrom").val(strPre);
	$("#dayto").val(strNow);
}
function getFirstDayOfWeek (date) {
    var day = date.getDay() || 7;
    return new Date(date.getFullYear(), date.getMonth(), date.getDate() + 1 - day);
}
//参数说明：str表示原字符串变量，flg表示要插入的字符串，sn表示要插入的位置
function insert_flg(str,flg,sn){
    var newstr="";
    var sStart=str.substring(0, sn);
    var sEnd = str.substring(sn, str.length);
    newstr = sStart + flg + sEnd;
    return newstr;
}

function initTeacherData(){
		var dayfrom = $("#dayfrom").val().replace(/-/g, "");
		var dayto = $("#dayto").val().replace(/-/g, "");
  		if(dayfrom=="") dayfrom="0";
  		if(dayto=="") dayto="0";
		var classid = '';
		var schoolid = $('body').attr('data-school');
		var teacherid = $('body').attr('data-teacher');
		var html = "";
				
		$data.getUsage(dayfrom,dayto,classid,schoolid,teacherid,function(out){
			  var datalist = out.data;
			  console.log(datalist)
			  $.each(datalist, function(i,val) {
			  	html +="<div class=\"class-list\"><div class=\"class-title\"><span>"+val.day+"</span></div>";
	//			  	console.log(i+"------------"+val.day)
	//						console.log(i+'------------'+val.list)
								for(var k = 0;k < val.list.length;k++){
									html += "<div class=\"class-box\" class-id=\""+val.list[k].classid+"\" data-id=\""+val.list[k].id+"\">"
													+ "<div class=\"top\">" +
															"<span>"+
	    						    		   	  "科目："+ val.list[k].coursename +"<br/>"+
	    						    		   	  "老师："+ val.list[k].name +"<br/>"+
	    						    		   	  "班级："+ val.list[k].classname +"<br/>"+
	    						    		   	  "时间："+ val.list[k].timeon.slice(11,val.list[k].timeon.length-3) + "-" + val.list[k].timeoff.slice(11,val.list[k].timeon.length-3) +
	    						    		  "</span>"+
	    						    		"</div>" +
	    						    		"<div class=\"bottom\">"+
	    						    			"<span>"+
	    						    				"老师发起互动次数："+ val.list[k].nAct +"次<br/>"+
	    						    				"课堂互动参与度："+ parseInt(val.list[k].ActRatio*100) +"%<br/>"+
	    						    				"章节信息：<font class=\"c-red\">"+ (val.list[k].chapter || "未设置") +"</font><br/>"+
	    						    			 "自我评价：<font class=\"c-red\">"+ (val.list[k].remark || "未设置") +"</font><br/>"+
	                            "课堂总结：<font class=\"c-red\">"+ (val.list[k].rethink || "未设置") +"</font><br/>"+
	    						    			"</span>"+
	    						    		"</div>"+
	    						    	 "</div>";
													
									console.log(i+"-----------"+val.list[k])
								}
					html += "</div>";
			  });
			$('.teacherinfo').html(html);
			  
			$(".class-box").off().on("click",function(){
		        var lenssonid = $(this).data("id");
		        var date = $(this).parent().find(".class-title span").html();
//		        console.log(date);
		        $fc.goURL( $('body').attr('data-url') +lenssonid + '/class/' + $(this).attr("class-id") + '/date/' + date);
		    }) 
		})
}

function initClassData(){
		var dayfrom = $("#dayfrom").val().replace(/-/g, "");
		var dayto = $("#dayto").val().replace(/-/g, "");
  		if(dayfrom=="") dayfrom="0";
  		if(dayto=="") dayto="0";
		var classid = $('body').attr('data-class');
		var schoolid = $('body').attr('data-school');
		var teacherid = '0';
		var html = "";
		
		$data.getUsage(dayfrom,dayto,classid,schoolid,teacherid,function(out){
			  var datalist = out.data;
			  console.log(datalist)
			  $.each(datalist, function(i,val) {
			  	html +="<div class=\"class-list\"><div class=\"class-title\"><span>"+val.day+"</span></div>";
//			  	console.log(i+"------------"+val.day)
//						console.log(i+'------------'+val.list)
								for(var k = 0;k < val.list.length;k++){
									html += "<div class=\"class-box\" data-id=\""+val.list[k].id+"\">"
													+ "<div class=\"top\">" +
															"<span>"+
        						    		   	  "科目："+ val.list[k].coursename +"<br/>"+
        						    		   	  "老师："+ val.list[k].name +"<br/>"+
        						    		   	  "班级："+ val.list[k].classname +"<br/>"+
        						    		   	  "时间："+ val.list[k].timeon.slice(11,val.list[k].timeon.length-3) + "-" + val.list[k].timeoff.slice(11,val.list[k].timeon.length-3) +
        						    		  "</span>"+
        						    		"</div>" +
        						    		"<div class=\"bottom\">"+
        						    			"<span>"+
        						    				"老师发起互动次数："+ val.list[k].nAct +"次<br/>"+
        						    				"课堂互动参与度："+ parseInt(val.list[k].ActRatio*100) +"%<br/>"+
        						    				"章节信息：<font class=\"c-red\">"+ (val.list[k].chapter || "未设置") +"</font><br/>"+
        						    			 "自我评价：<font class=\"c-red\">"+ (val.list[k].remark || "未设置") +"</font><br/>"+
                                "课堂反思：<font class=\"c-red\">"+ (val.list[k].rethink || "未设置") +"</font><br/>"+
        						    			"</span>"+
        						    		"</div>"+
        						    	 "</div>";
													
									console.log(i+"-----------"+val.list[k])
								}
					html += "</div>";
			  });
			  
			$('.classinfo').html(html);
			  
			$(".class-box").off().on("click",function(){
		        var lenssonid = $(this).data("id");
		        $fc.goURL( $('body').attr('data-url') +lenssonid);
	   		}) 
		});
}

Array.prototype.indexOf = function(val) {
	for (var i = 0; i < this.length; i++) {
	if (this[i] == val) return i;
	}
	return -1;
};
Array.prototype.remove = function(val) {
	var index = this.indexOf(val);
	if (index > -1) {
	this.splice(index, 1);
	}
};
Array.prototype.contains = function (obj) {
  var i = this.length;
  while (i--) {
    if (this[i] === obj) {
      return true;
    }
  }
  return false;
}
