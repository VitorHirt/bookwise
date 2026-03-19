$(function () {
    $(document).on('click', '[data-notification-dismiss]', function () {
        $(this).closest('.bw-notification-card').addClass('is-read');
    });

    $(document).on('click', '[data-notification-clear]', function () {
        $('.bw-notification-card').addClass('is-read');
    });

    $(document).on('click', '[data-profile-trigger]', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const $profile = $(this).closest('[data-profile-card]');
        $('[data-profile-card]').not($profile).removeClass('is-open');
        $profile.toggleClass('is-open');
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('[data-profile-card]').length) {
            $('[data-profile-card]').removeClass('is-open');
        }
    });
});
