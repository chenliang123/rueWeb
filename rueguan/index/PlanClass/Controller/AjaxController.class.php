<?php

    namespace PlanClass\Controller;
    use Think\Controller;
    class AjaxController extends Controller
    {
    	
       function Ajaxlogin (){
           $username = $_POST["username"];
           $password = $_POST["password"];
           $type = $_POST["type"];
           $remember = $_POST["remember"];
           $out ="";
           if($type=="1") //管理员登录
           {
              $admin = M("admin");
              $res = $admin -> field("password") -> where("username='".$username."'") ->find();
              if($res){
                 if (md5($password)==$res["password"]) { 
                    $out ="1";
                    if($remember=="true") cookie("planusername",$username); //记住密码
                    else session("planusername",$username);
                 }
                 else $out ="密码错误";
              }
              else $out ="用户不存在";
           }
           else if($type=="2"){
               $user = M("user");
               $res = $user 
                     -> field("pwd") 
                     -> where("(account='".$username."' or phone='".$username."') and type=2") 
                     ->find();
               if ($res) {
                  if ($password==$res["pwd"]) {
                     $out ="2";
                     if($remember=="true") cookie("studentusername",$username); //记住密码
                     else session("studentusername",$username);
                  }
                  else $out ="密码错误";
               }
               else $out ="用户名不存在";
           }

           echo $out;
       }

       function OutLogin(){
          cookie("username",null);
          session("username",null);
          echo "1";
       }

    	 function GetGradeList(){
    	 	$schoolid = $_POST["schoolid"];   
        $type = "<option value='1'>主修</option>";
        $type .= "<option value='0'>选修</option>";
        echo "{\"grade\":\"".$this->GetGrade($schoolid,"0")."\",\"course\":\"".$this->GetCourse($schoolid,0)."\",\"type\":\"".$type."\"}";
	  }
    function GetGrade($schoolid,$grade){
        $sel ="selected='selected'";

        $school = M("school");
        $res = $school -> field("level") -> where("id=".$schoolid) -> find();
        $level = $res["level"];
        $grade ="";
         if ($level==1) {
             $grade .="<option value='1' ".($grade==1?$sel:"").">一年级</option>";
             $grade .="<option value='2' ".($grade==2?$sel:"").">二年级</option>";
             $grade .="<option value='3' ".($grade==3?$sel:"").">三年级</option>";
             $grade .="<option value='4' ".($grade==4?$sel:"").">四年级</option>";
             $grade .="<option value='5' ".($grade==5?$sel:"").">五年级</option>";
             $grade .="<option value='6' ".($grade==6?$sel:"").">六年级</option>";
         }
         else if ($level==2) {
             $grade .="<option value='7' ".($grade==7?$sel:"").">初中一年级</option>";
             $grade .="<option value='8' ".($grade==8?$sel:"").">初中二年级</option>";
             $grade .="<option value='9' ".($grade==9?$sel:"").">初中三年级</option>";
         }
         else if ($level==3) {
             $grade .="<option value='10' ".($grade==10?$sel:"").">高中一年级</option>";
             $grade .="<option value='11' ".($grade==11?$sel:"").">高中二年级</option>";
             $grade .="<option value='12' ".($grade==12?$sel:"").">高中三年级</option>";
         }
         else if ($level==12) {
            $grade .="<option  value='1' ".($grade==1?$sel:"").">一年级</option>";
             $grade .="<option value='2' ".($grade==2?$sel:"").">二年级</option>";
             $grade .="<option value='3' ".($grade==3?$sel:"").">三年级</option>";
             $grade .="<option value='4' ".($grade==4?$sel:"").">四年级</option>";
             $grade .="<option value='5' ".($grade==5?$sel:"").">五年级</option>";
             $grade .="<option value='6' ".($grade==6?$sel:"").">六年级</option>";
             $grade .="<option value='7' ".($grade==7?$sel:"").">初中一年级</option>";
             $grade .="<option value='8' ".($grade==8?$sel:"").">初中二年级</option>";
             $grade .="<option value='9' ".($grade==9?$sel:"").">初中三年级</option>";
         }
         else if ($level==23) {
            $grade .="<option  value='7' ".($grade==7?$sel:"").">初中一年级</option>";
             $grade .="<option value='8' ".($grade==8?$sel:"").">初中二年级</option>";
             $grade .="<option value='9' ".($grade==9?$sel:"").">初中三年级</option>";
             $grade .="<option value='10' ".($grade==10?$sel:"").">高中一年级</option>";
             $grade .="<option value='11' ".($grade==11?$sel:"").">高中二年级</option>";
             $grade .="<option value='12' ".($grade==12?$sel:"").">高中三年级</option>";
         }
         else if ($level==13) {
             $grade .="<option value='1' ".($grade==1?$sel:"").">一年级</option>";
             $grade .="<option value='2' ".($grade==2?$sel:"").">二年级</option>";
             $grade .="<option value='3' ".($grade==3?$sel:"").">三年级</option>";
             $grade .="<option value='4' ".($grade==4?$sel:"").">四年级</option>";
             $grade .="<option value='5' ".($grade==5?$sel:"").">五年级</option>";
             $grade .="<option value='6' ".($grade==6?$sel:"").">六年级</option>";
             $grade .="<option value='10' ".($grade==10?$sel:"").">高中一年级</option>";
             $grade .="<option value='11' ".($grade==11?$sel:"").">高中二年级</option>";
             $grade .="<option value='12' ".($grade==12?$sel:"").">高中三年级</option>";
         }
         else
         {
             $grade .="<option value='1' ".($grade==1?$sel:"").">一年级</option>";
             $grade .="<option value='2' ".($grade==2?$sel:"").">二年级</option>";
             $grade .="<option value='3' ".($grade==3?$sel:"").">三年级</option>";
             $grade .="<option value='4' ".($grade==4?$sel:"").">四年级</option>";
             $grade .="<option value='5' ".($grade==5?$sel:"").">五年级</option>";
             $grade .="<option value='6' ".($grade==6?$sel:"").">六年级</option>";
             $grade .="<option value='7' ".($grade==7?$sel:"").">初中一年级</option>";
             $grade .="<option value='8' ".($grade==8?$sel:"").">初中二年级</option>";
             $grade .="<option value='9' ".($grade==9?$sel:"").">初中三年级</option>";
             $grade .="<option value='10' ".($grade==10?$sel:"").">高中一年级</option>";
             $grade .="<option value='11' ".($grade==11?$sel:"").">高中二年级</option>";
             $grade .="<option value='12' ".($grade==12?$sel:"").">高中三年级</option>";
         }

         return $grade;
    }
	  function GetCourse($schoolid,$courseid){
       $sel ="selected='selected'";

	  	  $course = M("course");
	  	  $courselist = "";
	  	  $res = $course -> field("id,name") -> where("schoolid =0 ") -> select();
	  	  foreach ($res as $key => $value) {
           if($value["id"]==$courseid)  $courselist .="<option value='".$value["id"]."' selected='selected'>".$value["name"]."</option>";
           else $courselist .="<option value='".$value["id"]."'>".$value["name"]."</option>";
	  	  }
          $mycourse = M("mycoures");
	  	  $res = $mycourse -> field("id,name") -> where("schoolid=".$schoolid." and type=1") -> select();
	  	  foreach ($res as $key => $value) {
           if($value["id"]==$courseid) $courselist .="<option value='".$value["id"]."' selected='selected'>".$value["name"]."</option>";
           else  $courselist .="<option value='".$value["id"]."'>".$value["name"]."</option>";
	  	  }
	  	  return $courselist;
	  }

	   function AjaxCreateCourse(){
	  	 
	  	  $arr = array('schoolid'   =>  $_POST["schoolid"],
	  	               'name'       =>  $_POST["name"],
	  	               'grade'      =>  $_POST["grade"],
	  	               'courseid'   =>  $_POST["course"],
	  	               'dayfrom'    =>  $_POST["dayfrom"],
	  	               'dayto'      =>  $_POST["dayto"],
	  	               'max'        =>  $_POST["max"],
                     'type'       =>  $_POST["type"]);
          $course = M("course","zb_");
          $out = "0";
          if($course->add($arr)) $out = "1";
          
          echo $out;
	   }
     
     function AjaxUpdateCourse(){
        $arr = array('name'       =>  $_POST["name"],
                     'grade'      =>  $_POST["grade"],
                     'courseid'   =>  $_POST["course"],
                     'dayfrom'    =>  $_POST["dayfrom"],
                     'dayto'      =>  $_POST["dayto"],
                     'max'        =>  $_POST["max"],
                     'type'       =>  $_POST["type"]);
          $course = M("course","zb_");          
          $out = "0";
          $res = $course -> where("id=".$_POST["courseid"]) ->save($arr);
          if($res) $out = "1";          
          echo $out;
     }

     function lookCourse(){   
         $schoolid = $_POST["schoolid"];    
         $courseid = $_POST["courseid"];
         $course = M("course","zb_");
         $res = $course -> where("id=".$courseid) -> find();
         $out="";
         if($res){
            $sel ="selected='selected'";

            $type = "<option value='1'  ".($res["type"]=="1"?$sel:"").">主修</option>";
            $type .= "<option value='0' ".($res["type"]=="0"?$sel:"").">选修</option>";

            $out = "{\"grade\":\"".$this->GetGrade($schoolid,$res["grade"])."\",\"course\":\"".$this -> GetCourse($schoolid,$res["courseid"])."\",\"name\":\"".$res["name"]."\",\"max\":\"".$res["max"]."\",\"dayfrom\":\"".$res["dayfrom"]."\",\"dayto\":\"".$res["dayto"]."\",\"type\":\"".$type."\"}";
         }
         echo $out;
     }

     function createClass(){
        $schoolid = $_POST["schoolid"];
        $idlist = $_POST["idlist"];
        $arr = explode(";",$idlist);
        $str ="";
        try {
           for($i=0; $i<count($arr)-1;$i++){
            $subArr = explode(",",$arr[$i]);
            $courseid  = $subArr[0];
            $classnum  = $subArr[1];
            $grade     = $subArr[2];
            $name      = $subArr[3];
            for($j=0;$j<(int)$classnum;$j++){
               $sarr = array('grade'     => $grade,
                             'courseid'  => $courseid,
                             'name'      => $name.'-'.($j+1),
                             'schoolid'  => $schoolid);
               $class = M("class","zb_");
               $classid = $class -> add($sarr);
               if($classid){
                  $this -> allocationStudent($schoolid,$classid,$courseid,$classnum,$j);//分配学生
               }
            }
            $cm = M("course","zb_");
            $res = $cm -> where("id=".$courseid) -> save(array('status' => "1"));
          }
           $str ="1";
        } catch (Exception $e) {
           $str = $e -> getMessage();
        }
        echo $str;
     }
     //分配学生
     function allocationStudent($schoolid,$classid,$courseid,$classnum,$j){
        $bm = M("baoming","zb_");
        $studentlist = $bm -> field("studentid");
        $studentnum = $studentlist 
                    -> where("schoolid=".$schoolid." and cid=".$courseid)
                    -> count();//报名人数;

        $avgClassStudent = intval($studentnum/$classnum);//向下取整
        $mod = $studentnum % $classnum ;//取余。    
        $default = 0;
        if($mod>0&&$mod>$j) {
           $default =1;
        }   

        $data =  array();      
        $student = M("student","zb_");

        $count   = $student
                 -> where("schoolid=".$schoolid." and classid=".$classid) 
                 -> count();

        $res = $studentlist
             ->where("schoolid=".$schoolid." and cid=".$courseid)
             ->limit($count.",".($avgClassStudent+$default)) 
             -> select();

        for($i=0; $i<count($res);$i++){
           $data[$i] = array('studentid' => $res[$i]["studentid"],
                             'classid'   => $classid,
                             'schoolid'  => $schoolid);
        }
    
        $student -> addAll($data);
        
     }

     //获取该学校的任课老师
     function GetTeacherList(){
        $schoolid = $_POST["schoolid"];
        $user = M("user");
        $res = $user 
             -> field("id,name")
             -> where("schoolid=".$schoolid." and type=1")
             -> select();
        $json ="";
        foreach ($res as $k => $v) {
           $json .= "{\"id\":\"".$v["id"]."\",\"name\":\"".$v["name"]."\"},";
        }
        if (strlen($json)>0) $json = substr($json,0,strlen($json)-1);
        echo  "{\"data\":[".$json."]}";
     }
     //给走班班级设置任课教师
     function SetClassTeacher(){
        $classid = $_POST["classid"];
        $teacherid = $_POST["teacherid"];
        $class = M("class","zb_");
        $res = $class -> where("id=".$classid) -> save(array('teacherid'=>$teacherid));
        $out ="0";
        if($res) $out ="1";
        echo $out;
     }
     //获取该学校该科目下的班级列表
     function getClassList(){
        $schoolid = $_POST["schoolid"];
        $classid = $_POST["classid"];
        //获取courseid
        $class = M("class","zb_");
        $res = $class -> field("courseid,grade")
                      -> where("id=".$classid) 
                      -> find();
        $courseid =0;
        $grade  =0;
        $json="";
        if($res){
            $courseid = $res["courseid"];
            $grade = $res["grade"];
            $list = $class -> field("id,name")
                           -> where("courseid=".$courseid." and grade=".$grade." and schoolid=".$schoolid." and id!=".$classid)
                           -> select();
            foreach ($list as $k => $v) {
                $json .="{\"id\":\"".$v[id]."\",\"name\":\"".$v["name"]."\"},";
            }

            if(strlen($json)>0) $json = substr($json, 0, strlen($json)-1);
        }
        echo "{\"data\":[".$json."]}";
     }
     //移动学生
     function moveStudent(){
         $classid = $_POST["classid"];
         $studentid = $_POST["studentid"];
         $student = M("student","zb_");
         $res = $student ->where("id=".$studentid) -> save(array('classid'=>$classid));
         $out ="0";
         if($res) $out ="1";
         echo $out;
     }
     //设置每个科目每周应该最多拍的课时数
     function SetWeekLesson(){
         $schoolid = $_POST["schoolid"];
         $list = $_POST["list"];
         $course = M("course","zb_");
         $listarr = explode(";",$list);
         $out ="";
         try {
           for ($i=0; $i < count($listarr)-1 ; $i++) { 
              $subArr = explode(",", $listarr[$i]);
              $id = $subArr[0];
              $val = $subArr[1];
              $res = $course -> where("id=".$id) -> save(array('weekLessonCount'=>$val));
           }
           $out ="1";
         } catch (Exception $e) {
           $out ="0";
         }
         
         echo $out;
     }
     //添加教室
     function AddClassRoom(){
         $cr = M("classroom");
         $arr = array("roomname" => $_POST["roomname"],
                      "schoolid" => $_POST["schoolid"],
                      "nclass"   => $_POST["nclass"],
                      "nseat"    => $_POST["nseat"]);
         $res = $cr->add($arr);
         $out="0";
         if($res) $out ="1";
         echo $out;
     }

     //获取禁排教室的数据
     function GetClassRoom(){
        $schoolid = $_POST["schoolid"];
        $roomid = $_POST["roomid"];
        
        $html ="";
        for($tr=1;$tr<=9;$tr++){
           $html .="<tr>";
           for($td=0;$td<=7;$td++){
              if($td==0) $html .="<td>".$tr."</td>";
              else $html .= $this->SetLessonColorBg($schoolid,$roomid,$tr,$td);//"<td>".$td."-".$tr."</td>";
           }
           $html .= "</tr>";
        }
        echo $html;
     }
     function SetLessonColorBg($schoolid,$roomid,$index,$week){
        $room = M("limitClassroom","zb_");
        $res = $room
             -> field("id") 
             -> where(array("schoolid"=>$schoolid,"roomid"=>$roomid,"week"=>$week,"lessonIndex"=>$index)) 
             -> find();
        $out="";
        if($res) $out ="<td data-week=\"".$week."\" data-index=\"".$index."\" data-type=\"1\" style='background: #f09800; color: #fff;'>禁排</td>";
        else $out ="<td data-week=\"".$week."\" data-type=\"0\" data-index=\"".$index."\"></td>";
        return $out;

     }
     //设置教室禁止排课
     function classRoomNot(){
         $schoolid = $_POST["schoolid"];
         $roomid  = $_POST["roomid"];
         $week    = $_POST["week"];
         $index   = $_POST["index"];
         $type    = $_POST["type"];
         $room = M("limitClassroom","zb_");
         $out = "0";
         if($type=="0"){
            $res = $room->add(array("schoolid" => $schoolid,
                                    "roomid"   => $roomid,
                                    "week"     => $week,
                                    "lessonIndex" => $index));
            if($res) $out="1";
         }
         else{
           $res = $room -> where(array("schoolid" => $schoolid,
                                       "roomid"   => $roomid,
                                       "week"     => $week,
                                       "lessonIndex" => $index)) -> delete();
            if($res) $out="1";
         }
         echo $out;

     }
     //获取教师tablehtml
     function GetTeacherTable(){
        $schoolid = $_POST["schoolid"];
        $teacherid = $_POST["teacherid"];
        $html ="";
        for($tr=1;$tr<=9;$tr++){
           $html .="<tr>";
           for($td=0;$td<=7;$td++){
              if($td==0) $html .="<td>".$tr."</td>";
              else $html .= $this->SetTeacherLessonColorBg($schoolid,$teacherid,$tr,$td);
           }
           $html .= "</tr>";
        }
        echo $html;
     }
     function SetTeacherLessonColorBg($schoolid,$teacherid,$index,$week){
        $teacher = M("limitTeacher","zb_");
        $res = $teacher
             -> field("id") 
             -> where(array("schoolid"=>$schoolid,"teacherid"=>$teacherid,"week"=>$week,"lessonIndex"=>$index)) 
             -> find();
        $out="";
        if($res) $out ="<td data-week=\"".$week."\" data-index=\"".$index."\" data-type=\"1\" style='background: #f09800; color: #fff;'>禁排</td>";
        else $out ="<td data-week=\"".$week."\" data-type=\"0\" data-index=\"".$index."\"></td>";
        return $out;
     }

     function SetTeacherNot(){
         $schoolid = $_POST["schoolid"];
         $teacherid  = $_POST["teacherid"];
         $week    = $_POST["week"];
         $index   = $_POST["index"];
         $type    = $_POST["type"];
         $room = M("limitTeacher","zb_");
         $out = "0";
         if($type=="0"){
            $res = $room->add(array("schoolid"    => $schoolid,
                                    "teacherid"   => $teacherid,
                                    "week"        => $week,
                                    "lessonIndex" => $index));
            if($res) $out="1";
         }
         else{
           $res = $room -> where(array("schoolid"    => $schoolid,
                                       "teacherid"   => $teacherid,
                                       "week"        => $week,
                                       "lessonIndex" => $index)) -> delete();
            if($res) $out="1";
         }
         echo $out;
     }

     //禁止科目
     function GetCourseTable(){

        $schoolid = $_POST["schoolid"];
        $courseid = $_POST["courseid"];
        $html ="";
        for($tr=1;$tr<=9;$tr++){
           $html .="<tr>";
           for($td=0;$td<=7;$td++){
              if($td==0) $html .="<td>".$tr."</td>";
              else $html .= $this->SetCourseColorBg($schoolid,$courseid,$tr,$td);
           }
           $html .= "</tr>";
        }
        echo $html;
     }

     function SetCourseColorBg($schoolid,$courseid,$index,$week){
        $course = M("limitCourse","zb_");
        $res = $course
             -> field("id") 
             -> where(array("schoolid"=>$schoolid,"courseid"=>$courseid,"week"=>$week,"lessonIndex"=>$index)) 
             -> find();
        $out="";
        if($res) $out ="<td data-week=\"".$week."\" data-index=\"".$index."\" data-type=\"1\" style='background: #f09800; color: #fff;'>禁排</td>";
        else $out ="<td data-week=\"".$week."\" data-type=\"0\" data-index=\"".$index."\"></td>";
        return $out;
     }

     function SetCourseNot(){
         $schoolid = $_POST["schoolid"];
         $courseid  = $_POST["courseid"];
         $week    = $_POST["week"];
         $index   = $_POST["index"];
         $type    = $_POST["type"];
         $room = M("limitCourse","zb_");
         $out = "0";
         if($type=="0"){
            $res = $room->add(array("schoolid"    => $schoolid,
                                    "courseid"   => $courseid,
                                    "week"        => $week,
                                    "lessonIndex" => $index));
            if($res) $out="1";
         }
         else{
           $res = $room -> where(array("schoolid"    => $schoolid,
                                       "courseid"   => $courseid,
                                       "week"        => $week,
                                       "lessonIndex" => $index)) -> delete();
            if($res) $out="1";
         }
         echo $out;
     }
     //获取教室课程表
     function GetClassRoomTable(){
         $schoolid = $_POST["schoolid"];
         $roomid = $_POST["roomid"];
         $html ="";
         for($tr=1;$tr<=9;$tr++){
           $html .="<tr height=\"60\">";
           for($td=0;$td<=7;$td++){
              if($td==0) $html .="<td>".$tr."</td>";
              else $html .= $this->SetLessonData($schoolid,$roomid,$tr,$td);//"<td>".$td."-".$tr."</td>";
           }
           $html .= "</tr>";
         }
        echo $html;
     }
     function SetLessonData($schoolid,$roomid,$index,$week){
        $room = M("coursetable","zb_");
        $res = $room
             -> where(array("schoolid"=>$schoolid,"roomid"=>$roomid,"week"=>$week))
             -> find();
        $out="";
        if($res) $out ="<td data-week=\"".$week."\" data-index=\"".$index."\" >".$this->GetLessonDataInfo($res["c".($index)])."</td>";
        else $out ="<td data-week=\"".$week."\"  data-index=\"".$index."\"></td>";
        return $out;
     }
     function GetLessonDataInfo($classid){
         $class = M("class","zb_");
         $res = $class -> field("name,teacherid,courseid")
                       -> where("id=".$classid) 
                       -> find();
         $out ="";
         $pub = new PublicController();
         if ($res) {
            $classname = $res["name"];
            $teacher = $pub -> GetTeacherName($res["teacherid"]);
            $course = $pub -> GetCourseName($res["courseid"]);
            $out = "<font class='f-name'>".$classname."/</font><font class='f-course'>".$course."/</font><font class='f-teacher'>".$teacher."</font>";
         }
         return $out;
     }

     function GetTeacherCourseTable(){
         $schoolid = $_POST["schoolid"];
         $teacherid = $_POST["teacherid"];
         $html ="";
         for($tr=1;$tr<=9;$tr++){
           $html .="<tr height=\"60\">";
           for($td=0;$td<=7;$td++){
              if($td==0) $html .="<td>".$tr."</td>";
              else $html .= $this->SetTeacherLessonData($schoolid,$teacherid,$tr,$td);//"<td>".$td."-".$tr."</td>";
           }
           $html .= "</tr>";
         }
        echo $html;
     }
     function SetTeacherLessonData($schoolid,$teacherid,$index,$week){

        $teacher = M("coursetableTeacher","zb_");
        $res = $teacher 
             -> where(array("schoolid"=>$schoolid,"teacherid"=>$teacherid,"week"=>$week))
             -> find();
        $out="";
        if($res){
           $pub = new PublicController();
           $c = ($res["c".($index)]);
           if($c!=""){
              $cArr = explode("#", $c);
              $roomname = $pub -> GetRoom($cArr[0]);
              $classname = $pub -> GetZBClassName($cArr[1]);
              $name =  $pub -> GetCourseName($pub->GetCourseID($cArr[1]));//获取科目名称
              $font = "<font class='f-name'>".$classname."/</font><font class='f-course'>".$name."/</font><font class='f-classroom'>".$roomname."</font>";
              $out = "<td data-week=\"".$week."\" data-index=\"".$index."\" >".$font."</td>";
           }
           else $out ="<td data-week=\"".$week."\"  data-index=\"".$index."\"></td>";
       
           
        }
        else $out ="<td data-week=\"".$week."\"  data-index=\"".$index."\"></td>";
        return $out;
     }

     function CancelClass(){
        $schoolid = $_POST["schoolid"];
        $courseid = $_POST["courseid"];
        $course = M("course","zb_");
        $res = $course -> where("id=".$courseid)->save(array("status"=>"2"));
        $out ="0";
        if($res){
           $classid ="";
           $class = M("class","zb_");
           $list = $class -> field("id") -> where("courseid=".$courseid) ->select();
           foreach ($list as $k => $v) {
              $classid .=$v["id"].",";
           }

           if(strlen($classid)>0){
               $classid = substr($classid,0,strlen($classid)-1);
               $del = $class -> where("id in (".$classid.")") -> delete();
               if($del){
                 $student = M("student","zb_");
                 $del_student = $student 
                              -> where("classid in (".$classid.") and schoolid=".$schoolid) -> delete();
                 if($del_student) $out="1";
               }
           }
        }
        echo $out;
     }

     function SignUp(){ //学生报名
         $schoolid = $_POST["schoolid"];
         $studentid = $_POST["studentid"];
         $grade = $_POST["grade"];
         $courseid = $_POST["courseid"];
         $arrid = array("11","15","16","17","18","19");
         $bm = array();
         for ($i=0; $i < count($arrid) ; $i++) { 
             $num = strpos($courseid,"|".$arrid[$i]."|");
             if(is_numeric($num)){
                 $data[$i] = array("studentid" => $studentid,
                                   "schoolid"  => $schoolid,
                                   "cid"       => $arrid[$i],
                                   "grade"     => $grade,
                                   "uptime"    => date("Y-m-d H:i:s",time()),
                                   "type"      => "1");
             }
             else{
                 $data[$i] = array("studentid" => $studentid,
                                   "schoolid"  => $schoolid,
                                   "cid"       => $arrid[$i],
                                   "grade"     => $grade,
                                   "uptime"    => date("Y-m-d H:i:s",time()),
                                   "type"      => "0");
             }
         }
         $str ="1";
         try{
           $bm = M("baoming","zb_");
           $bm -> addAll($data);
         } 
         catch (Exception $e) {
            $str = $e -> getMessage();
         }
         echo $str;
         //首先检测该同学有没有报过该课程
        /* $bm = M("baoming","zb_");
         $out = "";
         $count = $bm 
                -> where("schoolid=".$schoolid." and studentid=".$studentid." and cid=".$courseid)
                -> count();
         if($count>0) $out ="你已经报过该科目，禁止重复报名~";
         else{
             $course = M("course","zb_");
             $z_idlist =""; //主修的id列表
             $f_idlist =""; //选修的id列表
             $z = $course -> field("id") -> where("schoolid=".$schoolid." and type=1") -> select();
             $f = $course -> field("id") -> where("schoolid=".$schoolid." and type=0") -> select();
             foreach ($z as $k => $v) {
                $z_idlist .=$v["id"].",";
             }
             foreach ($f as $k => $v) {
                $f_idlist .=$v["id"].",";
             }
             $exist = 0;
             if($type=="1"){
                 if (strlen($z_idlist)>0) $z_idlist = substr($z_idlist, 0,strlen($z_idlist)-1);
                 $exist = $bm 
                        -> where("schoolid=".$schoolid." and studentid=".$studentid." and cid in (".$z_idlist.")")
                        -> count();
                 if ($exist>=3) $out ="主修课最多报名3科";
                 else
                 {
                    $out = $this -> studentSignUp($studentid,$schoolid,$courseid);
                 }
             }
             else{
                if(strlen($f_idlist)>0) $f_idlist = substr($f_idlist, 0,strlen($f_idlist)-1);
                $exist = $bm 
                        -> where("schoolid=".$schoolid." and studentid=".$studentid." and cid in (".$f_idlist.")")
                        -> count();
                if ($exist>=3) $out ="辅修课最多报名3科";
                else
                {
                    $out = $this -> studentSignUp($studentid,$schoolid,$courseid);
                }
             }
         }*/

         echo $out;

     }

     function studentSignUp($studentid,$schoolid,$courseid){
         $bm = M("baoming","zb_");
         $arr = array('studentid' => $studentid,
                      'schoolid'  => $schoolid,
                      'cid'       => $courseid,
                      'uptime'    => date("Y-m-d H:i:s",time()));
         $res = $bm ->add($arr);
         if($res) return "1";
         else return "0";
     }
     //学生取消报名
     function CancelSignUp(){
         $courseid = $_POST["courseid"];
         $studentid = $_POST["studentid"];
         $bm = M("baoming","zb_");
         $res = $bm -> where(array("studentid"=>$studentid,"cid"=>$courseid)) -> delete();
         $out = "0";
         if($res) $out = "1";
        
         echo $out;
     }

  }
?>