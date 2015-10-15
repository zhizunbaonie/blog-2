<h2 class="blog-post-title">Edit the article &#8595;</h2>

<a href="/article/delete?id=<?= $article->id ?>">
    <button id="del" type="submit" class="btn btn-danger button">
        <i class="glyphicon glyphicon-plus"></i>&nbsp;Delete this article
    </button>
</a>

<p><strong>...or update it:</strong></p>
<?php include_once dirname(__DIR__) . '/articles/_form.php'; ?>
