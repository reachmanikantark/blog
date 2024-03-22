<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Post> $posts
 */
?>
<div class="posts index content">
    <h2><?= __('Welcome to My Blog') ?></h2>
   
    <?php foreach ($posts as $post): ?>
        <div class="row bloglist">
        <div class="column post">
            <h3><?= $this->Html->link(h($post->title),['action' => 'view', $post->id]); ?></h3>
            <p><? //= $post->content;?></p>
            <div class="post-content">
                <?php echo $this->Text->truncate($post->content, 150, ['ellipsis' => '...']); ?>
            </div>
        </div>
        <div class="column column-20">
        <?= isset($post->imgpath) && $post->imgpath!=''?$this->Html->image("/". $post->imgpath, ['alt' => $post->title,'width'=>'150px']):''; ?>
        </div>
        </div>
        <?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
