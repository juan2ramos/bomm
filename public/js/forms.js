var $labels = $('.required'),
    $bar = $('.Progress-bar span'),
    $barVal = $('.Progress-val'),
    $social = $('#social input[type=checkbox]'),
    $socialInput = $('#social input[type=text]'),
    $inputs = $labels.filter(function () {
        return this.value;
    });

$(function () {
    $socialInput.each(function (i) {
        if ($(this).val()) {
            $(this).show();
            $(this).siblings("em").show();
            $(this).siblings("span").find('input').prop('checked', true);
        }
    });
    progressBar();
});
$labels.on('change', function () {
    $inputs = $labels.filter(function () {
        return this.value;
    });
    progressBar();
});
$social.on('click', function () {
    if ($(this).is(':checked')) {
        $(this).parent().siblings("input").show();
        $(this).parent().siblings("em").show()
    } else {
        $(this).parent().siblings("input").hide()
        $(this).parent().siblings("em").hide()
    }
    progressBar();
});
function progressBar() {
    socialCount = ($('#social input:checked').length > 1) ? 1 : 0;

    widthBar = Math.round(($inputs.size() + socialCount) / ($labels.size() + 1) * 100);
    $bar.css('width', widthBar + '%');
    $barVal.text(widthBar + '%');
}

$('textarea').inputlimiter({
    limit: 700,
    remText: '%n caractere%s restantes.',
    limitText: ''
});