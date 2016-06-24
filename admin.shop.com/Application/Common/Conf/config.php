<?php
define('BASE_URL','http://admin.shop.com');
return array(
    //'配置项'=>'配置值'
    'URL_MODEL'=>2,
    'TMPL_PARSE_STRING'=>[
        '__CSS__'=> BASE_URL . '/Public/Admin/css',
        '__JS__'=> BASE_URL . '/Public/Admin/js',
        '__IMG__'=> BASE_URL . '/Public/Admin/images',
    ],
);