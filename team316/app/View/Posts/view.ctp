<!-- File: app/View/Posts/view.ctp -->

<?php $this->set('title_for_layout', '一覧'); ?>

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

<h2>Comments</h2>
<ul>
<?php foreach ($post['Comment'] as $comment): ?>
<li>
	<?php 
	echo h($comment['body']) ?> by <?php echo h($comment['commenter']); ?>
</li>
<?php endforeach?>
</ul>


<h2>Add Comment</h2>

<?php
echo $this->Form->create('Comment', array('action' => 'add'));
echo $this->Form->input('commenter');
echo $this->Form->input('body', array('rows'=>3));
echo $this->Form->input('Comment.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));
echo $this->Form->end('post comment');	