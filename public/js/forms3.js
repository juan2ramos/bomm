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
    required = ($required.val()) ? 1 : 0;

    widthBar = Math.round( (k + required)  / 3 * 100);

    $bar.css('width', widthBar + '%');
    $barVal.text(widthBar + '%');
}