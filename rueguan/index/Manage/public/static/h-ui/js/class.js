var _CLASSARR = new Array();
var _h_list =""; //横向指标列表
function IndexData(dayfrom,dayto,grade){
      
        var schoolid = $("body").data("schoolid");
        $data.getClassStat(dayfrom,dayto,grade,schoolid,function(out){
        	 var ret = out.ret;
	         if (ret==0) layer.msg("网络错误");
	         else{
	          	 var arr = out.data;
	             $fc.local.Set("classlist",JSON.stringify(arr));      
	              _CLASSARR.splice(0,_CLASSARR.length);         
	          	  SetTeacherHTML(arr);
	          }
        })
		
		//切换tab标签
		$(".tab-body>.tab").off().on("click",function(){
			 $(".tab-body>.tab").removeClass("active");
			 $(this).addClass("active");
		})
		
		//搜索按钮
		$("#searchbtn").off().on("click",function(){

			search();
		})
		
		
		$(".header-optin>a").off().on("click",function(){
			var obj = $(this);			
			var type = obj.data("type");
			var name = obj.data("name");
			if(type==0){
			    var divstr="";
				$.each(_CLASSARR,function(i,sub){
					if(sub.id!=1)  divstr +='<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-1" value="'+sub.id+'"><label for="checkbox-1">'+sub.name+'</label></div>';
				}) 

              layer.open({
					type:1,
					area: ['600px', '400px'], //宽高
				    title:name,
				    content:'<div class="my-layer-option"><div class="skin-minimal">'+
				             '<div class="check-box"><input type="radio" id="radio-1" name="demo-radio1"> <label for="radio-1">全选</label></div>'+
				             '<div class="check-box"><input type="radio" id="radio-2" name="demo-radio1"> <label for="radio-2">反选</label></div>'+
				            '</div></div>'+
				            '<div class="my-layer-body" id="list-1">'+ 
				             divstr +
				            '</div>'+
				            '<div class="layer-btn"><a id="complete">确定</a></div>'
				});
				$('.skin-minimal input').iCheck({
					checkboxClass: 'icheckbox-blue',
					radioClass: 'iradio-blue',
					increaseArea: '20%'
				});
				
				$("#radio-1").click(function () {	//全选			
				     $("#list-1 :checkbox").prop("checked", true); 
				});
				
				$("#radio-2").click(function () {  //反选
					$("#list-1 :checkbox").each(function () {  
				        $(this).prop("checked", !$(this).prop("checked"));  
				    });
				});
				$("#complete").off().on("click",function(){
					//$("#tbTest2>tbody").children("tr").show();
					
					$("#list-1 :checkbox").each(function () { 
					    var obj = $(this);
					    var id = obj.val();
				        if(!obj.prop("checked")){				        	
				        	$("#tbTest2>tbody>tr").children("td[data-id='"+id+"']").parent("tr").hide();
				        	$("#ofix2_tb_left>tbody>tr").children("td[data-id='"+id+"']").parent("tr").hide();
				        }
				        else{
				        	$("#tbTest2>tbody>tr").children("td[data-id='"+id+"']").parent("tr").show();
				        	$("#ofix2_tb_left>tbody>tr").children("td[data-id='"+id+"']").parent("tr").show();
				        }
					})
					
					layer.close($(".layui-layer").attr("times"))
					
				})
			}
			else if(type==1){
				layer.open({
				  type: 1,
				  //skin: 'layui-layer-rim', //加上边框
				  area: ['600px', '400px'], //宽高
				  title:name,
				  content: '<div class="my-layer-option"><div class="skin-minimal">'+
				             '<div class="check-box"><input type="radio" id="radio-1" name="demo-radio1"> <label for="radio-1">全选</label></div>'+
				             '<div class="check-box"><input type="radio" id="radio-2" name="demo-radio1"> <label for="radio-2">反选</label></div>'+
				            '</div></div>'+
				            '<div class="my-layer-title">&nbsp;&nbsp;采集指标</div>'+
				            '<div class="my-layer-body" id="list-1">'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-1" checked="checked"  value="1"><label for="checkbox-1">提问次数</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-2" checked="checked"  value="2"><label for="checkbox-2">出题次数</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-3" checked="checked"  value="3"><label for="checkbox-3">点名次数</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-4" checked="checked"  value="4"><label for="checkbox-4">奖励次数</label></div>'+
				            '</div>'+
				            '<div class="my-layer-title">&nbsp;&nbsp;课均指标</div>'+
				            '<div class="my-layer-body" id="list-2">'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-5" checked="checked"  value="5"><label for="checkbox-5">课均提问</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-6" checked="checked"  value="6"><label for="checkbox-6">课均出题</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-7" checked="checked"  value="7"><label for="checkbox-7">课均点名</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-8" checked="checked"  value="8"><label for="checkbox-8">课均奖励</label></div>'+
				            '</div>'+
				            '<div class="my-layer-title">&nbsp;&nbsp;计算指标</div>'+
				            '<div class="my-layer-body" id="list-2">'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-9" checked="checked"  value="9"><label for="checkbox-9">提问参与率</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-10" checked="checked"  value="10"><label for="checkbox-10">答题率</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-11" checked="checked"  value="11"><label for="checkbox-11">答题正确率</label></div>'+
				            '</div>'+
				            '<div class="layer-btn"><a id="complete">确定</a></div>'
				});
				
				$('.skin-minimal input').iCheck({
					checkboxClass: 'icheckbox-blue',
					radioClass: 'iradio-blue',
					increaseArea: '20%'
				});
				$("#radio-1").click(function () {				
				     $("#list-1 :checkbox,#list-2 :checkbox").prop("checked", true); 
				});
				
				$("#radio-2").click(function () {
					$("#list-1 :checkbox,#list-2 :checkbox").each(function () {  
				        $(this).prop("checked", !$(this).prop("checked"));  
				    });
				});
				$("#complete").off().on("click",function(){			   	
					//$(this).children("td,th").show();
					var num =0;
					$("#list-1 :checkbox,#list-2 :checkbox").each(function () {  
				        var obj = $(this);
				        if(!obj.prop("checked")){			        	
				        	$("#tbTest2>tbody>tr,#ofix2_tb_header>tr").each(function(i){	
				        		$(this).children("th:eq("+(obj.val())+")").hide();
							 	$(this).children("td:eq("+(obj.val())+")").hide();
							 	if(_h_list.indexOf("<"+obj.val()+">")<0) _h_list += "<"+obj.val()+">"; 
						    });					    
				        }
				        else{
				        	num++;
				        	$("#tbTest2>tbody>tr,#ofix2_tb_header>tr").each(function(i){				        		
							 	$(this).children("td:eq("+(obj.val())+")").show();
							 	$(this).children("th:eq("+(obj.val())+")").show();
						    });
						    
				        }
				    });
				    $("#tbTest2,#ofix2_tb_header").css({"width":((num+1)*100)+"px"});
				    
				    layer.close($(".layui-layer").attr("times"))
				    
				})
				// 
			}

			else if(type==2){
		   	     var load = $("body").data("load");
		   	     layer.open({
				  type: 1,				
				  area: ['300px', '200px'], //宽高
				  title:'导出Excel报表',
				  content: '<div class="loaddiv"><img src="'+load+'"/><br/>数据正在生成中，请稍后</div>'
				  //content:'<div class="loaddiv"><div class="download">2012000122229899sd.xls<br/><div class="btn">点击下载</div></div></div>'
				});
                var timestamp=new Date().getTime();
                var json = getTableData("班级");
//              console.log(json);
								var thead = {};
                thead.dayfrom = $("#dayfrom").val();
                thead.dayto = $("#dayto").val();
                thead.grade = $(".o-list").eq(0).find("font").html();
                thead.grade = thead.grade.replace(/<(.*)>(.*)<\/(.*)>|<(.*)\/>/,"");
//              console.log(thead);
                json = JSON.parse(json);
                json.tHead = thead;
                json = JSON.stringify(json);
                $data.getOutExcel(json,timestamp+".csv",function(out){});
                setTimeout(function(){
                	$(".loaddiv").html('<div class="download">'+timestamp+'.csv<br/><div class="btn"><a href="http://api.skyeducation.cn/EduApi/upload/export/'+timestamp+'.csv">点击下载</a></div></div>');
                },5000)
		   	
		   }
		
		})
		
		
		$("#tbTest2>tbody>tr>td").off().on("click",function(){			
			var obj = $(this);
		    tdclick(obj)
		});
		
		$("body")[0].onclick = function(){
			$(".tools-list>.left>.o-list").children("ul").animate({
				height:"0px"
		    },300)
		}
		
		//科目或者年级的下来菜单
		$(".tools-list>.left>.o-list").off().on("click",function(e){
			var ev = window.event || e;
			ev.stopPropagation();
			$(".tools-list>.left>.o-list").children("ul").animate({
				height:"0px"
			},300)
			
			var obj = $(this);
			var ul = obj.children("ul");
			var li = ul.children("li");
			var h = ul.height();
			if(h==0){
				h = 31*(li.length);

	            if (h>310) { 
	                   h = 310;
	                   ul.css({"overflow":"auto","width":"117px"});
	              }
	             ul.mouseleave(function(){
	                	 ul.animate({
							height:"0px"
						},300)
	             })

				ul.animate({
					height:h+"px"
				},300,function(){ //回掉函数
					li.off().on("click",function(){
						obj.children("font").attr("data-id",$(this).data("id")).html($(this).html()+"<i class=\"Hui-iconfont\">&#xe6d5;</i>")
					  
						var grade = $(".o-list:eq(0)>font").attr("data-id");
						var dayfrom = $("#dayfrom").val().replace(/-/g, "");
						var dayto = $("#dayto").val().replace(/-/g, "");
                        if(dayfrom==""&&dayto==""){
                        	$("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");
                        	IndexData("0","0",grade);
                        }else{
                        	$("#ofix2_div_head,#ofix2_div_top_left,#ofix2_div_left").remove(); //先把原来固定的干掉
                        	IndexData(dayfrom,dayto,grade);
                        }
					})
				})
			}else{
				ul.animate({
					height:"0px"
				},300)
			}
			//console.log(obj.children("ul").children("li").length);
		})
		
}


