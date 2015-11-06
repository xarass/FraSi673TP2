
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <?php if ($this->Session->check('Auth.User')): ?>
                <ul class="list-group">

                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Messages') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit Message'), array('action' => 'edit', $message['Message']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Message'), array('action' => 'delete', $message['Message']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $message['Message']['id'])); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Messages'), array('action' => 'index'), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Message'), array('action' => 'add'), array('class' => '')); ?></li>
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
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Products') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index'), array('class' => '')); ?></li> 
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add'), array('class' => '')); ?></li> 
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

        <div class="messages view">

            <h2><?php echo __('Message'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Shipment'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($message['Shipment']['name'], array('controller' => 'shipments', 'action' => 'view', $message['Shipment']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Title'); ?></strong></td>
                            <td>
                                <?php echo h($message['Message']['title']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Content'); ?></strong></td>
                            <td>
                                <?php echo h($message['Message']['content']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($message['Message']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
