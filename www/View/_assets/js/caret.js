$(document).ready(function(){
    var link = window.location.pathname;
    $('a[href="'+link+'"]').addClass('active');
});
