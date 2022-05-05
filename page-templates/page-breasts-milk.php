<?php

/**
 * Template Name: Krūts piens
 */
?>
<?php get_header(); ?>
<section class="breast-milk-page">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1><?php the_field('title') ?></h1>
            </div>
        </div>

        <?php
        $breast_milk_description = get_field('breast_milk_description');
        if (have_rows('breast_milk_description')) : ?>
            <?php while (have_rows('breast_milk_description')) : the_row(); ?>
                <?php if (have_rows('text_with_foto_1')) : ?>
                    <?php while (have_rows('text_with_foto_1')) : the_row();
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        $figure = get_sub_field('figure');
                    ?>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <?php echo $text ?>
                            </div>
                            <div class="col-12 col-lg-6">
                                <?php if ($figure == '1') : ?>
                                    <style>
                                        .reviews .img-block-1::before {
                                            background: var(--image);
                                            background-size: cover;
                                            background-position-x: left;
                                        }
                                    </style>
                                    <svg class="about-us-svg">
                                        <clipPath id="about-us-<?php echo $figure ?>" clipPathUnits="objectBoundingBox">
                                            <path d="M0.549,1 c-0.002,-0.001,-0.018,-0.003,-0.035,-0.005 c-0.086,-0.011,-0.192,-0.051,-0.277,-0.103 c-0.125,-0.076,-0.208,-0.176,-0.232,-0.279 c-0.006,-0.024,-0.006,-0.033,-0.005,-0.085 c0.002,-0.089,0.015,-0.149,0.047,-0.228 c0.043,-0.104,0.123,-0.204,0.203,-0.253 c0.025,-0.015,0.042,-0.021,0.094,-0.03 c0.143,-0.026,0.288,-0.022,0.405,0.011 c0.044,0.013,0.095,0.032,0.116,0.045 c0.064,0.039,0.108,0.128,0.126,0.255 c0.021,0.153,0,0.347,-0.053,0.473 c-0.031,0.074,-0.064,0.117,-0.115,0.147 c-0.038,0.023,-0.055,0.03,-0.1,0.041 c-0.031,0.008,-0.043,0.009,-0.103,0.01 c-0.037,0.001,-0.07,0.001,-0.073,0"></path>
                                        </clipPath>
                                    </svg>

                                <?php elseif ($figure == '2') : ?>
                                    <style>
                                        .reviews .img-block-2::before {
                                            background: var(--image);
                                            background-size: cover;
                                            background-position-x: left;
                                        }
                                    </style>
                                    <svg class="about-us-svg">
                                        <clipPath id="about-us-<?php echo $figure ?>" clipPathUnits="objectBoundingBox">
                                            <path d="M0.273,0.997 c-0.038,-0.007,-0.087,-0.026,-0.113,-0.045 c-0.048,-0.034,-0.088,-0.089,-0.112,-0.154 c-0.021,-0.056,-0.032,-0.107,-0.04,-0.192 c-0.029,-0.311,0.031,-0.504,0.176,-0.565 c0.029,-0.012,0.117,-0.027,0.214,-0.036 c0.055,-0.005,0.162,-0.006,0.21,-0.002 c0.201,0.019,0.323,0.087,0.372,0.209 c0.018,0.046,0.024,0.101,0.019,0.18 c-0.009,0.154,-0.031,0.223,-0.098,0.308 c-0.072,0.092,-0.148,0.154,-0.257,0.212 c-0.086,0.045,-0.165,0.072,-0.24,0.083 c-0.034,0.005,-0.106,0.006,-0.131,0.001"></path>
                                        </clipPath>
                                    </svg>
                                <?php endif ?>
                                <div class="background-img position-relative">
                                    <div class="img-block img-block-<?php echo $figure ?>" style="--image: #000 url(<?php echo $image ?>)"></div>
                                    <div class="background-blob background-blob-<?php echo $figure ?>"></div>
                                </div>
                                <!-- <img src="<?php echo $image ?>" alt="" /> -->
                            </div>
                        </div>

                    <?php endwhile ?>

                <?php endif ?>

                <?php if (have_rows('breast_milk_contains')) : ?>
                    <div class="row align-items-center contains">
                        <?php while (have_rows('breast_milk_contains')) : the_row();
                            $column_size = get_sub_field('column_size');
                            $text = get_sub_field('text');
                        ?>

                            <div class="col-12 col-lg-<?php echo $column_size ?>">
                                <!-- <p class="body-small">Līdz šim atklātas jau</p> -->
                                <?php echo $text ?>
                            </div>

                        <?php endwhile ?>
                    </div>
                <?php endif ?>

                <?php if (have_rows('text_with_foto_2')) : ?>
                    <?php while (have_rows('text_with_foto_2')) : the_row();
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        $figure = get_sub_field('figure');
                    ?>

                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <?php if ($figure == '1') : ?>
                                    <style>
                                        .reviews .img-block-1::before {
                                            background: var(--image);
                                            background-size: cover;
                                            background-position-x: left;
                                        }
                                    </style>
                                    <svg class="about-us-svg">
                                        <clipPath id="about-us-<?php echo $figure ?>" clipPathUnits="objectBoundingBox">
                                            <path d="M0.549,1 c-0.002,-0.001,-0.018,-0.003,-0.035,-0.005 c-0.086,-0.011,-0.192,-0.051,-0.277,-0.103 c-0.125,-0.076,-0.208,-0.176,-0.232,-0.279 c-0.006,-0.024,-0.006,-0.033,-0.005,-0.085 c0.002,-0.089,0.015,-0.149,0.047,-0.228 c0.043,-0.104,0.123,-0.204,0.203,-0.253 c0.025,-0.015,0.042,-0.021,0.094,-0.03 c0.143,-0.026,0.288,-0.022,0.405,0.011 c0.044,0.013,0.095,0.032,0.116,0.045 c0.064,0.039,0.108,0.128,0.126,0.255 c0.021,0.153,0,0.347,-0.053,0.473 c-0.031,0.074,-0.064,0.117,-0.115,0.147 c-0.038,0.023,-0.055,0.03,-0.1,0.041 c-0.031,0.008,-0.043,0.009,-0.103,0.01 c-0.037,0.001,-0.07,0.001,-0.073,0"></path>
                                        </clipPath>
                                    </svg>

                                <?php elseif ($figure == '2') : ?>
                                    <style>
                                        .reviews .img-block-2::before {
                                            background: var(--image);
                                            background-size: cover;
                                            background-position-x: left;
                                        }
                                    </style>
                                    <svg class="about-us-svg">
                                        <clipPath id="about-us-<?php echo $figure ?>" clipPathUnits="objectBoundingBox">
                                            <path d="M0.273,0.997 c-0.038,-0.007,-0.087,-0.026,-0.113,-0.045 c-0.048,-0.034,-0.088,-0.089,-0.112,-0.154 c-0.021,-0.056,-0.032,-0.107,-0.04,-0.192 c-0.029,-0.311,0.031,-0.504,0.176,-0.565 c0.029,-0.012,0.117,-0.027,0.214,-0.036 c0.055,-0.005,0.162,-0.006,0.21,-0.002 c0.201,0.019,0.323,0.087,0.372,0.209 c0.018,0.046,0.024,0.101,0.019,0.18 c-0.009,0.154,-0.031,0.223,-0.098,0.308 c-0.072,0.092,-0.148,0.154,-0.257,0.212 c-0.086,0.045,-0.165,0.072,-0.24,0.083 c-0.034,0.005,-0.106,0.006,-0.131,0.001"></path>
                                        </clipPath>
                                    </svg>

                                <?php endif ?>
                                <div class="background-img position-relative">
                                    <div class="img-block img-block-<?php echo $figure ?>" style="--image: #000 url(<?php echo $image ?>)"></div>
                                    <div class="background-blob background-blob-<?php echo $figure ?>"></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 pr-0">
                                <p class="body-small"><?php echo $text ?></p>
                            </div>
                        </div>

                    <?php endwhile ?>

                <?php endif ?>

            <?php endwhile ?>
        <?php endif ?>

    </div>
