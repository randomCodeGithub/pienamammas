<?php get_header(); ?>

<section class="expert-opinion-page">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Ekspertu viedokļi</h1>
            </div>
        </div>
        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-12 col-lg-4">
                        <div class="person">
                            <div class="blob"></div>
                            <div class="img-block" style="
                    background-image: url(<?php the_field('person_foto', get_the_ID()); ?>);
                    background-size: cover;
                    background-position: top;
                  "></div>
                            <div>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('person_position', get_the_ID()); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8" style="max-height: 330px; overflow: hidden;">
                    <?php if('' !== get_post()->post_content ) :?>
                        <div class="fade-bottom"></div>    
                    <?php endif; ?> 
                        <?php the_content(); ?>
                    </div>
                    <?php if('' !== get_post()->post_content ) :?>
                        <a class="read-more offset-lg-4" href="javascript:void(0)">Lasīt vairāk</a>
                    <?php endif; ?>
                    <div class="col-lg-8"></div>

                <?php endwhile; ?>
            </div>

        <?php endif; ?>
    </div>
</section>

<!-- expert-opinion -->
<section class="expert-opinion-more">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Vairāk viedokļu</h2>
            </div>
        </div>
        <?php
        $args = array(
            'post__not_in' => array(get_the_ID()),
            'post_type'   => 'experts',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'orderby'            => 'meta_value',
            'order'                => 'ASC'
        );

        $experts = new WP_Query($args); ?>
        <?php if ($experts->have_posts()) :  ?>
            <div class="row posts">
                <?php while ($experts->have_posts()) :
                    $experts->the_post();
                ?>
                    <div class="col-12 col-lg-4">
                        <div class="experience-block">
                            <div class="person d-flex">
                                <div class="blob"></div>
                                <div class="img-block" style="
                        background-image: url(<?php the_field('person_foto', get_the_ID()); ?>);
                        background-size: cover;
                        background-position: top;
                      "></div>
                                <div class="info d-flex align-items-center">
                                    <div>
                                        <h4><?php the_title(); ?></h4>
                                        <p class="body-smaller"><?php the_field('person_position', get_the_ID()); ?></p>
                                    </div>
                                </div>
                            </div>
                            <p class="body-smaller"><?php the_field('excerpt', get_the_ID()); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Lasīt visu viedokli</a>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
            <div class="row">
            <?php if ($experts->max_num_pages > 1) : ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize($experts->query_vars); ?>';
                        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $experts->max_num_pages; ?>';
                    </script>
                    <div class="load-more-posts position-relative mx-auto" data="<?php echo $experts->max_num_pages; ?>">
                        <a id="true_loadmore" href="javascript:void(0)" class="pm-btn pm-btn__blue d-inline-block">Ielādēt vēl</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif ?>
    </div>
</section>

<?php get_footer(); ?>