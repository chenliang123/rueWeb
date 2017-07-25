var _TEACHERARR = new Array();
var _h_list =""; //横向指标列表
function initialization(dayfrom,dayto,coureid,grade){    
        var schoolid = $("body").data("schoolid");

        $data.getTeacherStat(dayfrom,dayto,coureid,grade,schoolid,function(out){
              var ret = out.ret;
              if (ret==0) layer.msg("结果为空");
              else{
              	 var arr = out.data;
                 $fc.local.Set("teacherlist",JSON.stringify(arr));
                 _TEACHERARR.splice(0,_TEACHERARR.length);
              	  SetTeacherHTML(arr);
              }
        });

        $("#searchbtn").off().on("click",function(){
        	search();
        })

		$(".header-optin>a").off().on("click",function(){
			var obj = $(this);			
			var type = obj.data("type");
			var name = obj.data("name");			
			var divstr="";
			$.each(_TEACHERARR,function(i,sub){
				if(sub.id!=1) divstr +='<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-1" value="'+sub.id+'"><label for="checkbox-1">'+sub.name+'</label></div>';
			}) 

			if(type==0){
				layer.open({
					type:1,
					area: ['600px', '400px'], //宽高
				    title:name,
				    shadeClose: true, //点击遮罩关闭
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
				
				// 
			}
			else if(type==1)
			{
				 layer.open({
				  type: 1,
				 // skin: 'layui-layer-rim', //加上边框
				  area: ['600px', '400px'], //宽高
				  title:name,
				  shadeClose: true, //点击遮罩关闭
				  content: '<div class="my-layer-option"><div class="skin-minimal">'+
				             '<div class="check-box"><input type="radio" id="radio-1" name="demo-radio1"> <label for="radio-1">全选</label></div>'+
				             '<div class="check-box"><input type="radio" id="radio-2" name="demo-radio1"> <label for="radio-2">反选</label></div>'+
				            '</div></div>'+
				            '<div class="my-layer-title">&nbsp;&nbsp;采集指标</div>'+
				            '<div class="my-layer-body" id="list-1">'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-1" value="1"><label for="checkbox-1">课表课时</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-2" value="2"><label for="checkbox-2">如e课时</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-3" value="3"><label for="checkbox-3">文件数量</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-4" value="4"><label for="checkbox-4">提问次数</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-5" value="5"><label for="checkbox-5">点名次数</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-6" value="6"><label for="checkbox-6">奖励次数</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-7" value="7"><label for="checkbox-7">习题数量</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-8" value="8"><label for="checkbox-8">设置答案习题</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-9" value="9"><label for="checkbox-9">拍照次数</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-10" value="10"><label for="checkbox-10">批注次数</label></div>'+
				            '</div>'+
				            '<div class="my-layer-title">&nbsp;&nbsp;课均指标</div>'+
				            '<div class="my-layer-body" id="list-2">'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-11" value="11"><label for="checkbox-11">课均使用时长</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-12" value="12"><label for="checkbox-12">课均课件</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-13" value="13"><label for="checkbox-13">课均提问</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-14" value="14"><label for="checkbox-14">课均出题</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-15" value="15"><label for="checkbox-15">课均点名</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-16" value="16"><label for="checkbox-16">课均奖励</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-17" value="17"><label for="checkbox-17">课均拍照</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-18" value="18"><label for="checkbox-18">课均批注</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-19" value="19"><label for="checkbox-19">课均设答案题目</label></div>'+

				            '</div>'+
				            '<div class="my-layer-title">&nbsp;&nbsp;计算指标</div>'+
				            '<div class="my-layer-body" id="list-3">'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-20" value="20"><label for="checkbox-20">系统使用率</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-21" value="21"><label for="checkbox-21">提问参与度</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-22" value="22"><label for="checkbox-22">习题参与度</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-23" value="23"><label for="checkbox-23">习题正确率</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-24" value="24"><label for="checkbox-24">点名覆盖率</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-25" value="25"><label for="checkbox-25">奖励覆盖率</label></div>'+
				              '<div class="check-box checkbox"><input type="checkbox" checked="checked" id="checkbox-26" value="26"><label for="checkbox-26">答案设置率</label></div>'+
				            '</div>'+
				            '<div class="layer-btn"><a id="complete">确定</a></div>'
				});
				
				$('.skin-minimal input').iCheck({
					checkboxClass: 'icheckbox-blue',
					radioClass: 'iradio-blue',
					increaseArea: '20%'
				});
				$("#radio-1").click(function () {				
				     $("#list-1 :checkbox,#list-2 :checkbox,#list-3 :checkbox").prop("checked", true); 
				});
				
				$("#radio-2").click(function () {
					$("#list-1 :checkbox,#list-2 :checkbox,#list-3 :checkbox").each(function () {  
				        $(this).prop("checked", !$(this).prop("checked"));  
				    });
				});
				$("#complete").off().on("click",function(){		
					var num =0;
					_h_list ="";
					$("#list-1 :checkbox,#list-2 :checkbox,#list-3 :checkbox").each(function () {  
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
                var json = getTableData("教师");
//              console.log(json);
                var thead = {};
                thead.dayfrom = $("#dayfrom").val();
                thead.dayto = $("#dayto").val();
                thead.grade = $(".o-list").eq(1).find("font").html();
                thead.course = $(".o-list").eq(0).find("font").html();
                thead.grade = thead.grade.replace(/<(.*)>(.*)<\/(.*)>|<(.*)\/>/,"")
                thead.course = thead.course.replace(/<(.*)>(.*)<\/(.*)>|<(.*)\/>/,"")
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
							var coure = $(".o-list:eq(0)>font").attr("data-id");
							var grade = $(".o-list:eq(1)>font").attr("data-id");
							var dayfrom = $("#dayfrom").val().replace(/-/g, "");
							var dayto = $("#dayto").val().replace(/-/g, "");
                            if(dayfrom==""&&dayto==""){
                            	$("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");
                            	initialization("0","0",coure,grade);
                            }else{                               //补充
                            	$("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");
                            	initialization(dayfrom,dayto,coure,grade);
                            }
					})
				})
			}else{
				ul.animate({
					height:"0px"
				},300)
			}
			
		})

}




function search(){
    //var coureid = $(".o-list:eq(0)>font").attr("data-id");
   // var grade = $(".o-list:eq(1)>font").attr("data-id");
  //  var dayfrom = $("#dayfrom").val().replace(/-/g,"");
 //   var dayto = $("#dayto").val().replace(/-/g,"");
  //  if (dayfrom=="") dayfrom ="0";
  //  if (dayto=="")  dayto ="0";
	var key = $("#keyword").val();	

//	if(key=="") 
  //  {
    //	 $("#ofix2_div_head,#ofix2_div_top_left,#ofix2_div_left").remove(); //先把原来固定的干掉
    	// initialization(dayfrom,dayto,coureid,grade);
   // }
	//layer.msg('请输入教师姓名');
	if (key!="") 
	{
		$("#tbTest2>tbody>tr").each(function(){
			
			if($(this).children("td").data("name")==key){
				$(this).css({"background":"#ff5858"});
//				console.log($(this).offset().top)
//				console.log($('#ofix2_tb_top_left').height())
				$('#table-body').animate({scrollTop:$(this)[0].offsetTop - $('#ofix2_tb_top_left').height()},500)
			}
			else  $(this).css({"background":"#FFF"});
		})
	}

}



function FieldSort(obj,_type,_sort,_indexth,_imgurl,index){ 
	var tempId = 0;
    var arr = JSON.parse($fc.local.Get("teacherlist"));   
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
    	//console.log("<img class='imgsort' src=\""+_imgurl+"jiangxu.png\" />");
    }
    else{
    	
    	$(".header-click[data-type='"+_type+"']").attr("data-sort","0");
    }

    $("#ofix2_div_head,#ofix2_div_top_left,#ofix2_div_left").remove(); //先把原来固定的干掉  
     
      _TEACHERARR.splice(0,_TEACHERARR.length); 

     SetTeacherHTML(arr);

     
     
	 	
	 setTimeout(function(){
	 	  $("#ofix2_div_head").find("th").find("img").hide();
	 	  $("#tbTest2>tbody>tr").each(function(i){
	 	  		$(this).children("td:eq("+(index+1)+")").css({"background":"#94b1ff"});
	 	  });
	 	  var tempSrc = $("body").attr("data-src");
//	 	  console.log(_sort)
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
//	$("#tbodyhtml").html("");
	var _n =0;	
    $.each(arr,function(i,sa){
         
        if(sa.id<4){
          var bg = "";
    	  if(sa.id==1) bg="#ffea7f";
    	  else if(sa.id==2) bg = "#fe7e7d";
    	  else if(sa.id==3) bg = "#7edfff";
    	  _n++;
          fixedhtml +="<tr data-id=\""+sa.id+"\" data-name=\""+sa.name+"\"  style=\"background: "+bg+"\">"+
				    "<td data-id=\""+sa.id+"\" data-name=\""+sa.name+"\" class=\"not\" style=\"width: 100px; text-align: center;\">"+sa.name+"</td>"+
				    "<td "+SetShow("1")+" class=\"not\" data-type='课表课时' data-field='lessonInCT' class='not' >"+toDecimal2(sa.lessonInCT)+"</td>"+
				    "<td "+SetShow("2")+" class=\"not\" data-type='如e课时' data-field='lesson' class='not'>"+toDecimal2(sa.lesson)+"</td>"+
				    "<td "+SetShow("3")+" class=\"not\" data-type='文件数量' data-field='file'>"+toDecimal2(sa.file)+"</td>"+
				    "<td "+SetShow("4")+" class=\"not\" data-type='提问次数' data-field='handon'>"+toDecimal2(sa.handon)+"</td>"+
				    "<td "+SetShow("5")+" class=\"not\" data-type='点名次数' data-field='callname'>"+toDecimal2(sa.callname)+"</td>"+
				    "<td "+SetShow("6")+" class=\"not\" data-type='奖励次数' data-field='reward'>"+toDecimal2(sa.reward)+"</td>"+
				    "<td "+SetShow("7")+" class=\"not\" data-type='习题数量' data-field='xiti'>"+toDecimal2(sa.xiti)+"</td>"+
				    "<td "+SetShow("8")+" class=\"not\" data-type='设置答案习题' data-field='xiti2'>"+toDecimal2(sa.xiti2)+"</td>"+
				    "<td "+SetShow("9")+" class=\"not\" data-type='拍照次数' data-field='photo'>"+toDecimal2(sa.photo)+"</td>"+
                    "<td "+SetShow("10")+" class=\"not\" data-type='批注次数' data-field='draw'>"+toDecimal2(sa.draw)+"</td>"+
                    "<td "+SetShow("11")+" class=\"not\" data-type='课均使用时长' data-field='time_avg'>"+toDecimal2(sa.time_avg)+"</td>"+
                    "<td "+SetShow("12")+" class=\"not\" data-type='课均课件' data-field='file_avg'>"+toDecimal2(sa.file_avg)+"</td>"+
                    "<td "+SetShow("13")+" class=\"not\" data-type='课均提问' data-field='handon_avg'>"+toDecimal2(sa.handon_avg)+"</td>"+
                    "<td "+SetShow("14")+" class=\"not\" data-type='课均出题' data-field='xiti_avg'>"+toDecimal2(sa.xiti_avg)+"</td>"+
                    "<td "+SetShow("15")+" class=\"not\" data-type='课均点名' data-field='callname_avg'>"+toDecimal2(sa.callname_avg)+"</td>"+
                    "<td "+SetShow("16")+" class=\"not\" data-type='课均奖励' data-field='reward_avg'>"+toDecimal2(sa.reward_avg)+"</td>"+
                    "<td "+SetShow("17")+" class=\"not\" data-type='课均拍照' data-field='photo_avg'>"+toDecimal2(sa.photo_avg)+"</td>"+
                    "<td "+SetShow("18")+" class=\"not\" data-type='课均批注' data-field='draw_avg'>"+toDecimal2(sa.draw_avg)+"</td>"+
                    "<td "+SetShow("19")+" class=\"not\" data-type='课均设答案题目' data-field='xiti2_avg'>"+toDecimal2(sa.xiti2_avg)+"</td>"+
                    "<td "+SetShow("20")+" class=\"not\" data-type='系统使用率' data-field='ratioDevice'>"+ toDecimal2(sa.ratioDevice*100)+"%</td>"+
				    "<td "+SetShow("21")+" class=\"not\" data-type='提问参与度' data-field='ratioHandon'>"+toDecimal2(sa.ratioHandon*100)+"%</td>"+
				    "<td "+SetShow("22")+" class=\"not\" data-type='习题参与度' data-field='ratioXiti'>"+toDecimal2(sa.ratioXiti*100)+"%</td>"+
				    "<td "+SetShow("23")+" class=\"not\" data-type='习题正确率' data-field='ratioXitiRight'>"+toDecimal2(sa.ratioXitiRight*100)+"%</td>"+
				    "<td "+SetShow("24")+" class=\"not\" data-type='点名覆盖率' data-field='ratioCallname'>"+toDecimal2(sa.ratioCallname*100)+"%</td>"+
				    "<td "+SetShow("25")+" class=\"not\" data-type='奖励覆盖率' data-field='ratioReward'>"+toDecimal2(sa.ratioReward*100)+"%</td>"+
				    "<td "+SetShow("26")+" class=\"not\" data-type='答案设置率' data-field='xitiAnswerSetRatio'>"+toDecimal2(sa.xitiAnswerSetRatio*100)+"%</td>"+
				"</tr>";
        }
        else
        {
         tdhtml +="<tr data-id=\""+sa.id+"\" data-name=\""+sa.name+"\">"+
				    "<td data-id=\""+sa.id+"\" data-name=\""+sa.name+"\" class=\"name-click\" style=\"width: 100px; text-align: center;\">"+sa.name+"</td>"+
				    "<td "+SetShow("1")+" data-type='课表课时' data-field='lessonInCT' class='not' >"+toDecimal2(sa.lessonInCT)+"</td>"+
				    "<td "+SetShow("2")+" data-type='如e课时' data-field='lesson' class='not'>"+toDecimal2(sa.lesson)+"</td>"+
				    "<td "+SetShow("3")+" data-type='文件数量' data-field='file'>"+toDecimal2(sa.file)+"</td>"+
				    "<td "+SetShow("4")+" data-type='提问次数' data-field='handon'>"+toDecimal2(sa.handon)+"</td>"+
				    "<td "+SetShow("5")+" data-type='点名次数' data-field='callname'>"+toDecimal2(sa.callname)+"</td>"+
				    "<td "+SetShow("6")+" data-type='奖励次数' data-field='reward'>"+toDecimal2(sa.reward)+"</td>"+
				    "<td "+SetShow("7")+" data-type='习题数量' data-field='xiti'>"+toDecimal2(sa.xiti)+"</td>"+
				    "<td "+SetShow("8")+" data-type='设置答案习题' data-field='xiti2'>"+toDecimal2(sa.xiti2)+"</td>"+
				    "<td "+SetShow("9")+" data-type='拍照次数' data-field='photo'>"+toDecimal2(sa.photo)+"</td>"+
                    "<td "+SetShow("10")+" data-type='批注次数' data-field='draw'>"+toDecimal2(sa.draw)+"</td>"+
                    "<td "+SetShow("11")+" data-type='课均使用时长' data-field='time_avg'>"+toDecimal2(sa.time_avg)+"</td>"+
                    "<td "+SetShow("12")+" data-type='课均课件' data-field='file_avg'>"+toDecimal2(sa.file_avg)+"</td>"+
                    "<td "+SetShow("13")+" data-type='课均提问' data-field='handon_avg'>"+toDecimal2(sa.handon_avg)+"</td>"+
                    "<td "+SetShow("14")+" data-type='课均出题' data-field='xiti_avg'>"+toDecimal2(sa.xiti_avg)+"</td>"+
                    "<td "+SetShow("15")+" data-type='课均点名' data-field='callname_avg'>"+toDecimal2(sa.callname_avg)+"</td>"+
                    "<td "+SetShow("16")+" data-type='课均奖励' data-field='reward_avg'>"+toDecimal2(sa.reward_avg)+"</td>"+
                    "<td "+SetShow("17")+" data-type='课均拍照' data-field='photo_avg'>"+toDecimal2(sa.photo_avg)+"</td>"+
                    "<td "+SetShow("18")+" data-type='课均批注' data-field='draw_avg'>"+toDecimal2(sa.draw_avg)+"</td>"+
                    "<td "+SetShow("19")+" data-type='课均设答案题目' data-field='xiti2_avg'>"+toDecimal2(sa.xiti2_avg)+"</td>"+
                    "<td "+SetShow("20")+" data-type='系统使用率' data-field='ratioDevice'>"+toDecimal2(sa.ratioDevice*100)+"%</td>"+
				    "<td "+SetShow("21")+" data-type='提问参与度' data-field='ratioHandon'>"+toDecimal2(sa.ratioHandon*100)+"%</td>"+
				    "<td "+SetShow("22")+" data-type='习题参与度' data-field='ratioXiti'>"+toDecimal2(sa.ratioXiti*100)+"%</td>"+
				    "<td "+SetShow("23")+" data-type='习题正确率' data-field='ratioXitiRight'>"+toDecimal2(sa.ratioXitiRight*100)+"%</td>"+
				    "<td "+SetShow("24")+" data-type='点名覆盖率' data-field='ratioCallname'>"+toDecimal2(sa.ratioCallname*100)+"%</td>"+
				    "<td "+SetShow("25")+" data-type='奖励覆盖率' data-field='ratioReward'>"+toDecimal2(sa.ratioReward*100)+"%</td>"+
				    "<td "+SetShow("26")+" data-type='答案设置率' data-field='xitiAnswerSetRatio'>"+toDecimal2(sa.xitiAnswerSetRatio*100)+"%</td>"+
				"</tr>";
				_TEACHERARR.push({"id":sa.id,"name":sa.name});
			}
        
		
  	 })
  	 $("#tbodyhtml").html(fixedhtml+tdhtml);


     $("#tbodyhtml>tr>td:not(.not)").off().on("click",function(){		      
     	var obj = $(this);
//       tdclick(obj)
     });

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
              // console.log(index);
			 //$("#tbTest2>tbody>tr>td").css({"background":"#FFF"});//将原来的清除
			 //$("#tbTest2>tbody>tr").each(function(i){				 	
			 	// $(this).children("td:eq("+(index+1)+")").css({"background":"#94b1ff"})
			 //});
              //console.log($(this).data("type"));
              var obj = $(this);
              var _type = obj.data("type");
              var _sort = obj.attr("data-sort");
              var _indexth =  obj.data("index");
              var _imgurl = obj.data("url");
             // console.log(obj);
              FieldSort(obj,_type,_sort,_indexth,_imgurl,index);

		});
		//选择行
//		$(".name-click").on("mouseover",function(){
//			var name = $(this).html();
//			$("#tbTest2>tbody>tr").each(function(){
//			
//				if($(this).children("td").data("name")==name){
//					$(this).css({"background":"#94b1ff"});
//				}
//				else  $(this).css({"background":"#FFF"});
//	    	})			
//		})
		$(".name-click").on("click",function(){
			var name = $(this).html();
			var id = $(this).attr('data-id');
			var schoolid = $('body').attr("data-schoolid");
			$("#tbTest2>tbody>tr").each(function(){
			
			if($(this).children("td").data("name")==name){
				$(this).css({"background":"#94b1ff"});
			}
			else  $(this).css({"background":"#FFF"});
	    	})
			
			var url = $('#info').data("url");
        	var day = $("body").attr("data-day");
        	
        	var dayfrom = $("#dayfrom").val().replace(/-/g, "");
		    var dayto = $("#dayto").val().replace(/-/g, "");
		    if(dayfrom=="") dayfrom="0";
		    if(dayto=="") dayto="0";
        	
       		$fc.goURL('/index.php/Manage/Index/teacherinfo/schoolid/'+ schoolid +'/dayfrom/'+ dayfrom +'/dayto/'+ dayto +'/classid/0/more/1/$teachername/' + name + '/$teacherid/' + id);
			
			//var index = $(".name-click").index(this);
             //console.log($(this).html())
			//$("#tbTest2>tbody>tr>td").css({"background":"#FFF"});//将原来的清除
			//$("#tbTest2>tbody").children("tr:eq("+(index+2)+")").children("td").css({"background":"#94b1ff"});
		})

       document.getElementById('ofix2_div_head').scrollLeft = $(".table-body").scrollLeft();
       document.getElementById("table-body").scrollTop =0;

	},100);
		
	
}

