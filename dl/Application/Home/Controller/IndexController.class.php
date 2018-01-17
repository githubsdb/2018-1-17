<?php
namespace Home\Controller;
use Think\Controller;
use Home\Controller\CommentController;
class IndexController extends CommentController {
    public function index(){
    	$this->display('user');
    }
    public function add(){
    	$this->display();
    }
    public function login(){
    	// echo "<pre>";
    	// print_r(I('post.'));
    	// exit;
    	$user=I('post.username');
    	$password=I('post.password');
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
                $data=[
                    'msg'=>'登录成功',
                    'status'=> 1
                ];
                //$this->ajaxReturn($data);
    		}else{
                $data=[
                    'msg'=>'密码错误',
                    'status'=> 0
                ];
                //$this->ajaxReturn($data);
    		}
    	}else{
            $data=[
                    'msg'=>'用户名不存在',
                    'status'=>2
                ];
                
    	}	
    	$this->ajaxReturn($data);
    }
	public function upload(){
		//echo "123";exit;
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
	    $upload->savePath  =     ''; // 设置附件上传（子）目录
	    // 上传文件 
	    $info = $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
	        $this->success('上传成功！');
    }
}


}