<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文件上传</title>

</head>

<body>
  <input type="button" value="点我" id="btn">

</body>
<script>
  const btn = document.querySelector("#btn");

  btn.onclick = function() {
    fetch("/home/test/test4", {
        //请求类型
        method: "GET",
        //头信息
        headers: {
          name: "pll",
        },
      })
      .then((response) => {
        //响应对象
        console.log(response);
      });
  };
</script>

</html>