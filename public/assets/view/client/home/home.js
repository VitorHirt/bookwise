$(function () {
    $('.bw-book-card').on('mouseenter', function () {
        $(this).addClass('is-hovered');
    }).on('mouseleave', function () {
        $(this).removeClass('is-hovered');
    });

    $(document).on('click', '.bw-fav-btn', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const $button = $(this);
        const $icon = $button.find('i');

        $button.toggleClass('active');

        if ($button.hasClass('active')) {
            $icon.removeClass('bi-heart').addClass('bi-heart-fill');
        } else {
            $icon.removeClass('bi-heart-fill').addClass('bi-heart');
        }
    });
});