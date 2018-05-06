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
use \app\index\model\Article as ArticleModel;

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
    public function addGoods () {
        $good_times = $_POST['good_times'];
        $article_id = $_POST['article_id'];
        $user_id = Session::get('user_id');
        $ArticleModel =new ArticleModel();
        $articleInfo = ArticleModel::get(["id"=>$article_id]);
        if($good_times>$articleInfo['good_times']){
            if(strpos($articleInfo['has_goods_userid'],$user_id)){

            }else{
                $articleInfo['has_goods_userid']=$articleInfo['has_goods_userid'].','.$user_id;
            }            
        }else{
            $has_goods_userArr = explode(',', $articleInfo['has_goods_userid']);
            $articleInfo['has_goods_userid'] = '';
            foreach ($has_goods_userArr as $key => $value) {
                if($value != $user_id && strlen($value)>0){
                    $articleInfo['has_goods_userid']=$articleInfo['has_goods_userid'].','.$value;
                }
            }
        }
        if($good_times<0){
            $good_times = 0;
        }
        $res=$ArticleModel->save(
            [
                "good_times"=>$good_times,
                'has_goods_userid' => $articleInfo['has_goods_userid']
            ],["id"=>$article_id]
        );
        if($res){
           echo "0";
        }else{
           echo "1";
        }
    }
}
