<!-- File: /app/View/Posts/view.ctp -->

<h1 style="font-size:36px"><?php echo h($post['Post']['title']); ?></h1>

<p style="color:grey"><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>