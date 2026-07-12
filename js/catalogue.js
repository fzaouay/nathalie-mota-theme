document.addEventListener('DOMContentLoaded', function () {

    const catalogueList = document.getElementById('catalogue-list');
    const filterCategorie = document.getElementById('filter-categorie');
    const filterFormat = document.getElementById('filter-format');
    const filterOrder = document.getElementById('filter-order');
    const loadMoreBtn = document.getElementById('load-more');

    let currentPage = 1;

    function buildUrl(page) {
        const categorie = filterCategorie.value;
        const format = filterFormat.value;
        const order = filterOrder.value;

        let url = '/wp-json/wp/v2/photo?per_page=8&page=' + page + '&orderby=date&order=' + order + '&_embed=true';

        if (categorie) {
            url += '&categorie=' + categorie;
        }
        if (format) {
            url += '&format=' + format;
        }

        return url;
    }

    function loadPhotos(reset) {
        if (reset) {
            currentPage = 1;
            catalogueList.innerHTML = '';
        }

        const url = buildUrl(currentPage);

        fetch(url)
            .then(response => response.json())
            .then(photos => {
                photos.forEach(photo => {
                    catalogueList.innerHTML += buildPhotoBlock(photo);
                });
            });
    }

    function buildPhotoBlock(photo) {
        return `
            <div class="photo-block">
                <a href="${photo.link}" class="photo-block-link">
                    <img src="${photo._embedded['wp:featuredmedia'][0].source_url}" alt="${photo.title.rendered}">
                    <span class="photo-block-icons">
                        <span class="photo-block-icon-info">👁</span>
                        <span class="photo-block-icon-zoom">⛶</span>
                    </span>
                    <span class="photo-block-caption">
                        <span class="photo-block-title">${photo.title.rendered}</span>
                    </span>
                </a>
            </div>
        `;
    }

    filterCategorie.addEventListener('change', function () {
        loadPhotos(true);
    });
    filterFormat.addEventListener('change', function () {
        loadPhotos(true);
    });
    filterOrder.addEventListener('change', function () {
        loadPhotos(true);
    });

    loadMoreBtn.addEventListener('click', function () {
        currentPage++;
        loadPhotos(false);
    });

});