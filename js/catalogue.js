document.addEventListener('DOMContentLoaded', function () {

    const catalogueList = document.getElementById('catalogue-list');
    const filterCategorie = document.getElementById('filter-categorie');
    const filterFormat = document.getElementById('filter-format');
    const filterOrder = document.getElementById('filter-order');

    function loadPhotos() {
        const categorie = filterCategorie.value;
        const format = filterFormat.value;
        const order = filterOrder.value;

        let url = '/wp-json/wp/v2/photo?&per_page=8&orderby=date&order=' + order + '&_embed=true';

        if (categorie) {
            url += '&categorie=' + categorie;
        }
        if (format) {
            url += '&format=' + format;
        }

        fetch(url)
            .then(response => response.json())
            .then(photos => {
                catalogueList.innerHTML = '';

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

    filterCategorie.addEventListener('change', loadPhotos);
    filterFormat.addEventListener('change', loadPhotos);
    filterOrder.addEventListener('change', loadPhotos);
});