<?php
  namespace PlanClass\Controller;
  use Think\Controller;
  class PublicController extends  Controller{
  	  function GetUsername(){
	      global $u;	   
		  //$u = "bj21z";
		  if(cookie("planusername")!=null) $u = cookie("planusername");
		  if(session("planusername")!=null) $u = session("planusername"); 
		  return $u;	
	  }
	  function GetUsernameData($username){
          $admin = M("admin");
          $res = $admin -> where("username=".$username)->find();
          $out = "0";
          if($res) $out ="1";
          return $out;
	  }
    
	  function GetManageName($u){ //获取管理员的名称
         $admin = M("admin");
         $res = $admin -> field(array("name,schoolid")) -> where("username='".$u."'") ->  find();
         
         $arr = array('name' =>$res["name"] ,"schoolid" => $res["schoolid"]);

         return $arr;
	  }
   
	  function GetTeacherName($id){
	   	  $user = M("user");
	   	  $nameres = $user 
	   	          -> field("name")
	   	          -> where("id=".$id)
	   	          -> find();
           $name ="";
          if (count($nameres)>0) {
          	# code...
            $name = $nameres["name"];
          }
          else $name = "已删除";

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

	   function GetRoom($roomid){
	   	  $roomname ="";
	   	  $room = M("classroom");
	   	  $res = $room -> field("roomname") -> where("roomid=".$roomid) ->find();
	   	  if($res) $roomname =$res["roomname"];
	   	  else $roomname ="已删除";

	   	  return $roomname;
	   }
     function GetClassName($classid){
         $classname ="";
         $class = M("class");
         $res = $class -> field("name") -> where("id=".$classid) -> find();
         if($res) $classname = $res["name"];
         else $classname = "已删除";

         return $classname;
     }
     function GetZBClassName($classid){
       	   $classname ="";
       	   $class = M("class","zb_");
       	   $res = $class -> field("name") -> where("id=".$classid) -> find();
       	   if($res) $classname = $res["name"];
       	   else $classname ="已删除";
       	   return $classname;
       }
       function GetCourseID($classid){
          $courseid ="0";
          $class = M("class","zb_");
          $res = $class -> field("courseid") -> where("id=".$classid) -> find();
          if($res){
          	  $courseid = $res["courseid"];
          }
          return $courseid;
       }

       function GetStudentUsername(){ //获取学生的登录信息
        global $studentu;     
        $studentu = "12005832";
        if(cookie("studentusername")!=null) $studentu = cookie("studentusername");
        if(session("studentusername")!=null) $studentu = session("studentusername"); 
        return $studentu;  
      }
      function GetStudentInfo($username){
          $user = M("user");
          $res = $user 
               -> field("id,name,schoolid,classid,studentno") 
               -> where("account='".$username."' or phone='".$username."'")
               -> find();

          $arr = array("name"       => $res["name"] ,
                       "schoolid"   => $res["schoolid"],
                       "id"         => $res["id"],
                       "classid"    => $res["classid"],
                       "studentno"  => $res["studentno"]);

          return $arr;
      }
     


	  function emptypar(){

	   	  echo "空的参数";
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

       return $gradestr; 
   }

   function Already($schoolid,$grade,$courseid){ //获取已经报名的人数
       $bm = M("baoming","zb_");
       $count = $bm -> where(array('schoolid'=>$schoolid,'grade'=>$grade,'cid'=>$courseid)) -> count();
       return $count;      
   }

  }
?>