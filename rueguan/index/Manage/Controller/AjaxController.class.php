<?php
  namespace Manage\Controller;
  use Think\Controller;
  class AjaxController extends  Controller {
      function GetGradeClass(){
      	 $schoolid = $_POST["schoolid"];
      	 $grade = $_POST["grade"];
         $class = M("class");
         $res = $class 
             -> field("name,id") 
             -> where("grade='".$grade."' and schoolid=".$schoolid)
             -> order("orderid asc") 
             -> select();
         $out ="";
         if ($res) {
             for ($i=0; $i < count($res) ; $i++) { 
             	 if ($i==0) $out .="<li class=\"top\" data-id=\"".$res[$i]["id"]."\">".$res[$i]["name"]."</li>";
             	 else if($i==(count($res)-1)) $out .="<li class=\"bottom\" data-id=\"".$res[$i]["id"]."\">".$res[$i]["name"]."</li>";
             	 else $out .="<li data-id=\"".$res[$i]["id"]."\">".$res[$i]["name"]."</li>";
             }
         }       
      	 echo $out;
      }

      function Login(){
         $username = $_POST["username"];
         $password = $_POST["password"];
         $ismemory = $_POST["ismemory"];
        
         $user = M("user");
         $res =   $user 
              ->  field("pwd,type,schoolid")
              ->  where("(account='".$username."' or phone='".$username."') and type=4")
              ->  find();
         $out ="0";
         if ($res) {
            if ($password==$res["pwd"]) {
               $out = "2";
               if ($ismemory=="true") {
                   cookie("username",$username); //记住密码
               }
               else session("username",$username);
            }
            else $out = "1";//密码错误*/
         }

         echo $out;
      }

      function OutLogin(){
          cookie("username",null);
          session("username",null);
          echo "1";
      }

      //function exportExcel(){

      //}

      function GetLessonElement(){
          $lessonid = $_POST["lessonid"];
          $v= $_POST["v"];//1:拍照/截图,2.课堂习题,3课堂提问,4课件,5.批注
          $lr = M("lessonRecord");
          $html="";
          if($v==1){
            $res = $lr -> field("uptime,result") 
                        -> where("action='camera' and lessonid=".$lessonid)
                        -> order("id desc")
                        -> select();
             $html .=" <tr>
                        <th>文件</th>
                        <th>名称</th>
                        <th>时间</th>
                      </tr>";
            foreach($res as $k => $v) {
                  $json = $v["result"];
                  $rid = str_replace("\"","",$this -> ResolveJSON($json, "filename"));//.Replace("\"", "");
                  $path = "http://api.skyeducation.cn/EduApi/upload/".$this-> Setfopen($v["uptime"])."/".$rid;
                  $html .="<tr height='80'>
                            <td><img src='".$path."' style='width:100px; height:70px' onclick='showImg(this)'/></td>
                            <td>".$rid."</td>
                            <td>".$v["uptime"]."</td>
                          </tr>";
              }
          }
          else if($v==2){
             $res = $lr -> field("uptime,result") 
                        -> where("action='xiti' and lessonid=".$lessonid)
                        -> order("id desc")
                        -> select();
              $html .=" <tr>
                        <th>截图</th>
                        <th>答案</th>
                        <th>答题人数(人)</th>
                        <th>答对人数(人)</th>
                        <th>答错人数(人)</th>
                        <th>平均回答时间(秒)</th>
                      
                       </tr>";
              foreach ($res as $k => $v) {
                  $json = $v["result"];
                  $rid = str_replace("\"","",$this -> ResolveJSON($json,"rid"));
                  $path = "http://api.skyeducation.cn/EduApi/upload/".$this-> Setfopen($v["uptime"])."/".$rid.".jpg";
                  $answer = str_replace("\"","", $this -> ResolveJSON($json, "answer"));
                  $daan = ($this -> DaAn($answer))==""?"未设置":$answer;
                  $canyu = $this -> ResolveJSON($json, "result"); 
                  $count = (int)str_replace("\"","",$this -> ResolveJSON($json, "count"));
                  $countok = (int)str_replace("\"","",$this -> ResolveJSON($json, "countok"));
                  $btn = "<a class='btn disabled radius'>设置答案</a>";
                  $allname = $this ->GetxitiName($canyu,$answer,"all");
                  $rightname = $this -> GetxitiName($canyu, $answer, "right");
                  $errorname = $this -> GetxitiName($canyu, $answer, "error");

                  $html .="<tr height='80'>
                            <td><img src='".$path."' style='width:100px; height:70px' onclick='showImg(this)'/></td>
                            <td>".$daan."</td>
                            <td  style='cursor:pointer' onclick=\"showName(this)\" data-name='".$allname. "'>".(count(explode("、",$allname))-1)."</td>
                            <td  style='cursor:pointer' onclick=\"showName(this)\" data-name='".$rightname. "'>".(count(explode("、",$rightname))-1)."</td>
                            <td  style='cursor:pointer' onclick=\"showName(this)\" data-name='".$errorname. "'>".(count(explode("、",$errorname))-1)."</td>
                            <td>".str_replace("\"","",$this ->ResolveJSON($json,"timeAverage") )."</td>
                           
                          </tr>";
                   }
              }
              else if($v==3) {
                $res = $lr -> field("id,uptime,result") 
                        -> where("action='handon' and lessonid=".$lessonid)
                        -> order("id desc")
                        -> select();
                $html .="<tr>
                           <th>举手人数</th>
                           <th>被点名人数</th>
                           <th>时间</th>
                         </tr>";
                foreach ($res as $k => $v) {
                   $json = $v["result"];
                   $handon = str_replace("\"","", $this -> ResolveJSON($json, "handon"));
                   $callname =  str_replace("\"","", $this -> ResolveJSON($json, "callname"));
                   $handonlength   =0;
                   $callnamelength =0;
                   if($handon!="") $handonlength = count(explode(",", $handon));
                   if($callname!="") $callnamelength = count(explode(",", $callname));
                   $html .="<tr>
                             <td data-name='".($this -> GetNameList(explode(",", $handon)))."' style='cursor:pointer' onclick=\"showName(this)\">".$handonlength."</td>
                             <td data-name='".($this -> GetNameList(explode(",", $callname)))."' style='cursor:pointer' onclick=\"showName(this)\">".$callnamelength."</td>
                             <td>".$v["uptime"]."</td>
                           </tr>";
                } 
          }
          else if($v==4){
               $res = $lr -> field("id,uptime,result") 
                        -> where("action='fopen' and lessonid=".$lessonid)
                        -> order("id desc")
                        -> select();
                $html .="<tr>
                           <th>文件名称</th>
                           <th>页数</th> 
                           <th>时间</th>                          
                         </tr>";
                $f="";
                foreach ($res as $k => $v) {
                    $json = $v["result"];
                    $md5 = str_replace("\"","", $this -> ResolveJSON($json, "md5"));
                    $filename =  str_replace("\"","", $this -> ResolveJSON($json, "filename"));
                    $num = strpos($f,$filename.",");
										$pageNum = str_replace("\"","", $this -> ResolveJSON($json, "page"));
										$pageNum = explode("/", $pageNum);
                    if(!is_numeric($num)){
                       $f .= $filename.",";
                       //$arr = explode(".", $filename);
                       //$hz = $arr[1];
                       $html .="<tr>
                                 <td>".$filename."</td>
                                 <td>".$pageNum[1]."</td> 
                                 <th>".$v["uptime"]."</th>  
                               </tr>";
                    }
                }
          } 
          else if($v==5){
              $res = $lr -> field("id,uptime,result") 
                        -> where("action='Draw' and lessonid=".$lessonid)
                        -> order("id desc")
                        -> select();
                $html .="<tr>
                           <th>照片</th>
                           <th>名称</th>
                           <th>时间</th>                       
                         </tr>";
                foreach ($res as $k => $v) {
                    $json = $v["result"];
                    $rid = str_replace("\"","", $this -> ResolveJSON($json, "filename"));
                    $path =  "http://api.skyeducation.cn/EduApi/upload/".($this->Setfopen($v["uptime"])).$rid;
                    $html .="<tr>
                                <td><img src='".$path."' style='width:100px; height:70px'/></td>
                                <td>".$rid."</td>
                                <td>".$v["uptime"]."</td>                       
                             </tr>";
                }
          }
          
          echo  $html;
          
      }
      function ResolveJSON($json,$name){
          $obj = json_decode($json);
          return $obj -> $name;
      }
      function Setfopen($time){
          return substr($time,0,4)."/".substr($time,5,2)."/".substr($time,8,2)."/";
      }
      function DaAn($daan){        
         if($daan=="W") $daan ="×";
         else if ($daan=="R") $daan="√";
         return $daan;
      }
      function GetxitiName($str,$answer,$type){
          $pub = new PublicController();
          $arr = explode(",", $str);
          $namestr = "";
          if($type=="all"){
              for($i=0; $i<count($arr);$i++){
                  $sub = explode(":", $arr[$i]);
                  $namestr .= ($pub->GetTeacherName(str_replace("\"","", $sub[0])))."、";
              }
          }
          else if($type=="right"){
              for($i=0; $i<count($arr);$i++){
                  $sub = explode(":", $arr[$i]);
                  if(count($sub)>=2){
                     if($sub[1]==$answer)  $namestr .= ($pub->GetTeacherName(str_replace("\"","", $sub[0])))."、";
                  }                  
              }
          }
          else if($type=="error"){
             for($i=0; $i<count($arr);$i++){
                  $sub = explode(":", $arr[$i]);
                  if(count($sub)>=2){
                     if($sub[1]!=$answer)  $namestr .= ($pub->GetTeacherName(str_replace("\"","", $sub[0])))."、";
                  }                  
              }
          }

          return $namestr;
      }
      function GetNameList($arr){
        //$pub = new PublicController();
        $namestr="";
        $user = M("user");
        for($i=0; $i< count($arr);$i++){
            $sub = explode(":", $arr[$i]);
            $userid = str_replace("\"","", $sub[0]);
            $name = $user ->field("name") ->where(array("id"=>$userid)) -> find();
            $namestr .=  $name["name"]."、";
        }
        if($namestr=="") $namestr="无学生";
       // showBug($arr);
        return $namestr;
      }
  } 
 ?>