<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="row">
    <div class="column " style="margin-bottom:10px;">
    <?php //echo $this->request->referer() ."______";?>
    <?php echo $this->Html->link(__('Back'), $this->request->referer()) ?>
    </div>
</div>
<div class="row">
    <div class="column">
        <div class="posts view content">
            <h1><?= h($post->title) ?></h1>
            <div class="row">
                <div class="column">
             <?= h($post->modified) ?>
             </div>
             </div>
             <div class="row">
                <div class="column">
                <?= $this->Html->image("/". $post->imgpath, ['alt' => $post->title]); ?>
                </div>
             </div>
             <div class="row" style="margin-top:20px">
                <div class="column">
                <?=nl2br($post->content);?>
                </div>
             </div>
           
        </div>
    </div>
</div>
