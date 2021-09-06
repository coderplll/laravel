<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', function () {
  echo '访问地址为/home';
});

Route::any('/test1', function () {
  echo '访问地址为/test1';
});

Route::match(['get', 'post'], '/test2', function () {
  echo '访问地址为/test2';
});

// 必选参数
Route::any('/test3/{id}', function ($id) {
  echo '当前用户id是' . $id;
});

//可选
Route::get('/test4/{name?}', function ($name = '小米') {
  return $name;
});

//?来传参数
Route::get('/test5', function () {
  echo '当前用户id是' . $_GET['id'];
});

//路由前缀
Route::prefix('admin')->group(function () {
  Route::get('users', function () {
    // Matches The "/admin/users" URL
  });

  Route::get('test', function () {
    // Matches The "/admin/test" URL
  });
});

//引用控制器
use App\Http\Controllers\TestController;
// 定义一个指向控制器行为的路由：
Route::get('home/test/test1', [TestController::class, 'test1']);



Route::prefix('admin')->group(function () {
  Route::get('index/index', [App\Http\Controllers\Admin\IndexController::class, 'index']);
});
Route::prefix('home')->group(function () {
  Route::get('index/index', [App\Http\Controllers\Home\IndexController::class, 'index']);
});


use App\Http\Controllers\Admin\UserController;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cookie\Factory as CookieFactory;

Route::get('admin/insert', [UserController::class, 'insert']);
Route::get('admin/update', [UserController::class, 'update']);
Route::get('admin/select', [UserController::class, 'select']);
Route::get('admin/selectID', [UserController::class, 'selectID']);
Route::get('admin/delete', [UserController::class, 'delete']);
Route::get('admin/jicheng', [UserController::class, 'jicheng']);


//数组传值
Route::get('shitu/{title?}', function ($title = '我是标题') {
  return view('index', ['title' => $title]);
});

//with传值
Route::get('with/{title?}', function ($title = '我是标题') {
  return view('index')->with('title', $title);
});

//compact传值
Route::get('compact/{title?}/{name?}', function ($title = '我是标题', $name = '我是名字') {
  return view('index', compact('title', 'name'));
});


// Route::get('test2', function () {
//   if (view::exists('index')) {
//     echo '视图存在';
//   } else {
//     echo '视图不存在';
//   }
// });

//函数案例
Route::get('hanshu', function () {
  $time = strtotime(now());
  return View('index', compact('time'));
});

//model实例
Route::get('insertm', [UserController::class, 'insertm']);
Route::get('selectm', [UserController::class, 'selectm']);
Route::get('updatem', [UserController::class, 'updatem']);
Route::get('deletem', [UserController::class, 'deletem']);

Route::get('Test7', [UserController::class, 'Test7']);
Route::post('create', [UserController::class, 'create']);

//分页
Route::get('fenye', [UserController::class, 'fenye']);

//csrf攻击
Route::any('Test1', [UserController::class, 'Test1']);

//表单验证
Route::any('Test2', [UserController::class, 'Test2']);

//集合
Route::get('jihe', [UserController::class, 'Test3']);

//辅助函数
Route::get('help_function', [UserController::class, 'Test4']);

interface Food
{
  public function weight();
}

class Apple implements Food
{
  public function __construct($weight)
  {
    return $this->weight = $weight;
  }

  public function weight()
  {
    return $this->weight();
  }
}

//简单绑定
app()->bind('weight', function () {
  return new Apple('100');
});

Route::get('rongqi', function () {
  dd(resolve('weight'));
});

//绑定接口实现类
// app()->bind('Food', 'Apple');

// app()->when('Apple')->needs('$weight')->give('99');

// Route::get('rongqi', function () {
//   dd(app('Food'));
// });

//服务器提供者
Route::get('provider', function () {
  dd(app('Food'));
});

//facades
use Illuminate\Support\Facades\Cache;

Route::get('facades', function () {
  //设置缓存
  Cache(['name' => 'Test'], 600);
  Cache::put('name', 'Test1', 600);
  Cache(['name' => 'Test2'], 600);
  Cache::add('name', 'Test3', 600);
  Cache::add('count', '0', 600);
  Cache::forever('name', 'Test4');

  //获取
  echo Cache::get('name');
  echo Cache::get('name1', '默认值');
  echo Cache::get('time', function () {
    return date('Y-m-d H:i:s', time());
  });
  echo resolve('cache.store')->get('name');
  echo Cache('name');
  dump(Cache::has('name'));

  //删除
  // echo Cache::pull('name');
  // Cache::forget('name');
  Cache::flush();

  //计数器
  // Cache::increment('count');
  // Cache::increment('count', 5);
  // Cache::decrement('count');
  // Cache::decrement('count', 5);

  //获取并设置
  $time = Cache::remember('time', 600, function () {
    return date('Y-m-d H:i:s', time());
  });
  dump($time);

  $name = Cache::rememberForever('name1', function () {
    return 'Test5';
  });
  dump($name);
});

