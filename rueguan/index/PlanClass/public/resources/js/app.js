
$(function(){
	 $mc.autoHeight();
	 $("#outlogin").off().on("click",function(){ 
        $data.outlogin();
   })
})


function CreateCourse(){     
     var body = $("body");
     var url = body.data("ajax")+"GetGradeList";
     var schoolid = body.data("schoolid");
     $.post(url,{
     	"schoolid":schoolid
     },function(out){
     	layer.open({
		  type: 1,
		  title: "创建选课",
		  closeBtn: 1,
		  scrollbar: false,
		  area:['400px','290px'],
		  content: '<div class="pop-body">'+
		           //  '<div class="pop-box"><div class="sub-left">名称</div><div class="sub-right"><input  id="pop-name" class="select"  /></div></div>'+
		             '<div class="pop-box"><div class="sub-left">选择年级</div><div class="sub-right"><select id="pop-grade" class="select" >'+out.grade+'</select></div></div>'+
		            // '<div class="pop-box"><div class="sub-left">选择课程</div><div class="sub-right"><select id="pop-course" class="select">'+out.course+'</select></div></div>'+
		            // '<div class="pop-box"><div class="sub-left">类型</div><div class="sub-right"><select id="pop-type" class="select" >'+out.type+'</select></div></div>'+
		             '<div class="pop-box"><div class="sub-left">开始日期</div><div class="sub-right"><input  id="pop-dayfrom" class="select" onclick="WdatePicker()"  /></div></div>'+
		             '<div class="pop-box"><div class="sub-left">截止日期</div><div class="sub-right"><input  id="pop-dayto" class="select" onclick="WdatePicker()"  /></div></div>'+
		             '<div class="pop-box"><div class="sub-left">最大人数</div><div class="sub-right"><input  id="pop-max" class="select" /></div></div>'+
                     '</div>'+
		          '<div class="pop-btn"><a href="#" class="btn btn-default radius">取消</a><a href="#" class="btn btn-primary radius">保存</a></div>'
		});
     	$(".btn-default").off().on("click",function(){ //取消按钮
     		 layer.close($("html").attr("layer-full"));
     	})
     	$(".btn-primary").off().on("click",function(){
     		var name = $("#pop-name").val();
     		var grade = $("#pop-grade").val();
     		var course = $("#pop-course").val();
     		var dayfrom = $("#pop-dayfrom").val();
     		var dayto = $("#pop-dayto").val();
     		var max = $("#pop-max").val();
     		var type = $("#pop-type").val();
     		if(name=="") $mc.layer.msg("请填写名称");
     		else if(dayfrom=="") $mc.layer.msg("请选择开始日期");
     		else if(dayto=="") $mc.layer.msg("请选择截止日期");
     		else if(max=="") $mc.layer.msg("请填写最大报名人数");
            else{
            	$data.AjaxCreateCourse(schoolid,name,grade,course,dayfrom,dayto,max,type);
            }
     	})
     },"json")

	  
}

