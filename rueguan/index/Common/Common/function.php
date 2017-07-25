<?php
   function SetActive($id){
   	  //echo cookie("activeclassid").";".$id;
      if (cookie("activeclassid")==$id) {       
      	echo "active";
      }
      else echo "";
   }
   function SetGrage($grade){
   	   $gradestr="";
   	   switch ($grade) {
   	   	case '1':
   	   		$gradestr = "一年级";
   	   		break;
   	   	case '2':
   	   		$gradestr = "二年级";
   	   		break;
   	   	case '3':
   	   		$gradestr = "三年级";
   	   		break;
   	   	case '4':
   	   		$gradestr = "四年级";
   	   		break;
   	   	case '5':
   	   		$gradestr = "五年级";
   	   		break;
   	   	case '6':
   	   		$gradestr = "六年级";
   	   		break;
   	   	case '7':
   	   		$gradestr = "初中一年级";
   	   		break;
   	   	case '8':
   	   		$gradestr = "初中二年级";
   	   		break;
   	   	case '9':
   	   		$gradestr = "初中三年级";
   	   		break;
   	   	case '10':
   	   		$gradestr = "高中一年级";
   	   		break;
   	   	case '11':
   	   		$gradestr = "高中二年级";
   	   		break;
   	   	case '12':
   	   		$gradestr = "高中三年级";
   	   		break;
   	   	
   	   	default:
   	   		$gradestr = "无年级组";
   	   		break;
   	   }

   	   echo $gradestr; 
   }

   function GetCourseName($id){
   	   $coursename ="";
   	   if($id=="") $coursename ="课程不存在";
   	   else
   	   {
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
       }

   	  echo $coursename;
   }

   function SetStatus($status){
   	  $str ="";
   	  if($status==0) $str = "<font style ='color:#F00'>报名中</font>";
      else if($status==1) $str = "<font style ='color:#1fa500'>已分班</font>";
   	  else  $str = "<font style ='color:#00aac4'>待分班</font>";
   	  echo $str;
   }
   function SetCourseBtn($status,$id){
   	   $str ="";
   	  if($status==0) $str = "<a class='btn btn-link look' data-course='".$id."'>查看</a>";
      else if ($status==1) $str = "<a class='btn btn-link cancel' data-course='".$id."'>取消分班</a>";
   	  else  $str = "<a class='btn btn-link look' data-course='".$id."'>查看</a>";
   	  echo $str;
   }
   function SetTypes($type){
        $str = "";
        if($type==1) $str = "主修";
        else $str = "选修";
        echo $str;
   }
   function GetStudentNumber($cid,$schoolid){
       $bm = M("baoming","zb_");
       $res = $bm -> field("id") -> where("cid=".$cid) -> count(); //报名人的总数；

       $class = M("class","zb_"); 
       $ca = $class -> field("id") 
                    -> where("courseid=".$cid." and schoolid=".$schoolid )
                    -> select();

       $classidlist = "";
       foreach ($ca as $key => $value) {
          $classidlist .= $value["id"].",";
       } 
       $studentcount = 0;
       if(strlen($classidlist)>0){
          $classidlist = substr($classidlist, 0,strlen($classidlist)-1);
          $student = M("student","zb_");
          $studentcount = $student 
                        -> field("id")
                        ->where("classid in(".$classidlist.") and schoolid=".$schoolid)
                        -> count();
       }
       echo ($res - $studentcount);
       //echo $schoolid;
   }
    function StudentNumber($cid){
       $bm = M("baoming","zb_");
       $res = $bm -> field("id") -> where("cid=".$cid) -> count();
       return $res;
   }
   function SetDisabled($cid){
      $count =  StudentNumber($cid);
      $str ="";
      if($count==0) $str ="disabled=\"disabled\"";

      echo $str;
      
   }
   function Readonly($cid){
      $count =  StudentNumber($cid);
      $str ="";
      if($count==0) $str ="readonly=\"readonly\"";
      echo $str;
   }

   function GetClassStudent($classid){
       //获取班级数量
       $student = M("student","zb_");
      echo $student -> where("classid=".$classid) -> count();      
   }

   function GetIsTeacher($classid){
      $class = M("class","zb_");
      $res =  $class -> field("teacherid") -> where("id=".$classid) -> find();
      $out ="";
      if($res){
         $teacherid = $res["teacherid"];
         if($teacherid==""){
             $out = "<a class=\"btn btn-link orange setteacher\" data-classid=\"".$classid."\">设置</a>";
         }
         else{
            $user = M("user");
            $resSub = $user -> field("name") -> where("id=".$teacherid)->find();
            if($resSub){
               $out = "<a class=\"btn btn-link setteacher\" data-classid=\"".$classid."\">".$resSub["name"]."</a>";
            }
            else $out="<a class=\"btn btn-link setteacher\" data-classid=\"".$classid."\" style='color:#F00'>教师不存在</a>";
         }
      }
      echo $out;
   }

   function getUsername($uid){
      $user = M("user");
      $res = $user -> field("name") -> where("id=".$uid) -> find();
      $out ="已删除";
      if ($res) {
         $out = $res["name"]."、";
      }
      echo  $out;
   }
   function getClassName($uid){
      $user = M("user");
      $res = $user -> field("classid") -> where("id=".$uid) -> find();
      $out ="已删除";
      if($res){
          $classid = $res["classid"];
          $class = M("class");
          $c = $class -> field("name") -> where("id=".$classid) ->find();
          if($c) $out=$c["name"];
          else $out ="班级已删除";
      }

      echo $out;
   }

   function SetCourseType($type){
      $str ="<font style='color:#c57d00'>选修</font>";
      if ($type==1)  $str ="<font  style='color:#0082c5'>主修</font>";
      echo $str;
   }

   function GetTeacherClassNumber($teacherid){
      $class = M("class","zb_");
      echo $class -> where("teacherid=".$teacherid) -> count();
   }

   function GetTeacherLessonNumber($teacherid){
      $table = M("coursetableTeacher","zb_");
      $lesson = 0;
      $res = $table->field("c1,c2,c3,c4,c5,c6,c7,c8,c9")
           -> where("teacherid=".$teacherid)
           -> select();
      foreach ($res as $k => $v) {
          if($v["c1"]!="") $lesson = $lesson+1;
          if($v["c2"]!="") $lesson = $lesson+1;
          if($v["c3"]!="") $lesson = $lesson+1;
          if($v["c4"]!="") $lesson = $lesson+1;
          if($v["c5"]!="") $lesson = $lesson+1;
          if($v["c6"]!="") $lesson = $lesson+1;
          if($v["c7"]!="") $lesson = $lesson+1;
          if($v["c8"]!="") $lesson = $lesson+1;
          if($v["c9"]!="") $lesson = $lesson+1;
      }
      echo $lesson;
   }
   function GetTeacherContinuous($teacherid){
      $table = M("coursetableTeacher","zb_");
      $lesson = 0;
      $temp =0;
      $res = $table->field("c1,c2,c3,c4,c5,c6,c7,c8,c9")
           -> where("teacherid=".$teacherid)
           -> select();
      foreach ($res as $k => $v) {
         if($v["c1"]!=""){
             $lesson = $lesson+1;
         }
         if($v["c2"]!="") $lesson= $lesson+1;
         else 
         {
            if($lesson>$temp) $temp = $lesson;
            continue;
         }
         if($v["c3"]!="") $lesson= $lesson+1;
         else
         {
            if($lesson>$temp) $temp = $lesson;
            continue;
         }
         if($v["c4"]!="") $lesson= $lesson+1;
         else
         {
            if($lesson>$temp) $temp = $lesson;
            continue;
         }
         if($v["c5"]!="") $lesson= $lesson+1;
         else 
         {
            if($lesson>$temp) $temp = $lesson;
            continue;
         }
         if($v["c6"]!="") $lesson= $lesson+1;
         else 
          {
            if($lesson>$temp) $temp = $lesson;
            continue;
         }
         if($v["c7"]!="") $lesson= $lesson+1;
         else
         {
            if($lesson>$temp) $temp = $lesson;
            continue;
         }
         if($v["c8"]!="") $lesson= $lesson+1;
         else 
         {
            if($lesson>$temp) $temp = $lesson;
            continue;
         }
         if($v["c9"]!="") $lesson= $lesson+1;
         else 
         {
            if($lesson>$temp) $temp = $lesson;
            continue;
         }
      }
     
     echo $temp;

   }

   function Already($schoolid,$grade,$courseid){ //获取已经报名的人数
       $bm = M("baoming","zb_");
       $count = $bm -> where(array('schoolid'=>$schoolid,'grade'=>$grade,'cid'=>$courseid)) -> count();
       echo $count;      
   }
   function ThisAlready($courseid){ //获取已经报名的人数
       $bm = M("baoming","zb_");
       $count = $bm -> where("cid=".$courseid) -> count();
       return $count;
   }
   function GetTeacherList($schoolid,$courseid){
      $ct = M("classteacher");
      $res = $ct-> field("DISTINCT(teacherid)") -> where(array('schoolid2'=>$schoolid,'courseid'=>$courseid)) -> select();
      $teacher="";
      for($i=0; $i<count($res); $i++){
           $teacher .= getUsername($res[$i]["teacherid"]);//."、";
      }
     // foreach ($res as $k => $v) {
          //$teacher .= getUsername($v["teacherid"]);
     // }
      echo $teacher;
   }
   //判断该学生可不可开始报名
   function SetBtnStatus($studentid){
       $bm = M("baoming","zb_");
       $count = $bm -> where("studentid=".$studentid) -> count();
       $btn ="<a class=\"btn btn-secondary radius\" id=\"start\">&nbsp;确认选课&nbsp;</a>";
       if($count>0) $btn ="<a class=\"btn disabled radius\">&nbsp;确认选课&nbsp;</a>";
       echo $btn;
   }
  /* function StudentSign($courseid,$max,$dayform,$dayto,$type,$studentid){
       $btn ="<a class='btn btn-primary radius size-S' data-courseid=\"".$courseid."\" data-type=\"".$type."\">报名</a>";

       $count = ThisAlready($courseid);
       $df = date($dayform,time());
       $dt = date($dayto,time());
       $d  = date("Y-m-d H:i",time());
        //判断该科目该学生是不是已经报名
       $bm = M("baoming","zb_");
       $res = $bm -> where(array("studentid"=> $studentid,"cid"=>$courseid)) ->count();

       if(((int)$count)>=((int)$max)) $btn = "<a class='btn disabled radius size-S'>报名</a>";
       else if((strtotime($df)>strtotime($d))||(strtotime($dt)<strtotime($d))) $btn = "<a class='btn disabled radius size-S'>报名</a>";
       else if($res>0)  $btn = "<a class='btn btn-danger radius size-S' data-courseid=\"".$courseid."\" data-studentid=\"".$studentid."\">取消报名</a>";
    
       echo $btn;
   }*/
 /*  function GetStatus($courseid,$max,$dayform,$dayto,$studentid){
      $btn ="报名中";

       $count = ThisAlready($courseid);
       $df = date($dayform,time());
       $dt = date($dayto,time());
       $d  = date("Y-m-d H:i",time());
       
       //判断该科目该学生是不是已经报名
       $bm = M("baoming","zb_");
       $res = $bm -> where(array("studentid"=> $studentid,"cid"=>$courseid)) ->count();

       if(((int)$count)>=((int)$max)) $btn = "停止报名";
       else if((strtotime($df)>strtotime($d))||(strtotime($dt)<strtotime($d))) $btn = "停止报名";
       elseif ($res>0)  $btn = "已报名";
    
       echo $btn;
   }*/
   
?>