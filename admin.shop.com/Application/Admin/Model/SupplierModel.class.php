<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/24
 * Time: 17:18
 */

namespace Admin\Model;


use Think\Model;

class SupplierModel extends Model
{
//    开启批量验证
    protected $patchValidate = true;

    protected $_validate = [
        ['name','require','供货商名称不能为空'],
        ['intro','require','供货商简介不能为空'],
        ['name','','供货商已存在',self::EXISTS_VALIDATE,'unique'],
        ['status','0,1','供货商状态不合法',self::EXISTS_VALIDATE,'in'],
        ['sort','number','排序必须为数字'],
    ];
public function getPage($res){
    $page_setting = C('PAGE_SETTING');
    $count = $this->where($res)->count();
    $page = new \Think\Page($count,$page_setting['PAGE_SIZE']);
    $page->setConfig('theme', $page_setting['PAGE_THEME']);
    $page_html = $page->show();
    $rows = $this->where($res)->page(I('get.p',1),$page_setting['PAGE_SIZE'])->select();
    return compact(['rows','page_html']);
}
}