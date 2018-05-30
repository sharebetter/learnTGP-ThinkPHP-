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
use \app\index\model\Message as MessageModel;
class UserInfo extends Controller
{
    public function index()
    {
        include 'public/article.php';
        $userId = Session::get('user_id');
        $userInfo=UserModel::get($userId)->getData();
        $this->assign('userInfo',$userInfo);
        $collectionArr = explode(",", $userInfo['article_collection']);
        $followingArr = explode(",", $userInfo['following'] );
        $followingInfoArr =[];
        if(strlen($userInfo['following'])>0){
            foreach ($followingArr as $key => $val) {
                if(strlen($val)>0){
                   $followingInfoArr[$key] = UserModel::get($val)->getData();
                }
             }
        }
        $collectionInfoArr =[];
        if(strlen($userInfo['article_collection'])>0){
            // dump($collectionArr);
            foreach ($collectionArr as $key => $val) {
                if(strlen($val)>0){
                    $getCollectionInfo = Db::view('article','*')
                    ->view('banner','name','article.banner_id=banner.id')
                    ->view('user','img,username','user.id=article.user_id')
                    ->where('article.id',$val)
                    ->order('id','DESC')
                    ->select();
                    if(sizeof($getCollectionInfo)>0){
                        $collectionInfoArr[$key] = $getCollectionInfo[0];
                        $collectionInfoArr[$key]['has_goods'] = 1;
                    }
                }
             }
        }
        $this->assign('collectionInfoArr',$collectionInfoArr);
        $this->assign('followingInfoArr',$followingInfoArr);

        $myArticleInfoArr=Db::view('article','*')
        ->view('banner','name','article.banner_id=banner.id')
        ->view('user','img,username','user.id=article.user_id')
        ->where('article.user_id',$userId)
        ->order('id','DESC')
        ->select();
        $user_id = Session::get('user_id');
        if(isset($user_id)){
            foreach ($myArticleInfoArr as $key => $value) {
                $has_goods = 0;
                if(strlen($value['has_goods_userid'])>0){
                    $usersArr = explode(",", $value['has_goods_userid'] );
                    foreach ($usersArr as $key2 => $val) {
                        if($user_id == $val){
                            $has_goods = 1;
                        }
                    }
                }
                $myArticleInfoArr[$key]['has_goods'] = $has_goods;
            }
        }else{
            foreach ($myArticleInfoArr as $key => $value) {
                 $myArticleInfoArr[$key]['has_goods'] = 0;
            }
        }
        $this->assign('myArticleInfoArr',$myArticleInfoArr);

        // message
        $messageInfo =Db::view('message','*')
        ->view('user','img,username','user.id=message.send_userid')
        ->where('message.receive_userid',$userId)
        ->order('id','DESC')
        ->select();
        // dump($messageInfo);
        // exit;
        $this->assign('messageList',$messageInfo);

        return view();
    }
    public function setHasRead () {
        $messageId = $_POST['messageId'];
        $MessageModel =new MessageModel();
        $res=$MessageModel->save(
            [
                'is_read' => 1
            ],["id"=>$messageId]
        );
        if($res){
            echo "0";
        }else{
            echo "1";
        }
    }
    public function otherInfo($otherUserid){
        include 'public/article.php';
        $userId = $otherUserid;
        $user_id = Session::get('user_id');
        if($user_id == $userId){
            $this->redirect('index');
        }
        $userInfo=UserModel::get($userId)->getData();
        $this->assign('userInfo',$userInfo);
        $collectionArr = explode(",", $userInfo['article_collection']);
        $followingArr = explode(",", $userInfo['following'] );
        $followingInfoArr =[];
        $collectionInfoArr =[];
        foreach ($followingArr as $key => $val) {
            if(strlen($val)>0){
               $followingInfoArr[$key] = UserModel::get($val)->getData();
            }
         }
        foreach ($collectionArr as $key => $val) {
            if(strlen($val)>0){
                $getCollectionInfo = Db::view('article','*')
                ->view('banner','name','article.banner_id=banner.id')
                ->view('user','img,username','user.id=article.user_id')
                ->where('article.id',$val)
                ->order('id','DESC')
                ->select();
                $collectionInfoArr[$key] = $getCollectionInfo[0];
            }
        }
        foreach ($collectionInfoArr as $key => $value) {
            $has_goods = 0;
            if(strlen($value['has_goods_userid'])>0){
                $usersArr = explode(",", $value['has_goods_userid'] );
                foreach ($usersArr as $key2 => $val) {
                    if($user_id == $val){
                        $has_goods = 1;
                    }
                }
            }
            $collectionInfoArr[$key]['has_goods'] = $has_goods;
        }

        $this->assign('collectionInfoArr',$collectionInfoArr);
        $this->assign('followingInfoArr',$followingInfoArr);
        // 判断是否关注过
        $myInfo=UserModel::get(Session::get('user_id'))->getData();
        $myFlollowingArr =  explode(",", $myInfo['following'] );
        $myFlollowingFlag = 0;
        if(in_array($otherUserid,$myFlollowingArr)){
            $myFlollowingFlag = 1;
        }
        $this->assign('myFlollowingFlag',$myFlollowingFlag);

        $otherArticleInfoArr=Db::view('article','*')
        ->view('banner','name','article.banner_id=banner.id')
        ->view('user','img,username','user.id=article.user_id')
        ->where('article.user_id',$userId)
        ->order('id','DESC')
        ->select();
        if(isset($user_id)){
            foreach ($otherArticleInfoArr as $key => $value) {
                $has_goods = 0;
                if(strlen($value['has_goods_userid'])>0){
                    $usersArr = explode(",", $value['has_goods_userid'] );
                    foreach ($usersArr as $key2 => $val) {
                        if($user_id == $val){
                            $has_goods = 1;
                        }
                    }
                }
                $otherArticleInfoArr[$key]['has_goods'] = $has_goods;
            }
        }else{
            foreach ($otherArticleInfoArr as $key => $value) {
                 $otherArticleInfoArr[$key]['has_goods'] = 0;
            }
        }
        $this->assign('otherArticleInfoArr',$otherArticleInfoArr);
        return view();
    }
    public function addFollowing () {
        $focusUserId = $_POST['focusUserId'];
        $followingFlag = $_POST['followingFlag'];
        // echo $focusUserId.' '.$followingFlag;
        $user_id = Session::get('user_id');
        $UserModel =new UserModel();
        $userInfo = UserModel::get(["id"=>$user_id]);
        if($followingFlag){
            if(strpos($userInfo['following'],$focusUserId)){

            }else{
                $userInfo['following']=$userInfo['following'].','.$focusUserId;
            }
        }else{
            $followingUserArr = explode(',', $userInfo['following']);
            $userInfo['following'] = '';
            foreach ($followingUserArr as $key => $value) {
                if($value != $focusUserId && strlen($value)>0){
                    $userInfo['following']=$userInfo['following'].','.$value;
                }
            }
        }

        $res=$UserModel->save(
            [
                'following' => $userInfo['following']
            ],["id"=>$user_id]
        );
        if($res){
           echo "0";
        }else{
           echo "1";
        }
    }
    public function sendMessage () {
        $messageContent = $_POST['messageContent'];
        $messageToUserId = $_POST['messageToUserId'];
        $user_id = Session::get('user_id');
        $time=time();
        $messageModel=new MessageModel([
            "message_content"=>$messageContent,
            "send_userid"=>$user_id,
            "message_sendtime"=>$time,
            "receive_userid"=>$messageToUserId
        ]);
        if($messageModel->save()){
          echo "0";
        }else{
          echo "1";
        }
    }
    public function articleSelect () {
        Session::set('jum',1);
        //模块id
        $indexBannerId=Session::get('banner_id');
        $keyword = $_POST['keyword'];
        if($indexBannerId){
            $articleSelectArr=Db::query("select article.*,banner.name,user.img,user.username from article,banner,user where article.banner_id=banner.id and article.user_id=user.id and banner.id=$indexBannerId and title like '%{$keyword}%' order by article.id desc");
        }else{
            $articleSelectArr=Db::query("select article.*,banner.name,user.img,user.username from article,banner,user where article.banner_id=banner.id and article.user_id=user.id and title like '%{$keyword}%' order by article.id desc");
        }
        $this->assign('articleSelectArr',$articleSelectArr);
        include 'public/article.php';
        return view('./index/articleSelect');
    }
    public function update(){
        $user=new UserModel();
        //图片上传;
        if($_FILES['img']['tmp_name']){
            $sfile=$_FILES['img']['tmp_name'];
            $uploaddir='uploads';
            if(!file_exists($uploaddir)){
                mkdir($uploaddir);
            }
            $filesize=$_FILES['img']['size'];

            //创建上传日期目录
            $year=date('Y');
            $month=date('m');
            $day=date('d');
            $datedir='static/'.$uploaddir.'/'.$year.'-'.$month.'-'.$day;
            if(!file_exists($datedir)){
                mkdir($datedir);
            }

            // 获取文件后缀
            $farr=explode('.',$_FILES['img']['name']);
            $fext=array_pop($farr);

            //加工文件名
            $frand=time().mt_rand();

            //最终上传路径和文件名
            $dfile=$datedir.'/'.$frand.'.'.$fext;
            $ufile=$uploaddir.'/'.$year.'-'.$month.'-'.$day.'/'.$frand.'.'.$fext;
            move_uploaded_file($sfile,$dfile);
         }
          $userId=Session::get('user_id');
          $username = $_POST['username'];
          $password = $_POST['password'];
          $change=false;
          if($password!="######"){
            $password = $_POST['password'];
            $change=true;
          }
          $oldimg='static/'.Session::get('user_img');
          if(!isset($dfile)){
             if($change){
                $res=$user->save(
                    [
                        "username"=>$username,
                        "password"=>md5($password)
                    ],["id"=>$userId]
                );
             }else{
                $res=$user->save(
                    [
                        "username"=>$username
                    ],["id"=>$userId]
                );
             }
          }else{
            if($change){
                $res=$user->save(
                    [
                        "username"=>$username,
                        "img"=>$ufile,
                        "password"=>md5($password)
                    ],["id"=>$userId]
                );
            }else{
               $res=$user->save(
                    [
                        "username"=>$username,
                        "img"=>$ufile
                    ],["id"=>$userId]
                );
            }
             Session::set('user_img',$ufile);
             unlink($oldimg);
          }
        if($res){
            Session::set('user_name',$username);
            echo "<script>alert('修改成功！')</script>";
        }else{
            echo "<script>alert('修改失败！')</script>";
        }
        echo '<script>location="index"</script>';
    }
    public function articleEdit ($articleId) {
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
            ->where('article.id','=',$articleId)
            ->select();
        $article[0]['content']=htmlspecialchars_decode($article[0]['content']);
        $this->assign('article',$article[0]);
        return view();
    }
    public function updateArticle()
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
}
