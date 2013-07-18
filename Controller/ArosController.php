<?php
app::uses('CakeAclAppController', 'CakeAcl.Controller');
class ArosController extends CakeAclAppController {

    public function update(){
        $this->set('title_for_layout', 'Update Aros');
    }

    public function drop(){
        $this->set('title_for_layout', 'Drop Aros');
    }

}