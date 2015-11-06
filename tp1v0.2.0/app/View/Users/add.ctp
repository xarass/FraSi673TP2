
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <ul class="list-group">

                <li class="list-group-item"> <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li>

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

                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Messages') ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        <li class="list-group-item"><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index'), array('class' => '')); ?></li> 
                        <li class="list-group-item"><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add'), array('class' => '')); ?></li> 
                    </ul>
                </div>


            </ul><!-- /.list-group -->


        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Add User'); ?></h2>

        <div class="users form">

            <?php echo $this->Form->create('User', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('password_confirm', array('class' => 'form-control', 'type' => 'password')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'super-user' => 'User'))); ?>
                </div><!-- .form-group -->                
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->