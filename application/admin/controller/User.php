<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use \app\admin\model\User as UserModel;
class User extends Controller
{
    public function index()
    {
        $user = UserModel::all();
        $userArr=[];
        foreach ($user as $key => $value) {
            array_push($userArr, $value->toArray());
        }
        $this->assign('userArr',$userArr);
        return view();
        // dump($userArr);
    }
    public function edit($id)
    {
        $user=UserModel::get($id)->toArray();
        $this->assign('user',$user);
        return view();
    }
    public function update()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $userId=$_POST['id'];
        $user=new UserModel();
        if($password=='***'){
            $res=$user->save(
                [
                    "username"=>$username
                ],["id"=>$userId]
            );
        }else{
            $res=$user->save(
                [
                    "username"=>$username,
                    "password"=>md5($password)
                ],["id"=>$userId]
            );
        }
         $this->redirect('index');
    }
    public function delete($id)
    {
        $user=UserModel::destroy(['id'=>$id]);
        if($user){
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
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $res=UserModel::get(["username"=>$username]);
        if($res){
            echo '<h3>该用户名已被注册</h3>';
        }else{
            $user=new UserModel([
                "username"=>$username,
                "password"=>$password
            ]);
            if($user->save()){
              $this->redirect('index');
            }
            else{
              echo '添加失败';
            }
        }
    }
}
