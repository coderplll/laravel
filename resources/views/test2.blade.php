<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文件上传</title>

</head>

<body>
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="" method="post" enctype="multipart/form-data">
    @csrf
    姓名:<input type="text" name="name" value="" class="@error('name') is-invalid @enderror"><br>
    @error('name')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    年龄:<input type="text" name="age" value="" class="@error('age') is-invalid @enderror"><br>
    @error('age')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    邮箱:<input type="text" name="email" value="" class="@error('email') is-invalid @enderror"><br>
    @error('email')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    头像:<input type="file" name="avatar" class="@error('avatar') is-invalid @enderror"><br>
    @error('avatar')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    验证码:<input type="text" name="captcha" class="@error('captcha') is-invalid @enderror"><img src="{{captcha_src()}}" alt=""><br>
    @error('captcha')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <input type="submit" value="提交">
  </form>

</body>

</html>