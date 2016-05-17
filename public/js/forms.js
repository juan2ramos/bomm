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
    if(!$('#facebook').val()){
        $('#facebook').siblings(".facebook-p").hide( "slow" );;
    }
    if($('#Proposal input').val() != '6'){
        $('#otherProposal').show();
    }
    disabledCheck();
    progressBar();
});
$('#photoGroup').on('change',function(){
    $('#imageHidden').val($(this).val());
    $( "#imageHidden" ).trigger( "change" );
});
$('#pdfArtist').on('change',function(){
    $( "#pdfNameInput" ).val( "temp" );
    $( "#pdfNameInput" ).trigger( "change" );

});
$labels.on('change', function () {
    $('.Form-errors').hide();
    $inputs = $labels.filter(function () {
        return this.value;
    });
    progressBar();
});
$labels.on('change', function () {
    $('.Form-errors').hide();
    $inputs = $labels.filter(function () {
        return this.value;
    });
    progressBar();
});
$('input, textarea, select').on('change', function () {
    $('.Form-errors').hide();
});
$socialInput.on('change', function () {
    progressBar();
});
$social.on('click', function () {
    if ($(this).is(':checked')) {
        $(this).parent().siblings("input").show( "slow" );
        $(this).parent().siblings("em").show( "slow" );
        $(this).parent().siblings(".facebook-p").show( "slow" );

    } else {
        $(this).parent().siblings("input").hide( "slow" ).val('')
        $(this).parent().siblings("em").hide( "slow" );
        $(this).parent().siblings(".facebook-p").hide( "slow" );
    }
    disabledCheck();
    progressBar();
});
function disabledCheck(){
    var k = 0;
    $('#social input:checked').each(function () {
        k++;
    });
    if (k > 1) {
        $("#social input:checkbox:not(:checked)").attr('disabled','disabled');

    } else {
        $("#social input:checkbox:not(:checked)").removeAttr('disabled','disabled');
    }
}
function progressBar() {
    if($('#proposal select').val() == '6'){
        $('#otherProposal').show( "slow" );
    }else{
        $('#otherProposal').hide( "slow" );
        $('#otherProposal input').val('');
    }
    var k = 0;
    $('#social input:checked').each(function () {

        if ($(this).parent().siblings("input").val()) {
            k++;
        }
    });
    socialCount = (k > 1) ? 1 : 0;



    if($('#short_review_en').length > 0){
        widthBar = Math.round(($inputs.size() + socialCount) / ($labels.size() + 1) * 100);
    }else{
        console.log($labels.size());
        widthBar = Math.round(($inputs.size()) / ($labels.size() ) * 100);
    }

    $bar.css('width', widthBar + '%');
    $barVal.text(widthBar + '%');
}
if($('#short_review').length > 0){
    $('#short_review').inputlimiter({
        limit: 700,
        remText: '%n caractere%s restantes.',
        limitText: ''
    });
}
if($('#short_review_en').length > 0){
    $('#short_review_en').inputlimiter({
        limit: 300,
        remText: '%n caractere%s restantes.',
        limitText: ''
    });
}