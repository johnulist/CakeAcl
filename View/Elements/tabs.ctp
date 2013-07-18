<ul class="nav nav-tabs">
    <?php
    echo $this->Html->tag('li', $this->Html->link('Index',              array('plugin' => 'cake_acl', 'controller' => 'cake_acl_pages', 'action' => 'index')));
    echo $this->Html->tag('li', $this->Html->link('Manage permissions', array('plugin' => 'cake_acl', 'controller' => 'permissions', 'action' => 'manage')));
    echo $this->Html->tag('li', $this->Html->link('Update ACO\'s',      array('plugin' => 'cake_acl', 'controller' => 'acos', 'action' => 'update')));
    echo $this->Html->tag('li', $this->Html->link('Update ARO\'s',      array('plugin' => 'cake_acl', 'controller' => 'aros', 'action' => 'update')));
    echo $this->Html->tag('li', $this->Html->link('DROP permissions',   array('plugin' => 'cake_acl', 'controller' => 'permissions', 'action' => 'drop')));
    echo $this->Html->tag('li', $this->Html->link('DROP ACO\'s',        array('plugin' => 'cake_acl', 'controller' => 'acos', 'action' => 'drop')));
    echo $this->Html->tag('li', $this->Html->link('DROP ARO\'s',        array('plugin' => 'cake_acl', 'controller' => 'aros', 'action' => 'drop')));
    ?>
</ul>