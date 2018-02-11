<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use \app\admin\model\Article as ArticleModel;
use \app\admin\model\ArticleCheck as ArticleCheckModel;
use \app\admin\model\Banner as BannerModel;
class ArticleCheck extends Controller
{
    public function index()
    {
        $articleCheckArr=Db::view('article_check',"*")
            ->view('banner','name','article_check.banner_id=banner.id')
            ->view('user','username','article_check.user_id=user.id')
            ->select();
            // dump($articleCheckArr);
        $this->assign('articleCheckArr',$articleCheckArr);
        return view();
    }
    public function edit($id)
    {
        $banner = BannerModel::all(function($query){
                $query->where("id","<",5)
                   ->whereOr("id",">",5)
                ;
            });
        $bannerArr=[];
        foreach ($banner as $key => $value) {
            array_push($bannerArr, $value->toArray());
        }
        $this->assign('bannerArr',$bannerArr);
        $article_check=Db::view('article_check',"*")
            ->view('banner','name','article_check.banner_id=banner.id')
            ->where('article_check.id','=',$id)
            ->select();
        $article_check[0]['content']=htmlspecialchars_decode($article_check[0]['content']);
        $this->assign('article_check',$article_check[0]);
        return view();
    }
    public function unpass($id)
    {
        $res=ArticleCheckModel::destroy(['id'=>$id]);
        if($res){
           $this->redirect('index');
        }
    }
    public function pass()
    {
        $title=$_POST['title'];
        $user_id=$_POST['user_id'];
        $content=addslashes(htmlspecialchars($_POST['content']));
        $banner_id=$_POST['banner_id'];
        $time=time();
        $art=new ArticleModel([
            "title"=>$title,
            "content"=>$content,
            "banner_id"=>$banner_id,
            "user_id"=>$user_id,
            "time"=>$time
        ]);
        if($art->save()){
          $id=$_POST['id'];
          $res=ArticleCheckModel::destroy(['id'=>$id]);            
          $this->redirect('index');
        }
        else{
          echo '<script>alert("文章添加失败");</script>';
          echo '<script>location="index"</script>';
        }
    }
}
