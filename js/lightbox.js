document.addEventListener('DOMContentLoaded', function () {

    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxRef = document.getElementById('lightbox-ref');
    const lightboxCat = document.getElementById('lightbox-cat');
    const closeBtn = document.getElementById('lightbox-close');
    const overlay = document.querySelector('.lightbox-overlay');
    const prevBtn = document.getElementById('lightbox-prev');
    const nextBtn = document.getElementById('lightbox-next');

    let currentIndex = 0;

    function getZoomIcons() {
        return document.querySelectorAll('.js-open-lightbox');
    }

    function showPhoto(zoomIcon) {
        const fullUrl = zoomIcon.getAttribute('data-full');
        const ref = zoomIcon.getAttribute('data-ref');
        const cat = zoomIcon.getAttribute('data-cat');

        lightboxImage.src = fullUrl;
        lightboxRef.textContent = 'RÉFÉRENCE : ' + ref;
        lightboxCat.innerHTML = cat;
    }

    function openLightbox(zoomIcon) {
        const icons = getZoomIcons();
        currentIndex = Array.from(icons).indexOf(zoomIcon);

        showPhoto(zoomIcon);
        lightbox.classList.add('is-open');
    }

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('js-open-lightbox')) {
            e.preventDefault();
            e.stopPropagation();
            openLightbox(e.target);
        }
    });

    prevBtn.addEventListener('click', function () {
        const icons = getZoomIcons();
        currentIndex = (currentIndex - 1 + icons.length) % icons.length;
        showPhoto(icons[currentIndex]);
    });

    nextBtn.addEventListener('click', function () {
        const icons = getZoomIcons();
        currentIndex = (currentIndex + 1) % icons.length;
        showPhoto(icons[currentIndex]);
    });

    closeBtn.addEventListener('click', function () {
        lightbox.classList.remove('is-open');
    });

    overlay.addEventListener('click', function () {
        lightbox.classList.remove('is-open');
    });

});