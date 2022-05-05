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

<!-- OTHER MILK SOLUTION -->
<?php $other_milk_solution = get_field('other_milk_solution'); ?>
<?php if (have_rows('other_milk_solution')) : ?>
    <?php while (have_rows('other_milk_solution')) : the_row(); ?>
        <section class="other-milk-solution">
            <div class="container">
                <div class="row">
                    <div class="col-12 px-0 d-block d-md-none">
                        <div class="notice-block">
                            <?php echo $header['mobile_description']; ?>
                            <div class="choice">
                                <?php if (have_rows('header')) : ?>
                                    <?php while (have_rows('header')) : the_row(); ?>
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
                                    <?php endwhile ?>
                                <?php endif ?>
                            </div>
                            <p class="notice text-right">
                                <span class="required-symbol">*</span>
                                <?php echo $header['notice']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <h2 class="text-center">
                            <?php echo $other_milk_solution['title'] ?>
                        </h2>
                    </div>
                    <?php if (have_rows('for_whom')) : ?>
                        <?php while (have_rows('for_whom')) : the_row();
                            $description = get_sub_field('description');
                            $image = get_sub_field('image');
                        ?>
                            <div class="col-9 col-md-4 text-center">
                                <div class="img-block">
                                    <img src="<?php echo $image ?>" alt="" />
                                </div>
                                <p><?php echo $description ?></p>
                            </div>
                        <?php endwhile ?>
                    <?php endif ?>
                </div>
                <?php if (have_rows('advices')) : ?>
                    <div class="row">
                        <div class="col-12">
                            <ul class="attention">
                                <?php while (have_rows('advices')) : the_row();
                                    $description = get_sub_field('description');
                                    $image = get_sub_field('image');
                                ?>
                                    <li class="d-flex">
                                        <div class="img-block">
                                            <img src="<?php echo $image ?>" alt="" />
                                        </div>
                                        <p class="body-smaller"><?php echo $description ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row mothers">
                    <div class="col-12 d-flex">
                        <div class="today-block d-flex">
                            <div class="today">
                                <h3>Šobrīd :</h3>
                            </div>
                            <div class="mother-types">
                                <a href="<?php echo $other_milk_solution['donate_milk_link']; ?>" class="give-milk">
                                    <div class="position-absolute w-100 h-100" style="left: 0; top: 0; z-index: -1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="233.029" height="115.658" viewBox="0 0 233.029 115.658">
                                            <path class="a" d="M181.351,110.08c-44.942,8.6-137.125,0-137.125,0C14.349,109-.919,85.575-.919,55.542S16.4,8.248,61.337,1.322s127.619,0,127.619,0c20.139,0,43.154,16.267,43.154,46.3S226.293,101.483,181.351,110.08Z" transform="translate(0.919 1.757)" />
                                        </svg>
                                    </div>
                                    <?php $args = array(
                                        'role__in' => 'um_davina-pienu'
                                    );

                                    $donate_milk_mothers = new WP_User_Query($args);

                                    // print_r($user_query);
                                    $total_users = $donate_milk_mothers->get_total(); ?>
                                    <div class="d-flex align-items-center">
                                        <h3><?php echo $total_users; ?></h3>
                                        <h4>mammas</h4>
                                    </div>
                                    <div>
                                        <p class="body-smaller">vēlas dāvināt pienu</p>
                                    </div>
                                </a>
                                <a href="<?php echo $other_milk_solution['get_milk_link']; ?>" class="take-milk">
                                    <div class="position-absolute w-100 h-100" style="left: 0; top: 0; z-index: -1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="233.029" height="115.658" viewBox="0 0 233.029 115.658">
                                            <path class="a" d="M181.351,110.08c-44.942,8.6-137.125,0-137.125,0C14.349,109-.919,85.575-.919,55.542S16.4,8.248,61.337,1.322s127.619,0,127.619,0c20.139,0,43.154,16.267,43.154,46.3S226.293,101.483,181.351,110.08Z" transform="translate(0.919 1.757)" />
                                        </svg>
                                    </div>
                                    <?php $args = array(
                                        'role__in' => 'um_sanema-pienu'
                                    );

                                    $get_milk_mothers = new WP_User_Query($args);

                                    // print_r($user_query);
                                    $total_users = $get_milk_mothers->get_total(); ?>
                                    <div class="d-flex align-items-center">
                                        <h3><?php echo $total_users; ?></h3>
                                        <h4>mammas</h4>
                                    </div>
                                    <div>
                                        <p class="body-smaller">vēlas saņemt pienu</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile ?>
