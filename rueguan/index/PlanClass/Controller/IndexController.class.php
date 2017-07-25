<?php
  namespace PlanClass\Controller;
  use Think\Controller;
  class IndexController extends Controller{
      
      function login(){
           if(cookie("planusername")!=null){
              $pub = new PublicController();
              if($pub->GetUsernameData(cookie("planusername"))=="1") $this -> redirect("Index/index");
              else $this -> display("login");
           }
           else  $this -> display("login");
	    }

      function Index(){
      	   $public = new PublicController();
           $u = $public->GetUsername();
           if(!$u){
           	   $this -> redirect("Index/login");
           }
           else{

              $arr = $public->GetManageName($u);
              $out = array('name'      =>  $arr["name"],
              	           'schoolid'  =>  $arr["schoolid"]);
               
              $course = M("course","zb_");
              $res = $course -> field("grade","courseid","name","max","dayfrom","dayto","","status")
                             -> where("schoolid=".$arr["schoolid"]);
              $count = $res -> count();     
              $Page = new \Think\Page($count,20);//实例化一个分页类
              $Page->setConfig('header', '条数据');
              $Page->setConfig('prev', '上一页');
              $Page->setConfig('next', '下一页');
              $Page->setConfig('first', '首页');
              $Page->setConfig('end', '末页');      
              $show = $Page->show();  
              $list = $res -> order("id desc") -> limit($Page->firstRow.','.$Page->listRows)->select();        
              $this ->assign('page',$show);
              $this -> assign("out",$out);
              $this->assign('list',$list);// 赋值数据集
           	  $this -> display("index");
           }
      }

      function splitclass(){
           $public = new PublicController();
           $u = $public->GetUsername();
           if(!$u){
               $this -> redirect("Index/login");
           }
           else{

              $arr = $public->GetManageName($u);
              $out = array('name'      =>  $arr["name"],
                           'schoolid'  =>  $arr["schoolid"]);

              $course = M("course","zb_");
              $res = $course -> field("grade","courseid","name","max","dayfrom","dayto","","status")
                             -> where("schoolid=".$arr["schoolid"]." and (status=0 or status=2)");

              $count = $res -> count();     
              $Page = new \Think\Page($count,1);//实例化一个分页类
              $Page->setConfig('header', '条数据');
              $Page->setConfig('prev', '上一页');
              $Page->setConfig('next', '下一页');
              $Page->setConfig('first', '首页');
              $Page->setConfig('end', '末页');      
              $show = $Page->show();  
              $list = $res -> order("id desc") -> where("schoolid=".$arr["schoolid"]." and (status=0 or status=2)") -> limit($Page->firstRow.','.$Page->listRows)->select();        
              $this ->assign('page',$show);             
              //$this->assign('list',$list);// 赋值数据集
              $arrid = array("11","15","16","17","18","19");
              $html ="";
              for($i=0; $i<6;$i++){
                  $grade = $public->SetGrage($list[0]["grade"]);
                  $num = $public->Already($arr["schoolid"],$list[0]["grade"],$arrid[$i]);
                  $coursename = $public-> GetCourseName($arrid[$i]);

                  $html .="<tr><td><input type=\"checkbox\" name=\"idlist\" value=\"".$arrid[$i]."\"  /></td>
                          <td>".$grade."</td>
                          <td>".$coursename."</td>                         
                          <td>".$num."</td>
                          <td data-num =\"".$num."\" data-grade=\"".$list[0]["grade"]."\"  data-coursename=\"".$grade."-".$coursename."\"><input id=\"input-".$arrid[$i]."\" type=\"text\"  class=\"input-text radius size-MINI fenbaninput\" /></td>
                          <td>0</td></tr>";
              }
              $this -> assign("html",$html);
              $this -> assign("out",$out);
              $this -> display("planclass");
           }
      }

      function disteacher(){
         $public = new PublicController();
         $u = $public->GetUsername();
         if(!$u){
             $this -> redirect("Index/login");
         }
         else{
            
              $arr = $public->GetManageName($u);
              $out = array('name'      =>  $arr["name"],
                          'schoolid'  =>   $arr["schoolid"]);

              $class = M("class","zb_");             
              $count = $class -> where("schoolid=". $arr["schoolid"]) -> count();     
              $Page = new \Think\Page($count,20);//实例化一个分页类
              $Page->setConfig('header', '条数据');
              $Page->setConfig('prev', '上一页');
              $Page->setConfig('next', '下一页');
              $Page->setConfig('first', '首页');
              $Page->setConfig('end', '末页');      
              $show = $Page->show();  
              
              $list = $class -> order("id desc") 
                             -> where("schoolid=".$arr["schoolid"]) 
                             -> limit($Page->firstRow.','.$Page->listRows)
                             -> select();
              $this -> assign('page',$show);             
              $this -> assign('list',$list);// 赋值数据集
              $this -> assign("out",$out);
              $this -> display("planclassteacher");
         }
      }

      function student($cid=0){
         $public = new PublicController();
         $u = $public->GetUsername();
         if(!$u){
             $this -> redirect("Index/login");
         }
         else{
             if ($cid==0) {
                $public -> emptypar();
             }
             else
             {
               $class = M("class","zb_");
               $classname = $class -> field("name") ->where("id=".$cid) -> find();
               $arr = $public->GetManageName($u);
               $out = array('name'      =>  $arr["name"],
                            'schoolid'  =>  $arr["schoolid"],
                            'classname' =>  $classname["name"],
                            'classid'   =>  $cid);
               $student = M("student","zb_");
               $count = $student -> where("classid=". $cid) -> count();     
               $Page = new \Think\Page($count,20);//实例化一个分页类
               $Page->setConfig('header', '条数据');
               $Page->setConfig('prev', '上一页');
               $Page->setConfig('next', '下一页');
               $Page->setConfig('first', '首页');
               $Page->setConfig('end', '末页');      
               $show = $Page->show();  

               $list = $student -> order("id desc") 
                                -> where("classid=".$cid) 
                                -> limit($Page->firstRow.','.$Page->listRows)
                                -> select();
               $this -> assign('page',$show);             
               $this -> assign('list',$list);// 赋值数据集
               $this -> assign("out",$out);
               $this -> display("studentlist");
           }
        }
      }
       
      function weeklesson(){
         $public = new PublicController();
         $u = $public->GetUsername();
         if(!$u){
             $this -> redirect("Index/login");
         }
         else{

              $arr = $public->GetManageName($u);
              $out = array('name'      =>  $arr["name"],
                           'schoolid'  =>  $arr["schoolid"]);               
              $course = M("course","zb_");
              $res = $course -> where("schoolid=".$arr["schoolid"]);
              $count = $res -> count();     
              $Page = new \Think\Page($count,20);//实例化一个分页类
              $Page->setConfig('header', '条数据');
              $Page->setConfig('prev', '上一页');
              $Page->setConfig('next', '下一页');
              $Page->setConfig('first', '首页');
              $Page->setConfig('end', '末页');      
              $show = $Page->show();  
              $list = $course ->  where("schoolid=".$arr["schoolid"])-> order("id desc") -> limit($Page->firstRow.','.$Page->listRows)->select();        
              $this ->assign('page',$show);
              $this -> assign("out",$out);
              $this->assign('list',$list);// 赋值数据集
              $this -> display("weeklesson");
         }
      }

     //教室禁拍
      function classroom(){
         $public = new PublicController();
         $u = $public->GetUsername();
         if(!$u){
             $this -> redirect("Index/login");
         }
         else{
              $arr = $public->GetManageName($u);
             

              $classroom = M("classroom");
              $res = $classroom -> field("roomid,roomname") -> where("schoolid=".$arr["schoolid"]) ->select();
              $option ="";
              $default = 0;
              for($i=0; $i<count($res);$i++){
                 if($i==0) $default = $res[$i]["roomid"];
                 $option .="<option value=\"".$res[$i]["roomid"]."\">".$res[$i]["roomname"]."</option>";
              }            
              $out = array('name'      =>  $arr["name"],
                           'schoolid'  =>  $arr["schoolid"],
                           'option'    =>  $option,
                           'default'   =>  $default);              
              $this -> assign("out",$out);
              $this -> display("classroom-prohibit");

         }
      }
      
      //教师禁排
      function teacher(){
          $public = new PublicController();
          $u = $public->GetUsername();
          if(!$u){
             $this -> redirect("Index/login");
          }
          else{

              $arr = $public->GetManageName($u);
              $user = M("user");
              $res =$user -> field("id,name")
                          -> where("schoolid=".$arr["schoolid"]." and type=1")
                          -> select();
              $option ="";
              foreach ($res as $k => $v) {
                 $option .="<option value=\"".$v["id"]."\">".$v["name"]."</option>";
              }
              
             
              $out = array('name'      =>  $arr["name"],
                           'schoolid'  =>  $arr["schoolid"],
                           'option'    =>  $option);              
              $this -> assign("out",$out);
              $this -> display("teacher-prohibit");
          }
      }
      //科目禁排
      function course(){
          $public = new PublicController();
          $u = $public->GetUsername();
          if(!$u){
             $this -> redirect("Index/login");
          }
          else{

              $arr = $public->GetManageName($u);
              $course = M("course");
              $mycoures = M("mycoures");
              $res1 =$course -> field("id,name")
                             -> where("schoolid=0")
                             -> select();
              $res2 = $mycoures -> field("id,name")
                                -> where("schoolid=".$arr["schoolid"])
                                -> select();
              $option ="";
              foreach ($res1 as $k => $v) {
                 $option .="<option value=\"".$v["id"]."\">".$v["name"]."</option>";
              }
              foreach ($res2 as $k => $v) {
                 $option .="<option value=\"".$v["id"]."\">".$v["name"]."</option>";
              }
             
              $out = array('name'      =>  $arr["name"],
                           'schoolid'  =>  $arr["schoolid"],
                           'option'    =>  $option);              
              $this -> assign("out",$out);
              $this -> display("course-prohibit");
      }

    }

    //开始排课
    function start() {
        $public = new PublicController();
        $u = $public->GetUsername();
        if(!$u){
           $this -> redirect("Index/login");
        }
        else{

            $arr = $public->GetManageName($u);

            $classroomnum = M("classroom")->where("schoolid=".$arr["schoolid"])-> count();
            $classnum = M("class","zb_") ->where("schoolid=".$arr["schoolid"]) -> count();
            $teachernum = M("user") -> where("schoolid=".$arr["schoolid"]." and type=1") -> count();
            $course = M("course")  -> where("schoolid=0")-> count();
            $mycoures = M("mycoures") ->where("schoolid=".$arr["schoolid"]) -> count();
            //教室的实际容量
            $jp_cm = M("limitClassroom","zb_") -> where("schoolid=".$arr["schoolid"])-> count();
            $classroomlesson = ($classroomnum*63)-$jp_cm;//63=每天9节课，一周7天 9*7
            $out = array('name'       =>  $arr["name"],
                         'schoolid'   =>  $arr["schoolid"],
                         'classroom'  =>  $classroomnum,
                         'classnum'   =>  $classnum,
                         'teachernum' =>  $teachernum,
                         'course'     =>  ($course+$mycoures),
                         'crl'        =>  $classroomlesson,
                         'cjp'        =>  $jp_cm,
                         'countlesson'=> (($course+$mycoures)*63));  
            $this -> assign("out",$out);
            $this -> display("startLesson");
        }
    }
    //教室课程表
    function classroomtable(){
        $public = new PublicController();
        $u = $public->GetUsername();
        if(!$u){
           $this -> redirect("Index/login");
        }
        else{

            $arr = $public->GetManageName($u);
            $classroom = M("classroom");
            $res = $classroom -> field("roomid,roomname") -> where("schoolid=".$arr["schoolid"]) ->select();
            $option ="";
            foreach ($res as $k => $v) {
               $option .="<option value=\"".$v["roomid"]."\">".$v["roomname"]."</option>";
            }      
           
            $out = array('name'       =>  $arr["name"],
                         'schoolid'   =>  $arr["schoolid"],
                         'option'     =>  $option); 
             $this -> assign("out",$out);
            $this -> display("classroomtable");
         }
    }

    function teachertable(){
        $public = new PublicController();
        $u = $public->GetUsername();
        if(!$u){
           $this -> redirect("Index/login");
        }
        else{

            $arr = $public->GetManageName($u);
            $user = M("user");
            $res = $user -> field("id,name") -> where("schoolid=".$arr["schoolid"]." and type=1") ->select();
            $option ="";
            foreach ($res as $k => $v) {
               $option .="<option value=\"".$v["id"]."\">".$v["name"]."</option>";
            }      
           
            $out = array('name'       =>  $arr["name"],
                         'schoolid'   =>  $arr["schoolid"],
                         'option'     =>  $option); 
            $this -> assign("out",$out);
            $this -> display("teachertable");
         }
    }

    function lessoncount(){
        $public = new PublicController();
        $u = $public->GetUsername();
        if(!$u){
           $this -> redirect("Index/login");
        }
        else{
            $arr = $public->GetManageName($u);
            $out = array('name'       =>  $arr["name"],
                         'schoolid'   =>  $arr["schoolid"]); 
            $user = M("user");
            $count = $user->field("id") -> where("schoolid=".$arr["schoolid"]." and type=1") ->count();
            $Page = new \Think\Page($count,20);//实例化一个分页类
            $Page->setConfig('header', '条数据');
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $Page->setConfig('first', '首页');
            $Page->setConfig('end', '末页');      
            $show = $Page->show();  
            $list = $user ->  where("schoolid=".$arr["schoolid"]." and type=1")-> order("id desc") -> limit($Page->firstRow.','.$Page->listRows)->select();
           
            $this ->assign('page',$show);
            $this -> assign("out",$out);
            $this->assign('list',$list);// 赋值数据集

            $this -> display("teacherlessoncount");
        }
    }



    function studentindex(){
        $pub = new PublicController();
        $u = $pub ->GetStudentUsername();
        if($u){

            $arr = $pub ->GetStudentInfo($u);
            $student = M("student","zb_");
            $res = $student -> field("classid") -> where("studentid=".$arr["id"]) -> select();
            $class = M("class","zb_");
            $classlist="";
            foreach ($res as $key => $value) {
                $classid = $value["classid"];
                $r = $class -> field("name") -> where("id=".$classid)->find();
                $classlist .= $r["name"]."、";
            }

            $out = array('name'       =>  $arr["name"],
                         'schoolid'   =>  $arr["schoolid"],
                         'studentid'  =>  $arr["id"],
                         'studentno'  =>  $arr["studentno"],
                         'classname'  =>  $pub -> GetClassName($arr["classid"]),
                         'classlist'  =>  $classlist); 
            
            $this -> assign("out",$out);
            $this -> display("studentindex");
       } 
       else  $this -> redirect("Index/login");
    }
 
    function ssc(){
        $pub = new PublicController();
        $u = $pub ->GetStudentUsername();
        if($u){

            $arr = $pub ->GetStudentInfo($u);
            
            $classid = $arr["classid"];
            $class = M("class");
            $grade = $class -> field("grade") -> where("id=".$classid)->find();
            $course = M("course","zb_");
            $res = $course->where("schoolid=".$arr["schoolid"]." and grade=".$grade["grade"]) -> find();
            $display = "none";
            if ($res)  $display = "table";
            $out = array('name'       =>  $arr["name"],
                         'schoolid'   =>  $arr["schoolid"],
                         'studentid'  =>  $arr["id"],
                         'grade'      =>  $grade["grade"],
                         'dayto'      =>  $res["dayto"],
                         "display"    =>  $display); 
            /*$Page = new \Think\Page($count,20);//实例化一个分页类
            $Page->setConfig('header', '条数据');
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $Page->setConfig('first', '首页');
            $Page->setConfig('end', '末页');      
            $show = $Page->show();  
            $list = $course -> order("id desc") 
                            -> where("schoolid=".$arr["schoolid"]." and grade=".$grade["grade"]) 
                            -> select();
            $this -> assign("list",$list);*/
            $this -> assign("out",$out);
            $this -> display("studentselectcourse");

        }
        else  $this -> redirect("Index/login");
       
    }

    function smct(){
        $public = new PublicController();
        $u = $public->GetStudentUsername();
        if(!$u){
           $this -> redirect("Index/login");
        }
        else{
            $arr = $public -> GetStudentInfo($u);

            $out = array('name'       =>  $arr["name"],
                         'schoolid'   =>  $arr["schoolid"],
                         'studentid'  =>  $arr["id"]);
           $html ="";
           for($tr=1;$tr<=9;$tr++){
             $html .="<tr height=\"40\">";
             for($td=0;$td<=7;$td++){
                if($td==0) $html .="<td>".$tr."</td>";
                else $html .= $this->GetMyCourse($arr["schoolid"],$arr["id"],$tr,$td);//"<td>".$td."-".$tr."</td>";
             }
             $html .= "</tr>";
           }
           $this -> assign("html",$html);
           $this -> assign("out",$out); 
           $this -> display("studentcourse");
        }
    }
    function GetMyCourse($schoolid,$studentid,$index,$week){
        $ct = M("coursetable","zb_");
        $ctlist = $ct -> field("roomid,c1,c2,c3,c4,c5,c6,c7,c8,c9")
                      -> where("schoolid=".$schoolid." and week=".$week) 
                      -> select();
        $classid = array();
        $roomid  = array();
        $out="<td></td>";
        for($i =0; $i<count($ctlist);$i++){            
            if ($classid[$i]!="0") {
                $classid[$i] = $ctlist[$i]["c".$index];
                $roomid[$i]  = $ctlist[$i]["roomid"];
            }           
        }
        if(count($classid)>0){ 
            $student = M("student","zb_");           
            for ($i=0; $i < count($classid) ; $i++) {                 
                $class_id = $classid[$i];
                
                $res = $student 
                     -> where(array("studentid"=>$studentid,"schoolid"=>$schoolid,"classid"=>$class_id))
                     -> find();
                //showBug($studentid.";".$schoolid.";".$class_id.";".$res);
                if($res){
                  $out ="<td>".$this -> GetDataInfo($class_id,$roomid[$i])."</td>";
                  break;//退出循环
                }
            }
        }
       // showBug($classid);
        return $out;// "<td>".$index."</td>";
    }

    function GetDataInfo($classid,$roomid){
        $pub = new PublicController();
        $roomname = $pub -> GetRoom($roomid);
        $class = M("class","zb_");
        $res = $class -> field("courseid,teacherid") -> where("id=".$classid) -> find();
        $coursename = $pub -> GetCourseName($res["courseid"]);
        $teachername = $pub -> GetTeacherName($res["teacherid"]);
        return $roomname."/".$coursename."/".$teachername;
    }


      
  }
 ?> 
  
    
    
