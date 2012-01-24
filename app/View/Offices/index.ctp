<div class="offices index">
	<h2><?php echo __('Offices');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('company_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('address_line1');?></th>
			<th><?php echo $this->Paginator->sort('address_line2');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('state');?></th>
			<th><?php echo $this->Paginator->sort('postal_code');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('fax');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($offices as $office): ?>
	<tr>
		<td><?php echo h($office['Office']['id']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['company_id']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['name']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['address_line1']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['address_line2']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['city']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['state']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['postal_code']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['phone']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['fax']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['created']); ?>&nbsp;</td>
		<td><?php echo h($office['Office']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($office['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $office['CreatedBy']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($office['ModifiedBy']['id'], array('controller' => 'users', 'action' => 'view', $office['ModifiedBy']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $office['Office']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $office['Office']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $office['Office']['id']), null, __('Are you sure you want to delete # %s?', $office['Office']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Office'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
