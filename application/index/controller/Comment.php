<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Session;
use \app\index\model\Article as ArticleModel;
use \app\index\model\User as UserModel;
use \app\index\model\Comment as CommentModel;
class Comment extends Controller
{
    public function index()
    {
    	
    }
    public function addComment () {
       $user_comment=$_POST['comment'];
       $article_id=$_POST['article_id'];  
       $user_id=Session::get('user_id');
       // echo $user_comment.'ddd'.$article_id.'ddd'.$user_id;
       $addComment=new CommentModel([            
            "user_id"=>$user_id,
            "article_id"=>$article_id,
            "user_comment"=>$user_comment
        ]);
        if($addComment->save()){         
          Db::table("article")->where("id",$article_id)->setInc("views");
          Db::table("article")->where("id",$article_id)->setInc("comment_times");
          echo "0";
        }
        else{
          echo "1";
        }
    }
}
