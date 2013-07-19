<?php
app::uses('CakeAclAppController', 'CakeAcl.Controller');
app::uses('PaginatorComponent', 'Controller/Component');
app::uses('PaginatorHelper', 'View/Helper');
/**
 * Class PermissionsController
 *
 * @property User $Aro
 */
class PermissionsController extends CakeAclAppController {

    private $__models = array();

    public $components = array('Paginator');
    public $helpers = array('Paginator');

    public function beforeFilter(){
        $this->__models = Configure::read('CakeAcl.models');
        foreach ($this->__models as $model => $options){
            $this->loadModel($model);
        }
    }

    /**
     * @param null $model
     *
     * @throws NotFoundException
     */
    public function manage($model = null){
        $models = array_keys($this->__models);
        $loweredModels = array_map('strtolower', $models);

        if(!$model){
            $model = $loweredModels[0];
        }

        if (!in_array(strtolower($model), $loweredModels)){
            throw new NotFoundException();
        } else {
            $model = $models[array_search(strtolower($model), $loweredModels)];
            $this->set('title_for_layout', __('Manage %s Permissions', $model));
        }

        $labelField = $this->__models[$model]['labelField'];
        $this->Paginator->settings = array(
            'fields' => array('id', $labelField),
            'recursive' => -1,
            'limit' => Configure::read('CakeAcl.limit')
        );
        $aros = $this->Paginator->paginate($this->{$model}->alias);

        $acos = $this->Acl->Aco->find('all', array(
            'order' => 'Aco.lft ASC',
            'recursive' => -1
        ));

        $this->set(compact('aros', 'acos', 'model', 'labelField'));
    }

    public function drop(){
        $this->set('title_for_layout', 'Drop Permissions');
    }

    public function node(){
        $this->autoRender = false;
        list($model, $id) = explode('.', $this->request->data['aro']);
        $aro = array($model => array('id' => $id));

        # check the current state
        $check = $this->Acl->check($aro, $this->request->data('aco'));

        # if the toggle parameter has been set, we have to toggle the state
        if ($this->request->data('toggle')){
            # current state: allowed -> toggle to deny
            if ($check){
                if(!$this->Acl->deny($aro, $this->request->data('aco'))){
                    throw new InternalErrorException('Could not update node');
                }
            }
            #current state: denied -> toggle to allow
            else {
                if(!$this->Acl->allow($aro, $this->request->data('aco'))){
                    throw new InternalErrorException('Could not update node');
                }
            }
            $check = !$check;
        }
        return $check ? 1 : 0;
    }

}