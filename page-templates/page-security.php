<?php

/**
 * Template Name: Drošība
 */
?>
<?php get_header(); ?>
<section class="security-page">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1><?php the_title(); ?></h1>
                <p class="body-smaller">
                    <?php the_field('after_title') ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 mx-auto content">

                <?php if (have_rows('section')) :
                    while (have_rows('section')) : the_row();
                        $section_title = get_sub_field('section_title');

                ?>
                        <h3><?php echo $section_title ?></h3>
                        <?php if (have_rows('blocks')) :
                            while (have_rows('blocks')) : the_row();
                                $content = get_sub_field('content');
                                $bullet_color = get_sub_field('bullet_color');
                                $text = get_sub_field('text');
                        ?>

                                <?php if ($content == 'list') : ?>
                                    <div class="<?php echo ($bullet_color == 'orange') ? 'orange-list' : 'grey-list'; ?>">
                                        <?php echo $text ?>
                                    </div>
                                <?php elseif ($content == 'table') : ?>
            </div>
            <div class="table-area w-100 position-relative">
                <div class="right-gradient"></div>
                <div id="scroll-right" class="scroll-right position-absolute d-lg-none">
                    <h2>></h2>
                </div>
                <div id="table-wrapper" class="col-lg-12">
                    <?php echo $text ?>
                </div>
            </div>
            <div class="col-lg-9 mx-auto content">
            <?php else : ?>
                <?php echo $text ?>
            <?php endif ?>

        <?php endwhile ?>

    <?php endif ?>
<?php endwhile ?>

<?php endif ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>