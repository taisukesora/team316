<h1>Users </h1>
<table>
<tr>
	<th>Id</th>
	<th>Username</th>
	<th>Password</th>
	<th>Role</th>
	<th>Created</th>
	<th class="actions">Actions</th>
</tr>

<?php foreach($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?></td>
		<td><?php echo h($user['User']['username']); ?></td>
		<td><?php echo h($user['User']['password']); ?></td>
		<td><?php echo h($user['User']['role']); ?></td>
		<td><?php echo h($user['User']['created']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<div class="actions">
<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	</ul>
	
<?php
	echo ($this->element('sql_dump'));
?>
	




