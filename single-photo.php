<?php get_header(); ?>

<main class="photo-single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="photo-content">

                <div class="photo-infos">
                    <h1><?php the_title(); ?></h1>
                    <p>RÉFÉRENCE : <?php echo esc_html(get_field('reference')); ?></p>
                    <p>CATÉGORIE : <?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', '); ?></p>
                    <p>FORMAT : <?php echo get_the_term_list(get_the_ID(), 'format', '', ', '); ?></p>
                    <p>TYPE : <?php echo esc_html(get_field('type')); ?></p>
                    <p>ANNÉE : <?php the_time('Y'); ?></p>
                </div>

                <div class="photo-image">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            </div>

            <div class="photo-actions">
                <div class="photo-contact">
                    <a href="#" class="js-open-contact" data-ref="<?php echo esc_attr(get_field('reference')); ?>">
                        Cette photo vous intéresse ? Contact
                    </a>
                </div>
                <div class="photo-nav">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>

                    <?php if ($prev_post) : ?>
                        <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" class="photo-nav-prev">
                            ← Précédente
                            <span class="photo-nav-thumb">
                                <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail'); ?>
                            </span>
                        </a>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                        <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="photo-nav-next">
                            Suivante →
                            <span class="photo-nav-thumb">
                                <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
                            </span>
                        </a>
                    <?php endif; ?>

                </div>
            </div>

            <div class="related-photos">
                <p class="related-photo-title">Vous aimerez aussi</p>

                <div class="related-photos-list">
                    <?php
                    $categories = wp_get_post_terms(get_the_ID(), 'categorie', array('fields' => 'ids'));
                    
                    $related_query = new WP_Query(array(
                      'post_type' => 'photo',
                      'posts_per_page' => 2,
                      'post__not_in'  => array(get_the_ID()),
                      'tax_query'  => array(
                        array(
                            'taxonomy' => 'categorie',
                            'field'  => 'term_id',
                            'terms'  => $categories,
                        ),
                      ),
                    ));
                    ?>

                    <?php if ($related_query->have_posts()) : while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <?php get_template_part('template-parts/photo_block'); ?>
                    <?php endwhile; endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>

            </div>
    <?php endwhile; endif; ?>

</main>
<?php get_footer(); ?>