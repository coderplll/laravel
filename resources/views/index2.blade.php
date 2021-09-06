<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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

  <form action="create" method="post">
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
    <input type="submit" value="提交">
  </form>

</body>

</html>