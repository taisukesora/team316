<h1>Edit post </h1>

<?php
echo $this->Form->create('Chat');
echo $this->Form->input('commenter');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>