<?php /** @var $users */ ?>
<?php /** @var $comments */ ?>
<?php /** @var $error */ ?>

<div class="blog-main-title">

</div>


<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#panelUsers">Users</a>
    </li>
    <li>
        <a href="#panelComments">Comments</a>
    </li>
</ul>
<br class="clear"/>

<div class="tab-content">
    <div id="panelUsers" class="tab-pane fade in active">
        <ul class="list-unstyled">
            <?php foreach ($users as $user): ?>
                <li>
                    <i class="glyphicon glyphicon-user"></i>
                    <?= $user->username ?>
                </li>
            <? endforeach; ?>
        </ul>
    </div>

    <div id="panelComments" class="tab-pane fade">
        <ul class="list-unstyled">
            <?php foreach ($comments as $comment): ?>
                <li>
                    <a href="/comment/delete?id=<?= $comment->id ?>">
                        <i class="glyphicon glyphicon-remove"></i>
                    </a>
                    <span style="font-weight: bold; color: #4169e0"><?= $comment->author ?>:</span> <?= $comment->text ?>
                    <span style="font-style: italic; color: #7585a0">[<?= $comment->title ?>]</span>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
</div>

<script src="/View/_assets/js/tabs.js"></script>