//Contracts
Route::get('contracts', function (\Illuminate\Contracts\Cache\Factory $cache) {
  $cache->put(['Test' => 'name'], 1000);
  return $cache->get('Test');
});

//Listeners
Route::get('listeners', function () {
  $user = \App\Models\User::find(1);
  event(new \App\Events\RegisterMessage($user));
});

use App\Jobs\TestPodcate;
use Illuminate\Support\Facades\Hash;

//job
Route::get('job', function () {
  TestPodcate::dispatch('success')->onQueue('Test');
  return 1;
});

//http
use Illuminate\Support\Facades\Http;

Route::get('http', function () {
  $res = Http::timeout(3)->get('http://www.123.com/pll/123');
  if ($res->successful()) {
    return $res->json();
  } elseif ($res->failed()) {
    return 'false';
  }
  return $res;
});

Route::get('pll/{test}', function ($test) {
  sleep(2);
  return $test;
});

//序列化
Route::get('xuliehua', function () {
  $data = \App\Models\User::with('')->first();
  return $data->toArray();
  //编码
  return $data->toJson(JSON_UNESCAPED_UNICODE);
});

//hash
Route::get('hash', function () {
  $data = \App\Models\User::insert([
    'name' => 'pl',
    'age' => 15,
    'email' => 'pl@qqq.com',
    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
  ]);
  return $data;
});

Route::get('hash/{password}', function ($password) {
  $data = \App\Models\User::find(15);
  if (\Illuminate\Support\Facades\Hash::check($password, $data['password'])) {
    return '密码正确';
  } else {
    return '密码错误';
  }
});

//依赖注入
class A
{
  public function index()
  {
    return 'A';
  }
}

class C
{
  public function __construct(A $a)
  {
    return $this->a = $a;
  }
  public function get()
  {
    return $this->a->index();
  }
}

class IOC
{
  public function __construct()
  {
    $this->a = new A();
  }
  public function get()
  {
    return $this->a->index();
  }
}

//匿名函数
Route::get('niming', function () {
  $Test = function ($str) {
    echo $str;
  };
  return $Test('123');
});

//闭包
Route::get('bibao', function () {
  function Test()
  {
    $Test = function ($str) {
      echo $str;
    };
    $Test('123');
  }
  return Test();
});

//引用外部变量
Route::get('bibao1', function () {
  function Test2()
  {
    $str = "321";
    $Test = function () use ($str) {
      echo $str;
    };
    $Test();
  }
  return Test2();
});

//返回匿名函数
Route::get('bibao2', function () {
  function Test3()
  {
    $str = "321";
    $Test = function () use ($str) {
      echo $str;
    };
    return $Test;
  }
  $T = Test3();
  return $T();
});

//返回匿名函数,并传参
Route::get('bibao3', function () {
  function Test4()
  {
    $str = "321";
    $Test = function ($data) use ($str) {
      echo $str;
      echo '<br/>';
      echo $data;
    };
    return $Test;
  }
  $T = Test4();
  return $T('456');
});

//返回匿名函数,通过地址传递，引用外部变量
Route::get('bibao4', function () {
  function Test5()
  {
    $str = 1;
    $Test = function () use (&$str) {
      echo $str++;
      echo '<br/>';
    };
    return $Test;
  }
  $T = Test5();
  $T();
  $T();
  $T();
  $T();
  return $T();
});

//匿名函数作为参数传入
Route::get('bibao5', function () {
  function Test6($str)
  {
    $str('123');
  }
  Test6(function ($str) {
    echo $str;
  });
});

//文件上传  //验证码
Route::any('home/test/test2', [TestController::class, 'test2']);

//响应方式
Route::get('home/test/test3', [TestController::class, 'test3']);
Route::get('home/test/test4', [TestController::class, 'test4']);

//session会话控制
Route::get('home/test/test5', [TestController::class, 'test5']);

//关联模型
//一对一
Route::get('home/test/test6', [TestController::class, 'test6']);
//一对多
Route::get('home/test/test7', [TestController::class, 'test7']);
//多对多
Route::get('home/test/test8', [TestController::class, 'test8']);
