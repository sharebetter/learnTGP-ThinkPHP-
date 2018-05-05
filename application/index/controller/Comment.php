<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Session;
use \app\index\model\Article as ArticleModel;
use \app\index\model\User as UserModel;
use \app\index\model\Comment as CommentModel;
use \app\index\model\ReplyComment as ReplyComment;
class Comment extends Controller
{
    public function index()
    {
    	
    }
    public function addComment () {
       $user_comment=$_POST['comment'];
       $article_id=$_POST['article_id'];  
       $user_id=Session::get('user_id');
       $time=time();
       // echo $user_comment.'ddd'.$article_id.'ddd'.$user_id;
       $addComment=new CommentModel([            
            "user_id"=>$user_id,
            "article_id"=>$article_id,
            "comment_time"=>$time,
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
    public function replyComment () {
      $replyValue = $_POST['replyValue'];
      $comment_id = $_POST['commentId'];
      $user_id    = Session::get('user_id');
      $time       =  time();
      // echo $replyValue.' '.$comment_id.' '.$user_id;
      $addReply = new ReplyComment([            
            "user_id"=>$user_id,
            "comment_id"=>$comment_id,
            "reply_time"=>$time,
            "reply_content"=>$replyValue
      ]);
      if($addReply->save()){ 
       Db::table("comment")->where("id",$comment_id)->setInc("reply_times");                 
        echo "0";
      }
      else{
        echo "1";
      }
    }
}
