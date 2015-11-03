<?php 
/**
 * 获取系统信息
 */
function get_sysinfo() {
	 $sys_info['os']				 = PHP_OS;
	 $sys_info['zlib']			  = function_exists('gzclose');//zlib
	 $sys_info['safe_mode']		= (boolean) ini_get('safe_mode');//safe_mode = Off
	 $sys_info['safe_mode_gid']  = (boolean) ini_get('safe_mode_gid');//safe_mode_gid = Off
	 $sys_info['timezone']		 = function_exists("date_default_timezone_get") ? date_default_timezone_get() : L('no_setting');
	 $sys_info['socket']			= function_exists('fsockopen') ;
	 $sys_info['web_server']	  = strpos($_SERVER['SERVER_SOFTWARE'], 'PHP')===false ? $_SERVER['SERVER_SOFTWARE'].'PHP/'.phpversion() : $_SERVER['SERVER_SOFTWARE'];
	 $sys_info['phpv']			  = phpversion(); 
	 $sys_info['mysqlv'] = mysql_get_server_info();
	 $sys_info['fileupload']	  = @ini_get('file_uploads') ? ini_get('upload_max_filesize') :'unknown';
	 $sys_info['mysqlsize']		= M()->query("select round(sum(DATA_LENGTH/1024/1024)+sum(DATA_LENGTH/1024/1024),2) as db_length from information_schema.tables 
where table_schema='".C('DB_NAME')."'");
	 $sys_info['mysqlsize']		= $sys_info['mysqlsize'][0]['db_length'];
	 return $sys_info;
}

/**
 * 删除目录或者文件
 * @param  string  $path
 * @param  boolean $is_del_dir
 * @return fixed
 */
function del_files($path, $is_del_dir = FALSE) {
    $handle = opendir($path);
    if ($handle) {
        // $path为目录路径
        while (false !== ($item = readdir($handle))) {
            // 除去..目录和.目录
            if ($item != '.' && $item != '..') {
                if (is_dir("$path/$item")) {
                    // 递归删除目录
                    del_files("$path/$item", $is_del_dir);
                } else {
                    // 删除文件
                    unlink("$path/$item");
                }
            }
        }
        closedir($handle);
        if ($is_del_dir) {
            // 删除目录
            return rmdir($path);
        }
    }else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return false;
        }
    }
}


function daddslashes($string, $force = 1) {
	 if(is_array($string)) {
		  $keys = array_keys($string);
		  foreach($keys as $key) {
				$val = $string[$key];
				unset($string[$key]);
				$string[addslashes($key)] = daddslashes($val, $force);
		  }
	 } else {
		  $string = addslashes($string);
	 }
	 return $string;
}

function showmsg($status,$info,$url){
	if($status == 0 ){
		$res['status'] = 0;
		$res['info'] = $info;
	}else{
		$res['status'] = 1;
		$res['info'] = $info;
		$res['url'] = $url;
	}
	echo json_encode($res);
}

/**
 * 格式化的文件大小
 * @param  int $bytes
 * @return string
 */
function bytes_format($bytes) {
    // 单位
    $unit = array(' B', ' KB', ' MB',
                  ' GB', ' TB', ' PB',
                  ' EB', ' ZB', ' YB');

    // bytes的对数
    $log_bytes = floor(log($bytes, 1024));
    return round($bytes / pow(1024, $log_bytes), 2) . $unit[$log_bytes];
}
