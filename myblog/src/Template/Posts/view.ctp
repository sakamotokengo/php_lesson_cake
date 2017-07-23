<?php
$this -> assign('title', 'Blog Detail');
?>
<h1>
    <?= $this -> Html -> link('Back', ['action' =>'index'], ['class' => ['pull-right', 'fs12']]); ?>
    <?= h($post -> title); ?>
</h1>

<p>
    <?= nl2br(h($post -> body)); ?>
</p>
<?php if (count($post -> comments)): ?>
<h2>Comment<span class="fs12">(<?= count($post -> comments);?>)</span></h2>
<ul>
    <?php foreach ($post -> comments as $comment) : ?>
        <li>
            <?= h($comment->body);?>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
<h2>New Comment</h2>
<?= $this->Form->create(null, [
  'url' => ['controller'=>'Comments', 'action'=>'add']
]); ?>
<?= $this->Form->input('body', ['required' => true]) ?>
<?= $this->Form->hidden('post_id', ['value'=>$post->id]); ?>
<?= $this->Form->button('Add'); ?>
<?= $this->Form->end(); ?>
