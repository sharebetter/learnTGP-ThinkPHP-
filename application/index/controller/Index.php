<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use \app\index\model\User;
class Index extends Controller
{
    public function index()
    {
        // $data = Db::table('user')->select();
        // $this->assign('data',$data);
        // return view();
     

        // $user = new \app\index\model\User;
        // dump($user::get(10)->toArray());
         
        $user = new User;
        dump($user::get(10)->toArray());

        $user = new User();
        dump($user::get(10)->toArray());

        $res = User::all("10,71,86,87");
        foreach ($res as $key => $value) {
        	dump($value->toArray());
        }

        $res = User::all(["username"=>"曾海明"]);
        foreach ($res as $key => $value) {
        	dump($value->toArray());
        }
    }
}
