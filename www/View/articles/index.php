<?php
/** @var $items */
/** @var $pages */
/** @var $page */
?>

<!-- List of articles -->
<?php foreach ($items as $item): ?>
    <div class="blog-post">
        <a href="/article/one?id=<?= $item->id ?>">
            <h2 class="blog-post-title"><i class="glyphicon glyphicon-align-left"></i> <?=$item->title?></h2>
        </a>
        <p><?=$item->intro?></p>
    </div>
<? endforeach; ?>


<!-- Pagination -->
<nav>
    <ul class="pagination">
    <!--
        <li><a href="#">Previous</a></li>
        <li><a href="#">Next</a></li>
    -->
    <?php for($i = 1; $i <= $pages; $i++) {
        if ($i == $page)
            echo "<li class=\"active\"><a href=''>$i</a></li>";
        else
            echo "<li><a href='/?page=$i'>$i</a></li>";
    } ?>
    </ul>
</nav>