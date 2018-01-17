<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	// echo "<pre>";
    	// print_r(cookie());
    	// exit;
    	if (cookie('username')!='') {
    		session('username',cookie('username'));
    	}
    	// echo "<pre>";
    	// print_r(session());
    	if (session('username')=='') {
    			$this->display('index');
    		}else{
    			$this->redirect('index/user');
    	}	
    }
    public function login(){
    	// echo "<pre>";
    	// print_r(I('post.'));
    	// exit;
    	$user=I('username')?I('username'):$this->error('请输入用户名', 'index');
    	$password=I('password')?I('password'):$this->error('请输入密码', 'index');
    	$info=M('user')->where('username="'.$user.'"')->find();
    	// echo "<pre>";
    	// print_r($info);
    	//exit;
    	if ($info) {
    		if($info['password']==$password){
    			session('username',$password);
    			session('userid',$info['id']);
    			if (I('ischeckbox')==1) {
    				cookie('username',$user,3600);
    			}
                
    			 $this->success('登录成功', 'index/user');
    		}else{
                
    			$this->error('密码错误', 'index');
    		}
    	}else{
            
    		 $this->error('用户名不存在', 'index'); 
    	}	
    }
   
}
// $data=[
//                     msg=>'登录成功',
//                     status=>1
//                 ];
//                return $this->ajaxReturn($data);
// $.ajax({
//             type:'post',
//             url:'{:U('login/login')}',
//             data:$('#forms').serialize(),
//             success:function(result){
//                  switch (result.status) {
//                     case '1':alert(result.msg);break;
//                     case '0':alert(result.msg);break;
//                     case '2':alert(result.msg);break;
//                 }
//             },
//             error:function(){

//             }

//         })