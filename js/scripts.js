document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('contact-modal');
    const openLinks = document.querySelectorAll('.js-open-contact');
    const closeBtn = document.getElementById('contact-modal-close');
    const overlay = document.querySelector('.contact-modal-overlay');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenuClose = document.getElementById('mobile-menu-close');

    mobileMenuToggle.addEventListener('click', function () {
        mobileMenu.classList.add('is-open');
    });

    mobileMenuClose.addEventListener('click', function () {
        mobileMenu.classList.remove('is-open');
    });

    openLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.add('is-open');

            const ref = link.getAttribute('data-ref');
            if (ref) {
                jQuery('#ref-photo').val(ref);
            }
        });
    });

    closeBtn.addEventListener('click', function () {
        modal.classList.remove('is-open');
    });

    overlay.addEventListener('click', function () {
        modal.classList.remove('is-open');
    });
});