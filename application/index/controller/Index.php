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
class Index extends Controller
{
    public function index()
    {    	
        include 'public/article.php'; 
        //文章和文章发布人信息        
       $articleArr=Db::view('article',"*")
        ->view('banner','name','article.banner_id=banner.id')
        ->view('user','img,username','user.id=article.user_id')
        ->order('id','DESC')
        ->select();                
        $this->assign('articleArr',$articleArr);
        return view();   
    }
    public function check () {
    	Session::set('jum',1);
    	$name=$_POST['username'];
        $psw=md5($_POST['password']);
        $res=UserModel::get(["username"=>$name,"password"=>$psw]);
        // echo $userInfo['username'];
        // exit;
        if($res){
        	$userInfo=$res->getData();
        	Session::set('user_id',$userInfo['id']);
        	Session::set('user_name',$userInfo['username']);
        	Session::set('user_img',$userInfo['img']);
        	$user=[];
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
    public function loginOut () {
    	Session::delete('user_id');
    	Session::delete('user_name');
    	Session::delete('user_img');
    	echo "1";
    }
    public function articleSelect () {
    	Session::set('jum',1);    	
    	$keyword = $_POST['keyword'];
    	$articleSelectArr=Db::query("select article.*,banner.name,user.img,user.username from article,banner,user where article.banner_id=banner.id and article.user_id=user.id and title like '%{$keyword}%' order by article.id desc");     	   	

    	$this->assign('articleSelectArr',$articleSelectArr);
        include 'public/article.php';
        return view();
    }
}