function selectdate(obj){
	
	var coure = $(".o-list:eq(0)>font").attr("data-id");
	var grade = $(".o-list:eq(1)>font").attr("data-id");
	var dayfrom = $("#dayfrom").val().replace(/-/g, "");
	var dayto = $("#dayto").val().replace(/-/g, "");
    if(dayfrom=="") dayfrom="0";
    if(dayto=="") dayto="0";
    if(dayfrom!=""&&dayto!=""){
        $("#ofix2_div_head,#ofix2_div_left,#ofix2_tb_top_left").html("");
        console.log(dayfrom)
         initialization(dayfrom,dayto,coure,grade);
     }	
}

function SetShow(num){

    var str ="";
   
    if(_h_list.indexOf("<"+num+">")>-1)  str ="style=\"display:none\"";

    return str;
}

function tdclick(obj){
        var schoolid = $("body").data("schoolid");
        var teacherid = obj.parent("tr").data("id");
        var teachername = obj.parent("tr").data("name");
        var type = obj.data("type");
        var field = obj.data("field");
	    layer.open({
		  type: 1,		
		  area: ['620px', '400px'], //宽高
		  title:teachername+'；'+type+'趋势图',
		  shadeClose: true, //点击遮罩关闭
		  content: '<div class="sub-charts-box">'+
		            '<div class="tab-btn" id="tab-btn"><span class="active" data-days="7">近一周</span><span data-days="30">近一月</span></div>'+
		            '<div class="sub-charts" id="sub-charts"></div>'+
		           '</div>' 
		});

        SetChartData(schoolid,teacherid,7,teachername,field);//默认是近一周的数据

       
    	$("#tab-btn>span").unbind().click(function(){	
		
		  $("#tab-btn>span").removeClass("active");
		   $(this).addClass("active");
		   var days = $(this).data("days");
           SetChartData(schoolid,teacherid,days,teachername,field);//默认是近一周的数据
	   });
}



