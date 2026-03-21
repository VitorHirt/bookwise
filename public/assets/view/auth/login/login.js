$(function () {
    $(document).on('click', '[data-password-toggle]', function () {
        const $button = $(this);
        const target = $button.data('password-target');
        const $input = $(target);
        const isPassword = $input.attr('type') === 'password';

        $input.attr('type', isPassword ? 'text' : 'password');
        $button
            .attr('aria-label', isPassword ? 'Ocultar senha' : 'Mostrar senha')
            .find('i')
            .toggleClass('bi-eye bi-eye-slash');
    });

    $(document).on('click', '[data-auth-toggle]', function () {
        const mode = $(this).data('auth-toggle');
        const $panel = $('[data-auth-panel]').closest('.bw-auth-panel');

        $panel.toggleClass('is-signup', mode === 'signup');
    });

    $(document).on('submit', '[data-auth-form]', function (e) {
        e.preventDefault();
    });
});
