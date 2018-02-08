<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Session;
use \app\index\model\Article as ArticleModel;
use \app\index\model\Banner as BannerModel;
use \app\index\model\GoodTalk as GoodTalkModel;
use \app\index\model\DailyTalk as DailyTalkModel;
use \app\index\model\Notice as NoticeModel;
use \app\index\model\User as UserModel;
class UserInfo extends Controller
{
    public function index()
    {
        $userId = Session::get('user_id');
        $userInfo=UserModel::get($userId)->getData();
        $this->assign('userInfo',$userInfo);
        return view();
    }
    public function update(){
        $user=new UserModel();
        //图片上传;
        if($_FILES['img']['tmp_name']){
            $sfile=$_FILES['img']['tmp_name'];
            $uploaddir='uploads';
            if(!file_exists($uploaddir)){
                mkdir($uploaddir);
            }
            $filesize=$_FILES['img']['size'];

            //创建上传日期目录
            $year=date('Y');
            $month=date('m');
            $day=date('d');
            $datedir='static/'.$uploaddir.'/'.$year.'-'.$month.'-'.$day;
            if(!file_exists($datedir)){
                mkdir($datedir);
            }

            // 获取文件后缀
            $farr=explode('.',$_FILES['img']['name']);
            $fext=array_pop($farr);

            //加工文件名
            $frand=time().mt_rand();

            //最终上传路径和文件名
            $dfile=$datedir.'/'.$frand.'.'.$fext;
            $ufile=$uploaddir.'/'.$year.'-'.$month.'-'.$day.'/'.$frand.'.'.$fext;
            move_uploaded_file($sfile,$dfile);
         }
          $userId=Session::get('user_id');
          $username = $_POST['username'];
          $password = $_POST['password'];
          $change=false;    
          if($password!="######"){
            $password = $_POST['password'];
            $change=true;   
          }
          $oldimg='static/'.Session::get('user_img');
          if(!isset($dfile)){
             if($change){
                $res=$user->save(
                    [
                        "username"=>$username,
                        "password"=>md5($password)
                    ],["id"=>$userId]
                );             
             }else{
                $res=$user->save(
                    [
                        "username"=>$username                        
                    ],["id"=>$userId]
                );                                
             }
          }else{
            if($change){
                $res=$user->save(
                    [
                        "username"=>$username,
                        "img"=>$ufile,
                        "password"=>md5($password)
                    ],["id"=>$userId]
                );                
            }else{
               $res=$user->save(
                    [
                        "username"=>$username,
                        "img"=>$ufile                        
                    ],["id"=>$userId]
                );
            }   
             Session::set('user_img',$ufile);        
             unlink($oldimg);
          }
        if($res){
            Session::set('user_name',$username);
            echo "<script>alert('修改成功！')</script>";             
        }else{
            echo "<script>alert('修改失败！')</script>"; 
        }
        echo '<script>location="index"</script>';
    }
}
