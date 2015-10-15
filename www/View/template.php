<?php
/** @var $title */
/** @var $content */
?>

<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Custom -->
    <link rel="stylesheet" href="/View/_assets/style.css">
    <link rel="shortcut icon" href="/View/_assets/favicon.ico">
</head>

<body>
    <!-- Header-->
    <div class="blog-masthead">
        <div class="container">
            <nav class="blog-nav">
                <a class="blog-nav-item" href="/">Home</a>
                <a class="blog-nav-item" href="/about">About</a>
                <!-- IF USER -->
                <a class="blog-nav-item" href="/editor">Editor</a>
                <!-- IF ADMIN -->
                <a class="blog-nav-item" href="/admin">Admin Panel</a>
            </nav>
        </div>
    </div>
    <!-- /Header-->


    <div class="row">
        <div class="col-xs-2">
            <div class="blog-header">
                <span class="blog-title">My demo PHP blog</span>
                <p class="lead blog-description">Articles about %theme%</p>
            </div>
        </div>
<!--        <div class="col-xs-6">
            <div class="blog-header text-center">
                <h1 class="blog-main-title">All articles <i class="glyphicon glyphicon-list-alt"></i></h1>
            </div>
        </div>-->
    </div>

    <!-- Container -->
    <div class="container">
        <div class="row"> <!-- .row -->
            <!-- Content -->
            <div class="col-xs-8 blog-main">
                <?=$content?>
            </div>
            <!-- /Content -->

            <!-- Slide-bar -->
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <div class="sidebar-module sidebar-module-inset">
                    <h4>Our partners</h4>
                    <p>Some advertising modules will be here.</p>
                    <!-- <img src="/View/_assets/images/ad-banner.jpg" alt="advertising"/>-->
                </div>
                <div class="sidebar-module">
                    <h4>Join us:</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>
            <!-- /Slide-bar -->

        </div> <!-- /.row -->
    </div>
    <!-- /Container -->


    <!-- Footer -->
    <footer class="blog-footer">
            <p>&copy; Simple blog by <a href="https://github.com/Krinnerion" target="_blank">Karina Tsymbal</a>.</p>
            <p>Built with <a href="http://getbootstrap.com">Bootstrap.</a></p>
    </footer>
    <!-- /Footer -->

<!-- Placed at the end of the document so the pages load faster -->
    <script src="/View/_assets/js/caret.js"></script>
</body>
</html>