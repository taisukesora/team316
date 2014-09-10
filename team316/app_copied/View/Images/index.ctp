<div class="text-center">
	<h1>発想支援ツール</h1>
	<p class="">発想は常にインプットから生まれる。<br>無限のインプットを経て初めて至高のアイデアが発生するのです。<br>以下の3つの画像を上手くつなぎあわせて、ストーリーを作ってください</p>
</div>	

<!--<script>Onload()</script>-->

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

<div class="text-center">
<?php echo $this->Html->link('投稿する', array('controller' => 'posts', 'action' => 'add', $images['Image']['id'])); ?>
</div>

<?php echo $this->Html->script('script'); ?>