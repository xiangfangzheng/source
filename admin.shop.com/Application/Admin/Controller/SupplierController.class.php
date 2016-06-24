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
        $name=I('get.name');
//        var_dump($name);
//        exit;
        $res['status'] = ['egt',0];
        $Supplier_model=D('Supplier');
        if($name)
        {
            $res['name'] = ['like','%'.$name.'%'];


        }
        $data = $Supplier_model->getPage($res);
        $this->assign($data);
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
//        物理删除
//              $id=I('get.id');
//            $Supplier_model=D('Supplier');
//            if($Supplier_model->delete($id)===false){
//                $this->error(get_error($Supplier_model));
//            }else{
//                $this->success('删除成功',U('index'));
//            }
        $id=I('get.id');
        $data = [
            'id'=>$id,
            'status'=>-1,
            'name'=>['exp','concat(name,"_del")'],
        ];
        if($this->_model->setField($data) === false){
            $this->error(get_error($this->_model));
        }else{
            $this->success('删除成功',U('index'));
        }
    }





}