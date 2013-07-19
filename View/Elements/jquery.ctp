<?php
/**
 * @var $this HintView
 */
if (Configure::read('CakeAcl.jQuery')) {
    echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));
}

# some variables we need for compatibility with "foldered" projects
echo $this->Html->scriptBlock('
    var cakeAcl = {
        webroot: "' . $this->webroot . '"
    };
', array('inline' => false));