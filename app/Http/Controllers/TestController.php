<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
//引入Session
use Session;

class TestController extends Controller
{
  //
  public function test1()
  {
    return phpinfo();
  }

  //文件上传
  public function test2(Request $request)
  {
    if ($request->method() == 'POST') {

      $this->validate($request, [
        'name' => 'required|min:2|max:30',
        'age' => 'required|min:1|max:130|integer',
        'email' => 'required|email',
        'captcha' => 'required|captcha'
      ]);
      //文件上传
      //判断文件在请求中是否存在 ,文件在上传过程中是否出错
      if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
        //获取文件初始名称
        // dd($request->file('avatar')->getClientOriginalName());
        //存储上传文件
        $name = md5(time() . rand(100000, 999999)) . '.' . $request->file('avatar')->getClientOriginalExtension();
        $request->file('avatar')->storeAs('./public/uploads', $name);

        //获取全部数据
        $data = $request->all();
        //将路径添加到数组中
        $data['avatar'] = '/storage/uploads/' . $name;
        //插入数据库
        $result = User::create($data);
        if ($result) {
          return redirect('/');
        }
      }
    } else {
      return view('test2');
    }
  }

  //ajax页面展示
  public function test3()
  {
    return view('test4');
  }
  //ajax的响应
  public function test4()
  {
    $data = User::all();
    // return json_encode($data);
    return response()->json($data);
  }

  //会话控制
  public function test5()
  {
    //存入一个变量
    session(['name' => 'pll']);
    //获取一个变量
    echo session('name');
    //获取一个变量,如果不存在返回默认值
    echo session('aa', '默认值');
    //获取全部
    dump(session()->all());
    //判断是否存在
    dump(session()->has('user_id'));
    //删除一个
    dump(session()->forget('name'));
    //删除全部
    dump(session()->flush());
  }

  //一对一
  public function test6()
  {
    $data = \App\Models\Home\Article::get();
    foreach ($data as $key => $value) {
      echo $value->id . '&emsp;' . $value->article_name . '&emsp;' . $value->author->author_name . '<br/>';
    }
  }

  //一对多
  public function test7()
  {
    $data = \App\Models\Home\Article::get();
    foreach ($data as $key => $value) {
      echo "文章名:" . $value->article_name . '&emsp;' . "该文章的评论:" . '<br/>';
      //获取评论
      foreach ($value->comment as $k => $val) {
        echo  '&emsp;' . $val->comment . "<br/>";
      }
    }
  }

  //多对多
  public function test8()
  {
    $data = \App\Models\Home\Article::get();
    foreach ($data as $key => $value) {
      echo "文章名:" . $value->article_name . '&emsp;' . "该文章的关键词:" . '<br/>';
      //获取评论
      foreach ($value->keyword as $k => $val) {
        echo  '&emsp;' . $val->keyword . "<br/>";
      }
    }
  }
}
