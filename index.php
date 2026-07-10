<?php get_header(); ?>

<main class="homepage">

    <section class="hero">
        <?php
        $hero_query = new WP_Query(array(
            'post_type' => 'photo',
            'posts_per_page' => 1,
        ));
        ?>
        <?php if ($hero_query->have_posts()) : while ($hero_query->have_posts()) : $hero_query->the_post(); ?>
                <div class="hero-image">
                    <?php the_post_thumbnail('full'); ?>
                    <h1 class="hero-title">Photographe événementiel</h1>
                </div>
        <?php endwhile;
        endif; ?>
        <?php wp_reset_postdata(); ?>
    </section>

    <section class="catalogue">

        <div class="catalogue-list">
            <?php
            $catalogue_query = new WP_Query(array(
                'post_type' => 'photo',
                'posts_per_page' => 8,
            ));
            ?>
            <?php if ($catalogue_query->have_posts()) : while ($catalogue_query->have_posts()) : $catalogue_query->the_post(); ?>
                    <?php get_template_part('template-parts/photo_block'); ?>
            <?php endwhile;
            endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>

    </section>
</main>

<?php get_footer(); ?>