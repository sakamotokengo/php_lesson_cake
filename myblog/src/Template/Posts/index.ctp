<?php
    $this -> assign('title', 'Blog Posts');
 ?>
<h1>
    <?= $this -> Html -> link('Add New', ['action' =>'add'], ['class' => ['pull-right', 'fs12']]); ?>
    Blog Posts
</h1>

<ul>
    <?php foreach($posts as $post) : ?>
        <li>
            <?= $this -> Html -> link($post -> title, ['action' =>'view', $post -> id]); ?>
        </li>
    <?php endforeach; ?>
</ul>
