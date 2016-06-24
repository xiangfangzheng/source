<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/24
 * Time: 17:15
 */

namespace Admin\Controller;


use Think\Controller;

class SupplierController extends Controller
{
    public function index(){
        $name=i('get.name');
//        var_dump($name);
//        exit;
        $Supplier_model=D('Supplier');
        if(!$name)
        {

            $rows= $Supplier_model->where('status>0')->select();

        }else{
            $cond=['like','%'.$name.'%'];
            $rows= $Supplier_model->where('status>0',"status='{$cond}'")->select();
        }
        $this->assign('rows',$rows);
        $this->display();


    }
    public function add(){
        if(IS_POST){
            $Supplier_model=D('Supplier');
            if($Supplier_model->create()===false) {
                $this->error(get_error($Supplier_model));
                }
            if($Supplier_model->add()===false)
            {
                $this->error(get_error($Supplier_model));
            }else{
                $this->success('添加成功',U('index'));
            }
        }else{
            $this->display();
        }

    }
    public function edit()
    {
        if (IS_POST) {
            $Supplier_model = D('Supplier');
            if ($Supplier_model->create() === false) {
                $this->error(get_error($Supplier_model));
            }
            if ($Supplier_model->save() === false) {
                $this->error(get_error($Supplier_model));
            } else {
                $this->success('修改成功', U('index'));
            }
        } else {
            $id = I('get.id');
//            var_dump($id);
//            exit;
            $Supplier_model = D('Supplier');
            $row = $Supplier_model->find($id);
            $this->assign('row', $row);
            $this->display();
        }
    }
    public function remove(){
            $id=I('get.id');
            $Supplier_model=D('Supplier');
            if($Supplier_model->delete($id)===false){
                $this->error(get_error($Supplier_model));
            }else{
                $this->success('删除成功',U('index'));
            }

     }



}