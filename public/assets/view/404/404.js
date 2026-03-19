$(function () {
    $('.bw-notfound-card').addClass('is-ready');

    $(document).on('click', '[data-go-back]', function () {
        if (document.referrer && window.history.length > 1) {
            window.history.back();
            return;
        }

        window.location.href = $('body').data('home-url');
    });
});
