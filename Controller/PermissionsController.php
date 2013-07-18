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
            'limit' => 1
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

}