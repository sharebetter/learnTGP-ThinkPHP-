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
    	//获取栏目标题
        $banner = BannerModel::all();
        $bannerArr=[];
        foreach ($banner as $key => $value) {
            array_push($bannerArr, $value->toArray());
        }
        $this->assign('bannerArr',$bannerArr);
        
        // 获取今日良言
        $good_talk =GoodTalkModel::select(function($query){
            $query-> limit(1)
                ->order('id','desc');
        });
        $good_talkArr=[];
        foreach ($good_talk as $key => $value) {
            array_push($good_talkArr, $value->toArray());
        }
        $this->assign('good_talk',$good_talkArr[0]);
        // dump($good_talkArr);
        
        // 网站公告
        $notices = NoticeModel::all(function($query){
            $query-> limit(5)
                ->order('id','desc');
        });
        $noticeArr=[];
        foreach ($notices as $key => $value) {
            array_push($noticeArr, $value->toArray());
        }
        $this->assign('noticeArr',$noticeArr);
        
        //每日一句
        $daily_talk = DailyTalkModel::all(function($query){
            $query-> limit(1)
                ->order('id','desc');
        });
        $daily_talkArr=[];
        foreach ($daily_talk as $key => $value) {
            array_push($daily_talkArr, $value->toArray());
        }
        $this->assign('daily_talkArr',$daily_talkArr[0]);
        //文章和文章发布人信息
        $articleArr=Db::view('article',"*")
            ->view('banner','name','article.banner_id=banner.id')
            ->view('user','img,username','user.id=article.user_id')
            ->order('id','DESC')
            ->select();

        $this->assign('articleArr',$articleArr);
        // dump ($articleArr);
        // exit;

        $this->assign('articleArr',$articleArr);
        //用户评论
        $commentArr=Db::view('comment',"*")
            ->view('article','time','article.id=comment.article_id')
            ->view('user','username','user.id=comment.user_id')
            ->select();
        // dump ($commentArr);
        // exit;
        $this->assign('commentArr',$commentArr);

        // 热门文章
        $hotArticleArr=Db::view('article',"*")
            ->view('banner','name','article.banner_id=banner.id')
            ->view('user','img,username','user.id=article.user_id')
            ->order('views','DESC')
            ->order('comment_times','DESC')
            ->limit(5)
            ->select();
        $this->assign('hotArticleArr',$hotArticleArr);
        // dump($hotArticleArr);
        // exit;
        return view();   
    }
    public function check () {
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
}
