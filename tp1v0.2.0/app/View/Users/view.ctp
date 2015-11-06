
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">
            
                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Shipment') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit Shipment'), array('controller' => 'harbors','action' => 'edit', $shipment['Shipment']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Shipment'), array('controller' => 'harbors','action' => 'delete', $shipment['Shipment']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $shipment['Shipment']['id'])); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Shipments'), array('controller' => 'harbors','action' => 'index'), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New Shipment'), array('controller' => 'harbors','action' => 'add'), array('class' => '')); ?></li>
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

                <?php if($this->Session->check('Auth.User') && $this->Session->read('Auth.User.role') === 'admin'):?>
                    <div class="dropdown">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Users') ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            <li class="list-group-item"><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?> </li>
                            <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?> </li>
                        </ul>
                    </div>                
                <?php endif ?>

                </ul><!-- /.list-group -->
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="users view">

            <h2><?php  echo __('User'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['id']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Username'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['username']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Password'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['password']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Role'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['role']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['email']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
			<?php echo h($user['User']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