<?php endif ?>

<?php $about_us = get_field('about_us'); ?>

<section class="about-project">
    <?php if ($about_us) : ?>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <svg class="about-us-svg">
                        <clipPath id="about-us" clipPathUnits="objectBoundingBox">
                            <path d="M0.462,0.998 c-0.09,-0.011,-0.197,-0.038,-0.263,-0.066 c-0.03,-0.013,-0.065,-0.038,-0.089,-0.063 c-0.055,-0.057,-0.088,-0.139,-0.104,-0.258 c-0.006,-0.045,-0.006,-0.218,0,-0.268 c0.008,-0.063,0.024,-0.109,0.056,-0.16 c0.048,-0.078,0.119,-0.13,0.222,-0.162 c0.058,-0.018,0.115,-0.022,0.188,-0.013 c0.155,0.02,0.287,0.067,0.402,0.144 c0.04,0.026,0.049,0.035,0.069,0.059 c0.041,0.051,0.06,0.122,0.058,0.216 c-0.003,0.114,-0.036,0.235,-0.097,0.359 c-0.033,0.066,-0.084,0.141,-0.115,0.168 c-0.04,0.035,-0.11,0.05,-0.226,0.05 c-0.036,0,-0.081,-0.002,-0.101,-0.005"></path>
                        </clipPath>
                    </svg>
                    <div class="background-img position-relative">
                        <div class="img-block" style="--image: #000 url(<?php echo $about_us['image'] ?>)"></div>
                        <div class="background-blob"></div>
                    </div>
                </div>
                <div class="col-11 col-md-8 offset-lg-1 col-lg-4">
                    <h2><?php echo $about_us['title'] ?></h2>
                    <p><?php echo $about_us['description'] ?></p>
                    <a href="<?php echo $about_us['read_more_link'] ?>" class="pm-btn pm-btn__blue">Lasīt vairāk</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php $breast_milk = get_field('breast_milk'); ?>
<?php if (have_rows('breast_milk')) : ?>
    <?php while (have_rows('breast_milk')) : the_row(); ?>
        <section class="breast-milk">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><?php echo $breast_milk['title'] ?></h2>
                        <p class="body-smaller"><?php echo $breast_milk['description'] ?></p>
                    </div>
                </div>
                <?php if (have_rows('peculiarities')) : ?>
                    <?php while (have_rows('peculiarities')) : the_row();
                        $title = get_sub_field('title');
                        $image = get_sub_field('image');
                        $bullet_style = get_sub_field('bullet_style');
                        $properties = get_sub_field('properties');
                    ?>

                        <div class="row peculiarities">

                            <div class="col-12 col-lg-4">
                                <div class="title-block d-flex">
                                    <div class="img-block">
                                        <img src="<?php echo $image ?>" alt="" />
                                    </div>
                                    <div class="title">
                                        <h3 <?php if (strlen($title) > 21) echo 'class="smaller"' ?>><?php echo $title ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-<?php echo ($bullet_style == 'dot') ? '12' : '6'; ?> col-lg-4 col-lg-8 <?php if ($bullet_style == 'dot') echo 'dots';  ?>">

                                <?php
                                if ($bullet_style == 'dot') {
                                    echo $properties;
                                } else { ?>

                                    <ul class="image-dots">
                                        <?php if (have_rows('properties_images')) :
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

                                            <?php while (have_rows('properties_images')) : the_row();
                                                $property = get_sub_field('property');
                                                $image = get_sub_field('image');
                                            ?>
                                                <li class="dot" style="background: url(<?php //echo get_stylesheet_directory_uri() 
                                                                                        ?>/assets/img/dots/<?php echo $dot_images[$image] ?>.png) no-repeat left top;">
                                                    <p class="body-small"><?php echo $property ?></p>
                                                    <div class="image-dot" style="background: url(<?php echo get_stylesheet_directory_uri() ?>/assets/img/dots/<?php echo $dot_images[$image] ?>.png) no-repeat left top; background-size: 88%; background-position-x: -2px; background-position-y: 8px;"></div>
                                                </li>
                                            <?php endwhile ?>
                                        <?php endif; ?>
                                    </ul>


                                <?php }
                                ?>
                            </div>
                        </div>
                    <?php endwhile ?>
                <?php endif; ?>
                <div class="row">
                    <a href="<?php echo $breast_milk['read_more_link'] ?>" class="pm-btn body-smaller
                    text-uppercase
                    pm-btn__red
                    d-inline-block
                    mx-auto
                  ">Lasīt vairāk</a>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif ?>


