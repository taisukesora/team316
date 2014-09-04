<h1>Chat title</h1>
<table>
<tr>
	<th>Id</th>
	<th>Commenter</th>
	<th>Body</th>
	<th>Action</th>
	<th>Created</th>
</tr>

<?php foreach ($chats as $chat): ?>
	<tr>
		<td><?php echo $chat['Chat']['id']; ?></td>
		<td><?php echo $chat['Chat']['commenter']; ?></td>
		<td><?php echo $chat['Chat']['body']; ?></td>
		<td>
		<?php echo $this->Html->link('Edit', array('action' => 'edit', $chat['Chat']['id'])); ?>
		<?php echo $this->Form->postLink('Delete', array('action' => 'edit', $chat['Chat']['id']), array('confirm' => 'Are you sure?')); ?>

		</td>
		<td><?php echo $chat['Chat']['created']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($chat); ?>
</table>

<h1>Add post</h1>
<?php
echo $this->Form->create('Chat');
echo $this->Form->input('commenter');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save post');
?>