function FieldSort(obj,_type,_sort,_indexth,_imgurl,index){
		var tempId = 0;
    var arr = JSON.parse($fc.local.Get("classlist"));
    arr.forEach(function(val){
    	if(val.id == "2"){
    		tempId = 1;
    	}
    })
    var i =0 , len = arr.length , j , d;
		for(;i<len;i++){   //冒泡的升序降序
    	for (j=0;j<len;j++) {
    		if(i > tempId && j > tempId){
		    		if (_sort==0) {
			    		if((arr[i][_type] - 0) > (arr[j][_type] - 0)) {
			    			d = arr[j]; 
			    			arr[j] = arr[i];
			    			arr[i] = d;
			    		}
		    	  }
		    	  else{
		    	  	 if((arr[i][_type] - 0) < (arr[j][_type] - 0)) {
			    			d = arr[j]; 
			    			arr[j] = arr[i];
			    			arr[i] = d;
			    		}
    	  		}
    	 }
    	}
    }
    
    if (_sort==0) {
    	$(".header-click[data-type='"+_type+"']").attr("data-sort","1");
    }
    else{
    	$(".header-click[data-type='"+_type+"']").attr("data-sort","0");
    }

     $("#ofix2_div_head,#ofix2_div_top_left,#ofix2_div_left").remove(); //先把原来固定的干掉
     _CLASSARR.splice(0,_CLASSARR.length);
     SetTeacherHTML(arr);
     
     
//		console.log(_sort)
	  setTimeout(function(){
	  	$("#ofix2_div_head").find("th").find("img").hide();
	  	$("#tbTest2>tbody>tr").each(function(i){				 	
		 	   $(this).children("td:eq("+(index+1)+")").css({"background":"#94b1ff"})
		  });
		  var tempSrc = $("body").attr("data-src");		  
	 	  $("#ofix2_div_head").find("th:eq("+(index+1)+")").find("img").show();
	 	  
	 	  if(_sort == 0){
	 	  	$("#ofix2_div_head").find("th:eq("+(index+1)+")").find("img").attr("src",tempSrc + "static/h-ui/images/sort1.png");
	 	  }else{
	 	  	$("#ofix2_div_head").find("th:eq("+(index+1)+")").find("img").attr("src",tempSrc + "static/h-ui/images/sort0.png");
	 	  }
	  },100)

}

