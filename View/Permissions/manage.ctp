<?php
/**
 * @var $this View
 */
?>
<div class="tabs-left">
    <?php echo $this->element('CakeAcl.tabs'); ?>
    <div class="tab-content">
        <?php echo $this->element('CakeAcl.paginator-controls'); ?>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th></th>
                    <?php
                    foreach ($aros as $aro){
                        echo $this->Html->tag('th', $aro[$model][$labelField]);
                    }
                    ?>
                </tr>
            </thead>
            <?php
            $ident = array();
            foreach ($acos as $key => $aco) {
                $ident[$aco['Aco']['id']] = isset($ident[$aco['Aco']['parent_id']]) ?  $ident[$aco['Aco']['parent_id']] + 1 : 0;
                $curIdent = str_repeat('&nbsp;', 5* $ident[$aco['Aco']['id']]);
                echo '<tr>';
                echo $this->Html->tag('td', $curIdent . $aco['Aco']['alias']);
                foreach ($aros as $aro){
                    echo $this->Html->tag('td', '...');
                }
                echo '</tr>';
            }
//            var_dump($ident);
            ?>
        </table>
        <?php echo $this->element('CakeAcl.paginator-controls'); ?>
    </div>
</div>