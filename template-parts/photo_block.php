<div class="photo-block">
    <a href="<?php the_permalink(); ?>" class="photo-block-link">
        <?php the_post_thumbnail('medium'); ?>

        <span class="photo-block-icons">
            <span class="photo-block-icon-info">👁</span>
            <span class="photo-block-icon-zoom">⛶</span>
        </span>

        <span class="photo-block-caption">
            <span class="photo-block-title"><?php the_title(); ?></span>
            <span class="photo-block-category"><?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', '); ?></span>
        </span>

    </a>
</div>