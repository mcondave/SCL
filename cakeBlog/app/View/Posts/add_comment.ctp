<!-- File: /app/View/Posts/add_comment.ctp -->

<h1>Add A Comment</h1>
<?php
	echo $this->Form->create('Comment');
	echo $this->Form->input('body', array('rows' => '2'));
	echo $this->Form->end('Post comment');
?>