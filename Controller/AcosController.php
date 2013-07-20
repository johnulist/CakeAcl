<?php
app::uses('CakeAclAppController', 'CakeAcl.Controller');
class AcosController extends CakeAclAppController {

    public function update(){
        $this->set('title_for_layout', 'Update Acos');
    }

    public function drop(){
        $this->set('title_for_layout', 'Drop Acos');

        # truncate the table
        if ($this->request->is('post')){
            if ($this->Acl->Aco->deleteAll(array('1=1'))){
                $this->Session->setFlash('The ACOs have been cleared successfully', 'default', array(), 'success');
                $this->redirect(array('plugin' => 'cake_acl', 'controller' => 'cake_acl_pages'));
            } else {
                $this->Session->setFlash('The ACOs could not be cleared', 'default', array(), 'error');
            }
        }
    }

}