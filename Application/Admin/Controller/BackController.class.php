<?php
namespace Admin\Controller;
use Think\Controller;
class BackController extends Controller {
    public function _initialize(){

    	define('JS_PATH', './Public/js/');
    	define('CS_PATH', './Public/css/');
    	define('IM_PATH', './Public/images/');
    }
}