function SetChartData(schoolid,teacherid,days,title,field){
//	console.log({schoolid,teacherid,days,title})
    $data.getAvgStat(teacherid,schoolid,"20161101",function(out){        	
		 var avg = out.data.stat_avg_teacher;
		// console.log(avg);
		 //默认为一周的数据
	     var arrData = new Array();
	     var dateData = new Array();
		 for (var i=days; i>0; i--) {
		 	var day = SetDateFC(i); 
		 	var _data = 0;       	 	
	        $.each(avg,function(j,sub_avg){
	            if (day==sub_avg.day) {
	               _data = sub_avg[field];
	               return false;
	            }
	        });
	        dateData.push(day);
	        arrData.push(_data);
		 }
		 showchart("sub-charts",dateData,arrData,title,days);
        
		// console.log(arrData);
   })
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
	
function showchart(_divid,date,dataarr,title,days){
	var data1 = [];
	var data2 = [];
	var data3 = [];
	if(parseInt(days) < 10){
		data1 = [11, 12, 14, 18, 16, 12, 14];
		data2 = [23, 22, 23, 25, 26, 22, 24];
		data3 = [13, 14, 14, 18, 16, 12, 15];
	}else{
		data1 = [11, 12, 14, 18, 16, 22, 24,21, 22, 24, 18, 26, 22, 24,21, 18, 16, 18, 16, 12, 14,21, 12, 14, 18, 16, 12, 14,12,11];
		data2 = [13, 12, 13, 15, 16, 12, 14,3, 2, 3, 5, 6, 2, 8,8, 12, 13, 15, 16, 22, 24,13, 12, 13, 15, 16, 22, 24,22,23];
		data3 = [11, 22, 24, 18, 16, 12, 14,11, 12, 14, 18, 16, 22, 24,21, 22, 24, 18, 26, 22, 24,21, 22, 24, 20, 26, 22, 24,21,21];
	}
	
	var myChart  = echarts.init(document.getElementById(_divid));
	option = {
	    tooltip : {
	        trigger: 'axis'
	    },		    
	     legend: {
	        left: '25%',
	        data: [title,"全校平均","科目平均","年级平均"]
	    },
	    xAxis: {
	        type: 'category',
	        name: 'x',
	        splitLine: {show: false},
	        data: date//['一', '二', '三', '四', '五', '六', '七', '八', '九']
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
	            name: title,
	            type: 'line',
	            stack: title,
	            data: dataarr,
	            itemStyle:{label : {show: true}}
	        },
	        {
	            name: '全校平均',
	            type: 'line',
	            stack:'全校平均',
	            data: data1,
	            itemStyle:{label : {show: true}}
	        },
	        {
	            name: '科目平均',
	            type: 'line',
	            stack:"科目平均",
	            data: data2,
	            itemStyle:{label : {show: true}}
	        },
	        {
	            name: '年级平均',
	            type: 'line',
	            stack:"年级平均",
	            data: data3,
	            itemStyle:{label : {show: true}}
	        }
	    ]
	};
	myChart.setOption(option);
}


