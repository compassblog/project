<?php
namespace Index\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize(){
     define('JS_PATH', './Public/js/');
     define('CS_PATH', './Public/css/');
     define('IM_PATH', './Public/images/');
    }
}