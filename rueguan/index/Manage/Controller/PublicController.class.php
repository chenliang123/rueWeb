<?php
  namespace Manage\Controller;
  use Think\Controller;

  class PublicController extends  Controller{
  	
	   function GetUsername(){
	   	global $u;	   
		  if(cookie("username")!=null) $u = cookie("username");
		  if(session("username")!=null) $u = session("username"); 
		  return $u;	
	   }
      


     function GetName($username){
         $user = M("user");
         $res = $user -> field("name") -> where("account='".$username."' or phone='".$username."'") -> find();
         $name ="";
         if ($res) {
             $name = $res["name"];
         }

         return $name;
     }

	   function emptypar(){

	   	  echo "空的参数";
	   }

	   function GetTeacherName($id){
	   	  $name ="";

        if($id!="") {
          $user = M("user");
          $nameres = $user 
                  -> field("name")
                  -> where("id=".$id)
                  -> find();
         
          if (count($nameres)>0) {          
            $name = $nameres["name"];
          }
          else $name = "已删除";
        }
        return $name;

	   }

	   function GetCourseName($id){
	   	  $coursename ="";
	   	  if((int)$id<100) {
	   	  	 $course = M("course");
	   	  	 $res = $course -> field("name") -> where("id=".$id) -> find();
             if(count($res)>0) $coursename = $res["name"];
             else $coursename ="已删除";
	   	  }
	   	  else
	   	  {
	   	  	 $course = M("mycoures");
	   	  	 $res = $course -> field("name") -> where("id=".$id) -> find();
             if(count($res)>0) $coursename = $res["name"];
             else $coursename ="已删除";
	   	  }

	   	  return $coursename;
	   }

     function GetClassName($id){
         $class = M("class");
         $res = $class -> field("name") -> where("id=".$id)-find();
         $out ="";
         if ($res) {
            $out = $res["name"];
         }
         else $out ="班级不存在";

         return $out;
     }
     
     function GetCourseList($schoolid){
        $course = M("course");
        $mycoures = M("mycoures");
        $cm ="";
        $courseres = $course -> field("name") -> where("schoolid=0") -> select();
        foreach ($courseres as $key => $value) {
           $cm .= $value["name"].", ";
        }
        $mycouresres = $mycoures -> field("name") -> where("schoolid=".$schoolid) ->select();
        foreach ($mycouresres as $key => $value) {
           $cm .= $value["name"].", ";
        }
        if(strlen($cm)>0) $cm = substr($cm, 0,strlen($cm)-2);
        return $cm;
     }
     
     //获取课堂教师发起的互动次数和互动参与率
	   function GetInteractiveInfo($lessonid){
           $lesson = M("lesson");
           $res = $lesson-> field("nPPT,nXiti,nHandon,nCallname,nQiangda,nReward,nCriticize,nPhoto,interactRatio")
                         -> where("id=".$lessonid)
                         -> find();
          
           	$sum = ((int)$res["nppt"])+
                   ((int)$res["nxiti"])+
                   ((int)$res["nhandon"])+
                   ((int)$res["ncallname"])+
                   ((int)$res["nqiangda"])+
                   ((int)$res["nreward"])+
                   ((int)$res["ncriticize"])+
                   ((int)$res["nphoto"]);

            $arr = array('sum' => $sum ,'interactratio'=> round((float)$res["interactratio"],2));

            return $arr;
          
	   }

	   //获取章节的信息
	   function GetChapterInfo($id){
	   	  $chapter ="";
	   	  if ($id==0||$id=="") {
	   	  	# code...
	   	  	$chapter ="未设置";
	   	  }
	   	  else{
	   	  	 $bookoutline = M("bookoutline");
	   	  	 $res = $bookoutline 
	   	  	        -> field("subject")
	   	  	        -> where("outlineid=".$id) 
	   	  	        -> find();
	   	  	 if ($res) {
	   	  	 	# code...
	   	  	 	$chapter = $res["subject"];
	   	  	 }
	   	  	 else $chapter = "教案已删除";
	   	  }

	   	  return $chapter;
	   }

	   function SetGrade($level){
           $grade ="";
           if ($level==1) {
           	   $grade .="<li class=\"top\" data-id=\"0\">全部</li>";
               $grade .="<li data-id=\"1\">一年级</li>";
           	   $grade .="<li data-id=\"2\">二年级</li>";
           	   $grade .="<li data-id=\"3\">三年级</li>";
           	   $grade .="<li data-id=\"4\">四年级</li>";
           	   $grade .="<li data-id=\"5\">五年级</li>";
           	   $grade .="<li class=\"bottom\" data-id=\"6\">六年级</li>";
           }
           else if ($level==2) {
               $grade .="<li class=\"top\" data-id=\"0\">全部</li>";
           	   $grade .="<li  data-id=\"7\">初中一年级</li>";
           	   $grade .="<li data-id=\"8\">初中二年级</li>";
           	   $grade .="<li class=\"bottom\" data-id=\"9\">初中三年级</li>";
           }
           else if ($level==3) {
               $grade .="<li class=\"top\" data-id=\"0\">全部</li>";
               $grade .="<li data-id=\"10\">高中一年级</li>";
           	   $grade .="<li data-id=\"11\">高中二年级</li>";
           	   $grade .="<li class=\"bottom\" data-id=\"12\">高中三年级</li>";
           }
           else if ($level==12) {
              $grade .="<li class=\"top\" data-id=\"0\">全部</li>";
           	  $grade .="<li  data-id=\"1\">一年级</li>";
           	   $grade .="<li data-id=\"2\">二年级</li>";
           	   $grade .="<li data-id=\"3\">三年级</li>";
           	   $grade .="<li data-id=\"4\">四年级</li>";
           	   $grade .="<li data-id=\"5\">五年级</li>";
           	   $grade .="<li data-id=\"6\">六年级</li>";
           	   $grade .="<li data-id=\"7\">初中一年级</li>";
           	   $grade .="<li data-id=\"8\">初中二年级</li>";
           	   $grade .="<li class=\"bottom\" data-id=\"9\">初中三年级</li>";
           }
           else if ($level==23) {
              $grade .="<li class=\"top\" data-id=\"0\">全部</li>";
           	  $grade .="<li  data-id=\"7\">初中一年级</li>";
           	   $grade .="<li data-id=\"8\">初中二年级</li>";
           	   $grade .="<li data-id=\"9\">初中三年级</li>";
           	   $grade .="<li data-id=\"10\">高中一年级</li>";
           	   $grade .="<li data-id=\"11\">高中二年级</li>";
           	   $grade .="<li class=\"bottom\" data-id=\"12\">高中三年级</li>";
           }
           else if ($level==13) {
               $grade .="<li class=\"top\" data-id=\"0\">全部</li>";
               $grade .="<li  data-id=\"1\">一年级</li>";
           	   $grade .="<li data-id=\"2\">二年级</li>";
           	   $grade .="<li data-id=\"3\">三年级</li>";
           	   $grade .="<li data-id=\"4\">四年级</li>";
           	   $grade .="<li data-id=\"5\">五年级</li>";
           	   $grade .="<li data-id=\"6\">六年级</li>";
           	   $grade .="<li data-id=\"10\">高中一年级</li>";
           	   $grade .="<li data-id=\"11\">高中二年级</li>";
           	   $grade .="<li class=\"bottom\" data-id=\"12\">高中三年级</li>";
           }
           else
           {
              $grade .="<li class=\"top\" data-id=\"0\">全部</li>";
           	   $grade .="<li data-id=\"1\">一年级</li>";
           	   $grade .="<li data-id=\"2\">二年级</li>";
           	   $grade .="<li data-id=\"3\">三年级</li>";
           	   $grade .="<li data-id=\"4\">四年级</li>";
           	   $grade .="<li data-id=\"5\">五年级</li>";
           	   $grade .="<li data-id=\"6\">六年级</li>";
           	   $grade .="<li data-id=\"7\">初中一年级</li>";
           	   $grade .="<li data-id=\"8\">初中二年级</li>";
           	   $grade .="<li data-id=\"9\">初中三年级</li>";
           	   $grade .="<li data-id=\"10\">高中一年级</li>";
           	   $grade .="<li data-id=\"11\">高中二年级</li>";
           	   $grade .="<li class=\"bottom\" data-id=\"12\">高中三年级</li>";
           }

           return $grade;
	   }
     function SetDefaultGrade($level){
         $grade ="";
           if ($level==1||$level==12||$level==13||$level==123) {
               $grade = "1";
           }
           else if ($level==2||$level==23) {
               $grade ="7";
           }
           else if ($level==3) {
               $grade = "10";
           }
           return $grade;
     }

     function SetDefaultGradeName($grade){
         $gradestr ="";
         if ($grade=="1") $gradestr ="一年级";
         else if($grade=="7") $gradestr ="初中一年级";
         else $gradestr ="高中一年级";

         return $gradestr;
     }

     function GetGradeClass($schoolid,$grade){
       
         $class = M("class");
         $res = $class 
             -> field("name,id") 
             -> where("grade='".$grade."' and schoolid=".$schoolid)
             -> order("orderid asc") 
             -> select();
         $out ="<li class=\"top\" data-id=\"0\">全部</li>";
         if ($res) {
             for ($i=0; $i < count($res) ; $i++) { 
               //if ($i==0) $out .="<li class=\"top\" data-id=\"".$res[$i]["id"]."\">".$res[$i]["name"]."</li>";
               if($i==(count($res)-1)) $out .="<li class=\"bottom\" data-id=\"".$res[$i]["id"]."\">".$res[$i]["name"]."</li>";
               else $out .="<li data-id=\"".$res[$i]["id"]."\">".$res[$i]["name"]."</li>";
             }
         }       

         return $out;
      }
      //获取时光轴的信息
      function TimeLine($lessonid){
          $lr = M("lesson_record");
          $res =  $lr 
               -> field("uptime,result,action") 
               -> order("uptime asc")
               -> where("lessonid=".$lessonid)
               -> select();
           $json = "";
           $width =0; 
           $length =0;
          foreach ($res as $k => $v) {

             $action = $v["action"];
             $result = $v["result"];
			 			 $time = $v["uptime"];
						 $time = substr($time,10);
             if($action=="on") {$json .="<div class=\"element shangke\">上课<span>".$time."</span></div>"; $width +=55; $length++;}
             else if($action == "off") {$json .="<div class=\"element shangke\">下课<span>".$time."</span></div>"; $width +=55;$length++;}
             else if($action == "fopen" ){ $json .="<div class=\"element zhaopian\">打开文件<span>".$time."</span></div>"; $width +=96;$length++;}
             else if($action == "camera"){ $json .="<div class=\"element zhaopian\" ><img src='http://api.skyeducation.cn/EduApi/upload/".$this->Setfopen($v["uptime"]).$this -> ResolveJSON($result,"filename")."' width='80' height='59'/><span>".$time."</span></div>"; $width +=96;$length++;}
             else if($action == "handon") {$json .="<div class=\"element tiwen\">提问<span>".$time."</span></div>"; $width +=55;$length++;}
             else if($action =="xiti")    {$json .="<div class=\"element xiti\">出题<span>".$time."</span></div>";$width +=55;$length++;}
          }
          $arr = array('json' => $json,'width'=>$width,'length'=>$length);
          return $arr;
      }
      
      function ResolveJSON($json,$name){
          $obj = json_decode($json);
          return $obj -> $name;
      }
      function Setfopen($time){
          return substr($time,0,4)."/".substr($time,5,2)."/".substr($time,8,2)."/";
      }

       //获取班级下所有的学生
     function GetStudentArray($classid){
       
        //if(!S("allstudent"))
        //{
          $user = M("user");
          $res = $user -> field("id") -> where("classid=".$classid." and type=2") -> select();
          $arr = array();
          foreach ($res as $k => $v) {
            array_push($arr,$v["id"]);
          }
         // S("allstudent",$arr);
      // }
      // else $arr = S("allstudent");

       return $arr;
     }
      

       function GetLessonFocusInfo($lessonid){
         $lr = M("lessonRecord");
        
         $res = $lr -> field("result")
                    -> where("lessonid=".$lessonid." and action='off'")
                    -> order("id desc") 
                    -> limit("0,1")
                    -> find();
//     		print_r($res);
          $notActivename="";
          $fastestname="";
          $slowestname="";
          $callname ="";
          $reward = "";
          $wronganswer ="";
          if ($res) {
             $json = $res["result"];
             $a =  $this -> ResolveJSON($json,"notActive");
             $b =  $this -> ResolveJSON($json,"fastest");
             $c =  $this -> ResolveJSON($json,"slowest");
             $d =  $this -> ResolveJSON($json,"callname");
             $e =  $this -> ResolveJSON($json,"reward");
             $f =  $this -> ResolveJSON($json,"wronganswer");
             if(trim($a)!="") {
                  $notActive = explode(",",$a);
                 for($i=0; $i <count($notActive); $i++) { 
                    $notActivename .= ($this -> GetTeacherName($notActive[$i]))."、";
                 }  
             }
             if(trim($b)!=""){
                  $fastest = explode(",",$b);
                  for($i=0; $i <count($fastest) ; $i++) { 
                    $fastestname .= ($this -> GetTeacherName($fastest[$i]))."、";
                 } 
             }
             if(trim($c)!=""){
                $slowest  = explode(",",$c);
                 for($i=0; $i <count($slowest) ; $i++) { 
                    $slowestname .= ($this -> GetTeacherName($slowest[$i]))."、";
                 }  
             }
             if(trim($d)!=""){
                 $callname = explode(",",$d);
                 for($i=0; $i <count($callname) ; $i++) { 
                    $callnamename .= ($this -> GetTeacherName($callname[$i]))."、";
                 }
             }
             if(trim($e)!=""){
               $reward = explode(",",$e);
                for($i=0; $i <count($reward) ; $i++) { 
                    $rewardname .= ($this -> GetTeacherName($reward[$i]))."、";
                 } 
             }
             if(trim($f)!=""){
                 $wronganswer  = explode(",",$f);
                 for($i=0; $i <count($wronganswer) ; $i++) { 
                    $wronganswername .= ($this -> GetTeacherName($wronganswer[$i]))."、";
                 } 
             }               
          }
          $arr = array("notActive"  => $notActivename,
                       "fastest"    => $fastestname,
                       "slowest"    => $slowestname,
                       "callname"   => $callnamename,
                       "reward"     => $rewardname,
                       "wronganswer"=> $wronganswername);
          return $arr;
     }

     function lessonEvaluate($lessonid,$type){
         $le = M("lessonEvaluate");
         $str ="<font class=\"c-red\">未设置</font>";
         $res = $le -> where("lessonid=".$lessonid)->find();
         if($res){
            if($type==0){
               $a = $res["aims"];
               $b = $res["ambience"];
               $c = $res["quality"];
               $d = $res["expand"];
               if((int)$a!=0&&(int)$b!=0&&(int)$c!=0&&(int)$d!=0)   $str ="<font class=\"c-green\">完成</font>";
            }
            if($type==1){
               if($res["evaluate"]!="") $str ="<font class=\"c-green\">完成</font>";
            } 
         }

         return $str;
     }
   }
?>