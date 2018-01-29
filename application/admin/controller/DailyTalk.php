<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use \app\admin\model\DailyTalk as DailyTalkModel;
class DailyTalk extends Controller
{
    public function index()
    {
        $daily_talk = DailyTalkModel::all();
        $daily_talkArr=[];
        foreach ($daily_talk as $key => $value) {
            array_push($daily_talkArr, $value->toArray());
        }
        $this->assign('daily_talkArr',$daily_talkArr);
        return view();
    }
    public function edit($id)
    {
        $daily_talk=DailyTalkModel::get($id)->toArray();
        $this->assign('daily_talk',$daily_talk);
        return view();
    }
    public function update()
    {
        $id=$_POST['id'];
        $content=$_POST['content'];
        $time=time();
        $daily_talk=new DailyTalkModel();
        $res=$daily_talk->save(
            [
             "content"=>$content,
             "time"=>$time
            ],["id"=>$id]
        );
       if($res){
            // dump($user);
           $this->redirect('index');
        }else{
            echo '<script>alert("更新失败！");history.go(-2)</script>';
        }
    }
    public function delete($id)
    {
        $res=DailyTalkModel::destroy(['id'=>$id]);
        if($res){
            // dump($user);
           $this->redirect('index');
        }
    }
    public function add()
    {
        return view();
    }
     public function insert()
    {
        $content=$_POST['content'];
        $time=time();
        $daily_talk=new DailyTalkModel([
            "content"=>$content,
            "time"=>$time
        ]);
        if($daily_talk->save()){
          $this->redirect('index');
        }
        else{
          echo '添加失败';
        }
    }
}