function lookCourse(courseid){
     var body = $("body");
     var url = body.data("ajax")+"lookCourse";
     var schoolid = body.data("schoolid");
     $.post(url,{
       "schoolid":schoolid,     
       "courseid":courseid
     },function(out){
          layer.open({
          type: 1,
          title: "修改选课",
          closeBtn: 1,
          scrollbar: false,
          area:['400px','290px'],
          content: '<div class="pop-body">'+
                    // '<div class="pop-box"><div class="sub-left">名称</div><div class="sub-right"><input  id="pop-name" value="'+out.name+'" class="select"  /></div></div>'+
                     '<div class="pop-box"><div class="sub-left">选择年级</div><div class="sub-right"><select id="pop-grade" class="select" >'+out.grade+'</select></div></div>'+
                   //  '<div class="pop-box"><div class="sub-left">选择课程</div><div class="sub-right"><select id="pop-course" class="select">'+out.course+'</select></div></div>'+
                    // '<div class="pop-box"><div class="sub-left">类型</div><div class="sub-right"><select id="pop-type" class="select" >'+out.type+'</select></div></div>'+
                     '<div class="pop-box"><div class="sub-left">开始日期</div><div class="sub-right"><input  id="pop-dayfrom" value="'+out.dayfrom+'" class="select" onclick="WdatePicker()"  /></div></div>'+
                     '<div class="pop-box"><div class="sub-left">截止日期</div><div class="sub-right"><input  id="pop-dayto" value="'+out.dayto+'" class="select" onclick="WdatePicker()"  /></div></div>'+
                     '<div class="pop-box"><div class="sub-left">最大人数</div><div class="sub-right"><input  id="pop-max" value="'+out.max+'" class="select" /></div></div>'+
                         '</div>'+
                  '<div class="pop-btn"><a href="#" class="btn btn-default radius">取消</a><a href="#" class="btn btn-primary radius">修改</a></div>'
        });

        $(".btn-default").off().on("click",function(){ //取消按钮
         layer.close($("html").attr("layer-full"));
        })
        $(".btn-primary").off().on("click",function(){
          var name = $("#pop-name").val();
          var grade = $("#pop-grade").val();
          var course = $("#pop-course").val();
          var dayfrom = $("#pop-dayfrom").val();
          var dayto = $("#pop-dayto").val();
          var max = $("#pop-max").val();
          var type = $("#pop-type").val();
          if(name=="") $mc.layer.msg("请填写名称");
          else if(dayfrom=="") $mc.layer.msg("请选择开始日期");
          else if(dayto=="") $mc.layer.msg("请选择截止日期");
          else if(max=="") $mc.layer.msg("请填写最大报名人数");
          else{
            $data.AjaxUpdateCourse(courseid,name,grade,course,dayfrom,dayto,max,type);
          }
        })
      
     },"json");

}


function showMenu(obj){	
	var subobj = obj.children(".sub-menu");
	var h = subobj.height();
	var l = subobj.children("a").length;	
	if(h>0){
		subobj.animate({
			height:"0px"
		},200)
	}
	else{
		subobj.animate({
			height:(l*35)+"px"
		},200)
	}
}

function calculate(obj){
	var num = obj.parent("td").data("num");
	var classnum = obj.val();
	if(classnum==0)
	{ 
		$mc.layer.msg("所分班级数量不能为零");
		obj.val("");
		obj.parent("td").next("td").html("0");
    }    
	else if(classnum>num) $mc.layer.msg("班级数量不可以大于学生数量");
	else{
		obj.parent("td").next("td").html(parseInt(num/classnum));
	}
}
function startFanBan(obja){
	var cv = [];
	$("input[name='idlist']:checked").each(function(){		
		cv.push($(this).val());		
	});
	if(cv.length==0) $mc.layer.msg("您还没有选择任何一个科目");
    else{
    	var isNull = true;
    	var idlist= "";
    	
    	$.each(cv,function(i,sa){
         var obj = $("#input-"+sa);
    		 var str = obj.val();
    		 if(str=="0"||str==""){
    		 	 $mc.layer.msg("您所选择的科目中有未设置班级数量的");
    		 	 isNull = false;
    		 	 return isNull;
    		 }
    		 else{
                idlist += sa+","+str+","+ obj.parent("td").data("grade")+","+obj.parent("td").data("coursename")+";";
    		 }    		 
    	});
      console.log(idlist);
    	if(isNull){
    		var ismark = obja.attr("data-ismark");
    		if(ismark==0){
    		   obja.attr("data-ismark","1");
    		   obja.removeClass("btn-secondary").addClass("btn-default");
    		   obja.children("img").show();
               $data.createClass(idlist,obja);
            }
            else {
            	$mc.layer.msg("系统正在分班，请稍后");
            }
    	}

    }
	
}

