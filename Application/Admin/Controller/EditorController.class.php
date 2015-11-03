<?php
namespace Admin\Controller;
use Think\Controller;
class EditorController extends BaseController {

    //编辑器文件上传
    public function upload() {

        $upload_path = C('uploadPath');

        $dir_name = I("get.dir", 'image', 'htmlspecialchars,trim');
        $parent_dir=I("parentdir", '', 'htmlspecialchars,trim');
        $ext_arr = array(
            'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
            'flash' => array('swf', 'flv'),
            'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
            'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz'),
        );

        if (empty($ext_arr[$dir_name])) {
            $this->ajaxReturn(array('error' => 1, 'message' => '未知错误'));
            exit();
        }


         $upload = new \Think\Upload();// 实例化上传类    
         $upload->maxSize = 3145728;
         $upload->rootPath = $upload_path;   
         $upload->savePath = $parent_dir . $dir_name . '/';
         $upload->saveName = array('uniqid','');
         $upload->exts     = $ext_arr[$dir_name];
         $upload->autoSub  = true;
         $upload->subName  = array('date','Ymd');
                if($parent_dir == 'site/'){
                    $upload->autoSub = false; 
                    $upload->saveName =$_POST['saveRule'];      
                    $upload->replace = true;// 存在同名是否覆盖
                     $upload->rootPath = $upload_path; 
                    $upload->savePath =   $parent_dir ;
                }
         $jieguo =  $upload->upload();
         
          $uploaderror = $upload->getError();
  

        //GD水印
        if((int)C('site_watermarkposition') >0){
        $image = new \Think\Image(); // 在图片左上角添加水印（水印文件位于./logo.png） 水印图片的透明度为50 并保存为water.jpg
        $source =WEB_ROOT.C('uploadPath').$jieguo['imgFile']['savepath'] . $jieguo['imgFile']['savename'];
        $water = WEB_ROOT.C('site_watermarkurl');
        $image->open($source)->water($water ,C('site_watermarkposition'),(int)C('site_watermarkalignment'))->save($source ); 
        }
        //错误信息空和有返回成功信息则返回URL
        if ($uploaderror == '' && $jieguo) {
            $this->ajaxReturn(array('error' => 0, 'url' =>C('uploadPath').$jieguo['imgFile']['savepath'] . $jieguo['imgFile']['savename']));
            exit();
        } else {
            $this->ajaxReturn(array('error' => 1, 'message' => $uploaderror));
            exit();
        }
    }

    //编辑器文件浏览器
    public function file_manage() {
        $uploadpath = C('uploadPath');
        $php_path = WEB_ROOT;
        $php_url = __ROOT__ . '/';

        $root_path = $php_path . $uploadpath;
        $root_url = $php_url . $uploadpath;
        $ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
        //目录名
        $dir_name = empty($_GET['dir']) ? '' : trim($_GET['dir']);
        if (!in_array($dir_name, array('', 'image', 'flash', 'media', 'file'))) {
            echo "无效的目录名";
            exit;
        }
        if ($dir_name !== '') {
            /*
            $root_path .= $dir_name . "/";
            $root_url .= $dir_name . "/";
            */
            $root_path .= "/";
            $root_url .= "/";
            if (!file_exists($root_path)) {
                dir_create($root_path);
            }
        }

        //根据path参数，设置各路径和URL
        if (empty($_GET['path'])) {
            $current_path = realpath($root_path) . '/';
            $current_url = $root_url;
            $current_dir_path = '';
            $moveup_dir_path = '';
        } else {
            $current_path = realpath($root_path) . '/' . $_GET['path'];
            $current_url = $root_url . $_GET['path'];
            $current_dir_path = $_GET['path'];
            $moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
        }
        echo realpath($root_path);
        //排序形式，name or size or type
        $order = empty($_GET['order']) ? 'name' : strtolower($_GET['order']);

        //不允许使用..移动到上一级目录
        if (preg_match('/\.\./', $current_path)) {
            echo '没有权限访问';
            exit;
        }
        //最后一个字符不是/
        if (!preg_match('/\/$/', $current_path)) {
            echo '无效的参数';
            exit;
        }
        //目录不存在或不是目录
        if (!file_exists($current_path) || !is_dir($current_path)) {
            echo '文件夹不存在';
            exit;
        }

        //遍历目录取得文件信息
        $file_list = array();
        if ($handle = opendir($current_path)) {
            $i = 0;
            while (false !== ($filename = readdir($handle))) {
                if ($filename{0} == '.')
                    continue;
                $file = $current_path . $filename;
                if (is_dir($file)) {
                    $file_list[$i]['is_dir'] = true; //是否文件夹
                    $file_list[$i]['has_file'] = (count(scandir($file)) > 2); //文件夹是否包含文件
                    $file_list[$i]['filesize'] = 0; //文件大小
                    $file_list[$i]['is_photo'] = false; //是否图片
                    $file_list[$i]['filetype'] = ''; //文件类别，用扩展名判断
                } else {
                    $file_list[$i]['is_dir'] = false;
                    $file_list[$i]['has_file'] = false;
                    $file_list[$i]['filesize'] = filesize($file);
                    $file_list[$i]['dir_path'] = '';
                    $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
                    $file_list[$i]['filetype'] = $file_ext;
                }
                $file_list[$i]['filename'] = $filename; //文件名，包含扩展名
                $file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file)); //文件最后修改时间
                $i++;
            }
            closedir($handle);
        }

        //排序
        function cmp_func($a, $b) {
            global $order;
            if ($a['is_dir'] && !$b['is_dir']) {
                return -1;
            } else if (!$a['is_dir'] && $b['is_dir']) {
                return 1;
            } else {
                if ($order == 'size') {
                    if ($a['filesize'] > $b['filesize']) {
                        return 1;
                    } else if ($a['filesize'] < $b['filesize']) {
                        return -1;
                    } else {
                        return 0;
                    }
                } else if ($order == 'type') {
                    return strcmp($a['filetype'], $b['filetype']);
                } else {
                    return strcmp($a['filename'], $b['filename']);
                }
            }
        }

        usort($file_list, 'cmp_func');

        $result = array();
        //相对于根目录的上一级目录
        $result['moveup_dir_path'] = $moveup_dir_path;
        //相对于根目录的当前目录
        $result['current_dir_path'] = $current_dir_path;
        //当前目录的URL
        $result['current_url'] = $current_url;
        //文件数
        $result['total_count'] = count($file_list);
        //文件列表数组
        $result['file_list'] = $file_list;

        $this->ajaxReturn($result);
    }

}
