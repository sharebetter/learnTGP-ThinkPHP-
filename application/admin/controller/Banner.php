<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use \app\admin\model\Banner as BannerModel;
class Banner extends Controller
{
    public function index()
    {
        $banner = BannerModel::all();
        $bannerArr=[];
        foreach ($banner as $key => $value) {
            array_push($bannerArr, $value->toArray());
        }
        $this->assign('bannerArr',$bannerArr);
        return view();
    }
    public function edit($id)
    {
        $barname=BannerModel::get($id)->toArray();
        $this->assign('barname',$barname);
        return view();
    }
    public function update()
    {
        $banner_name=$_POST['barname'];
        $banner_id=$_POST['id'];
        $banner=new BannerModel();
        $res=BannerModel::get(["name"=>$banner_name]);
        if($res){
            echo '<script>alert("该栏目已存在");history.go(-2)</script>';
        }else{
            $res=$banner->save(
                [
                  "name"=>$banner_name
                ],["id"=>$banner_id]
            );
           $this->redirect('index');            
        }
    }
    public function delete($id)
    {
        $res=BannerModel::destroy(['id'=>$id]);
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
        $barname=$_POST['barname'];
        $bar=new BannerModel([
            "name"=>$barname
        ]);
        $res=BannerModel::get(["name"=>$barname]);
        if($res){
            echo '<script>alert("该栏目已存在");history.go(-2)</script>';
        }else{
            if($bar->save()){
              $this->redirect('index');
            }
            else{
              echo '添加失败';
            }
        }
    }
}
