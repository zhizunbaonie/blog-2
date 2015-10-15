<?php
/** @var $item */
/** @var $comments */
?>

<h2 class="blog-post-title"><?=$item->title?></h2>
<p class="blog-post"><?=$item->content?></p>

<hr/><span id="commentsToggle">&#8594; Click me to hide/show comments &#8592;</span><hr/>
<div id="commentsSlider">
    <?php foreach($comments as $comment): ?>
        <p>
            <span class="author"><?=$comment->author?>:</span> <?=$comment->text?>
        </p>
        <hr/>
    <?php endforeach; ?>
</div>

<p class="error"><?=$_SESSION['error']; unset($_SESSION['error']);?></p>

<a id="comment"></a>
<?php include_once dirname(__DIR__) . '/comment/_comment.php'; ?>