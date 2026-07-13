document.addEventListener('DOMContentLoaded', function () {

    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxRef = document.getElementById('lightbox-ref');
    const lightboxCat = document.getElementById('lightbox-cat');
    const closeBtn = document.getElementById('lightbox-close');
    const overlay = document.querySelector('.lightbox-overlay');

    function openLightbox(zoomIcon) {
        const fullUrl = zoomIcon.getAttribute('data-full');
        const ref = zoomIcon.getAttribute('data-ref');
        const cat = zoomIcon.getAttribute('data-cat');

        lightboxImage.src = fullUrl;
        lightboxRef.textContent = 'RÉFÉRENCE : ' + ref;
        lightboxCat.innerHTML = cat;

        lightbox.classList.add('is-open');
    }

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('js-open-lightbox')) {
            e.preventDefault();
            e.stopPropagation();
            openLightbox(e.target);
        }
    });

    closeBtn.addEventListener('click', function () {
        lightbox.classList.remove('is-open');
    });

    overlay.addEventListener('click', function () {
        lightbox.classList.remove('is-open');
    });

});