function SetTeacherHTML(arr){
//  console.log(arr);
    var tdhtml ="";
    var fixedhtml ="";
    var _n =0;
    $.each(arr,function(i,sa){
//			console.log(sa)
    	if (sa.id<4) {
    		 var bg = "";
    	  if(sa.id==1) bg="#ffea7f";
    	  else if(sa.id==2) bg = "#fe7e7d";
    	  else if(sa.id==3) bg = "#7edfff";
    	  _n++;
            fixedhtml +="<tr data-id=\""+sa.id+"\" data-name=\""+sa.name+"\" style=\"background: "+bg+"\">"+
					"<td data-id=\""+sa.id+"\" data-name=\""+sa.name+"\" class=\"name-click\" style=\"width: 100px; text-align: center;\">"+sa.name+"</td>"+
					"<td "+SetShow("1")+" data-type='提问次数' data-field='handon'>"+toDecimal2(sa.handon)+"</td>"+
					"<td "+SetShow("2")+" data-type='出题次数' data-field='xiti'>"+toDecimal2(sa.xiti)+"</th>"+
					"<td "+SetShow("3")+" data-type='点名次数' data-field='callname'>"+toDecimal2(sa.callname)+"</td>"+
					"<td "+SetShow("4")+" data-type='奖励次数' data-field='reward'>"+toDecimal2(sa.reward)+"</td>"+
					"<td "+SetShow("5")+" data-type='课均提问' data-field='handon_avg'>"+toDecimal2(sa.handon_avg)+"</td>"+
					"<td "+SetShow("6")+" data-type='课均出题' data-field='xiti_avg'>"+toDecimal2(sa.xiti_avg)+"</td>"+
					"<td "+SetShow("7")+" data-type='课均点名' data-field='callname_avg'>"+toDecimal2(sa.callname_avg)+"</td>"+
					"<td "+SetShow("8")+" data-type='课均奖励' data-field='reward_avg'>"+toDecimal2(sa.reward_avg)+"</td>"+
					"<td "+SetShow("9")+" data-type='提问参与率' data-field='ratioHandon'>"+toDecimal2(sa.ratioHandon*100)+"%</td>"+
					"<td "+SetShow("10")+" data-type='答题率' data-field='ratioXiti'>"+toDecimal2(sa.ratioXiti*100)+"%</td>"+
					"<td "+SetShow("11")+" data-type='答题正确率' data-field='ratioXitiRight'>"+toDecimal2(sa.ratioXitiRight*100)+"%</td>"+
			     "</tr>";
    	}
    	else
    	{
	    	tdhtml +="<tr data-id=\""+sa.id+"\" data-name=\""+sa.name+"\">"+
						"<td data-id=\""+sa.id+"\" data-name=\""+sa.name+"\" class=\"name-click\" style=\"width: 100px; text-align: center;\">"+sa.name+"</td>"+
						"<td "+SetShow("1")+" data-type='提问次数' data-field='handon'>"+toDecimal2(sa.handon)+"</td>"+
						"<td "+SetShow("2")+" data-type='出题次数' data-field='xiti'>"+toDecimal2(sa.xiti)+"</th>"+
						"<td "+SetShow("3")+" data-type='点名次数' data-field='callname'>"+toDecimal2(sa.callname)+"</td>"+
						"<td "+SetShow("4")+" data-type='奖励次数' data-field='reward'>"+toDecimal2(sa.reward)+"</td>"+
						"<td "+SetShow("5")+" data-type='课均提问' data-field='handon_avg'>"+toDecimal2(sa.handon_avg)+"</td>"+
						"<td "+SetShow("6")+" data-type='课均出题' data-field='xiti_avg'>"+toDecimal2(sa.xiti_avg)+"</td>"+
						"<td "+SetShow("7")+" data-type='课均点名' data-field='callname_avg'>"+toDecimal2(sa.callname_avg)+"</td>"+
						"<td "+SetShow("8")+" data-type='课均奖励' data-field='reward_avg'>"+toDecimal2(sa.reward_avg)+"</td>"+
						"<td "+SetShow("9")+" data-type='提问参与率' data-field='ratioHandon'>"+toDecimal2(sa.ratioHandon*100)+"%</td>"+
						"<td "+SetShow("10")+" data-type='答题率' data-field='ratioXiti'>"+toDecimal2(sa.ratioXiti*100)+"%</td>"+
						"<td "+SetShow("11")+" data-type='答题正确率' data-field='ratioXitiRight'>"+toDecimal2(sa.ratioXitiRight*100)+"%</td>"+
				     "</tr>";
		    _CLASSARR.push({"id":sa.id,"name":sa.name});
	  }
    });
     $("#tbodyhtml").html(fixedhtml+tdhtml);

      var h = $(window).height();
		$(".cb-left").css({"height":(h)+"px"});	
		$(".cb-right").css({"min-height":(h-61)+"px"});	
		$("#list-box").css({"height":(h-221)+"px"})
		$(".table-body").css({"height":(h-211)+"px"})
		 $("body").css("overflow","hidden");
		var ofix2 = new oFixedTable('ofix2', document.getElementById('tbTest2'), {rows:(_n+1), cols:1});  
		
		window.setTimeout(function(){
			//选择列
			$(".header-click").off().on("click",function(){
				 var index = $(".header-click").index(this);
				// $("#tbTest2>tbody>tr>td").css({"background":"#FFF"});//将原来的清除
				
				
				 var obj = $(this);
	             var _type = obj.data("type");
	             var _sort = obj.attr("data-sort");
	             var _indexth =  obj.data("index");
	             var _imgurl = obj.data("url");

	             FieldSort(obj,_type,_sort,_indexth,_imgurl,index);


			});
			//选择行
			$(".name-click").off().on("click",function(){
				var name = $(this).html();
				$("#tbTest2>tbody>tr").each(function(){
						if($(this).children("td").data("name")==name){
							$(this).css({"background":"#94b1ff"});
						}
						else  $(this).css({"background":"#FFF"});
		    })
				
				var schoolId = $('body').attr('data-schoolid');
				var classId = $(this).attr('data-id');
				console.log(classId);


				var url = $('#info').data("url");
        var day = $("body").attr("data-day");
        var schoolid = $('body').attr("data-schoolid");
        var dayfrom = $("#dayfrom").val().replace(/-/g, "");
		    var dayto = $("#dayto").val().replace(/-/g, "");
		    if(dayfrom=="") dayfrom="0";
		    if(dayto=="") dayto="0";
		    
				$fc.goURL('/index.php/Manage/Index/classinfo/schoolid/'+ schoolid +'/dayfrom/'+ dayfrom +'/dayto/'+ dayto +'/classid/'+ classId +'/more/0/$classname/' + name);
			
//   		$fc.goURL('/index.php/Manage/Index/classinfo/schoolid/94/day/20170315/classid/'+ classId +'/more/0/$classname/' + name);
			
			})

            document.getElementById('ofix2_div_head').scrollLeft = $(".table-body").scrollLeft();
            document.getElementsByClassName("table-body")[0].scrollTop = 0;

		}, 100);

		$("#tbodyhtml>tr>td").off().on("click",function(){		      
     	var obj = $(this);
     	//alert("123");
//       tdclick(obj)
     });
}
 
