<?php
/** @var $items */
?>

<h2 class="blog-post-title">Welcome to the articles Editor!</h2>
<hr/>

<a href="/article/add">
    <button id="add" type="submit" class="btn btn-success button" title="redirect to /article/add">
        <i class="glyphicon glyphicon-plus"></i>&nbsp;Create a new article
    </button>
</a>

<br class="clear"/>
<div class="blog-post">
<p><strong>...or select the article that you want to edit:</strong></p>
    <ul class="articles-list">
    <?php foreach ($items as $item): ?>
        <li>
            <a href="/article/edit?id=<?= $item->id ?>">
                <i class="glyphicon glyphicon-pencil"></i>&nbsp;<?=$item->title?>
            </a>
        </li>
    <? endforeach; ?>
    </ul>
</div>