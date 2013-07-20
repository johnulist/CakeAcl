<?php
echo $this->Form->postLink('<i class="icon-trash icon-white"></i> Drop ' . $controller,
    array('plugin' => 'cake_acl', 'controller' => $controller, 'action' => 'drop'),
    array('escape' => false, 'class' => 'btn btn-danger pull-right'))
;
