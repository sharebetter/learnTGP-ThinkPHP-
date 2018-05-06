<?php
use think\Db;
use think\Controller;
use think\Session;
use \app\index\model\Article as ArticleModel;
use \app\index\model\Banner as BannerModel;
use \app\index\model\GoodTalk as GoodTalkModel;
use \app\index\model\DailyTalk as DailyTalkModel;
use \app\index\model\Notice as NoticeModel;
use \app\index\model\User as UserModel;

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
    
        //用户评论
        $commentArr=Db::view('comment',"*")
            ->view('article','time','article.id=comment.article_id')
            ->view('user','username,img','user.id=comment.user_id')
            ->select();
        // dump ($commentArr);
        // exit;
        $this->assign('commentArr',$commentArr);
        
        // 用户回复
        $replyArr=Db::view('comment',"*")
            ->view('reply_comment','*','reply_comment.comment_id=comment.id')
            ->view('user','username','user.id=comment.user_id')
            ->order('reply_comment.id','DESC')
            ->select();
        // dump($replyArr);
        // exit;
        $this->assign('replyArr',$replyArr);
        
        // 热门文章
        $hotArticleArr=Db::view('article',"*")
            ->view('banner','name','article.banner_id=banner.id')
            ->view('user','img,username','user.id=article.user_id')
            ->order('views','DESC')
            ->order('comment_times','DESC')
            ->limit(5)
            ->select();
        $user_id = Session::get('user_id');
        if(isset($user_id)){
            foreach ($hotArticleArr as $key => $value) {
                $has_goods = 0;
                if(strlen($value['has_goods_userid'])>0){
                    $usersArr = explode(",", $value['has_goods_userid'] );
                    foreach ($usersArr as $key2 => $val) {
                        if($user_id == $val){
                            $has_goods = 1;
                        }
                    }
                }
                $hotArticleArr[$key]['has_goods'] = $has_goods;
            } 
        }else{
            foreach ($hotArticleArr as $key => $value) {
                 $hotArticleArr[$key]['has_goods'] = 0;
            }
        }
        $this->assign('hotArticleArr',$hotArticleArr);
        // dump($hotArticleArr);
        // exit;
?>