<?php get_header(); ?>

<section class="experience-stories-page">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Pieredzes stāsti</h1>
            </div>
        </div>
        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-lg-4">
                        <div class="person">
                            <svg class="person-foto-svg">
                                <clipPath id="story-photo" clipPathUnits="objectBoundingBox">
                                    <path d="M0.442,0.999 c-0.005,-0.001,-0.021,-0.002,-0.035,-0.004 c-0.17,-0.018,-0.291,-0.103,-0.351,-0.245 c-0.041,-0.097,-0.064,-0.255,-0.052,-0.347 c0.013,-0.102,0.05,-0.178,0.122,-0.249 c0.07,-0.07,0.153,-0.114,0.258,-0.138 c0.086,-0.019,0.185,-0.022,0.257,-0.008 c0.045,0.009,0.126,0.041,0.158,0.063 c0.137,0.091,0.209,0.265,0.202,0.489 c-0.003,0.089,-0.015,0.157,-0.037,0.205 c-0.003,0.007,-0.009,0.02,-0.012,0.028 c-0.019,0.043,-0.065,0.096,-0.108,0.125 c-0.061,0.04,-0.122,0.062,-0.216,0.076 c-0.026,0.004,-0.163,0.007,-0.186,0.005"></path>
                                </clipPath>
                            </svg>
                            <div class="img-block" style="--image: #000 url(<?php the_field('person_foto', get_the_ID()); ?>)">
                                <!-- <img class="w-100" src="<?php the_field('person_foto', get_the_ID()); ?>" alt="" /> -->
                            </div>
                            <div class="background-blob"></div>

                            <div>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('person_position', get_the_ID()); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8" style="max-height: 330px; overflow: hidden;">
                    <div class="fade-bottom"></div>
                        <?php the_content(); ?>
                    </div>
                    <a class="read-more offset-lg-4" href="javascript:void(0)">Lasīt vairāk</a>
                    <div class="col-lg-8"></div>

                <?php endwhile ?>
            </div>

        <?php endif; ?>
    </div>
</section>

<section class="experience-stories">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Vairāk stāstu</h2>
            </div>
        </div>
        <?php
        $args = array(
            'post__not_in' => array(get_the_ID()),
            'post_type'   => 'experience_stories',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'orderby'            => 'meta_value',
            'order'                => 'ASC'
        );

        $experience_stories = new WP_Query($args); ?>

        <?php if ($experience_stories->have_posts()) :  ?>
            <div class="row posts">
                <?php while ($experience_stories->have_posts()) :
                    $experience_stories->the_post();
                ?>
                    <div class="col-12 col-lg-5 offset-lg-1">
                        <div class="experience-block">
                            <div class="person d-flex">
                                <div class="img-block" style="
        background-image: url(<?php the_field('person_foto', get_the_ID()); ?>);
        background-size: 221%;
        background-position: center;
      "></div>
                                <div class="info d-flex align-items-center">
                                    <div>
                                        <h4><?php the_title(); ?></h4>
                                        <p class="body-smaller"><?php the_field('person_position', get_the_ID()); ?></p>
                                    </div>
                                </div>
                            </div>
                            <p class="body-smaller"><?php the_field('excerpt', get_the_ID()); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Lasīt visu stāstu</a>
                        </div>
                    </div>

                <?php endwhile ?>
            </div>
            <div class="row">
            <?php if ($experience_stories->max_num_pages > 1) : ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var true_posts = '<?php echo serialize($experience_stories->query_vars); ?>';
                        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $experience_stories->max_num_pages; ?>';
                    </script>
                    <div class="load-more-posts position-relative mx-auto" data="<?php echo $experience_stories->max_num_pages; ?>">
                        <a id="true_loadmore" href="javascript:void(0)" class="pm-btn pm-btn__blue d-inline-block">Ielādēt vēl</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif ?>
    </div>
</section>

<?php get_footer(); ?>