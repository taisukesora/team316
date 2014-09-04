<?php $this->Html->link('new task', '/Tasks/create');?>
<h3><?php echo count($tasks_data);?>件のタスクが未完了です。</h3>


<table>
	<tr>
		<th>ID</th>
		<th>名前</th>
		<th>期限日</th>
		<th>作成日</th>
		<th>操作</th>
	</tr>

	<?php foreach ($tasks_data as $row): ?>
		<?php echo $this->element('task', array('task' =>$row))?>
	<?php endforeach; ?>
</table>
