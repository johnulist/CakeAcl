<?php
app::uses('CakeAclAppController', 'CakeAcl.Controller');
class AcosController extends CakeAclAppController {

    public function update(){
        $this->set('title_for_layout', 'Update Acos');
    }

    public function drop(){
        $this->set('title_for_layout', 'Drop Acos');
    }

}