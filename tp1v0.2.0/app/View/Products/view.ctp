
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <?php if ($this->Session->check('Auth.User')): ?>
                <ul class="list-group">

                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Products') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Products'), array('action' => 'index'), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Product'), array('action' => 'add'), array('class' => '')); ?></li>
                        </ul>
                    </div>

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
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index'), array('class' => '')); ?></li> 
                </ul>
            <?php endif ?>

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="products view">

            <h2><?php echo __('Product'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($product['Product']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Shipment'); ?></strong></td>

                            <td><?php
                                foreach ($product['Shipment'] as $shipment) {
                                    //echo h($product['name']) . ' '; 
                                    echo $this->Html->tag('span', $shipment['name'] . ' ', array('class' => 'label label-info')) . " &nbsp;";
                                }
                                ?>
                                &nbsp;</td> 
                        </tr></tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Shipments'); ?></h3>

            <?php if (!empty($product['Shipment'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Harbor'); ?></th>
                                <th><?php echo __('Start Date'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Start Location'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($product['Shipment'] as $shipment):
                                ?>
                                <tr>
                                    <td><?php echo $shipment['name']; ?></td>
                                    <td><?php echo $shipment['start_date']; ?></td>
                                    <td><?php echo $shipment['name']; ?></td>
                                    <td><?php echo $shipment['start_location']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'shipments', 'action' => 'view', $shipment['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'shipments', 'action' => 'edit', $shipment['id']), array('class' => 'btn btn-default btn-xs')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'shipments', 'action' => 'delete', $shipment['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $shipment['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Shipment'), array('controller' => 'shipments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
