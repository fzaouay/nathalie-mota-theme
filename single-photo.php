<?php get_header(); ?>

<main class="photo-single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <dev class="photo-content">

                <div class="photo-infos">
                    <h1><?php the_title(); ?></h1>
                    <p>RÉFÉRENCE : <?php echo esc_html(get_field('reference')); ?></p>
                    <p>CATÉGORIE : <?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', '); ?></p>
                    <p>FORMAT : <?php echo get_the_term_list(get_the_ID(), 'format', '', ', '); ?></p>
                    <p>TYPE : <?php echo esc_html(get_field('type')); ?></p>
                    <p>ANNÉE : <?php the_time('Y'); ?></p>
                </div>

                    <div class="photo_image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>

            <?php endwhile;
    endif; ?>

</main>
<?php get_footer(); ?>