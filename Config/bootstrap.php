<?php
Configure::write('CakeAcl.models', array(
    'Role' => array(
        'labelField' => 'id'
    ),
    'User' => array(
        'labelField' => 'id'
    )
));
Configure::write('CakeAcl.limit', 4);