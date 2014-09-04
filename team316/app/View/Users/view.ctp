<h1>User view</h1>
<table>
	<tr>
		<th>Id</th>
		<th>Username</th>
		<th>Password</th>
		<th>Role</th>
		<th>Created</th>
		<th>url</th>
		<th>Hobby</th>
	</tr>

	<tr>
		<td><?php echo h($user['User']['id']); ?></td>
		<td><?php echo h($user['User']['username']); ?></td>
		<td><?php echo h($user['User']['password']); ?></td>
		<td><?php echo h($user['User']['role']); ?></td>
		<td><?php echo h($user['User']['created']); ?></td>
		<td><?php echo h($user['Profile']['blog_url']); ?></td>
		<td><?php echo h($user['Profile']['hobby']); ?></td>
	</tr>
</table>