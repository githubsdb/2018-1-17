<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>你好</title>
</head>
<body>
	<form method="post" action="<?php echo U('login');?>">
		<li>
			<label>用户名称:</label>
			<input type="text" name="username" />
		</li>
		<li>
			<label>密码:</label>
			<input type="password" name="password" />
		</li>
		<li>
			<input type="checkbox" name="ischeckbox" value="1" />存储一个小时
		</li>
		<input type="submit" value="登录" />

	</form>
	

</body>
</html>