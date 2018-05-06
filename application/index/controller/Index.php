<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Session;
session_start();
use \app\index\model\Article as ArticleModel;
use \app\index\model\Banner as BannerModel;
use \app\index\model\GoodTalk as GoodTalkModel;
use \app\index\model\DailyTalk as DailyTalkModel;
use \app\index\model\Notice as NoticeModel;
use \app\index\model\User as UserModel;

class Index extends Controller
{
    public function index()
    {    	        
    	Session::set('banner_id',0);
        include 'public/article.php'; 
        //文章和文章发布人信息        
       $articleArr=Db::view('article',"*")
        ->view('banner','name','article.banner_id=banner.id')
        ->view('user','img,username','user.id=article.user_id')
        ->order('id','DESC')
        ->select();
        $user_id = Session::get('user_id');
        if(isset($user_id)){
            foreach ($articleArr as $key => $value) {
                $has_goods = 0;
                if(strlen($value['has_goods_userid'])>0){
                    $usersArr = explode(",", $value['has_goods_userid'] );
                    foreach ($usersArr as $key2 => $val) {
                        if($user_id == $val){
                            $has_goods = 1;
                        }
                    }
                }
                $articleArr[$key]['has_goods'] = $has_goods;
            } 
        }else{
            foreach ($articleArr as $key => $value) {
                 $articleArr[$key]['has_goods'] = 0;
            }
        }
        $this->assign('articleArr',$articleArr);

        return view();   
    }
    public function check () {
    	Session::set('jum',1);
    	$name=$_POST['username'];
        $psw=md5($_POST['password']);
        $res=UserModel::get(["username"=>$name,"password"=>$psw]);
        $user=[];
        // echo $userInfo['username'];
        // exit;
        if($res){
        	$userInfo=$res->getData();
        	Session::set('user_id',$userInfo['id']);
        	Session::set('user_name',$userInfo['username']);
        	Session::set('user_img',$userInfo['img']);        	
        	$user['state']=1;        	
        	$user['user_id']=$userInfo['id'];
        	$user['user_name']=$userInfo['username'];
        	$user['user_img']=$userInfo['img'];

        	// echo Session::get('user_name');
        	// exit;
        }else{
        	$user['state']=0;
        }
        return $user;        
    }
    public function regist () {
        $vcode=$_SESSION['code'];
        $fcode=$_POST['fcode'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $newVcode=strtolower(str_replace(' ','',$vcode)); 
        $newFcode=strtolower(str_replace(' ','',$fcode));
        // echo $vcode.'. '.$fcode.'.. '.$username.'... '.$password.' ....'.$newFcode.'..... '.$newVcode;
        // 
        $user=[];
        if($newFcode===$newVcode){
            $res=UserModel::get(["username"=>$username]);        
            if($res){
                $user['state']=-1;
            }else{
                $rand=rand(1,5);
                $sfile="static/uploads/{$rand}.jpg";
                $farr=explode('.',$sfile);
                $fext=array_pop($farr);
                $frand=time().mt_rand();
                //创建文件夹
                $uploaddir='static/uploads';
                // if(!file_exists($uploaddir)){
                //  mkdir($uploaddir);
                // }
                $year=date('Y');
                $month=date('m');
                $day=date('d');
                $datedir=$uploaddir.'/'.$year.'-'.$month.'-'.$day;
                if(!file_exists($datedir)){
                    mkdir($datedir);
                }
                $dfile=$datedir.'/'.$frand.'.'.$fext;
                copy($sfile,$dfile);
                $odfile='uploads/'.$year.'-'.$month.'-'.$day.'/'.$frand.'.'.$fext;
                $userRegist=new UserModel([
                    "username"=>$username,
                    "password"=>$password,
                    "img"=>$odfile
                ]);                
                if($userRegist->save()){
                    $userId=UserModel::getLastInsID();
                    Session::set('user_id',$userId);
                    Session::set('user_name',$username);
                    Session::set('user_img',$odfile);
                    $user['state']=1;           
                    $user['user_id']=$userId;
                    $user['user_name']=$username;
                    $user['user_img']=$odfile;
                }else{
                    $user['state']=0;
                }
            }                
        }else{
             $user['state']=-2;               
        }

        $_SESSION['code']=time();
        return $user;
    }
    public function loginOut () {
    	Session::delete('user_id');
    	Session::delete('user_name');
    	Session::delete('user_img');
    	echo "1";
    }
    public function articleSelect () {
    	Session::set('jum',1);
    	//模块id
    	$indexBannerId=Session::get('banner_id');
    	$keyword = $_POST['keyword'];
    	if($indexBannerId){
            $articleSelectArr=Db::query("select article.*,banner.name,user.img,user.username from article,banner,user where article.banner_id=banner.id and article.user_id=user.id and banner.id=$indexBannerId and title like '%{$keyword}%' order by article.id desc");
    	}else{
    		$articleSelectArr=Db::query("select article.*,banner.name,user.img,user.username from article,banner,user where article.banner_id=banner.id and article.user_id=user.id and title like '%{$keyword}%' order by article.id desc");
    	}
    	$this->assign('articleSelectArr',$articleSelectArr);
        include 'public/article.php';
        return view();
    }
    public function indexClass ($bannerId) {
        Session::set('jum',1);
    	if($bannerId==5){
            Session::set('banner_id',$bannerId);
    		$this->redirect('article/index');
    		exit;
    	}
    	include 'public/article.php'; 
    	Session::set('banner_id',$bannerId);
    	$articleClassArr=Db::query("select article.*,banner.name,user.img,user.username from article,banner,user where article.banner_id=banner.id and article.user_id=user.id and banner.id=$bannerId order by article.id desc");  

        $user_id = Session::get('user_id');
        if(isset($user_id)){
            foreach ($articleClassArr as $key => $value) {
                $has_goods = 0;
                if(strlen($value['has_goods_userid'])>0){
                    $usersArr = explode(",", $value['has_goods_userid'] );
                    foreach ($usersArr as $key2 => $val) {
                        if($user_id == $val){
                            $has_goods = 1;
                        }
                    }
                }
                $articleClassArr[$key]['has_goods'] = $has_goods;
            } 
        }else{
            foreach ($articleClassArr as $key => $value) {
                 $articleClassArr[$key]['has_goods'] = 0;
            }
        }   	   	
    	$this->assign('articleClassArr',$articleClassArr);
    	return view();
    }
    public function indexReadMore ($articleId) {
    	include 'public/article.php';     	    
    	Db::table("article")->where("id",$articleId)->setInc("views");	
    	$articleMoreArr=Db::query("select article.*,banner.name,user.img,user.username from article,banner,user where article.banner_id=banner.id and article.user_id=user.id and article.id=$articleId order by article.id desc");  

        $user_id = Session::get('user_id');
        if(isset($user_id)){
            foreach ($articleMoreArr as $key => $value) {
                $has_goods = 0;
                if(strlen($value['has_goods_userid'])>0){
                    $usersArr = explode(",", $value['has_goods_userid'] );
                    foreach ($usersArr as $key2 => $val) {
                        if($user_id == $val){
                            $has_goods = 1;
                        }
                    }
                }
                $articleMoreArr[$key]['has_goods'] = $has_goods;
            } 
        }else{
            foreach ($articleMoreArr as $key => $value) {
                 $articleMoreArr[$key]['has_goods'] = 0;
            }
        }          
    	$this->assign('articleMoreArr',$articleMoreArr);
    	return view();
    }
}
