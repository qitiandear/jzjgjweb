<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>晋中公安监管信息系统</title>
<link href="/public/css/indexdd.css" rel="stylesheet">
</head>

<body>
<div class="con">
<div class="LOGO">
    <img src="/public/images/LOGO.png">
</div>
<div class="title">
    <p>晋中公安监管网站</p>
</div>
<div class="welcome">
    <p>欢迎登录监管网站</p>
</div>
 <form name="frm"  name="myform" action="/admin.php/Login/check" method="post" onsubmit="return checkAdd()">
<div class="index_denglu">
    <div class="zhanghao">
    <span>账号:</span>
    <input type="text" style="width: 320px;height: 40px;border-radius: 5px;margin-left: 9px;border: solid 1px #ccc;" name="username" id="username">
    </div>
    <div class="mima">
    <span>密码:</span>
    <input type="password" style="width: 320px;height: 40px;border-radius: 5px;margin-left: 9px;border: solid 1px #ccc;" name="password" id="password">
    </div>
    <div class=" Login">
        <input type="submit" value="提交" style="font-size: 25px;background-color:#00aab7;border:0; ">
    </div>
</div>
</form>
</div>
   <script>
    //表单验证图
    function checkAdd()
    {
      if(document.frm.username.value == "")
        {
            alert("请输入用户名！");
            document.frm.username.focus();
            return false;
        }
      else if(document.frm.password.value == "")
        {
            alert("请输入密码！");
            document.frm.password.focus();
            return false;
        }
    }
    </script>
</body>
</html>