<div class="text-center">
	<h1>発想支援ツール</h1>
	<p class="">
		RESULTS</p>
</div>	

<!-- 日付指定 -->


<div class="row">
	<!-- 2/2/1/2/1/2/2 -->
	<div class="col-lg-2 col-lg-offset-2">
		<div class="container">
			<?php $url1 = $images['Image']['url1']; ?>
			<img src=<?php echo $url1 ?> alt="..." width="200"  class="img-rounded">
		</div>
	</div>
	<div class="col-lg-2 col-lg-offset-1">
		<div class="container">
			<?php $url2 = $images['Image']['url2']; ?>
			<img src=<?php echo $url2 ?> alt="..." width="200" class="img-rounded">
		</div>
	</div>
	<div class="col-lg-2 col-lg-offset-1" >
		<div class="container">
			<?php $url3 = $images['Image']['url3']; ?>
			<img src=<?php echo $url3 ?> alt="..." width="200"class="img-rounded"　class="img-responsive">
		</div>
	</div>
	<
</div>

<table class="table">
	<tr>
		<th>user</th>
		<th>story</th>
	</tr>
	<?php foreach($images['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['name']?></td>
			<td><?php echo $post['body']?></td>
		</tr>
	<?php endforeach; ?>
</table>