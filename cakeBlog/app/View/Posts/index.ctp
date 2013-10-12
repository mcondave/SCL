<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); ?>
<br />
<?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'add')); ?>
<table>
    <tr>
        <!-- <th>Id</th> -->
        <th>Title</th>
        <th></th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php if ($current_user['id'] == $post['Post']['user_id'] || $current_user['role'] === 'admin' ): ?>
                <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']),array('confirm' => 'Are you sure?')); ?>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
            <?php endif; ?>
            <?php echo $this->Html->link('Add Comment', array('controller' => 'comments', 'action' => 'add')); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>