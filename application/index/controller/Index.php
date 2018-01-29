<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use \app\index\model\Article as ArticleModel;
use \app\index\model\Banner as BannerModel;
use \app\index\model\GoodTalk as GoodTalkModel;
use \app\index\model\DailyTalk as DailyTalkModel;
use \app\index\model\Notice as NoticeModel;
class Index extends Controller
{
    public function index()
    {
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

        return view();   
    }
}
