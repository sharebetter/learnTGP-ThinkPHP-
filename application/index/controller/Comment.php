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
    	
    }
    public function addComment () {
    	$content=$_POST['conten'];
       $topic_id=$_POST['topic_id'];  
       $userid=$_SESSION['user_id'];
    }
    public function loginOut () {
    
    }
}