function GetInputData(){
   var list ="";
   $(".fenbaninput").each(function(){
        var obj = $(this);
        var id = obj.data("id");
        var val = obj.val();
        list +=id+","+val+";";
   });
   $data.SetWeekLesson(list);
}
function AddClassRoom(){
      layer.open({
      type: 1,
      title: "新建教室",
      closeBtn: false,
      scrollbar: false,
      area:['400px','250px'],
      content: '<div class="pop-body">'+
                 '<div class="pop-box"><div class="sub-left">教室名称</div><div class="sub-right"><input  id="pop-name" class="select"  /></div></div>'+
                 '<div class="pop-box"><div class="sub-left">最大班级数</div><div class="sub-right"><input  id="pop-class" class="select"  /></div></div>'+
                 '<div class="pop-box"><div class="sub-left">最多学生数</div><div class="sub-right"><input  id="pop-student" class="select"  /></div></div>'+
                '</div>'+
              '<div class="pop-btn"><a href="#" class="btn btn-default radius">取消</a><a href="#" class="btn btn-primary radius">保存</a></div>'
      });
      $(".btn-default").off().on("click",function(){ //取消按钮
         layer.close($("html").attr("layer-full"));
         $mc.f5();
      });
      $(".btn-primary").off().on("click",function(){
          var name = $("#pop-name").val();
          var nclass = $("#pop-class").val();
          var student = $("#pop-student").val();
          if(name=="") $mc.layer.msg("请填写教室名称");
          else{
            $data.AddClassRoom(name,nclass,student);
          }
      })
}

