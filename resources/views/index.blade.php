<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table td,
    th {
      border: 1px solid #e5e5e5;
      padding: 20px;
    }

    .table {
      width: 100%;
      margin-left: 20%;
    }

    #pull_right {
      text-align: center;
    }

    .pull-right {
      /*float: left!important;*/
    }

    .pagination {
      display: inline-block;
      padding-left: 0;
      margin: 20px 0;
      border-radius: 4px;
    }

    .pagination>li {
      display: inline;
    }

    .pagination>li>a,
    .pagination>li>span {
      position: relative;
      float: left;
      padding: 6px 12px;
      margin-left: -1px;
      line-height: 1.42857143;
      color: #428bca;
      text-decoration: none;
      background-color: #fff;
      border: 1px solid #ddd;
    }

    .pagination>li:first-child>a,
    .pagination>li:first-child>span {
      margin-left: 0;
      border-top-left-radius: 4px;
      border-bottom-left-radius: 4px;
    }

    .pagination>li:last-child>a,
    .pagination>li:last-child>span {
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
    }

    .pagination>li>a:hover,
    .pagination>li>span:hover,
    .pagination>li>a:focus,
    .pagination>li>span:focus {
      color: #2a6496;
      background-color: #eee;
      border-color: #ddd;
    }

    .pagination>.active>a,
    .pagination>.active>span,
    .pagination>.active>a:hover,
    .pagination>.active>span:hover,
    .pagination>.active>a:focus,
    .pagination>.active>span:focus {
      z-index: 2;
      color: #fff;
      cursor: default;
      background-color: #428bca;
      border-color: #428bca;
    }

    .pagination>.disabled>span,
    .pagination>.disabled>span:hover,
    .pagination>.disabled>span:focus,
    .pagination>.disabled>a,
    .pagination>.disabled>a:hover,
    .pagination>.disabled>a:focus {
      color: #777;
      cursor: not-allowed;
      background-color: #fff;
      border-color: #ddd;
    }

    .clear {
      clear: both;
    }
  </style>

</head>

<body>
  <table style="border: 1px solid #000">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>age</th>
        <th>email</th>
        <th>avatar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($list as $val)
      <tr>
        <td>{{$val->id}}</td>
        <td>{{$val->name}}</td>
        <td>{{$val->age}}</td>
        <td>{{$val->email}}</td>
        <td><img src="{{$val->avatar}}" width="80px" alt="??????"></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $list->links() }}

</body>

</html>