</section>

<?php $info = get_field('info'); ?>
<!-- breast-milk-info -->
<?php if ($info) : ?>
    <section class="breast-milk-info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center"><?php echo $info['text'] ?></h2>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

<?php $benefits = get_field('benefits'); ?>

<?php if (have_rows('benefits')) : ?>
    <?php while (have_rows('benefits')) : the_row(); ?>
        <section class="benefits">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><?php echo $benefits['title'] ?></h2>
                    </div>
                </div>
                <?php if ($benefits['before_benefits']) : ?>
                    <div class="row before-benefits">
                        <div class="col-12 col-lg-9 mx-auto">
                            <?php echo $benefits['before_benefits'] ?>

                            <?php if ($benefits['before_benefits_description']) : ?>
                                <div class="before-benefits-description position-relative">
                                    <div class="before-benefits-description__question">
                                        <h2 class=" mx-auto">?</h2>
                                        <div class="w-100 position-absolute before-benefits-description__area">
                                            <div class="before-benefits-description__textarea mx-auto position-relative">
                                                <?php echo $benefits['before_benefits_description'] ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endif ?>
                <?php if (have_rows('benefit_repeater')) : ?>
                    <div class="row">
                        <?php while (have_rows('benefit_repeater')) : the_row();
                            $title = get_sub_field('title');
                            $image = get_sub_field('image');
                            $text = get_sub_field('text');
                        ?>

                            <div class="col-12 col-lg-6">
                                <div class="img-block mx-auto">
                                    <img class="w-100" src="<?php echo $image ?>" alt="" />
                                </div>
                                <h3 class="text-center"><?php echo $title ?></h3>
                                <p class="body-smaller"><?php echo $text ?></p>
                            </div>
                        <?php endwhile ?>
                    </div>
                <?php endif ?>
            </div>
        </section>
    <?php endwhile ?>
