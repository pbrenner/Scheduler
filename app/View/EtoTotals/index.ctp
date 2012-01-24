<div class="etoTotals index">
	<h2><?php echo __('Eto Totals');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('provider_id');?></th>
			<th><?php echo $this->Paginator->sort('eot_amount_earned');?></th>
			<th><?php echo $this->Paginator->sort('date_earned');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('modified)by');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($etoTotals as $etoTotal): ?>
	<tr>
		<td><?php echo h($etoTotal['EtoTotal']['id']); ?>&nbsp;</td>
		<td><?php echo h($etoTotal['EtoTotal']['provider_id']); ?>&nbsp;</td>
		<td><?php echo h($etoTotal['EtoTotal']['eot_amount_earned']); ?>&nbsp;</td>
		<td><?php echo h($etoTotal['EtoTotal']['date_earned']); ?>&nbsp;</td>
		<td><?php echo h($etoTotal['EtoTotal']['created']); ?>&nbsp;</td>
		<td><?php echo h($etoTotal['EtoTotal']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($etoTotal['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $etoTotal['CreatedBy']['id'])); ?>
		</td>
		<td><?php echo h($etoTotal['EtoTotal']['modified)by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $etoTotal['EtoTotal']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $etoTotal['EtoTotal']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $etoTotal['EtoTotal']['id']), null, __('Are you sure you want to delete # %s?', $etoTotal['EtoTotal']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Eto Total'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
