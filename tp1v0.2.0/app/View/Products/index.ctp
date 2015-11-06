
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <?php if ($this->Session->check('Auth.User')): ?>
                <ul class="list-group">

                    <li class="list-group-item"><?php echo $this->Html->link(__('New Product'), array('action' => 'add'), array('class' => '')); ?></li>

                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Shipment') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Shipments'), array('controller' => 'shipments', 'action' => 'index'), array('class' => '')); ?></li> 
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Shipment'), array('controller' => 'shipments', 'action' => 'add'), array('class' => '')); ?></li> 
                        </ul>
                    </div>

                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Harbors') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Harbors'), array('controller' => 'harbors', 'action' => 'index'), array('class' => '')); ?></li> 
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Harbor'), array('controller' => 'harbors', 'action' => 'add'), array('class' => '')); ?></li>
                        </ul>
                    </div>

                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Messages') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index'), array('class' => '')); ?></li> 
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add'), array('class' => '')); ?></li> 
                        </ul>
                    </div>

                    <?php if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.role') === 'admin'): ?>
                        <div class="dropdown">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Users') ?> <span class="caret"></span></button>
                            <ul class="dropdown-menu scrollable-menu" role="menu">
                                <li class="list-group-item"> <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li>
                                <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li>
                            </ul>
                        </div>
                    <?php endif ?>

                </ul><!-- /.list-group -->

            <?php else: ?>
                <ul class="list-group">
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Shipments'), array('controller' => 'shipments', 'action' => 'index'), array('class' => '')); ?></li> 
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Harbors'), array('controller' => 'harbors', 'action' => 'index'), array('class' => '')); ?></li> 
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index'), array('class' => '')); ?></li> 
                </ul>
            <?php endif ?>

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="products index">

            <h2><?php echo __('Products'); ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('name'); ?></th>
                            <th><?php echo $this->Paginator->sort('shipment'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
                                <td><?php
                                    foreach ($product['Shipment'] as $shipment) {
                                        //echo h($product['name']) . ' '; 
                                        echo $this->Html->tag('span', $shipment['name'] . ' ', array('class' => 'label label-info')) . " &nbsp;";
                                    }
                                    ?>
                                    &nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->

            <p><small>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                    ?>
                </small></p>

            <ul class="pagination">
                <?php
                echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                ?>
            </ul><!-- /.pagination -->

        </div><!-- /.index -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->