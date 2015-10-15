/**
 * Created by KRINNO on 19.09.2015.
 */

$(document).ready(function()
{
    //$('#commentsSlider').hide();
    var charactersLeft = $('#characterLeft');
    charactersLeft.text('140 characters left');

    $('#text').keyup(function()
    {
        var max = 140;
        var text = $(this).val();
        var len = text.length;

        if (len >= max) {
            charactersLeft.text('You have reached the limit!');
            $('#btnSubmit').prop('disabled', true);
            charactersLeft.addClass('error');
        }
        else {
            var ch = max - len;
            charactersLeft.text(ch + ' characters left.');
            $('#btnSubmit').prop('disabled', false);
            charactersLeft.removeClass('error');
        }
    });

    $('#commentsToggle').click(function()
    {
        var slider = $('#commentsSlider');
        //console.log(slider);
        if($.trim(slider.html()))
            slider.slideToggle(300);
        //else
    });
});
