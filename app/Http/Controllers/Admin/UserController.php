<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserController extends Controller
{
  public function Test()
  {
    return phpinfo();
  }

  //添加数据
  public function insert()
  {
    return DB::table('user')->insert([
      'name' => '小红',
      'age' => 12,
      'email' => 'xiaohong@123.com'
    ]);
  }

  //修改数据
  public function update()
  {
    return DB::table('user')->where('id', '1')->update([
      'name' => '小刚'
    ]);
  }

  //查询数据
  public function select()
  {
    $user = DB::table('user')->get();
    // dd($user);
    return view('index', compact('user'));
  }
  public function selectID()
  {
    $name = DB::table('user')->where('id', '1')->value('name');
    dd($name);
  }

  //删除数据
  public function delete()
  {
    return DB::table('user')->where('id', '2')->delete();
  }

  //调用模型
  public function insertm()
  {
    $model = new  User();
    $list = $model->Test();
    if ($list > 0) {
      return view('index', compact('list'));
    } else {
      echo '返回失败';
    }
  }

  public function selectm()
  {
    $model = new  User();
    $list = $model->Test1();
    // dd($list);
    // foreach ($list as $val) {
    //   echo $val;
    // }
    return view('index', compact('list'));
  }

  public function updatem()
  {
    $model = new  User();
    $int = $model->Test2();
    return $int;
  }

  public function deletem()
  {
    $model = new  User();
    $int = $model->Test3();
    return $int;
  }

  //create方法添加
  public function Test7(Request $request)
  {
    return view('index2');
  }
  public function create(Request $request)
  {
    $model = new User();
    $result = $model->create($request->all());
    dd($request);
  }

  //分页
  public function fenye()
  {
    //调用模型定义的方法
    // $model = new  User();
    // $list = $model->fenye();
    //直接使用paginate方法
    $list = User::paginate(5);
    return view('index', compact('list'));
  }

  public function Test1()
  {
    return view('index1');
  }

  public function Test2(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:2|max:30',
      'age' => 'required|min:1|max:130|integer',
      'email' => 'required|email',
    ]);
    return view('index1');
  }

  public function Test3()
  {
    $data = collect(['1' => 'a', '2' => 'b', '3' => ['c', 'd', 'e']]);

    return $data->get('3');
  }

  public function Test4()
  {
    $data = asset('img/abc.jpg');
    dd($data);
  }

  public function jicheng()
  {
    return view('son1');
  }
}
