<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use \app\admin\model\GoodTalk as GoodTalkModel;
class GoodTalk extends Controller
{
    public function index()
    {
        $good_talk = GoodTalkModel::all();
        $good_talkArr=[];
        foreach ($good_talk as $key => $value) {
            array_push($good_talkArr, $value->toArray());
        }
        $this->assign('good_talkArr',$good_talkArr);
        return view();
    }
    public function edit($id)
    {
        $good_talk=GoodTalkModel::get($id)->toArray();
        $good_talk['content']=htmlspecialchars_decode($good_talk['content']);
        $this->assign('good_talk',$good_talk);
        return view();
    }
    public function update()
    {
       $title=$_POST['title'];
       $id=$_POST['id'];
       $content=$_POST['content'];
       $time=time();
        $good_talk=new GoodTalkModel();
        $res=$good_talk->save(
            [
              "title"=>$title,
              "content"=>$content,
              "time"=>$time
            ],["id"=>$id]
        );
        if($res){
           $this->redirect('index');            
        }else{
            echo '<script>alert("更新失败！");history.go(-2)</script>';
        }
       
    }
    public function delete($id)
    {
        $res=GoodTalkModel::destroy(['id'=>$id]);
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
        $title=$_POST['title'];
        $content=addslashes(htmlspecialchars($_POST['content']));
        $time=time();
        $good_talk=new GoodTalkModel([
            "title"=>$title,
            "content"=>$content,
            "time"=>$time
        ]);
        if($good_talk->save()){
          $this->redirect('index');
        }
        else{
          echo '添加失败';
        }
    }
}