$data = { 
  login:function(username,password,type,remember){
     var url = $("body").data("ajax")+"Ajaxlogin";
     $.post(url,{
        "username":username,
        "password":password,
        "type":type,
        "remember":remember
     },function(out){
         console.log(out);
         if(out==1) {
            $mc.goURL("index");
         }
         else if(out==2){
            $mc.goURL("studentindex");
         }
         else {$mc.layer.msg(out);}
     })
  },
  outlogin:function(){
      var url = $("body").data("ajax")+"OutLogin";
      $.post(url,{         
      },function(out){
         $mc.goURL("/index.php/PlanClass/Index/login");
      })
  },
  AjaxCreateCourse:function(schoolid,name,grade,course,dayfrom,dayto,max,type){
  	  var url = $("body").data("ajax")+"AjaxCreateCourse";
  	  $.post(url,{
  	  	  "schoolid":schoolid,
  	  	  "name":name,
  	  	  "grade":grade,
  	  	  "course":course,
  	  	  "dayfrom":dayfrom,
  	  	  "dayto":dayto,
  	  	  "max":max,
  	  	  "type":type
  	  },function(out){
  	     if(out==1){
  	     	 $mc.layer.msgFC("选课信息创建成功",function(){
  	     	 	$mc.f5();  	     	 	
  	     	 })
  	     }
  	     else $mc.layer.msg("选课信息创建失败");
  	  })
  },
  AjaxUpdateCourse:function(courseid,name,grade,course,dayfrom,dayto,max,type){
      var url = $("body").data("ajax")+"AjaxUpdateCourse";
      $.post(url,{
          "courseid":courseid,
          "name":name,
          "grade":grade,
          "course":course,
          "dayfrom":dayfrom,
          "dayto":dayto,
          "max":max,
          "type":type
      },function(out){
         if(out==1){
           $mc.layer.msgFC("选课信息修改成功",function(){
              $mc.f5();           
           })
         }
         else $mc.layer.msg("修改过程中发生了意外");
      })
  },
  createClass:function(idlist,obja){
      var url = $("body").data("ajax")+"createClass";
      var schoolid = $("body").data("schoolid");
      $.post(url,{
      	"schoolid":schoolid,
      	"idlist":idlist //id+班级数量+年级id+科目id
      },function(out){
      	 if(out==1){
      	 	 $mc.layer.msgFC("分班完成",function(){
  	     	 	 $mc.f5();  	     	 	
  	     	 })
      	 }
      	 else  $mc.layer.msg("分班过程中系统出错");
      })
  },
  SetClassTeacher:function(classid,teacherid){
  	   var url = $("body").data("ajax")+"SetClassTeacher";
       $.post(url,{
       	  "classid":classid,
       	  "teacherid":teacherid
       },function(out){
       	   if(out==1){
               $mc.layer.msgFC("教师设置成功",function(){
  	     	 	 $mc.f5();  	     	 	
  	     	 })
       	   }
       	   else $mc.layer.msg("系统错误，教师设置失败");
       })
  },
  SetTeacher:function(classid){
      var obj = $("body");
      var url = obj.data("ajax")+"GetTeacherList";
      var schoolid = obj.data("schoolid"); 
      $.post(url,{
        "schoolid":schoolid
      },function(out){      
        var name ="";
        $.each(out.data,function(i,sa){
              name +="<div class=\"pop-name\">"+
                     "<div class=\"check-box\">"+
                      "<input type=\"radio\" name=\"radio\" value=\""+sa.id+"\" id=\"checkbox-"+i+"\">"+
                      "<label for=\"checkbox-"+i+"\">&nbsp;"+sa.name+"</label>"+
                    "</div>"+
                  "</div>";
        })
        layer.open({
        type: 1,
        title: "设置任课教师",
        closeBtn: 1,
        scrollbar: false,
        area:['400px','250px'],
        content: '<div class="pop-teacherlist">'+
                    name +                
                 '</div>'+
                 '<div class="pop-btn"><a href="#" class="btn btn-default radius">取消</a><a href="#" class="btn btn-primary radius">保存</a></div>'
       });
         $(".btn-default").off().on("click",function(){ //取消按钮
           layer.close($("html").attr("layer-full"));
         });
         $(".btn-primary").off().on("click",function(){    
             var id =  $('input:radio:checked').val();
             if(id==undefined)   {
                $mc.layer.msg("请先选择一个老师");
             }
             else $data.SetClassTeacher(classid,id);
         })
      },"json")
  },
  /*DeleteStudent:function(studentid,classid){
       var url = $("body").data("ajax")+"DeleteStudent";
       $.post(url,{
          "studentid":studentid,
          "classid":classid
       },function(out){
        console.log(out);
       })
  },*/
  getClassList:function(studentid,classid){
      var obj = $("body");
      var url = obj.data("ajax")+"getClassList";
      var schoolid = obj.data("schoolid"); 
      $.post(url,{
          "schoolid":schoolid,
          "classid":classid
      },function(out){
        
        var name ="";
        $.each(out.data,function(i,sa){
              name +="<div class=\"pop-classname\">"+
                      "<div class=\"check-box\">"+
                       "<input type=\"radio\" name=\"radio\" value=\""+sa.id+"\" id=\"checkbox-"+i+"\">"+
                       "<label for=\"checkbox-"+i+"\">&nbsp;"+sa.name+"</label>"+
                     "</div>"+
                    "</div>";
        });

        layer.open({
        type: 1,
        title: "移动学生",
        closeBtn: 1,
        scrollbar: false,
        area:['400px','250px'],
        content: '<div class="pop-teacherlist">'+
                    name +                
                 '</div>'+
                 '<div class="pop-btn"><a href="#" class="btn btn-default radius">取消</a><a href="#" class="btn btn-primary radius">保存</a></div>'
       });
         $(".btn-default").off().on("click",function(){ //取消按钮
           layer.close($("html").attr("layer-full"));
         });
         $(".btn-primary").off().on("click",function(){  
            var id =  $('input:radio:checked').val();
            if (id==undefined) {
                $mc.layer.msg("请选择一个班级");
            }
            else $data.moveStudent(id,studentid)
           
         })

      },"json")
  },
  moveStudent:function(classid,studentid){
     layer.msg('确定将该学生移至您所选班级下吗？', {
        time: 0 //不自动关闭
        ,btn: ['移除', '关闭']
        ,yes: function(index){
          layer.close(index);
           var url = $("body").data("ajax")+"moveStudent";
           $.post(url,{
              "classid":classid,
              "studentid":studentid
           },function(out){
               if (out==1) {
                  $mc.layer.msgFC("学生移动成功",function(){
                     $mc.f5();
                  })
               }
               else $mc.msg("移动学生过程中出现了错误");
           })
        }
      })
  },
  SetWeekLesson:function(list){
      var obj = $("body");
      var url = obj.data("ajax")+"SetWeekLesson";
      var schoolid = obj.data("schoolid");
      $.post(url,{
          "schoolid":schoolid,
          "list":list
      },function(out){
         if(out==1) $mc.layer.msg("周课时计划设置更新成功");
         else $mc.layer.msg("更新过程中出现错误，更新失败");
      })
  },
  AddClassRoom:function(name,nclass,student){
      var obj = $("body");
      var url = obj.data("ajax")+"AddClassRoom";
      var schoolid = obj.data("schoolid");
      $.post(url,{
         "schoolid":schoolid,
         "roomname":name,
         "nclass":nclass,
         "nseat":student
      },function(out){
          if(out==1){
              $("#pop-name,#pop-class,#pop-student").val("");
              $mc.layer.msg("班级创建成功");
          }
          else{
              $mc.layer.msg("班级创建过程中遇到未知错误，创建失败");
          }
      })
  },
  GetClassRoom:function(roomid){
      layer.load(2);
      var obj = $("body");
      var url = obj.data("ajax")+"GetClassRoom";
      var schoolid = obj.data("schoolid");      
      $.post(url,{
        "schoolid":schoolid,
        "roomid":roomid
      },function(out){
          layer.closeAll('loading');
          $("#thtml").html(out);
          $("#thtml").find("td").off().on("click",function(){
              var td = $(this);
              var week = td.data("week");
              var index = td.data("index");
              var type = td.attr("data-type");
              $data.classRoomNot(td,schoolid,roomid,week,index,type)
          })
      })
  },
  classRoomNot:function(obj,schoolid,roomid,week,index,type){    
      var url = $("body").data("ajax")+"classRoomNot";
      $.post(url,{
        "schoolid":schoolid,
        "roomid":roomid,
        "week":week,
        "index":index,
        "type":type
      },function(out){
         
         if(out==1){
             if(type==0){
                obj.attr("data-type","1");
                obj.css({"background":"#f09800","color":"#fff"}).html("禁排");
             }
             else{
                obj.attr("data-type","0");
                obj.css({"background":"#FFF"}).html("");
             }
         }
      })
  },
  GetTeacherNot:function(teacherid){
      layer.load(2);
      var obj = $("body");
      var url = obj.data("ajax")+"GetTeacherTable";
      var schoolid = obj.data("schoolid");
      $.post(url,{
         "schoolid":schoolid,
         "teacherid":teacherid
      },function(out){
          layer.closeAll('loading');
          $("#thtml").html(out);
          $("#thtml").find("td").off().on("click",function(){
              var td = $(this);
              var week = td.data("week");
              var index = td.data("index");
              var type = td.attr("data-type");
              $data.SetTeacherNot(td,schoolid,teacherid,week,index,type);
          })
      })
   },
   SetTeacherNot:function(obj,schoolid,teacherid,week,index,type){
      var url = $("body").data("ajax")+"SetTeacherNot";
      $.post(url,{
        "schoolid":schoolid,
        "teacherid":teacherid,
        "week":week,
        "index":index,
        "type":type
      },function(out){         
         if(out==1){
             if(type==0){
                obj.attr("data-type","1");
                obj.css({"background":"#f09800","color":"#fff"}).html("禁排");
             }
             else{
                obj.attr("data-type","0");
                obj.css({"background":"#FFF"}).html("");
             }
         }
      })
   },
   GetCourseNot:function(courseid){
      layer.load(2);
      var obj = $("body");
      var url = obj.data("ajax")+"GetCourseTable";
      var schoolid = obj.data("schoolid");
      $.post(url,{
         "schoolid":schoolid,
         "courseid":courseid
      },function(out){
          layer.closeAll('loading');
          $("#thtml").html(out);
          $("#thtml").find("td").off().on("click",function(){
              var td = $(this);
              var week = td.data("week");
              var index = td.data("index");
              var type = td.attr("data-type");
              $data.SetCourseNot(td,schoolid,courseid,week,index,type);
          })
      })
   },
   SetCourseNot:function(obj,schoolid,courseid,week,index,type){
       var url = $("body").data("ajax")+"SetCourseNot";
      $.post(url,{
        "schoolid":schoolid,
        "courseid":courseid,
        "week":week,
        "index":index,
        "type":type
      },function(out){         
         if(out==1){
             if(type==0){
                obj.attr("data-type","1");
                obj.css({"background":"#f09800","color":"#fff"}).html("禁排");
             }
             else{
                obj.attr("data-type","0");
                obj.css({"background":"#FFF"}).html("");
             }
         }
      })
   },
   GetClassRoomTable:function(roomid){
       layer.load(2);
       var obj = $("body");
       var url = obj.data("ajax")+"GetClassRoomTable";
       var schoolid = obj.data("schoolid"); 
       $.post(url,{
          "schoolid":schoolid,
          "roomid":roomid
       },function(out){
          layer.closeAll('loading');
          $("#thtml").html(out);
          console.log(out);
       })
   },
   GetTeacherTable:function(teacherid){     
       layer.load(2);
       var obj = $("body");
       var url = obj.data("ajax")+"GetTeacherCourseTable";
       var schoolid = obj.data("schoolid"); 
       $.post(url,{
          "schoolid":schoolid,
          "teacherid":teacherid
       },function(out){
           layer.closeAll('loading');
           $("#thtml").html(out);
       })
   },
   CancelClass:function(courseid,index){
       var obj = $("body");
       var url = obj.data("ajax")+"CancelClass";
       var schoolid = obj.data("schoolid"); 
       $.post(url,{
         "schoolid":schoolid,
         "courseid":courseid
       },function(out){
          if (out==1) {
             layer.close(index);
             $mc.layer.msgFC("取消科目分班成功",function(){
                $mc.f5();
             })
          }
          else $mc.layer.msg("执行过程中发生意外");
       })
   },
   BaoMing:function(courseid){
      var obj = $("body");
      var schoolid = obj.data("schoolid");
      var grade = obj.data("grade");
      var studentid = obj.data("studentid");
      var url = obj.data("ajax")+"SignUp";
      $.post(url,{
         "schoolid":schoolid,
         "grade":grade,
         "studentid":studentid,
         "courseid":courseid
      },function(out){
        
         if (out==1) {
             $mc.layer.msgFC("报名成功",function(){
                $mc.f5();
             })
         }else {
             $mc.layer.msg("报名过程中发成错误，报名失败");
         }
      })
   },
   paike:function(obj){
      obj.removeClass("btn-secondary").addClass("disabled");
      obj.children("img").show();
      var ismark = obj.attr("data-ismark");
      if(ismark==0){
        obj.attr("data-ismark","1");
        var obj = $("body");
        var schoolid = obj.data("schoolid");
        var path = "http://api.skyeducation.cn/EduApi_Test/ruyiguan?action=paike&schoolid="+schoolid;
        $.ajax({
             type:"get",
             dataType:"jsonp",
             url: path,
             success: function(out){                    
               obj.attr("data-ismark","0");
               obj.removeClass("disabled").addClass("btn-secondary");
               obj.children("img").hide();
            },
            error:function(){
               $mc.layer.msg("网络错误");
            }
        })
      }
      else {
          $mc.layer.msg("系统正在排课，请稍后~");
      }
   }
    /*SignUp:function(courseid,type){ //学生报名
      var obj = $("body");
      var schoolid = obj.data("schoolid");
      var studentid = obj.data("studentid");
      var url = obj.data("ajax")+"SignUp";
      $.post(url,{
         "schoolid":schoolid,
         "studentid":studentid,
         "courseid":courseid,
         "type":type
      },function(out){
          if (out==1) {$mc.layer.msgFC("报名成功",function(){ $mc.f5() })}
          else if(out==0){ $mc.layer.msg("报名过程中发成错误，报名失败"); }
          else $mc.layer.msg(out);
      })
   },
  CancelSignUp:function(courseid,studentid,index){
      var obj = $("body");     
      var url = obj.data("ajax")+"CancelSignUp";
      $.post(url,{
         "courseid":courseid,
         "studentid":studentid
      },function(out){
           if(out==1){
             $mc.layer.msgFC("报名取消成功",function(){ $mc.f5() })
           }
           else $mc.layer.msg("取消过程中发生了意外，取消失败");
      })
   }*/
}

$mc = {
	f5:function(){
		location.reload();
	},
	goURL(url){
		window.location.href = url;
	},
	layer:{
		msg:function(str){
			layer.msg(str);
		},
		msgFC:function(str,callback){
			layer.msg(str,function(){
				if (typeof callback==="function") {
					callback();
				}
			})
		}
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
	},
	autoHeight:function(){
		var h = $(document).height();		
		$(".content-body>.left,.content-body>.right").css({"min-height":(h-40)+"px"}); 
	}
}
