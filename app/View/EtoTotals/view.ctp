<div class="etoTotals view">
<h2><?php  echo __('Eto Total');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($etoTotal['EtoTotal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provider Id'); ?></dt>
		<dd>
			<?php echo h($etoTotal['EtoTotal']['provider_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eot Amount Earned'); ?></dt>
		<dd>
			<?php echo h($etoTotal['EtoTotal']['eot_amount_earned']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Earned'); ?></dt>
		<dd>
			<?php echo h($etoTotal['EtoTotal']['date_earned']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($etoTotal['EtoTotal']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($etoTotal['EtoTotal']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo $this->Html->link($etoTotal['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $etoTotal['CreatedBy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified)by'); ?></dt>
		<dd>
			<?php echo h($etoTotal['EtoTotal']['modified)by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Eto Total'), array('action' => 'edit', $etoTotal['EtoTotal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Eto Total'), array('action' => 'delete', $etoTotal['EtoTotal']['id']), null, __('Are you sure you want to delete # %s?', $etoTotal['EtoTotal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Eto Totals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Eto Total'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