function search(){
    var grade = $(".o-list:eq(0)>font").attr("data-id");   
    var dayfrom = $("#dayfrom").val().replace(/-/g,"");
    var dayto = $("#dayto").val().replace(/-/g,"");
    if (dayfrom=="") dayfrom ="0";
    if (dayto=="")  dayto ="0";
	var key = $("#keyword").val();
	if(key=="") 
    {
    	 $("#ofix2_div_head,#ofix2_div_top_left,#ofix2_div_left").remove(); //先把原来固定的干掉
    	 IndexData(dayfrom,dayto,grade);
    }	
	else
	{
		$("#tbTest2>tbody>tr").each(function(){
			if($(this).children("td").data("name")==key){
				$(this).css({"background":"#ff5858"});//.children("td")
			}
			else  $(this).css({"background":"#FFF"});
		})
	}

}

function SetShow(num){
    var str ="";
   
    if(_h_list.indexOf("<"+num+">")>-1)  str ="style=\"display:none\"";

    return str;
}

function tdclick(obj){
        var schoolid = $("body").data("schoolid");
        var classid = obj.parent("tr").data("id");
        var teachername = obj.parent("tr").data("name");
        var type = obj.data("type");
        var field = obj.data("field");
		    layer.open({
				  type: 1,		
				  area: ['620px', '400px'], //宽高
				  title:teachername+'；'+type+'趋势图',		 
				  content: '<div class="sub-charts-box">'+
				            '<div class="tab-btn" id="tab-btn"><span class="active" data-days="7">近一周</span><span data-days="30">近一月</span></div>'+
				            '<div class="sub-charts" id="sub-charts"></div>'+
				           '</div>' 
				});

        SetChartData(schoolid,classid,7,teachername+type+"统计",field);//默认是近一周的数据

       
    	$("#tab-btn>span").unbind().click(function(){	
		
		  $("#tab-btn>span").removeClass("active");
		   $(this).addClass("active");
		   var days = $(this).data("days");
           SetChartData(schoolid,classid,days,teachername+type+"统计",field);//默认是近一周的数据
	   });
		  // alert("1233");
       
         

}

