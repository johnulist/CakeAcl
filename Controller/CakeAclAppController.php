<?php
app::uses('AppController', 'Controller');
class CakeAclAppController extends AppController {

    public function beforeRender(){
        $this->set('models', Configure::read('CakeAcl.models'));
        parent::beforeRender();
    }

}