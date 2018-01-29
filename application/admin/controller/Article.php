<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use \app\admin\model\Article as ArticleModel;
use \app\admin\model\Banner as BannerModel;
class Article extends Controller
{
    public function index()
    {
        $articleArr=Db::view('article',"id,title")
            ->view('banner','name','article.banner_id=banner.id')
            ->order('id','DESC')
            ->select();
        $this->assign('articleArr',$articleArr);
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
        // dump($bannerArr);
        // exit();
        $this->assign('bannerArr',$bannerArr);

        $article=Db::view('article',"*")
            ->view('banner','name','article.banner_id=banner.id')
            ->where('article.id','=',$id)
            ->select();
        $article[0]['content']=htmlspecialchars_decode($article[0]['content']);
        $this->assign('article',$article[0]);
        return view();
    }
    public function update()
    {
        $title=$_POST['title'];
        $article_id=$_POST['id'];
        $banner_id=$_POST['banner_id'];
        $content=addslashes(htmlspecialchars($_POST['content']));
        $time=time();
        $article=new ArticleModel();
        $res=$article->save(
                [
                  "title"=>$title,
                  "time"=>$time,
                  "banner_id"=>$banner_id,
                  "content"=>$content
                ],["id"=>$article_id]
            );
        if($res){
            $this->redirect('index');
        }else{
            echo "<script>alert('文章修改失败！')</script>";
        }
    }
    public function delete($id)
    {
        $res=ArticleModel::destroy(['id'=>$id]);
        if($res){
            // dump($user);
           $this->redirect('index');
        }
    }
    public function add()
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
        return view();
    }
     public function insert()
    {
        $title=$_POST['title'];
        $content=addslashes(htmlspecialchars($_POST['content']));
        $banner_id=$_POST['banner_id'];
        $time=time();
        $art=new ArticleModel([
            "title"=>$title,
            "content"=>$content,
            "banner_id"=>$banner_id,
            "time"=>$time
        ]);
        if($art->save()){
          $this->redirect('index');
        }
        else{
          echo '<script>alert("文章添加失败");</script>';
          $this->redirect('index');
        }
    }
}
