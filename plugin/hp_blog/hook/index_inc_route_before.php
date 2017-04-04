<?php
exit;
//系统初始化

defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('ROOT_PATH') || define('ROOT_PATH', dirname(dirname(__FILE__)) . DS);

if (!isset($_SERVER['HTTPS']))
    $_SERVER['HTTPS'] = 'off';

$_SERVER['PHP_SELF'] = htmlspecialchars($_SERVER['SCRIPT_NAME'] ? $_SERVER['SCRIPT_NAME'] : $_SERVER['PHP_SELF']);
$_SERVER['basefilename'] = basename($_SERVER['PHP_SELF']);

$conf['siteroot'] = substr($_SERVER['PHP_SELF'], 0, -strlen($_SERVER['basefilename']));
$conf['siteurl'] = strtolower(($_SERVER['HTTPS'] == 'on' ? 'https' : 'http') .
    '://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/') + 1));

$conf['upload_url'] = $conf['siteurl'] . 'upload/';
if (!function_exists('pre')) {

    /**
     * 格式化输出信息
     *
     * @param 字符串/数组 $array 要输出的信息
     * @param 逻辑值 $exit 是否需要退出
     */
    function pre($array, $exit = false) {
        if ($array) {
            if (is_string($array)) {
                echo '<br>';
                echo htmlspecialchars($array);
                echo '<br>';
            } else {
                echo "<div style='font-size:12px;line-height:14px;text-align:left;color:#000;background-color:#fff;'><pre>";
                print_r($array);
                echo "</pre></div>";
            }
        }
    }

}