function SetChartData(schoolid,classid,days,title,field){
	//console.log({schoolid,teacherid,days,title})
    $data.getClassStatAvg("20161101",schoolid,classid,function(out){       
//       console.log(out);
		 var classavg = out.data.stat_avg_class;
		 var schoolavg = out.data.stat_avg_school;
		 console.log(classavg);
		 //默认为一周的数据
	     var classarrData = new Array();
	     var schoolarrData = new Array();
	     var dateData = new Array();
		 for (var i=days; i>0; i--) {
		 	var day = SetDateFC(i); 
		 	var _classdata = 0;  
		 	var _schooldata =0;     	 	
	        $.each(classavg,function(j,sub_avg){
	            if (day==sub_avg.day) {
	               _classdata = sub_avg[field];
	               return false;
	            }
	        });
	        $.each(schoolavg,function(i,sub_avg){
	        	 if (day==sub_avg.day) {
	               _schooldata = sub_avg[field];
	               return false;
	            }
	        })

	        dateData.push(day);
	        classarrData.push(_classdata);
	        schoolarrData.push(_schooldata);
		 }
		// showchart("sub-charts",dateData,arrData,title);
        showchart("sub-charts",dateData,classarrData,schoolarrData);
		// console.log(arrData);*/
   })
    //showchart("sub-charts");
}

