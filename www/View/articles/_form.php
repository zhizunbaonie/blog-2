<?php
/* @var $article */
?>

<div class="form-area">
<form id="form" method="post" role="form">
<!--    <br class="clear">-->
    <p class="error"><?=$_SESSION['error']; unset($_SESSION['error']);?></p>

    <div class="form-group">
        <label for="title">Title:</label>
        <input id="title" name="title" type="text" class="form-control" value="<?= $article->title; ?>" required>
    </div>

    <div class="form-group">
        <label for="content">Content:</label>
        <textarea id="content" name="content" class="form-control" rows="20" required><?=$article->content ?></textarea>
    </div>

    <button type="submit" id="btnSubmit" name="submit" class="btn btn-primary center-block">Submit</button>
</form>
</div>






