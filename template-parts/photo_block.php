<div class="photo-block">
    <a href="<?php the_permalink(); ?>" class="photo-block-link">
        <div class="photo-block-image-wrap">
            <?php the_post_thumbnail('medium'); ?>
            <span class="photo-block-icons">
                <span class="photo-block-icon-info">👁</span>
                <span class="photo-block-icon-zoom js-open-lightbox"
                    data-full="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                    data-ref="<?php echo esc_attr(get_field('reference')); ?>"
                    data-cat="<?php echo esc_html(get_the_term_list(get_the_ID(), 'categorie', '', ', ')); ?>">⛶</span>
            </span>
        </div>
        <span class="photo-block-caption">
            <span class="photo-block-title"><?php the_title(); ?></span>
            <span class="photo-block-category"><?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', '); ?></span>
        </span>

    </a>
</div>