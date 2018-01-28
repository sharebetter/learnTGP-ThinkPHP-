<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use \app\admin\model\Notice as NoticeModel;
class Notice extends Controller
{
    public function index()
    {
        $notices = NoticeModel::all();
        $noticeArr=[];
        foreach ($notices as $key => $value) {
            array_push($noticeArr, $value->toArray());
        }
        $this->assign('noticeArr',$noticeArr);
        return view();
    }
    public function edit($id)
    {
        $notice=NoticeModel::get($id)->toArray();
        $this->assign('notice',$notice);
        return view();
    }
    public function update()
    {
        $content=addslashes(htmlspecialchars($_POST['content']));
        $notice_id=$_POST['id'];
        $time=time();
        $notice=new NoticeModel();
        $res=$notice->save(
            [
              "content"=>$content,
              "time"=>$time
            ],["id"=>$notice_id]
        );
       $this->redirect('index');
    }
    public function delete($id)
    {
        $res=NoticeModel::destroy(['id'=>$id]);
        if($res){
           $this->redirect('index');
        }
    }
    public function add()
    {
        return view();
    }
     public function insert()
    {
        $content=addslashes(htmlspecialchars($_POST['content']));
        $time=time();
        $notice=new NoticeModel([
            "content"=>$content,
            "time"=>$time
        ]);
        if($notice->save()){
          $this->redirect('index');
        }
        else{
          echo '添加失败';
        }
    }
}
