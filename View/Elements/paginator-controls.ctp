<?php
$nextPrevDefaults = array('escape' => false, 'tag' => 'li', 'disabledTag' => 'span',
);
$nextPrevDisabledOptions = array_merge($nextPrevDefaults, array('class' => 'disabled'));
?>
<div class="pagination pagination-centered">
    <ul class="pull-left">
        <?php
        echo $this->Paginator->first(3, $nextPrevDefaults, null, $nextPrevDisabledOptions);
        ?>
    </ul>
    <ul>
        <?php
        echo $this->Paginator->numbers(array(
            'modulus' => 8,
            'separator' => null,
            'first' => 4,
            'last' => 4,
            'ellipsis' => '</ul>&nbsp;...&nbsp;<ul>',
            'tag' => 'li',
            'class' => 'number',
            'currentTag' => 'span',
            'currentClass' => 'active',
        ));
        ?>
    </ul>
    <ul class="pull-right">
        <?php
        echo $this->Paginator->last(3, $nextPrevDefaults, null, $nextPrevDisabledOptions);
        ?>
    </ul>
</div>