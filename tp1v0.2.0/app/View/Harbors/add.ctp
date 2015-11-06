
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <?php  if($this->Session->check('Auth.User')): ?>
            <ul class="list-group">

                <li class="list-group-item"><?php echo $this->Html->link(__('List Harbors'), array('action' => 'index')); ?></li>

                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Shipment') ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Shipments'), array('controller' => 'shipments', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Shipment'), array('controller' => 'shipments', 'action' => 'add'), array('class' => '')); ?></li> 
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

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Add Harbor'); ?></h2>

        <div class="harbors form">

			<?php echo $this->Form->create('Harbor', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
						<?php echo $this->Form->input('location', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

			<?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->