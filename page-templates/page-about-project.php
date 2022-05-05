<?php

/**
 * Template Name: Par projektu
 */
?>
<?php get_header(); ?>
<section class="about-project-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php the_field('title') ?></h1>
            </div>
        </div>
        <div class="row what-we-want">
            <div class="col-12 col-lg-9 mx-auto">
                <?php $mission = get_field('mission');
                if (have_rows('mission')) : ?>
                    <?php while (have_rows('mission')) : the_row(); ?>
                        <div class="mission">
                            <h4><?php echo $mission['title'] ?></h4>
                            <?php if (have_rows('points')) : ?>
                                <ul>
                                    <?php while (have_rows('points')) : the_row();
                                        $text = get_sub_field('text');
                                    ?>
                                        <li>
                                            <p class="body-small"><?php echo $text ?></p>
                                        </li>
                                    <?php endwhile ?>
                                </ul>
                            <?php endif ?>
                        </div>
                    <?php endwhile ?>
                <?php endif ?>

                <?php $goals = get_field('goals');
                if (have_rows('goals')) : ?>
                    <?php while (have_rows('goals')) : the_row(); ?>
                        <div class="goals">
                            <h4><?php echo $goals['title'] ?></h4>
                            <?php if (have_rows('points')) : ?>
                            <?php endif ?>
                            <ul>
                                <?php while (have_rows('points')) : the_row();
                                    $text = get_sub_field('text');
                                ?>
                                    <li>
                                        <p class="body-small"><?php echo $text ?></p>
                                    </li>
                                <?php endwhile ?>
                            </ul>
                        </div>
                    <?php endwhile ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

<?php $reviews = get_field('reviews');
if (have_rows('reviews')) : ?>
    <?php while (have_rows('reviews')) : the_row(); ?>
        <section class="reviews">
            <div class="container">
                <?php if (have_rows('reviews_repeater')) : ?>
                    <?php while (have_rows('reviews_repeater')) : the_row();
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        $figure = get_sub_field('figure');
                    ?>
                        <div class="row review">
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
                                            <path d="M0.462,0.998 c-0.09,-0.011,-0.197,-0.038,-0.263,-0.066 c-0.03,-0.013,-0.065,-0.038,-0.089,-0.063 c-0.055,-0.057,-0.088,-0.139,-0.104,-0.258 c-0.006,-0.045,-0.006,-0.218,0,-0.268 c0.008,-0.063,0.024,-0.109,0.056,-0.16 c0.048,-0.078,0.119,-0.13,0.222,-0.162 c0.058,-0.018,0.115,-0.022,0.188,-0.013 c0.155,0.02,0.287,0.067,0.402,0.144 c0.04,0.026,0.049,0.035,0.069,0.059 c0.041,0.051,0.06,0.122,0.058,0.216 c-0.003,0.114,-0.036,0.235,-0.097,0.359 c-0.033,0.066,-0.084,0.141,-0.115,0.168 c-0.04,0.035,-0.11,0.05,-0.226,0.05 c-0.036,0,-0.081,-0.002,-0.101,-0.005"></path>
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

                                <?php elseif ($figure == '3') : ?>
                                    <style>
                                        .reviews .img-block-3::before {
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

                                <?php endif ?>
                                <div class="background-img position-relative">
                                    <div class="img-block img-block-<?php echo $figure ?>" style="--image: #000 url(<?php echo $image ?>)"></div>
                                    <div class="background-blob background-blob-<?php echo $figure ?>"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex">
                                <div>
                                    <?php echo $text ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                <?php endif ?>
                <div class="row additional-info">
                    <div class="col-lg-9 mx-auto">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/pay_attention.png" alt="" />
                        <?php echo $reviews['notice'] ?>
                        <!-- <p class="body-small">
                            Iesaistītās puses apmaiņu veic tikai un vienīgi bērniņa uztura
                            nodrošināšanas nolūkos bez atlīdzības un brīvprātīgi.
                        </p>
                        <p class="body-small">
                            Dāvinātais krūts piens nedrīkst tikt pārdots trešajām personām vai
                            kā citādi izmantots, izņemot bērnu vajadzībām.
                        </p>
                        <p class="body-small">
                            Šī vietne nav medicīnas platforma. Tā ir paredzēta, lai palīdzētu
                            vecākiem izdarīt apzinātu bērna uztura izvēli un piedāvātu
                            nepieciešamo informāciju brīvprātīgai apmaiņas veikšanai.
                        </p>
                        <p class="body-small">
                            Katra krūts piena apmaiņā iesaistītā puse pilnībā uzņemas
                            atbildību par savu rīcību un visām no tā izrietošajām sekām
                        </p> -->
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile ?>
<?php endif; ?>




<!-- WORLD EXPERIENCE -->

<?php
$post_object = get_field('experiences_stories');
if ($post_object) :
    global $post; // Need to make sure we overwrite the global Post Object
    $post = $post_object; // override $post
    setup_postdata($post);
?>
    <section class="world-experience-info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><?php the_title(); ?></h2>
                </div>
                <div class="col-12 col-lg-9 mx-auto">

                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<?php get_footer(); ?>