<?php endif ?>


<?php
// $header = get_field('properties');
if (have_rows('properties')) : ?>
    <?php while (have_rows('properties')) : the_row(); ?>
        <section class="properties">
            <div class="container" style="z-index: 2;position: inherit;">
                <?php if (have_rows('substance')) : ?>
                    <?php while (have_rows('substance')) : the_row();
                        $title = get_sub_field('title');
                        $image = get_sub_field('image');
                        $notice = get_sub_field('notice') ?: 'Notice';
                    ?>
                        <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <div class="img-block">
                                    <img src="<?php echo $image ?>" class="w-100" alt="" />
                                </div>
                                <h2><?php echo $title ?></h2>
                            </div>
                            <?php if (have_rows('column')) : ?>
                                <?php while (have_rows('column')) : the_row();
                                    $column_size = get_sub_field('column_size');
                                ?>
                                    <div class="col-md-6 col-lg-<?php echo $column_size ?>">
                                        <?php if (have_rows('points')) : ?>
                                            <ul>
                                                <?php while (have_rows('points')) : the_row();
                                                    $point = get_sub_field('point');
                                                    $description = get_sub_field('description');
                                                ?>
                                                    <li class="dot">
                                                        <div class="body-small point position-relative"><?php echo $point ?>
                                                            <?php if ($description) : ?>
                                                                <div class="property-description">
                                                                    <h4>?</h4>
                                                                    <div class="description-area">
                                                                        <div class="background-blob"></div>
                                                                        <p class="body-smaller"><?php echo $description ?></p>
                                                                    </div>
                                                                </div>

                                                            <?php endif ?>

                                                        </div>
                                                    </li>
                                                <?php endwhile ?>
                                            </ul>

                                        <?php endif ?>
                                    </div>
                                <?php endwhile ?>
                            <?php endif ?>
                            <div class="col-lg-12">
                                <p class="body-smaller text-right prompt">
                                    <span>*</span><?php echo $notice ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile ?>
                <?php endif ?>

                <?php if (have_rows('peculiarities')) : ?>
                    <?php while (have_rows('peculiarities')) : the_row();
                        $title = get_sub_field('title');
                        $image = get_sub_field('image');
                        $points = get_sub_field('points');
                    ?>
                        <div class="row">
                            <div class="col-12 d-flex align-items-center">
                                <div class="img-block">
                                    <img src="<?php echo $image ?>" class="w-100" alt="" />
                                </div>
                                <h2><?php echo $title ?></h2>
                            </div>

                            <div class="properties-ml col-lg-9">
                                <ul class="image-dots">

                                    <?php if (have_rows('points')) :
                                        $dot_images = array(
                                            'allergies',
                                            'brain',
                                            'dna',
                                            'ear',
                                            'eating',
                                            'heart',
                                            'immunity',
                                            'lungs',
                                            'moon_sleep',
                                            'nose',
                                            'weight'
                                        );
                                    ?>
                                        <?php while (have_rows('points')) : the_row();
                                            $bullet_image = get_sub_field('bullet_image');
                                            $text = get_sub_field('text');
                                        ?>
                                            <li class="dot" style="background: url(<?php //echo get_stylesheet_directory_uri() 
                                                                                    ?>/assets/img/dots/<?php echo $dot_images[$bullet_image] ?>.png) no-repeat left top;">
                                                <p class="body-small"><?php echo $text ?></p>
                                                <div class="image-dot" style="background: url(<?php echo get_stylesheet_directory_uri() ?>/assets/img/dots/<?php echo $dot_images[$bullet_image] ?>.png) no-repeat left top; background-size: 88%; background-position-x: -2px; background-position-y: 8px;"></div>
                                            </li>
                                        <?php endwhile ?>

                                    <?php endif ?>

                                </ul>
                            </div>
                        </div>
                    <?php endwhile ?>
                <?php endif ?>
            </div>
        </section>
    <?php endwhile ?>
<?php endif ?>
<?php get_footer(); ?>