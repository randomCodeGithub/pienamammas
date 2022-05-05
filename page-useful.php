<?php

/**
 * Template Name: Noderīgi
 */
?>
<?php get_header(); ?>
<section class="useful-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Noderīgi</h1>
            </div>
            <?php
            $post_per_page = get_field('post_per_page')?: '3';
			$post_order = get_field('post_order')?: 'DESC';
            $args = array(
                'post_type'   => 'useful',
                'orderby'    => 'ID',
                'post_status' => 'publish',
                'posts_per_page' => $post_per_page,
                'order'                => $post_order
            );

            $useful = new WP_Query($args); ?>
            <?php if ($useful->have_posts()) :  ?>
                <div class="col-12 col-lg-8 mx-auto posts">
                    <?php while ($useful->have_posts()) :
                        $useful->the_post();
                    ?>
                        <div class="post-block">
                            <h3><?php the_title(); ?></h3>
                            <p class="body-small"><?php the_field('excerpt', get_the_ID()); ?></p>
                            <a class="body-small" href="<?php the_permalink(); ?>">Lasīt visu rakstu</a>
                        </div>
                    <?php endwhile ?>
                </div>
            <?php endif; ?>
            <div class="col-12 text-center">
                <?php if ($useful->max_num_pages > 1) : ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize($useful->query_vars); ?>';
                        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $useful->max_num_pages; ?>';
                    </script>
                    <div class="load-more-posts position-relative" data="<?php echo $useful->max_num_pages; ?>">
                        <a id="true_loadmore" href="javascript:void(0)" class="pm-btn pm-btn__blue d-inline-block">Ielādēt vēl</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>