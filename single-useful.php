<?php get_header(); ?>
<section class="useful-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Noderīgi</h1>
            </div>
            <?php if (have_posts()) : ?>
                <div class="col-lg-8 mx-auto">
                    <?php while (have_posts()) : the_post(); ?>
                        <h3><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    <?php endwhile ?>
                    <div class="d-flex align-items-center to-posts mx-auto">
                        <div class="arrow-left position-relative"></div>
                        <a class="body-small" href="javascript:history.back()">Atpakaļ pie visiem rakstiem</a>
                    </div>
                </div>

            <?php endif ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>