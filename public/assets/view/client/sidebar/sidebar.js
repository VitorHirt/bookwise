$(function () {
    $(document).on('click', '[data-notification-dismiss]', function () {
        $(this).closest('.bw-notification-card').addClass('is-read');
    });

    $(document).on('click', '[data-notification-clear]', function () {
        $('.bw-notification-card').addClass('is-read');
    });

    $(document).on('click', '[data-flyout-trigger], [data-profile-trigger]', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const $flyout = $(this).closest('[data-flyout-card]');
        $('[data-flyout-card]').not($flyout).removeClass('is-open');
        $flyout.addClass('is-open');
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('[data-flyout-card]').length) {
            $('[data-flyout-card]').removeClass('is-open');
        }
    });
});
