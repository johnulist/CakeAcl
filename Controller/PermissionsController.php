<?php
app::uses('CakeAclAppController', 'CakeAcl.Controller');
class PermissionsController extends CakeAclAppController {

    public function manage(){
        $this->set('title_for_layout', 'Manage Permissions');
    }

    public function drop(){
        $this->set('title_for_layout', 'Drop Permissions');
    }

}