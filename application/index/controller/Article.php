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
        $UserModel =new UserModel();
        $userInfo = UserModel::get(["id"=>$user_id]);
        $articleInfo = ArticleModel::get(["id"=>$article_id]);
        if($good_times>$articleInfo['good_times']){
            if(strpos($articleInfo['has_goods_userid'],$user_id)){

            }else{
                $articleInfo['has_goods_userid']=$articleInfo['has_goods_userid'].','.$user_id;
            }
            if(strpos($userInfo['article_collection'],$article_id)){

            }else{
                $userInfo['article_collection']=$userInfo['article_collection'].','.$article_id;
            }
        }else{
            $has_goods_userArr = explode(',', $articleInfo['has_goods_userid']);
            $has_collection_article = explode(',', $userInfo['article_collection']);
            $articleInfo['has_goods_userid'] = '';
            $userInfo['article_collection'] = '';
            $good_times = 0;
            foreach ($has_goods_userArr as $key => $value) {
                if($value != $user_id && strlen($value)>0){
                    $articleInfo['has_goods_userid']=$articleInfo['has_goods_userid'].','.$value;
                    $good_times++;
                }
            }
            foreach ($has_collection_article as $key => $val) {
                if($val != $article_id && strlen($val)>0){
                    $userInfo['article_collection']=$userInfo['article_collection'].','.$val;
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
        $res2=$UserModel->save(
            [
                'article_collection' => $userInfo['article_collection']
            ],["id"=>$user_id]
        );
        if($res){
           echo "0";
        }else{
           echo "1";
        }
    }
}
