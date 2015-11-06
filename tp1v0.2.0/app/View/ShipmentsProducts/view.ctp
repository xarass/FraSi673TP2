
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Shipments Product'), array('action' => 'edit', $shipmentsProduct['ShipmentsProduct']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Shipments Product'), array('action' => 'delete', $shipmentsProduct['ShipmentsProduct']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $shipmentsProduct['ShipmentsProduct']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Shipments Products'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Shipments Product'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Shipments'), array('controller' => 'shipments', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Shipment'), array('controller' => 'shipments', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="shipmentsProducts view">

			<h2><?php  echo __('Shipments Product'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($shipmentsProduct['ShipmentsProduct']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Shipment'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($shipmentsProduct['Shipment']['name'], array('controller' => 'shipments', 'action' => 'view', $shipmentsProduct['Shipment']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Product'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($shipmentsProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $shipmentsProduct['Product']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
