var https_g = "http://api.skyeducation.cn/EduApi_Test/ruyiguan?";
$data = {
	 weekdata:function(dayfrom,dayto,schoolid,callfun){
          var url = "action=getSchoolStatByDate&dayfrom=" +dayfrom+ "&dayto=" +dayto+ "&schoolid=" + schoolid; 
//         console.log(https_g+url);
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
// 	   	  	console.log(out);
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }) 
	 },
	 monthdata:function(dayfrom,dayto,schoolid,callfun){
	 	if(typeof callfun === "function") {
	 		var out = {"ret":"1","msg":"getSchoolStat_Week ok","data":{"daylist":[{"lesson":0,"day":20170401,"lessonRatio":0,"file":"0","handon":"0","callname":"0","reward":"0","xiti":"0","xiti2":"0","photo":"0","draw":"0","count":0},{"lesson":0,"day":20170402,"lessonRatio":0,"file":"0","handon":"0","callname":"0","reward":"0","xiti":"0","xiti2":"0","photo":"0","draw":"0","count":0},{"lesson":0,"day":20170403,"lessonRatio":0,"file":"0","handon":"0","callname":"0","reward":"0","xiti":"0","xiti2":"0","photo":"0","draw":"0","count":0},{"lesson":0,"day":20170404,"lessonRatio":0,"file":"0","handon":"0","callname":"0","reward":"0","xiti":"0","xiti2":"0","photo":"0","draw":"0","count":0},{"lesson":14,"day":20170405,"lessonRatio":3.230769230769231,"file":"21","handon":"29","callname":"44","reward":"17","xiti":"3","xiti2":"1","photo":"5","draw":"8","count":106},{"lesson":13,"day":20170406,"lessonRatio":3,"file":"21","handon":"37","callname":"58","reward":"17","xiti":"4","xiti2":"0","photo":"9","draw":"13","count":138},{"lesson":4,"day":20170407,"lessonRatio":0.9230769230769231,"file":"7","handon":"2","callname":"11","reward":"8","xiti":"0","xiti2":"0","photo":"0","draw":"2","count":23},{"lesson":0,"day":20170408,"lessonRatio":0,"file":"0","handon":"0","callname":"0","reward":"0","xiti":"0","xiti2":"0","photo":"0","draw":"0","count":0},{"lesson":0,"day":20170409,"lessonRatio":0,"file":"0","handon":"0","callname":"0","reward":"0","xiti":"0","xiti2":"0","photo":"0","draw":"0","count":0},{"lesson":0,"day":20170410,"lessonRatio":0,"file":"0","handon":"0","callname":"0","reward":"0","xiti":"0","xiti2":"0","photo":"0","draw":"0","count":0},{"lesson":0,"day":20170411,"lessonRatio":0,"file":"0","handon":"0","callname":"0","reward":"0","xiti":"0","xiti2":"0","photo":"0","draw":"0","count":0},],"avg":{"id":"1","name":"\u5168\u6821\u5e73\u5747","lesson":31,"lessonInCT":0,"time":"1.0","nppt":"1.0","nhandon":"2.0","ncallname":"3.0","nreward":"1.0","nxiti":"0.0","nxiti2":"0.0","npic":"0.0","ndraw":"0.0","ratioDevice":0.04731379731379732,"ratioHandon":"0.28554838709677416","ratioXiti":"0.076","ratioXitiRight":"0.028870967741935486","ratioCallname":"0.14451612903225805","ratioReward":"0.07774193548387096","xitiAnswerSetRatio":"-"}}};
	 		callfun(out);
	 	}
	 },
	 getSchoolStatByDay:function(dayfrom,dayto,schoolid,callfun){
          var url = "action=getSchoolStatByDay&dayfrom=" +dayfrom+ "&dayto=" +dayto+ "&schoolid=" + schoolid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getRobertPen:function(lessonid,classid,callfun){
          var url = "action=getRobertPenEvent&lessonid=" +lessonid+ "&classid=" +classid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getVideoEvent:function(lessonid,classid,callfun){
          var url = "action=getVideoEvent&lessonid=" +lessonid+ "&classid=" +classid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getGroupRaceStatistics:function(lessonid,classid,callfun){
          var url = "action=getGroupRaceStatistics&lessonid=" +lessonid+ "&classid=" +classid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getVoteStatistics:function(lessonid,classid,callfun){
          var url = "action=getVoteStatistics&lessonid=" +lessonid+ "&classid=" +classid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getCompetitiveStatistics:function(lessonid,classid,callfun){
          var url = "action=getCompetitiveStatistics&lessonid=" +lessonid+ "&classid=" +classid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getCallnameStatistics:function(lessonid,classid,callfun){
          var url = "action=getCallnameStatistics&lessonid=" +lessonid+ "&classid=" +classid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getAwardStatistics:function(lessonid,classid,callfun){
          var url = "action=getAwardStatistics&lessonid=" +lessonid+ "&classid=" +classid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getXitiStatistics:function(lessonid,classid,callfun){
          var url = "action=getXitiStatistics&lessonid=" +lessonid+ "&classid=" +classid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getReport1:function(dayfrom,dayto,dayNum,schoolid,callfun){
          var url = "action=getSchoolReport1&dayfrom=" +dayfrom+ "&dayto=" +dayto+"&dayNum=" + dayNum+"&schoolid=" + schoolid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getReport2:function(dayfrom,dayto,dayNum,schoolid,callfun){
          var url = "action=getSchoolReport2&dayfrom=" +dayfrom+ "&dayto=" +dayto+"&dayNum=" + dayNum+"&schoolid=" + schoolid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getReport3:function(dayfrom,dayto,dayNum,schoolid,callfun){
          var url = "action=getSchoolReport3&dayfrom=" +dayfrom+ "&dayto=" +dayto+"&dayNum=" + dayNum+"&schoolid=" + schoolid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getReport4:function(dayfrom,dayto,dayNum,schoolid,callfun){
          var url = "action=getSchoolReport4&dayfrom=" +dayfrom+ "&dayto=" +dayto+"&dayNum=" + dayNum+"&schoolid=" + schoolid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getReport5:function(dayfrom,dayto,dayNum,schoolid,callfun){
          var url = "action=getSchoolReport5&dayfrom=" +dayfrom+ "&dayto=" +dayto+"&dayNum=" + dayNum+"&schoolid=" + schoolid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getReport6:function(dayfrom,dayto,dayNum,schoolid,callfun){
          var url = "action=getSchoolReport6&dayfrom=" +dayfrom+ "&dayto=" +dayto+"&dayNum=" + dayNum+"&schoolid=" + schoolid; 
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }); 
	 },
	 getUsage:function(dayfrom,dayto,classid,schoolid,teacherid,callfun){
          var url = "action=getUsage01&dayfrom=" +dayfrom+ "&dayto=" +dayto+ "&classid="+classid+"&schoolid=" + schoolid+'&teacherid='+teacherid; 
//       console.log(https_g+url);
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  })
	 },
	 getTeacherStat:function(dayfrom,dayto,courseid,grade,schoolid,callfun){
          var url = "action=getTeacherStat&dayfrom=" +dayfrom+ "&dayto=" +dayto+ "&courseid="+courseid+"&grade="+grade+"&schoolid=" + schoolid; 
          console.log(https_g+url);
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
	 	    		console.log(out)
		          callfun(out);
		      }    	   
	 	  }) 
	 },
	 getStudentStat:function(dayfrom,dayto,schoolid,grade,classid,callfun){
         var url = "action=getStudentStat&dayfrom=" +dayfrom+ "&dayto=" +dayto+ "&grade="+grade+"&classid="+classid+"&schoolid=" + schoolid; 
         console.log(https_g+url);
 	   	  $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	  }) 
	 },
	 getAvgStat:function(teacherid,schoolid,dayfrom,callfun){
        var url = "action=getAvgStat&teacherid=" +teacherid+ "&schoolid=" +schoolid+ "&dayfrom="+dayfrom;
        console.log(https_g+url);
        $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	}) 
	 },
	 getClassStat:function(dayfrom,dayto,grade,schoolid,callfun){
        var url = "action=getClassStat&dayfrom=" +dayfrom+ "&dayto=" +dayto+ "&grade="+grade+"&schoolid="+schoolid;
        console.log(https_g+url);
        $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		      }    	   
	 	}) 
	 },
	 getClassStatAvg:function(dayfrom,schoolid,classid,callfun){
         var url = "action=getClassStatAvg&dayfrom=" +dayfrom+ "&dayto=&schoolid="+schoolid+"&classid="+classid;
         console.log(https_g+url);
        $JSONP.AjaxGetRuYiGuan(url,function(out){
	 	    if(typeof callfun === "function") {
		          callfun(out);
		     }    	   
	 	}) 
	 },
	 getOutExcel:function(data,filename,callfun){
        var url ="action=exportExcel&filename="+filename;
        $JSONP.AjaxPOST(url,data,function(out){
        	 if(typeof callfun === "function") {
		          callfun(out);
		      } 
        })
	 }
}
$JSONP ={
	  AjaxGetRuYiGuan:function(turl,callback){
         $.ajax({
         	 type:"get",
	   	     dataType:"jsonp",
	   	     url: https_g+turl,
	   	     success: function(out){	   	 	   	    	  
	   	    	if(typeof callback === "function") {
		            callback(out);
		        }
	   	    },
	   	    error:function(){
	   	    	  	   
	   	    }
         })
	 },
	 AjaxPOST:function(turl,data,callfun){
	 	$.post(https_g+turl,{
	 		"data":data
	 	},function(out){
              if(typeof callfun === "function") {
                 console.log(out);
		         callfun(out);
		       }
	 	})
	 }
}