<!-- breast-milk-info -->
<?php $info = get_field('info'); ?>
<section class="breast-milk-info">

    <?php if ($info) : ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center"><?php echo $info['text'] ?></h2>
                </div>
            </div>
        </div>

    <?php endif; ?>
</section>

<!-- FACTS -->
<section class="facts">
    <div class="container pl-md-0">
        <?php
        $facts = get_field('facts');
        if (have_rows('facts')) : ?>
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center"><?php echo $facts['title'] ?></h2>

                    <div id="facts" class="slider">

                        <?php while (have_rows('facts')) : the_row(); ?>

                            <?php if (have_rows('fact_repeater')) : ?>

                                <?php while (have_rows('fact_repeater')) : the_row();
                                    $text = get_sub_field('text');
                                ?>
                                    <div class="item">
                                        <div class="gradient-block"></div>
                                        <div class="fact">
                                            <?php echo $text ?>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            <?php endif ?>

                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>

<?php $world_experience = get_field('world_experience'); ?>
<!-- world-experience -->
<section class="world-experience">
    <?php if (have_rows('world_experience')) : ?>
        <?php while (have_rows('world_experience')) : the_row(); ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2><?php echo $world_experience['title']; ?></h2>
                    </div>
                </div>
                <div class="row">
                    <?php if (have_rows('experience')) : ?>
                        <?php while (have_rows('experience')) : the_row();
                            $title = get_sub_field('title');
                            $description = get_sub_field('description');
                            $image = get_sub_field('image');
                        ?>
                            <div class="col-12 col-lg-6">
                                <div class="img-block mx-auto">
                                    <img src="<?php echo $image; ?>" alt="" />
                                </div>
                                <h3><?php echo $title; ?></h3>
                                <p><?php echo $description; ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php $experience_stories = get_field('experience_stories');
$experience_link = $experience_stories['read_more_link'];
?>
<section class="experience-stories">
    <?php if ($experience_stories) : ?>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2><?php echo $experience_stories['title'] ?></h2>
                </div>
            </div>
            <?php
            $args = array(
                'post_type'   => 'experience_stories',
                'post_status' => 'publish',
                'posts_per_page' => $experience_stories['number_of_posts'],
                'orderby'            => 'meta_value',
                'order'                => 'ASC'
            );

            $experience_stories = new WP_Query($args); ?>

            <?php if ($experience_stories->have_posts()) :  ?>
                <div class="row">
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

                    <?php endwhile; ?>
                </div>
                <div class="row">

                    <a href="<?php echo $experience_link ?>" class="pm-btn pm-btn__blue d-block mx-auto">Lasīt vairāk</a>
                </div>

            <?php endif;
            wp_reset_query(); ?>
        </div>

    <?php endif; ?>
</section>

<?php
$experts = get_field('experts');
$experts_link = $experts['read_more_link'];
?>
<!-- expert-opinion -->
<section class="expert-opinion">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Ekspertu viedokļi</h2>
            </div>
        </div>
        <?php
        $args = array(
            'post_type'   => 'experts',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'orderby'            => 'meta_value',
            'order'                => 'ASC'
        );

        $experts = new WP_Query($args); ?>

        <?php if ($experts->have_posts()) :  ?>
            <div class="row">
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
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
            <div class="row">
                <a href="<?php echo $experts_link ?>" class="pm-btn pm-btn__red d-block mx-auto">Lasīt vairāk</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $recomendations = get_field('recomendations'); ?>
<section class="security">
    <?php if ($recomendations) : ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo $recomendations['title'] ?></h2>
                    <p class="body-smaller"><?php echo $recomendations['description'] ?></p>
                    <a href="<?php echo $recomendations['button_link'] ?>" class="pm-btn pm-btn__blue">Lasīt vairāk</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>