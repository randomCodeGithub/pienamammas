<?php

/**
 * Template Name: Profils
 */
?>
<?php get_header();
global $user_ID;

if (!$user_ID) {
    header('Location: ' . site_url() . '/pievienoties');
}

global $current_user;
global $wp_roles;
get_currentuserinfo();

$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);

$userPhotoLink;
if (get_user_meta($current_user->ID, 'user-avatar', true) == '') {
    $userPhotoLink = get_stylesheet_directory_uri() . '/assets/img/profile/profile-default.svg';
} else {
    $userPhotoLink = apply_filters('um_user_shortcode_filter__profile_photo', get_user_meta($current_user->ID, 'user-avatar', true), $current_user->ID);
}
?>
<?php //echo do_shortcode('[fep_shortcode_new_message_form to="checkboxcheckbox-checkbox" subject="" heading="Sūtit ziņu"]') ?>
<section class="profile">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Profils</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="img-block" style="
                background-image: url(<?php echo $userPhotoLink ?>);
                background-size: cover;
                background-position: center;
                background-color: #fff;
                background-repeat: no-repeat;
                <?php
                if (get_user_meta($current_user->ID, 'user-avatar', true) == '') : ?>
background-size: contain;
                <?php endif; ?>
              "></div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 pl-md-2 pl-lg-2">
                <h2><?php echo $current_user->user_firstname; ?></h2>
                <p class="body-smaller mother-type"><?php echo $wp_roles->roles[$user_role]['name']; ?></p>

                <!-- <div class="info d-flex d-md-none d-lg-flex">
                    <ul class="data-name">
                        <li>
                            <p class="body-smaller">E-pasts</p>
                        </li>
                        <li>
                            <p class="body-smaller">Vecums</p>
                        </li>
                        <li>
                            <p class="body-smaller">Dzīves vieta</p>
                        </li>
                        <li>
                            <p class="body-smaller">Bērna vecums</p>
                        </li>
                        <li>
                            <p class="body-smaller">Piena apjoms</p>
                        </li>
                        <?php if ($current_user->roles[0] == 'um_davina-pienu') : ?>
                            <li>
                                <p class="body-smaller">Ziedojuma veids</p>
                            </li>
                            <li>
                                <p class="body-smaller">Gatava dāvināt</p>
                            </li>
                        <?php endif ?>
                    </ul>
                    <ul class="data-value">
                        <li>
                            <p class="body-smaller"><?php echo $current_user->user_email; ?></p>
                        </li>
                        <li>
                            <p class="body-smaller"><?php echo get_user_meta($current_user->ID, 'age', true) ?></p>
                        </li>
                        <li>
                            <p class="body-smaller"><?php echo get_user_meta($current_user->ID, 'location', true) ?></p>
                        </li>
                        <li>
                            <p class="body-smaller"><?php echo get_user_meta($current_user->ID, 'child-age', true) ?> mēneši</p>
                        </li>
                        <li>
                            <?php
                            $volumeInit = (get_user_meta($current_user->ID, 'volume-unit', true) == 'Mililitri') ? 'ml' : 'l';
                            $volumeOfMilk = get_user_meta($current_user->ID, 'volume', true) . ' ' . $volumeInit;
                            ?>
                            <p class="body-smaller"> <?php echo (get_user_meta($current_user->ID, 'volume', true)) ? $volumeOfMilk : 'nav zināms'; ?>
                            </p>
                        </li>
                        <?php
                        if (!empty(get_user_meta($current_user->ID, 'from', true))) {
                            $fromDate = DateTime::createFromFormat('Y/m/d', get_user_meta($current_user->ID, 'from', true));
                            $formatFromDate = $fromDate->format('d.m.Y');
                        }

                        if (!empty(get_user_meta($current_user->ID, 'to', true))) {
                            $fromToDate = DateTime::createFromFormat('Y/m/d', get_user_meta($current_user->ID, 'to', true));
                            $formatToDate = $fromToDate->format('d.m.Y');
                        }

                        ?>
                        <?php if ($current_user->roles[0] == 'um_davina-pienu') : ?>
                            <li>
                                <p class="body-smaller"><?php echo get_user_meta($current_user->ID, 'time-interval', true) ?></p>
                            </li>
                            <li>
                                <p class="body-smaller"><?php echo $formatFromDate; ?> - <?php echo $formatToDate ?> </p>
                            </li>
                        <?php endif ?>
                    </ul>
                </div> -->
                <ul class="user-info d-block d-md-none d-lg-block">
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">E-pasts</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo $current_user->user_email; ?>
                            </p>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">Vecums</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo get_user_meta($current_user->ID, 'age', true) ?>
                            </p>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">Dzīves vieta</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo get_user_meta($current_user->ID, 'location', true) ?>
                            </p>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">Bērna vecums</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo get_user_meta($current_user->ID, 'child-age', true) ?> mēneši
                            </p>
                        </div>
                    </li>
                    <?php
                    $volumeInit = (get_user_meta($current_user->ID, 'volume-unit', true) == 'Mililitri') ? 'ml' : 'l';
                    $volumeOfMilk = get_user_meta($current_user->ID, 'volume', true) . ' ' . $volumeInit;
                    ?>
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">Piena apjoms</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo (get_user_meta($current_user->ID, 'volume', true)) ? $volumeOfMilk : 'nav zināms'; ?>
                            </p>
                        </div>
                    </li>
                    <?php
                    if (!empty(get_user_meta($current_user->ID, 'from', true))) {
                        $fromDate = DateTime::createFromFormat('Y/m/d', get_user_meta($current_user->ID, 'from', true));
                        $formatFromDate = $fromDate->format('d.m.Y');
                    }

                    if (!empty(get_user_meta($current_user->ID, 'to', true))) {
                        $fromToDate = DateTime::createFromFormat('Y/m/d', get_user_meta($current_user->ID, 'to', true));
                        $formatToDate = $fromToDate->format('d.m.Y');
                    }

                    ?>
                    <?php if ($current_user->roles[0] == 'um_davina-pienu') : ?>
                        <li class="d-flex">
                            <div class="user-info__name">
                                <p class="body-smaller">Ziedojuma veids</p>
                            </div>
                            <div class="user-info__value">
                                <p class="body-smaller">
                                    <?php echo get_user_meta($current_user->ID, 'time-interval', true) ?>
                                </p>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="user-info__name">
                                <p class="body-smaller">Gatava dāvināt</p>
                            </div>
                            <div class="user-info__value">
                                <p class="body-smaller">
                                    <?php echo $formatFromDate; ?> - <?php echo $formatToDate ?>
                                </p>
                            </div>
                        </li>

                    <?php endif ?>
                </ul>
            </div>

            <div class="col-12 d-none d-md-block d-lg-none">
                <!-- <div class="info info-md d-flex">
                    <ul class="data-name">
                        <li>
                            <p class="body-smaller">E-pasts</p>
                        </li>
                        <li>
                            <p class="body-smaller">Vecums</p>
                        </li>
                        <li>
                            <p class="body-smaller">Dzīves vieta</p>
                        </li>
                        <li>
                            <p class="body-smaller">Bērna vecums</p>
                        </li>
                        <li>
                            <p class="body-smaller">Piena apjoms</p>
                        </li>
                        <?php if ($current_user->roles[0] == 'um_davina-pienu') : ?>
                            <li>
                                <p class="body-smaller">Ziedojuma veids</p>
                            </li>
                            <li>
                                <p class="body-smaller">Gatava dāvināt</p>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="data-value">
                        <li>
                            <p class="body-smaller"><?php echo $current_user->user_email; ?></p>
                        </li>
                        <li>
                            <p class="body-smaller"><?php echo get_user_meta($current_user->ID, 'age', true) ?></p>
                        </li>
                        <li>
                            <p class="body-smaller"><?php echo get_user_meta($current_user->ID, 'location', true) ?></p>
                        </li>
                        <li>
                            <p class="body-smaller"><?php echo get_user_meta($current_user->ID, 'child-age', true) ?> mēneši</p>
                        </li>
                        <li>
                            <p class="body-smaller"><?php echo (get_user_meta($current_user->ID, 'volume', true)) ? $volumeOfMilk : 'nav zināms'; ?></p>
                        </li>
                        <?php if ($current_user->roles[0] == 'um_davina-pienu') : ?>
                            <li>
                                <p class="body-smaller"><?php echo get_user_meta($current_user->ID, 'time-interval', true) ?></p>
                            </li>
                            <li>
                                <p class="body-smaller"><?php echo $formatFromDate; ?> - <?php echo $formatToDate ?></p>
                            </li>

                        <?php endif ?>
                    </ul>
                </div> -->

                <ul class="user-info">
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">E-pasts</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo $current_user->user_email; ?>
                            </p>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">Vecums</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo get_user_meta($current_user->ID, 'age', true) ?>
                            </p>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">Dzīves vieta</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo get_user_meta($current_user->ID, 'location', true) ?>
                            </p>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">Bērna vecums</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo get_user_meta($current_user->ID, 'child-age', true) ?> mēneši
                            </p>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="user-info__name">
                            <p class="body-smaller">Piena apjoms</p>
                        </div>
                        <div class="user-info__value">
                            <p class="body-smaller">
                                <?php echo (get_user_meta($current_user->ID, 'volume', true)) ? $volumeOfMilk : 'nav zināms'; ?>
                            </p>
                        </div>
                    </li>
                    <?php if ($current_user->roles[0] == 'um_davina-pienu') : ?>
                        <li class="d-flex">
                            <div class="user-info__name">
                                <p class="body-smaller">Ziedojuma veids</p>
                            </div>
                            <div class="user-info__value">
                                <p class="body-smaller">
                                    <?php echo get_user_meta($current_user->ID, 'time-interval', true) ?>
                                </p>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="user-info__name">
                                <p class="body-smaller">Gatava dāvināt</p>
                            </div>
                            <div class="user-info__value">
                                <p class="body-smaller">
                                    <?php echo $formatFromDate; ?> - <?php echo $formatToDate ?>
                                </p>
                            </div>
                        </li>

                    <?php endif ?>
                </ul>

            </div>
            <div class="col-lg-12 text-center">
                <a href="<?php echo get_option("siteurl"); ?>/rediget-profila-informaciju/" class="pm-btn pm-btn__blue-clicked">Rediģēt profila informāciju</a>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <?php $messageShortcode = get_field('message_shortcode')?: '[front-end-pm fepaction="messagebox" fep-filter="show-all"]' ?>
    <?php echo do_shortcode($messageShortcode) ?>
</div>
<?php get_footer(); ?>