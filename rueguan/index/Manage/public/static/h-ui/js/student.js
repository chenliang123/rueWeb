var _STUDENTARR = new Array();
var _h_list =""; //横向指标列表
function IndexData(dayfrom,dayto,grade,classid){
  
    var schoolid = $("body").data("schoolid");
    $data.getStudentStat(dayfrom,dayto,schoolid,grade,classid,function(out){
    	 var ret = out.ret;
    	 console.log(ret)
         if (ret==0) layer.msg("结果为空");
         else{
          	 var arr = out.data;
             $fc.local.Set("studentlist",JSON.stringify(arr));     
               _STUDENTARR.splice(0,_STUDENTARR.length);
              $("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");
          	  SetTeacherHTML(arr);
          }
    })

	
	
    //搜索按钮
	$("#searchbtn").off().on("click",function(){

		search();
	})
	
	$(".header-optin>a").off().on("click",function(){
		var obj = $(this);			
		var type = obj.data("type");
		var name = obj.data("name");
		if(type==1){
			layer.open({
			  type: 1,
			 // skin: 'layui-layer-rim', //加上边框
			  area: ['600px', '400px'], //宽高
			  title:name,
			  content: '<div class="my-layer-option"><div class="skin-minimal">'+
			             '<div class="check-box"><input type="radio" id="radio-1" name="demo-radio1"> <label for="radio-1">全选</label></div>'+
			             '<div class="check-box"><input type="radio" id="radio-2" name="demo-radio1"> <label for="radio-2">反选</label></div>'+
			            '</div></div>'+
			            '<div class="my-layer-title">&nbsp;&nbsp;采集指标</div>'+
			            '<div class="my-layer-body" id="list-1">'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-1" checked="checked"  value="1"><label for="checkbox-1">提问参与次数</label></div>'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-2" checked="checked"  value="2"><label for="checkbox-2">答题次数</label></div>'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-3" checked="checked"  value="3"><label for="checkbox-3">答题正确数</label></div>'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-4" checked="checked"  value="4"><label for="checkbox-4">被点名次数</label></div>'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-5" checked="checked"  value="5"><label for="checkbox-5">被奖励次数</label></div>'+
			            '</div>'+
			            '<div class="my-layer-title">&nbsp;&nbsp;课均指标</div>'+
			            '<div class="my-layer-body" id="list-2">'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-6" checked="checked"  value="6"><label for="checkbox-6">课均答题</label></div>'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-7" checked="checked"  value="7"><label for="checkbox-7">课均被点名</label></div>'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-8" checked="checked"  value="8"><label for="checkbox-8">课均被奖励</label></div>'+
			            '</div>'+
			             '<div class="my-layer-title">&nbsp;&nbsp;计算指标</div>'+
			            '<div class="my-layer-body" id="list-2">'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-9" checked="checked"  value="9"><label for="checkbox-9">提问参与率</label></div>'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-10" checked="checked"  value="10"><label for="checkbox-10">答题率</label></div>'+
			              '<div class="check-box checkbox"><input type="checkbox" id="checkbox-11" checked="checked"  value="11"><label for="checkbox-11">答题正确率</label></div>'+
			            '</div>'+
			            '<div class="layer-btn"><a id="complete">确定</a></div>'
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
			    
			    layer.close($(".layui-layer").attr("times"));
			})
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
                var json = getTableData("学生");
//              console.log(json);
                var thead = {};
                thead.dayfrom = $("#dayfrom").val();
                thead.dayto = $("#dayto").val();
                thead.grade = $(".o-list").eq(0).find("font").html();
                thead.Class = $(".o-list").eq(1).find("font").html();
                thead.grade = thead.grade.replace(/<(.*)>(.*)<\/(.*)>|<(.*)\/>/,"")
                thead.Class = thead.Class.replace(/<(.*)>(.*)<\/(.*)>|<(.*)\/>/,"")
//              console.log(thead);
                json = JSON.parse(json);
                json.tHead = thead;
                json = JSON.stringify(json);
//              console.log(json)
                $data.getOutExcel(json,timestamp+".csv",function(out){});
                setTimeout(function(){
                	$(".loaddiv").html('<div class="download">'+timestamp+'.csv<br/><div class="btn"><a href="http://api.skyeducation.cn/EduApi/upload/export/'+timestamp+'.csv">点击下载</a></div></div>');

                },5000)

		   	  // getTableData();
		}
		
	})
	
	
	/*$("#tbTest2>tbody>tr>td").off().on("click",function(){			
		var obj = $(this);
	    tdclick(obj)
	});*/
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
				    if(li.parent("ul").data("type") == "grade"){
				    	GetGradeClassList($(this).data("id"));
				    	$(".tools-list>.left>.o-list:eq(1)>font").attr("data-id","0").html("班级<i class=\"Hui-iconfont\">&#xe6d5;</i>");
				    }				   
					  obj.children("font").attr("data-id",$(this).data("id")).html($(this).html()+"<i class=\"Hui-iconfont\">&#xe6d5;</i>");
				    var grade = $(".o-list:eq(0)>font").attr("data-id");
					  var classid = $(".o-list:eq(1)>font").attr("data-id");
					  var dayfrom = $("#dayfrom").val().replace(/-/g, "");
					  var dayto = $("#dayto").val().replace(/-/g, "");
            if(dayfrom==""&&dayto==""){
//          	$("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");                    	
            	IndexData("0","0",grade,classid);
            }else{
//          	$("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");                    	
            	IndexData(dayfrom,dayto,grade,classid);
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

function SetShow(num){
    var str ="";   
    if(_h_list.indexOf("<"+num+">")>-1)  str ="style=\"display:none\"";
    return str;
}

function FieldSort(obj,_type,_sort,_indexth,_imgurl,index){
    var arr = JSON.parse($fc.local.Get("studentlist"));
    
   var num = $('#ofix2_tb_header tr').length;
    num = num -2;
    var i =0 , len = arr.length , j , d;
    for(;i<len;i++){   //冒泡的升序降序
    	for (j=0;j<len;j++) {
    		if(i > num && j > num){
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
     _STUDENTARR.splice(0,_STUDENTARR.length);    
    SetTeacherHTML(arr);

      
	 	
	 setTimeout(function(){
	 		$("#ofix2_div_head").find("th").find("img").hide();
      $("#tbTest2>tbody>tr").each(function(i){
	 	  	  $(this).children("td:eq("+(index+1)+")").css({"background":"#94b1ff"});
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
	
    var tdhtml ="";
    var fixedhtml ="";
    var _n=0;
    $.each(arr,function(i,sa){
    	if(sa.id<4){
    	  var bg = "";
    	  if(sa.id==1) bg="#ffea7f";
    	  else if(sa.id==2) bg = "#fe7e7d";
    	  else if(sa.id==3) bg = "#7edfff";
    	  _n++;
    	  fixedhtml +="<tr  data-id=\""+sa.id+"\" data-name=\""+sa.name+"\" style=\"background: "+bg+"\">"+
					"<td data-id=\""+sa.id+"\" data-name=\""+sa.name+"\" class=\"not\" style=\"width: 100px; text-align: center;\">"+sa.name+"</td>"+
					"<td "+SetShow("1")+" class=\"not\" data-type='提问参与次数' data-field='handon'>"+toDecimal2(sa.handon)+"</td>"+
					"<td "+SetShow("2")+" class=\"not\" data-type='答题次数' data-field='xiti'>"+toDecimal2(sa.xiti)+"</th>"+
					"<td "+SetShow("3")+" class=\"not\" data-type='答题正确数' data-field='xitiright'>"+toDecimal2(sa.xitiright)+"</td>"+
					"<td "+SetShow("4")+" class=\"not\" data-type='被点名次数' data-field='callname'>"+toDecimal2(sa.callname)+"</td>"+
					"<td "+SetShow("5")+" class=\"not\" data-type='被奖励次数' data-field='reward'>"+toDecimal2(sa.reward)+"</td>"+
					"<td "+SetShow("6")+" class=\"not\" data-type='课均答题' data-field='xiti_avg'>"+toDecimal2(sa.xiti_avg)+"</td>"+
					"<td "+SetShow("7")+" class=\"not\" data-type='课均被点名' data-field='callname_avg'>"+toDecimal2(sa.callname_avg)+"</td>"+
					"<td "+SetShow("8")+" class=\"not\" data-type='课均被奖励' data-field='reward_avg'>"+toDecimal2(sa.reward_avg)+"</td>"+
					"<td "+SetShow("9")+" class=\"not\" data-type='提问参与率' data-field='ratioHandon'>"+toDecimal2(sa.ratioHandon*100)+"%</td>"+
					"<td "+SetShow("10")+" class=\"not\" data-type='提问参与率' data-field='ratioXiti'>"+toDecimal2(sa.ratioXiti*100)+"%</td>"+
					"<td "+SetShow("11")+" class=\"not\" data-type='答题正确率' data-field='ratioXitiRight'>"+toDecimal2(sa.ratioXitiRight*100)+"%</td>"+
			     "</tr>";
    	}
    	else {
	    	tdhtml +="<tr data-id=\""+sa.id+"\" data-name=\""+sa.name+"\">"+
						"<td data-id=\""+sa.id+"\" data-name=\""+sa.name+"\" class=\"name-click\" style=\"width: 100px; text-align: center;\">"+sa.name+"</td>"+
						"<td "+SetShow("1")+" data-type='提问参与次数' data-field='handon'>"+toDecimal2(sa.handon)+"</td>"+
						"<td "+SetShow("2")+" data-type='答题次数' data-field='xiti'>"+toDecimal2(sa.xiti)+"</th>"+
						"<td "+SetShow("3")+" data-type='答题正确数' data-field='xitiright'>"+toDecimal2(sa.xitiright)+"</td>"+
						"<td "+SetShow("4")+" data-type='被点名次数' data-field='callname'>"+toDecimal2(sa.callname)+"</td>"+
						"<td "+SetShow("5")+" data-type='被奖励次数' data-field='reward'>"+toDecimal2(sa.reward)+"</td>"+
						"<td "+SetShow("6")+" data-type='课均答题' data-field='xiti_avg'>"+toDecimal2(sa.xiti_avg)+"</td>"+
						"<td "+SetShow("7")+" data-type='课均被点名' data-field='callname_avg'>"+toDecimal2(sa.callname_avg)+"</td>"+
						"<td "+SetShow("8")+" data-type='课均被奖励' data-field='reward_avg'>"+toDecimal2(sa.reward_avg)+"</td>"+
						"<td "+SetShow("9")+" data-type='提问参与率' data-field='ratioHandon'>"+toDecimal2(sa.ratioHandon*100)+"%</td>"+
						"<td "+SetShow("10")+" data-type='提问参与率' data-field='ratioXiti'>"+toDecimal2(sa.ratioXiti*100)+"%</td>"+
						"<td "+SetShow("11")+" data-type='答题正确率' data-field='ratioXitiRight'>"+toDecimal2(sa.ratioXitiRight*100)+"%</td>"+
				     "</tr>";
		    _STUDENTARR.push({"id":sa.id,"name":sa.name});
	    }
    });
     $("#tbodyhtml").html(fixedhtml+ tdhtml);

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

              var obj = $(this);
              var _type = obj.data("type");
              var _sort = obj.attr("data-sort");
              var _indexth =  obj.data("index");
              var _imgurl = obj.data("url");
              FieldSort(obj,_type,_sort,_indexth,_imgurl,index);

		});
		//选择行
		$(".name-click").off().on("click",function(){
			var index = $(".name-click").index(this);
			var name = $(this).html();
			$("#tbTest2>tbody>tr").each(function(){
			
			if($(this).children("td").data("name")==name){
				$(this).css({"background":"#94b1ff"});
			}
			else  $(this).css({"background":"#FFF"});
	    	})
		})

		document.getElementById('ofix2_div_head').scrollLeft = $(".table-body").scrollLeft();
        document.getElementById("table-body").scrollTop =0;
	}, 100);
}

function selectdate(obj){	

  var grade = $(".o-list:eq(0)>font").attr("data-id");
       
	var classid = $(".o-list:eq(1)>font").attr("data-id");
	var dayfrom = $("#dayfrom").val().replace(/-/g, "");
	var dayto = $("#dayto").val().replace(/-/g, "");
	if(dayfrom=="") dayfrom="0";
    if(dayto=="") dayto="0";

    if(dayfrom!=""&&dayto!=""){
    	$("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");
    	console.log(dayfrom)
    	console.log(grade)
    	IndexData(dayfrom,dayto,grade,classid);
    }
}
function search(){
    //var grade = $(".o-list:eq(0)>font").attr("data-id");
   // var classid = $(".o-list:eq(1)>font").attr("data-id");
  //  var dayfrom = $("#dayfrom").val().replace(/-/g,"");
   // var dayto = $("#dayto").val().replace(/-/g,"");
  //  if (dayfrom=="") dayfrom ="0";
   // if (dayto=="")  dayto ="0";
	var key = $("#keyword").val();
	//if(key=="") 
    //{
    //	 $("#ofix2_div_head,#ofix2_div_top_left,#ofix2_div_left").remove(); //先把原来固定的干掉
    //	 IndexData(dayfrom,dayto,grade,classid);
  //  }
	//layer.msg('请输入教师姓名');
	//else
	//{
		$("#tbTest2>tbody>tr").each(function(){
			if($(this).children("td").data("name")==key){
				$(this).css({"background":"#ff5858"});//.children("td")
			}
			else  $(this).css({"background":"#FFF"});
		})
	//}

}

function GetGradeClassList(grade){	
     var schoolid = $("body").data("schoolid"); 
	 var url ="../../../Ajax/GetGradeClass";
	 $.post(url,{
	 	"schoolid":schoolid,
	 	"grade":grade
	  },function(out){
	  	console.log(out)
	 	$("#classlist").html(out);
	 })
}

function tdclick(obj){
		//var obj = $(this);
		var win_w = $(document).width(); //屏幕的宽度
		var win_h = $(document).height();//屏幕的高度
		var y = obj.position().top;//当前元素距上边距的距离
		var x = obj.position().left;//当前元素距左边距的距离
		var w = 500;//div 的宽度
		var h = 300;//div 的高度
		
	    var top = 40;
	    var left = 10;
	    if(win_w-x<620) left = -410;
	    if(win_h-y<290) top = -310;
	    $(".sub-charts-box").remove();
		var html='<div class="sub-charts-box" style="top:'+top+'px; left:'+left+'px">'+
		            '<div class="tab-btn" id="tab-btn"><span class="active">近一周</span><span>近一月</span><a>关闭</a></div>'+
		            '<div class="sub-charts" id="sub-charts"></div>'+
		          '</div>';
		obj.append(html);
		
		/****重新给td绑定事件***/
		$("#tbTest2>tbody>tr>td").off().on("click",function(){			
			var obj = $(this);
		    tdclick(obj)
		})
		
		showchart("sub-charts");
		
		$("#tab-btn>span").off().on("click",function(){	
			$(obj).off();
			$("#tab-btn>span").removeClass("active");
			$(this).addClass("active");
		});
		$("#tab-btn>a").off().on("click",function(){	
			$(obj).off();
		    $(".sub-charts-box").remove();
		   // window.setTimeout(tdclick(obj),500)
		})
	}
	
	function showchart(_divid){
		var myChart  = echarts.init(document.getElementById(_divid));
		option = {
		   
		    tooltip : {
		        trigger: 'axis'
		    },		    
		    xAxis: {
		        type: 'category',
		        name: 'x',
		        splitLine: {show: false},
		        data: ['一', '二', '三', '四', '五', '六', '七', '八', '九']
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
		            name: '3的指数',
		            type: 'line',
		            data: [1, 3, 9, 27, 81, 247, 741, 2223, 6669]
		        },
		        {
		            name: '2的指数',
		            type: 'line',
		            data: [1, 2, 4, 8, 16, 32, 64, 128, 256]
		        }
		    ]
		};
		
		myChart.setOption(option);
	}