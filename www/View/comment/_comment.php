<?php
    /* @var $author */
    /* @var $text */
?>

<!--<div class="container">-->
<!--<div class="col-xs-8">-->
<div class="form-area">
<form id="comment" method="post" role="form">
    <br class="clear">
    <h3 style="margin-bottom: 25px; text-align: center;">Enter your comment:</h3>

<div class="form-group">
    <input id="author" name="author" type="text" class="form-control" placeholder="Name" required>
</div>

<div class="form-group">
    <textarea id="text" name="text" class="form-control" placeholder="Message" maxlength="140" rows="8" required></textarea>
    <span class="help-block" id="characterLeft">You have reached the limit!</span>
</div>

    <button type="submit" id="btnSubmit" name="submit" class="btn btn-primary center-block">Submit</button>
</form>
</div>
<!--</div>-->
<!--</div>-->
<script src="/View/_assets/js/comment.js"></script>