<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller {
	public function _initialize(){
		if (cookie('username') != ''){
    		session('username',cookie('username'));
    	}
		if (session('username')==''){
    			$this->redirect('login/index');
    		
    	}
	}
}