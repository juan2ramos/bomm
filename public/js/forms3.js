var $bar = $('.Progress-bar span'),
    $barVal = $('.Progress-val'),
    $required = $('.required');


$(function () {
    progressBar();

});

$('input , select').on('change', function () {
    progressBar();
});
function progressBar() {

    var k = 0;
    $('input:checked').each(function () {
        k++;
    });

    widthBar = Math.round( k  / 2 * 100);

    $bar.css('width', widthBar + '%');
    $barVal.text(widthBar + '%');
}

$('input, textarea, select').on('change', function () {
    $('.Form-errors').hide();

});