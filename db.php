<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>连接数据库</title>
</head>
<body>
 
<?php
$mysqli = mysqli_connect("localhost", "root", "root", "jianxin");
if(!$mysqli)  {
    echo"连接失败";
}else{
    echo"连接成功";
}
$mysqli->close();
?>
 
</body>
</html>