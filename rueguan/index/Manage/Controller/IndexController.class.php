<?php
  namespace Manage\Controller;
  use Think\Controller;
  class IndexController extends  Controller {
  	
  	  function login(){
           if(cookie("username")!=null){
              $this -> redirect("Index/index");
           }
           else  $this -> display("login");
	    }

	   function Index(){
            
            $public = new PublicController();
            $u = $public->GetUsername();

            if (!$u) { //用户没有登录
               $this -> redirect("Index/login");
            }
            else
            {
               
               $user = M("user");
               $arr = $user->field("schoolid,name")->where("account='".$u."' or phone ='".$u."'")->find();
               $schoolid = $arr["schoolid"];
               //查询学校的信息
             
               $name = $arr["name"];
               $schoolname =  M("school") 
                             ->field("name")
                             ->where('id='.$schoolid)
                             ->find();
							 $schoolname = $schoolname['name'];
               $classnum = M("class")
                           -> where("schoolid=".$schoolid)
                           -> count(); //班级的数量
               $teachnum = $user 
                           -> where("schoolid=".$schoolid." and type=1")
                           ->count("id");
               $studentnum = $user 
                             -> where("schoolid=".$schoolid." and type=2")   
                             ->count("id");   

              // $couselist = M("mycoures")
               //           -> field("name")
              //            -> where("schoolid=".$schoolid)
               //           -> select();
               $coursename = $public -> GetCourseList($schoolid);

               //if(strlen($coursename)>0) $newstr  = substr($coursename, 0,-1);
               $this -> assign("schoolid",$schoolid);             
               $this -> assign("name",$name);
               $this -> assign("schoolname",$schoolname);
               $this -> assign("chassnum",$classnum);
               $this -> assign("teachnum",$teachnum);
               $this -> assign("studentnum",$studentnum);
               $this -> assign("coursename",$coursename);
               $this -> assign("couse",$couselist);
               $this -> display();             
            }          
	   }
       
       function Indexinfo($schoolid=0,$day=0,$classid=0,$more=1,$mydate=0){
        $public = new PublicController();
            $u = $public->GetUsername();
            if (!$u) { //用户没有登录
               $this -> redirect("Index/login");
            }
            else
            {
         	    if ($schoolid!=0||$day!=0) {
         	   	  $class  =  M("class");
         	   	  $lesson =  M("lesson");
         	   	  //通过schoolid 和 day 获取当天所有的上课班级
         	   	  $classlist = $class       	   	                 	              
         	   	              ->join("right join edu_lesson on edu_lesson.classid=edu_class.id")
         	   	              ->where("edu_lesson.day=".$day." and edu_lesson.schoolid=".$schoolid) 
                            ->field("DISTINCT(edu_class.id),edu_class.name")->select();
                $classnum = count($classlist);                
                $ceil = ceil($classnum/10);
                $btn="<div class=\"right\" id='showmore' data-type = \"1\">更多</div>";
                $style ="";
                if($more==0){
                  $btn ="<div class=\"right\" id='showmore' data-type = \"0\">收起</div>";
                  $style = "style=\"height: ".($ceil*45)."px;\"";
                }

                $arr = array('schoolid' =>  $schoolid,
                	           'day'      =>  $day,
                	           'classnum' =>  $classnum,
                	           'classid'  =>  $classid,
                             'btn'      =>  $btn,
                             'style'    =>  $style);                         
                cookie("activeclassid",$classid);
                $this -> assign("name",$public->GetName($u));
                $this -> assign("arr",$arr);
                $this -> assign("classlist",$classlist);
                 

                $pub = new PublicController();

                $html = "";
                if($classid==0){
                    
                    $showday =  substr($day,0,4)."年".substr($day,4,2)."月".substr($day,6,2)."日";
										
										if($mydate != 0){
											$showday =  substr($mydate,0,4)."年".substr($mydate,4,2)."月".substr($mydate,6,2)."日";
										}
										
                	  foreach($classlist as $k => $v){
                	  	  $cid = $v["id"];
                	  	  $cname = $v["name"];
                        $lessonlist = $lesson
                                      ->field("teacherid,id,courseid,timeon,timeoff,jiaoanid")
                                      ->where("day=".$day." and classid=".$cid)
                                      ->select();

                        

                         $html .="<div class=\"class-list\"><div class=\"class-title\"><span>".$cname."</span></div>";
                         foreach ($lessonlist as $sk => $sv) {

                             $arr = $pub->GetInteractiveInfo($sv["id"]);

                         	   $html .="<div class=\"class-box\" data-id=\"".$sv["id"]."\">".
                							    		"<div class=\"top\">".
                							    		   "<span>".
                							    		   	  "科目：".$pub -> GetCourseName($sv["courseid"])."<br/>".
                							    		   	  "老师：".$pub->GetTeacherName($sv["teacherid"])."<br/>".
                							    		   	  "时间：".($sv["timeon"]!=""? date("H:i",strtotime($sv["timeon"])):"")." - ".($sv["timeoff"]!=""?date("H:i",strtotime($sv["timeoff"])):"").
                							    		   "</span>".
                							    		"</div>".
                							    		"<div class=\"bottom\">".
                							    			"<span>".
                							    				"老师发起互动次数：".$arr["sum"]."次<br/>".
                							    				"课堂互动参与度：".$arr["interactratio"]."%<br/>".
                							    				"章节信息：<font class=\"c-red\">".$pub->GetChapterInfo($sv["jiaoanid"])."</font><br/>".
                							    				"自我评价：".$public->lessonEvaluate($sv["id"],0)."<br/>".
                							    				"课堂总结：".$public->lessonEvaluate($sv["id"],1).
                							    			"</span>".
                							    		"</div>".
                							    	 "</div>";
                         }
                         $html .= "</div>";
                	  }
                }
                else
                {
                	   $cid = $classid;
                	   $cname = $class->field("name")->where("id=".$cid)->find();
                	   $html .="<div class=\"class-list\"><div class=\"class-title\"><span>".$cname["name"]."</span></div>";
                	   $lessonlist = $lesson
                                  ->field("teacherid,id,courseid,timeon,timeoff,jiaoanid")
                                  ->where("day=".$day." and classid=".$cid)
                                  ->select();
  	               foreach ($lessonlist as $sk => $sv) {
                         
                          $arr = $pub->GetInteractiveInfo($sv["id"]);

  	               	   $html .= "<div class=\"class-box\" data-id=\"".$sv["id"]."\">".
            						    		"<div class=\"top\">".
            						    		   "<span>".
            						    		   	  "科目：".$pub -> GetCourseName($sv["courseid"])."<br/>".
            						    		   	  "老师：".$pub->GetTeacherName($sv["teacherid"])."<br/>".
            						    		   	  "时间：".($sv["timeon"]!=""? date("H:i",strtotime($sv["timeon"])):"")." - ".($sv["timeoff"]!=""?date("H:i",strtotime($sv["timeoff"])):"").
            						    		   "</span>".
            						    		"</div>".
            						    		"<div class=\"bottom\">".
            						    			"<span>".
            						    				"老师发起互动次数：".$arr["sum"]."次<br/>".
            						    				"课堂互动参与度：".$arr["interactratio"]."%<br/>".
            						    				"章节信息：<font class=\"c-red\">".$pub->GetChapterInfo($sv["jiaoanid"])."</font><br/>".
            						    			 "自我评价：".$public->lessonEvaluate($sv["id"],0)."<br/>".
                                    "课堂总结：".$public->lessonEvaluate($sv["id"],1).
            						    			"</span>".
            						    		"</div>".
            						    	 "</div>";
  	               }
  	               $html .= "</div>";

                }
                $this -> assign("showday",$showday);
                $this -> assign("html",$html);
         	   	  $this -> display("indexinfo");

         	   	  
         	   }
         	   else{
         	   	  $par = new PublicController();
         	   	  $par->emptypar();
         	   }
          }
       }


			function teacherinfo($schoolid=94,$dayfrom=20170315,$dayto=20170405,$classid=0,$more=0,$teachername=0,$teacherid=0){
        $public = new PublicController();
            $u = $public->GetUsername();
            if (!$u) { //用户没有登录
               $this -> redirect("Index/login");
            }
            else
            {
         	    if ($schoolid!=0||$day!=0) {
         	    	$this -> assign("more",$more);
         	    	$this -> assign("schoolid",$schoolid);
								$this -> assign("teachername",$teachername);
								$this -> assign("teacherid",$teacherid);
								$this -> assign("dayfrom",$dayfrom);
								$this -> assign("dayto",$dayto);
         	   	  $this -> display("teacherinfo");
         	   }
         	   else{
         	   	  $par = new PublicController();
         	   	  $par->emptypar();
         	   }
          }
       }

			function classinfo($schoolid=94,$dayfrom=20170315,$dayto=20170405,$classid=0,$more=0,$classname=0){
        $public = new PublicController();
            $u = $public->GetUsername();
            if (!$u) { //用户没有登录
               $this -> redirect("Index/login");
            }
            else
            {
         	    if ($schoolid!=0) {
         	    		$this -> assign("schoolid",$schoolid);
									$this -> assign("classname",$classname);
									$this -> assign("classid",$classid);
									$this -> assign("dayfrom",$dayfrom);
									$this -> assign("dayto",$dayto);
	         	   	  $this -> display("classinfo");
         	   }
         	   else{
         	   	  $par = new PublicController();
         	   	  $par->emptypar();
         	   }
          }
       }

       function teacherManage($schoolid=0){

        $public = new PublicController();
        $u = $public->GetUsername();
        if (!$u) { //用户没有登录
           $this -> redirect("Index/login");
        }
        else
        {
        	if ($schoolid!=0) {
        		# code...
        		 $course = M("course");//公共科目
        		 $mycoures = M("mycoures");//自定义科目
                 
             $courselist = $course -> field("id,name") -> select();
             $mycoureslist = $mycoures -> field("id,name") ->where("schoolid=".$schoolid) ->select();
             
             $coursehtml ="<li class=\"top\" data-id=\"0\" >全部</li>";
             for ($i=0; $i <count($courselist) ; $i++) { 
             	
             	  $coursehtml .="<li data-id=\"".$courselist[$i]["id"]."\">".$courselist[$i]["name"]."</li>";
             }
             $num =  count($mycoureslist);     

             for ($i=0; $i < count($mycoureslist) ; $i++) {
             	//showBug($i);
             	if ($i==count($mycoureslist)-1) $coursehtml .="<li class=\"bottom\" data-id=\"".$mycoureslist[$i]["id"]."\">".$mycoureslist[$i]["name"]."</li>";
             	else  $coursehtml .="<li data-id=\"".$mycoureslist[$i]["id"]."\">".$mycoureslist[$i]["name"]."</li>";
             }

             $school = M("school");
             $level = $school -> field("level") -> where("id=".$schoolid) -> find();
             
             $arr = array(
                           'course'     =>  $coursehtml, 
                           'grade'      =>  $public->SetGrade($level["level"]),
                           'schoolid'   =>  $schoolid
                          );

             //$this -> assign("course",$coursehtml);
             $this -> assign("arr",$arr);
        		 $this -> assign("name",$public->GetName($u));
       	     $this -> display("teachermanage");
        	}
        	else
        	{
        		$public->emptypar();
        	}
        }
       	 
       }

     function studentManage($schoolid=0){
        $public = new PublicController();
        $u = $public->GetUsername();
        if (!$u) { //用户没有登录
           $this -> redirect("Index/login");
        }
        else
        {
          if ($schoolid!=0) {
              $school = M("school");
              $level = $school -> field("level") -> where("id=".$schoolid) -> find();
//              $defaultgrade = $public->SetDefaultGrade($level["level"]);
              $arr = array(
                            'grade'            =>  $public->SetGrade($level["level"]),
                            'defaultgrade'     =>  "0",//$defaultgrade,
                            'defaultgradename' =>  "全部",//$public ->SetDefaultGradeName($defaultgrade),
                            'gradeclass'       =>  $public -> GetGradeClass($schoolid,$defaultgrade),
                            'schoolid'         =>  $schoolid
                          );
              $this -> assign("arr",$arr);
              $this -> assign("name",$public->GetName($u));
              $this -> display("studentmanage");

          }
          else
          {
            $public->emptypar();
          }
       }
     }
    
     function classManage($schoolid=0)
     {
        $public = new PublicController();
        $u = $public->GetUsername();
        if (!$u) { //用户没有登录
           $this -> redirect("Index/login");
        }
        else
        {
          if ($schoolid!=0) {
              $school = M("school");
              $level = $school -> field("level") -> where("id=".$schoolid) -> find();
             // $defaultgrade = $public->SetDefaultGrade($level["level"]);
              $arr = array(
                            'grade'            =>  $public->SetGrade($level["level"]),
                            //'defaultgrade'     =>  $defaultgrade,
                           // 'defaultgradename' =>  $public ->SetDefaultGradeName($defaultgrade),
                            //'gradeclass'       =>  $public -> GetGradeClass($schoolid,$defaultgrade),
                            'schoolid'         =>  $schoolid
                          );
              $this -> assign("arr",$arr);
              $this -> assign("name",$public->GetName($u));
              $this -> display("classmanage");
           }
          else
          {
            $public->emptypar();
          }
       }
     }

		function countReport($schoolid=0,$page=0){
			  $public = new PublicController();
        $u = $public->GetUsername();
        if (!$u) { //用户没有登录
           $this -> redirect("Index/login");
        }
        else
        {
          if ($schoolid!=0) {
              $school = M("school");
              $level = $school -> field("level") -> where("id=".$schoolid) -> find();
              $arr = array(
                            'grade'            =>  $public->SetGrade($level["level"]),
                            'schoolid'         =>  $schoolid
                          );
              $this -> assign("arr",$arr);
			  			$this -> assign("page",$page);
              $this -> assign("name",$public->GetName($u));
              $this -> display("countReport");
           }
          else
          {
            $public->emptypar();
          }
       }
		}

		function examManage($schoolid=0){
			  $public = new PublicController();
        $u = $public->GetUsername();
        if (!$u) { //用户没有登录
           $this -> redirect("Index/login");
        }
        else
        {
          if ($schoolid!=0) {
              $school = M("school");
              $level = $school -> field("level") -> where("id=".$schoolid) -> find();
             // $defaultgrade = $public->SetDefaultGrade($level["level"]);
              $arr = array(
                            'grade'            =>  $public->SetGrade($level["level"]),
                            //'defaultgrade'     =>  $defaultgrade,
                           // 'defaultgradename' =>  $public ->SetDefaultGradeName($defaultgrade),
                            //'gradeclass'       =>  $public -> GetGradeClass($schoolid,$defaultgrade),
                            'schoolid'         =>  $schoolid
                          );
              $this -> assign("arr",$arr);
              $this -> assign("name",$public->GetName($u));
              $this -> display("exammanage");
           }
          else
          {
            $public->emptypar();
          }
       }
		}

		function permissionManage($schoolid=0){
			  $public = new PublicController();
        $u = $public->GetUsername();
        if (!$u) { //用户没有登录
           $this -> redirect("Index/login");
        }
        else
        {
          if ($schoolid!=0) {
              $school = M("school");
              $level = $school -> field("level") -> where("id=".$schoolid) -> find();
             // $defaultgrade = $public->SetDefaultGrade($level["level"]);
              $arr = array(
                            'grade'            =>  $public->SetGrade($level["level"]),
                            //'defaultgrade'     =>  $defaultgrade,
                           // 'defaultgradename' =>  $public ->SetDefaultGradeName($defaultgrade),
                            //'gradeclass'       =>  $public -> GetGradeClass($schoolid,$defaultgrade),
                            'schoolid'         =>  $schoolid
                          );
              $this -> assign("arr",$arr);
              $this -> assign("name",$public->GetName($u));
              $this -> display("permissionmanage");
           }
          else
          {
            $public->emptypar();
          }
       }
		}

     function CourseInfo($lensson=0,$class=0,$date=0){
         $public = new PublicController();
         $u = $public->GetUsername();
         if (!$u) { //用户没有登录
           $this -> redirect("Index/login");
         }
         else{
           if ($lensson!=0) {

               $less = M("lesson");
               $res = $less -> where("id=".$lensson) -> find();
               if ($res) {
                   
                   $timeline = $public ->TimeLine($lensson);
                   $classid = $res["classid"];
                    $info = $public -> GetLessonFocusInfo($lensson);
                   $arr = array('coursename'   =>  $public -> GetCourseName($res["courseid"]) , 
                                'teachername'  =>  $public -> GetTeacherName($res["teacherid"]),
                                'time'         =>  (($res["timeon"]!=""?date():"")."&nbsp;&nbsp;".($res["timeon"]!=""?date("h:i",strtotime($res["timeon"])):"")."$nbsp - $nbsp".($res["timeoff"]!=""?date("h:i",strtotime($res["timeoff"])):"")),
                                'chapter'      =>  $public -> GetChapterInfo($res["jiaoanid"]),
                                'timeline'     =>  $timeline["json"],
                                'lessonid'     => $lensson,
                                'w'            =>  (($timeline["width"])+($timeline["length"]*31)),
                                "NoActive"     =>  ($info["notActive"]==""?"无学生":$info["notActive"]),
                                "fastest"      =>  ($info["fastest"]==""?"无学生":$info["fastest"]),
                                "slowest"      =>  ($info["slowest"]==""?"无学生":$info["slowest"]),
                                "callname"     =>  ($info["callname"]==""?"无学生":$info["callname"]),
                                "reward"       =>  ($info["reward"]==""?"无学生":$info["reward"]),
                                "wronganswer"  =>  ($info["wronganswer"]==""?"无学生":$info["wronganswer"]),
                                'nextCallname' => $this -> NextRecommend($lensson,$classid,"nextcallname"),
                                'nextReward'   => $this -> NextRecommend($lensson,$classid,"nextreward")
                                 );

                   $le = M("lessonEvaluate");
                   $pj = $le -> where("lessonid=".$lensson)->find();
                   $star1 = "<span class=\"star\" style=\"width:0%\"></span>";
                   $star2 = "<span class=\"star\" style=\"width:0%\"></span>";
                   $star3 = "<span class=\"star\" style=\"width:0%\"></span>";
                   $star4 = "<span class=\"star\" style=\"width:0%\"></span>";
                  
                   $art ="";
                   if($pj){                      
                      $star1 = "<span class=\"star\" style=\"width:".((int)$pj["aims"]*20)."%\"></span>";
                      $star2 = "<span class=\"star\" style=\"width:".((int)$pj["ambience"]*20)."%\"></span>";
                      $star3 = "<span class=\"star\" style=\"width:".((int)$pj["quality"]*20)."%\"></span>";
                      $star4 = "<span class=\"star\" style=\"width:".((int)$pj["expand"]*20)."%\"></span>";
                      $art = $pj["evaluate"];
                   }
                   $pjarr = array('s1' => $star1 , 
                                  's2' => $star2 ,
                                  's3' => $star3 ,
                                  's4' => $star4 ,                                 
                                  'art'=> $art);
                   $this -> assign("arr",$arr);
                   $this -> assign("pjarr",$pjarr);
				   				 $this -> assign("classId",$class);
								   $this -> assign("date",$date);
                   $this -> assign("name",$public->GetName($u));
                   $this -> display("courseinfo");
               }
               else
              {
                $public->emptypar();
              }
           }
            else
            {
              $public->emptypar();
            }
        }
     }

     //下堂课建议
     function NextRecommend($lessonid,$classid,$field){
         $lesson = M("lesson");
         $res = $lesson ->  where("id=".$lessonid) -> find();
         $out="";
         if($res){
            $out = $res[$field];
            if($out==""){
               $user = M("user");
               $romname = $user -> field("name") -> where("classid=".$classid." and type=2")
                        -> order("RAND()") ->limit("0,1") -> select();
               if($romname)
               {
                   $out = $romname[0]["name"];
                   $lesson -> where("id=".$lessonid)->save(array($field=>$out));                   
               }
            }
         }       
         return $out;
 
     }

  }

?>