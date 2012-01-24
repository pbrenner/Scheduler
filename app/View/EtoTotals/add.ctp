<div class="etoTotals form">
<?php echo $this->Form->create('EtoTotal');?>
	<fieldset>
		<legend><?php echo __('Add Eto Total'); ?></legend>
	<?php
		echo $this->Form->input('provider_id');
		echo $this->Form->input('eot_amount_earned');
		echo $this->Form->input('date_earned');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified)by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Eto Totals'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
