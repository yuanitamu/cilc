var target_id = "valTransport";
$('#' + target_id + ' option').each(function () {
    var ind = $(this).index();
    $('#' + target_id + '-menu').find('[data-option-index=' + ind + ']').addClass($(this).attr('icon'));
});
var last_style;
$('#' + target_id).on('change', function () {
    var selection = $(this).find(':selected').attr('icon');
    if (last_style) {
        $(this).closest('.ui-select').find('.ui-btn').removeClass(last_style);
    }
    $(this).closest('.ui-select').find('.ui-btn').addClass(selection);
    last_style = selection;
});