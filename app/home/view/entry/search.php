<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php">返回首页</a>
<hr>
<h2>搜索页面</h2>
<form action="" method="get">
    搜搜：<input type="hidden" name="s" value="home/entry/search">
    <input type="text" name="wd" value="<?php echo $_GET['wd'] ?>">
    <input type="submit" value="搜索">
</form>
<table border="1">
	<tr>
		<td>编号</td>
		<td>标题</td>
	</tr>
	<?php foreach( $data as $v): ?>
	<tr>
		<td><?php echo $v['aid'] ?></td>
		<td><?php echo str_replace($_GET['wd'],"<span style='color: red'>{$_GET['wd']}</span>",$v['title']) ?></td>
	</tr>
	<?php endforeach ?>
</table>
</body>
</html>