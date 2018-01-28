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
        $barname=ArticleModel::get($id)->toArray();
        $this->assign('barname',$barname);
        return view();
    }
    public function update()
    {
        $article_name=$_POST['barname'];
        $article_id=$_POST['id'];
        $article=new ArticleModel();
        $res=ArticleModel::get(["name"=>$article_name]);
        if($res){
            echo '<script>alert("该栏目已存在");history.go(-2)</script>';
        }else{
            $res=$article->save(
                [
                  "name"=>$article_name
                ],["id"=>$article_id]
            );
           $this->redirect('index');            
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
