<?php
app::uses('CakeAclAppController', 'CakeAcl.Controller');
class CakeAclPagesController extends CakeAclAppController {

    public function index(){
        $this->set('title_for_layout', 'Index');
    }

}