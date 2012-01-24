<div class="offices form">
<?php echo $this->Form->create('Office');?>
	<fieldset>
		<legend><?php echo __('Add Office'); ?></legend>
	<?php
		echo $this->Form->input('company_id');
		echo $this->Form->input('name');
		echo $this->Form->input('address_line1');
		echo $this->Form->input('address_line2');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('postal_code');
		echo $this->Form->input('phone');
		echo $this->Form->input('fax');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Offices'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
