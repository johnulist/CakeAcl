<?php
/**
 * @var $this View
 */
echo $this->element('CakeAcl.jQuery');
echo $this->Html->script('CakeAcl.acl', array('inline' => false));
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
            # for later reference
            $newAcos = array();
            foreach ($acos as $key => $aco) {

                # set the tree log variable and a easier to use variable
                $aco = $newAcos[$aco['Aco']['id']] = array(
                    'alias' => $aco['Aco']['alias'],
                    'parent_id' => $aco['Aco']['parent_id'],
                    'ident' => isset($newAcos[$aco['Aco']['parent_id']]) ? $newAcos[$aco['Aco']['parent_id']]['ident'] + 1 : 0,
                    'node' => isset($newAcos[$aco['Aco']['parent_id']]) ? $newAcos[$aco['Aco']['parent_id']]['node'] . '/' . $aco['Aco']['alias'] : $aco['Aco']['alias']
                );

                # do the actual rendering of a row
                $curIdent = str_repeat('&nbsp;', 5 * $aco['ident']);
                printf('<tr class="cakeacl-aco-container" data-aco="%s">', $aco['node']);
                echo $this->Html->tag('td', $curIdent . $aco['alias']);
                foreach ($aros as $aro){
                    printf('<td class="cakeacl-aro-container" data-aro="%s.%s">%s</td>', $model, $aro[$model]['id'], '...');
                }
                echo '</tr>';
            }
            ?>
        </table>
        <?php echo $this->element('CakeAcl.paginator-controls'); ?>
    </div>
</div>