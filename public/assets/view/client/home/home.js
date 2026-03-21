$(function () {
    const modalElement = document.getElementById('bwBookDetailModal');
    const bookModal = modalElement ? bootstrap.Modal.getOrCreateInstance(modalElement) : null;
    let activeCard = null;

    function fillModal(trigger) {
        const stats = JSON.parse(trigger.getAttribute('data-book-stats') || '[]');
        const cover = trigger.getAttribute('data-book-cover') || '';
        const title = trigger.getAttribute('data-book-title') || '';
        const author = trigger.getAttribute('data-book-author') || '';
        const authorAge = trigger.getAttribute('data-book-author-age') || '';
        const authorBio = trigger.getAttribute('data-book-author-bio') || '';
        const description = trigger.getAttribute('data-book-description') || '';

        $('#bwBookModalCover').attr({
            src: cover,
            alt: title
        });
        $('#bwBookDetailModalLabel').text(title);
        $('#bwBookModalAuthor').text(author);
        $('#bwBookModalAuthorName').text(author);
        $('#bwBookModalAuthorAge').text(authorAge);
        $('#bwBookModalAuthorBio').text(authorBio);
        $('#bwBookModalDescription').text(description);

        const statsMarkup = stats.map(function (stat) {
            return [
                '<div class="bw-book-modal-stat">',
                '<i class="bi ' + stat.icon + '"></i>',
                '<span>' + stat.label + '</span>',
                '</div>'
            ].join('');
        }).join('');

        $('#bwBookModalStats').html(statsMarkup);
    }

    $('.bw-book-card').on('mouseenter', function () {
        $(this).addClass('is-hovered');
    }).on('mouseleave', function () {
        $(this).removeClass('is-hovered');
    }).on('click', function (e) {
        if ($(e.target).closest('.bw-fav-btn').length || !bookModal) {
            return;
        }

        activeCard = this;
        fillModal(this);
        $(this).removeClass('is-hovered');
        this.blur();
        bookModal.show();
    }).on('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $(this).trigger('click');
        }
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

        this.blur();
    });

    if (modalElement) {
        modalElement.addEventListener('hidden.bs.modal', function () {
            if (activeCard) {
                $(activeCard).removeClass('is-hovered');
                activeCard.blur();
            }

            activeCard = null;

            if (document.activeElement instanceof HTMLElement) {
                document.activeElement.blur();
            }
        });
    }
});
