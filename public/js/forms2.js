var $bar = $('.Progress-bar span'),
    $barVal = $('.Progress-val'),
    $videos = $('#Videos textarea'),
    $audios = $('#Audios textarea'),
    $required = $('.required');


$(function () {
    progressBar();
});

$('textarea').on('change', function () {
    progressBar();
});

function progressBar() {
    countVideos = 0;
    countAudios = 0;
    $audios.each(function () {
        if ($(this).val()) {
            countAudios++;
        }
    });
    $videos.each(function () {
        if ($(this).val()) {
            countVideos++;
        }
    });
    videos = (countVideos > 0) ? 1 : 0;
    audios = (countAudios > 0) ? 1 : 0;
    required = ($required.val()) ? 1 : 0;

    widthBar = Math.round( ( videos + audios + required)  / 3 * 100);

    $bar.css('width', widthBar + '%');
    $barVal.text(widthBar + '%');
}
if ($('#producer').length > 0) {
    $('#producer').inputlimiter({
        limit: 500,
        remText: '%n caractere%s restantes.',
        limitText: ''
    });
}