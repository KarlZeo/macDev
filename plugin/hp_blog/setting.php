<?php
/**
 * 一些相关的设置
 */
!defined('DEBUG') and exit('Access Denied.');

$action = param(3);
empty($action) and $action = 'set';

$hp_settings = kv_get('hp_settings');

$settings = array(
    'post_desc'       => array(
        'title'   => '回复倒序查看',
        'note'    => '这个用来实现最新发布的“回贴”显示在最前面',
        'type'    => 'radio_yes_no',
        'default' => true
    ),
);
$keys = array();
if ($method == 'GET') {
    $keys = array(
        'post_desc'
    );
    $inputs = array();
    if ($keys) {
        foreach ($keys as $key) {
            $input = $settings[$key];
            $func = 'form_' . $input['type'];
            unset($input['type']);
            $input['html'] = call_user_func_array($func, array(
                $key,
                isset($hp_settings[$key])?$hp_settings[$key]:$settings[$key]['default']
            ));
            $inputs[] = $input;
        }
        unset($input);
    }
    include _include(APP_PATH . 'plugin/hp_blog/htm/setting.htm');
} else {
    $data = $_POST;
    foreach ($data as $key => $val) {
        if (isset($settings[$key])) {
            $hp_settings[$key] = param($key);
        }
    }
    kv_set('hp_settings', $hp_settings);
    message(0, '修改成功');
}