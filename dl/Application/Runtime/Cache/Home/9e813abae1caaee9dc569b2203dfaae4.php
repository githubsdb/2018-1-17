<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>登录</title>
</head>
<body>
<form onsubmit="return false" autocomplete="on" id="forms"> 
		<li>
			<label>用户名称:</label>
			<input type="text" name="username" />
		</li>
		<li>
			<label>密码:</label>
			<input type="password" name="password" />
		</li>
		<input type="submit" value="登录" />
	</form>
	<form action="<?php echo U('upload');?>" enctype="multipart/form-data" method="post" >
	<input type="text" name="name" />
	<input type="file" name="photo" />
	<input type="submit" value="提交" >
	</form>

<script src="/dl/public/js/jquery.min.js"></script>	
<script type="text/javascript">
	$('#forms').submit(function(){
		//alert('12312');
		$.ajax({
			url:"<?php echo U('index/login');?>",
            type:'POST',
            data:$('#forms').serialize(),
            success:function(res){
            	// console.log(res)
            	// alert(res.status);
            	// alert(res.msg);
                 switch(res.status){
                    case 1:alert(res.msg);
                    window.location.href='/dl/index.php/index/index/user.html';break;
                    case 0:alert(res.msg);break;
                    case 2:alert(res.msg);break;
                }
            },
            error:function(){
            	alert('位置原因');
            },

        });
	});
</script>
</body>

</html>