function selectdate(obj){
	var grade = $(".o-list:eq(0)>font").attr("data-id");
	var dayfrom = $("#dayfrom").val().replace(/-/g, "");
	var dayto = $("#dayto").val().replace(/-/g, "");
    if(dayfrom=="") dayfrom="0";
    if(dayto=="") dayto="0";
    if(dayfrom!=""&&dayto!=""){
        $("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");
         IndexData(dayfrom,dayto,grade);
     }	
}

function showchart(_divid,dateData,classarrData,schoolarrData){
    console.log(classarrData);
		var myChart  = echarts.init(document.getElementById(_divid));
		option = {
		    tooltip : {
		        trigger: 'axis'
		    },		
		    legend: {
	        left: '35%',
	        data: ["班级平均","学校平均"]
	      },
		    xAxis: {
		        type: 'category',
		        name: 'x',
		        splitLine: {show: false},
		        data: dateData//['一', '二', '三', '四', '五', '六', '七', '八', '九']
		    },
		    grid: {
		        left: '3%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
		    yAxis: {
		        type: 'log',
		        name: 'y'
		    },
		    series: [
		        {
		            name: '班级平均',
		            type: 'line',
		            data:classarrData//[1, 3, 9, 27, 81, 247, 741, 2223, 6669]
		        },
		        {
		            name: '学校平均',
		            type: 'line',
		            data: schoolarrData//[1, 2, 4, 8, 16, 32, 64, 128, 256]
		        }
		    ]
		};
	
		myChart.setOption(option);
}

//当前日期减去相应的天数后得的日期
function SetDateFC(days){
    var now = new Date();
    var date = new Date(now.getTime() - (days * 24 * 3600 * 1000));
    var year = date.getFullYear();
    var month = Zeros(date.getMonth()+1);
    var day  = Zeros(date.getDate());

    function Zeros(str){
    	 if (str>9) return str;
    	 else return "0"+ str;
    }

    return year +""+month+""+day;

}

