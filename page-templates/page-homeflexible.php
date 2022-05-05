<?php

/**
 * Template Name: Flexible test
 */
?>
<?php get_header(); ?>

<?php
$header = get_field('header');
if (have_rows('header')) : ?>
    <?php while (have_rows('header')) : the_row(); ?>

        <header style="
          background-image: url(<?php echo esc_url($header['image']); ?>);
          background-size: cover;
          background-position: center;
          background-position-x: 66.1%;
          background-position-y: -21px;
        ">
            <div class="container">
                <div class="row">
                    <div class="col-9 col-md-8 col-lg-9">
                        <h1><?php echo $header['title']; ?></h1>
                        <?php echo $header['description']; ?>

                        <?php if (have_rows('header_buttons')) : ?>
                            <div class="choice">
                                <?php while (have_rows('header_buttons')) : the_row();
                                    $name = get_sub_field('button_name');
                                    $color = get_sub_field('color');
                                    $buttonLink = get_sub_field('button_link');

                                    $color_class = 'white';

                                    if ($color == 'white') {
                                        $color_class = 'pm-btn__white';
                                    } else {
                                        $color_class = 'pm-btn__blue';
                                    }
                                ?>

                                    <a href="<?php echo $buttonLink ?>" class="pm-btn <?php echo $color_class ?>"><?php echo $name ?></a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4 col-lg-12 text-lg-right">
                        <p class="body-smaller text-md-left d-lg-inline">
                            <span class="required-symbol">*</span>
                            <?php echo $header['notice']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </header>
    <?php endwhile; ?>
<?php endif; ?>

<?php if (have_rows('flexible_content')) : ?>
    <?php while (have_rows('flexible_content')) : the_row(); ?>
        <?php if (get_row_layout() == 'header') :
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $mobile_description = get_sub_field('mobile_description');
            $image = get_sub_field('image');
            $notice = get_sub_field('notice');
        ?>
            <header style="
          background-image: url(<?php echo $image; ?>);
          background-size: cover;
          background-position: center;
          background-position-x: 66.1%;
          background-position-y: -21px;
        ">
                <div class="container">
                    <div class="row">
                        <div class="col-9 col-md-8 col-lg-9">
                            <?php if (get_sub_field('title')) : ?>
                                <h1><?php echo $title ?></h1>
                            <?php endif; ?>
                            <?php if (get_sub_field('description')) : ?>
                                <?php echo $description ?>
                            <?php endif; ?>

                            <?php if (have_rows('header_buttons')) : ?>
                                <div class="choice">
                                    <?php while (have_rows('header_buttons')) : the_row();
                                        $name = get_sub_field('button_name');
                                        $color = get_sub_field('color');
                                        $buttonLink = get_sub_field('button_link');

                                        $color_class = 'white';

                                        if ($color == 'white') {
                                            $color_class = 'pm-btn__white';
                                        } else {
                                            $color_class = 'pm-btn__blue';
                                        }
                                    ?>

                                        <a href="<?php echo $buttonLink ?>" class="pm-btn <?php echo $color_class ?>"><?php echo $name ?></a>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (get_sub_field('notice')) : ?>
                            <div class="col-md-4 col-lg-12 text-lg-right">
                                <p class="body-smaller text-md-left d-lg-inline">
                                    <span class="required-symbol">*</span>
                                    <?php echo $notice; ?>
                                </p>
                            </div>
                        <?php endif ?>

                    </div>
                </div>
            </header>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>