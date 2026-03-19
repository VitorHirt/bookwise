$(function () {
    $('.bw-book-card').on('mouseenter', function () {
        $(this).addClass('is-hovered');
    }).on('mouseleave', function () {
        $(this).removeClass('is-hovered');
    });
});
