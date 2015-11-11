
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <?php if ($this->Session->check('Auth.User')): ?>
                <ul class="list-group">

                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Shipment') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit Shipment'), array('action' => 'edit', $shipment['Shipment']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Shipment'), array('action' => 'delete', $shipment['Shipment']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $shipment['Shipment']['id'])); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Shipments'), array('action' => 'index'), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Shipment'), array('action' => 'add'), array('class' => '')); ?></li>
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
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Products') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index'), array('class' => '')); ?></li> 
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add'), array('class' => '')); ?></li> 
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
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Shipments'), array('action' => 'index')); ?></li>
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Harbors'), array('controller' => 'harbors', 'action' => 'index'), array('class' => '')); ?></li> 
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index'), array('class' => '')); ?></li> 
                    <li class="list-group-item"><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index'), array('class' => '')); ?></li> 
                </ul>
            <?php endif ?>


        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="shipments view">

            <h2><?php echo __('Shipment'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>                        
                        <tr>		
                            <td><strong><?php echo __('Harbor'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($shipment['Harbor']['name'], array('controller' => 'harbors', 'action' => 'view', $shipment['Harbor']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Start Date'); ?></strong></td>
                            <td>
                                <?php echo h($shipment['Shipment']['start_date']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($shipment['Shipment']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Start Location'); ?></strong></td>
                            <td>
                                <?php echo h($shipment['Shipment']['start_location']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Product'); ?></strong></td>

                            <td><?php
                                foreach ($shipment['Product'] as $product) {
                                    //echo h($product['name']) . ' '; 
                                    echo $this->Html->tag('span', $product['name'] . ' ', array('class' => 'label label-info')) . " &nbsp;";
                                }
                                ?>
                                &nbsp;</td> 
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('truc'); ?></strong></td>
                            <td>
                                <?php echo h($category['Category']['name']); ?>
                                &nbsp;
                            </td>
                        </tr> 
                        <tr>		
                            <td><strong><?php echo __('Type'); ?></strong></td>
                            <td>
                                <?php echo h($shipment['Subcategory']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>                        
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Messages'); ?></h3>

            <?php if (!empty($shipment['Message'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Title'); ?></th>
                                <th><?php echo __('Content'); ?></th>
                                <th><?php echo __('Name'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($shipment['Message'] as $message):
                                ?>
                                <tr>
                                    <td><?php echo $message['title']; ?></td>
                                    <td><?php echo $message['content']; ?></td>
                                    <td><?php echo $message['name']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'messages', 'action' => 'view', $message['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'messages', 'action' => 'edit', $message['id']), array('class' => 'btn btn-default btn-xs')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'messages', 'action' => 'delete', $message['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $message['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Message'), array('controller' => 'messages', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


        <div class="related">

            <h3><?php echo __('Related Products'); ?></h3>

<?php if (!empty($shipment['Product'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Name'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($shipment['Product'] as $product):
                                ?>
                                <tr>
                                    <td><?php echo $product['name']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id']), array('class' => 'btn btn-default btn-xs')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $product['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Product'), array('controller' => 'products', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
