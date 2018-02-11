<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Session;
use \app\index\model\ArticleCheck as ArticleCheckModel;
use \app\index\model\Banner as BannerModel;
use \app\index\model\GoodTalk as GoodTalkModel;
use \app\index\model\DailyTalk as DailyTalkModel;
use \app\index\model\Notice as NoticeModel;
use \app\index\model\User as UserModel;

class Article extends Controller
{
    public function index()
    {    
       include 'public/article.php';	
       return view();
    }
    
    public function addArticle () {
    	$title=$_POST['title'];
        $content=addslashes(htmlspecialchars($_POST['content']));
        $banner_id=$_POST['banner_id'];
        $time=time();
        $art=new ArticleCheckModel([
            "title"=>$title,
            "content"=>$content,
            "banner_id"=>$banner_id,
            "time"=>$time,
            "user_id"=>Session::get('user_id')
        ]);
        if($art->save()){
          echo "<script>alert('发布成功！请耐心等待管理员审核')</script>";      
          echo '<script>location="index"</script>';
        }
    }
}
