<?php
app::uses('CakeAclAppController', 'CakeAcl.Controller');
class ArosController extends CakeAclAppController {

    public function update(){
        $this->set('title_for_layout', 'Update Aros');
    }

    public function drop(){
        $this->set('title_for_layout', 'Drop Aros');

        # truncate the table
        if ($this->request->is('post')){
            if ($this->Acl->Aro->deleteAll(array('1=1'))){
                $this->Session->setFlash('The AROs have been cleared successfully', 'default', array(), 'success');
                $this->redirect(array('plugin' => 'cake_acl', 'controller' => 'cake_acl_pages'));
            } else {
                $this->Session->setFlash('The AROs could not be cleared', 'default', array(), 'error');
            }
        }
    }

}