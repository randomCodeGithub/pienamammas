<?php

/**
 * Template Name: Sludinājumi
 */
?>
<?php get_header();
global $user_ID;
?>

<!-- <i class="icon-checkmark"></i> -->
<section class="advertisements">
    <div class="container px-lg-0">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <?php
                $title = get_field('title')?: 'Mammas, kuras';
                $donate_milk_text = get_field('donate_milk_text')?: 'Vēlas saņemt pienu';
                $get_milk_text = get_field('get_milk_text')?: 'Vēlas dāvināt pienu';
                ?>
                <h1><?php echo $title ?></h1>

                <div class="choice">
                    <span class="<?php if (!$_GET['mother_type']) echo 'selected' ?>">
                        <a href="<?php echo get_option("siteurl"); ?>/sludinajumi/">
                            <h3><?php echo $donate_milk_text ?></h3>

                        </a>
                    </span>
                    <span class="<?php if ($_GET['mother_type'] == 'donate') echo 'selected' ?>">
                        <a href="<?php echo get_option("siteurl"); ?>/sludinajumi/?mother_type=donate">
                            <h3><?php echo $get_milk_text ?></h3>
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="filters">
                    <?php
                    $args1 = array(
                        'meta_key' => 'location',
                        'orderby' => 'meta_value',
                        'order' => 'ASC',
                        'role__in' => ($_GET['mother_type']) ? 'um_davina-pienu' : 'um_sanema-pienu'

                    );

                    $user_query_location = new WP_User_Query($args1);
                    if (!empty($user_query_location->results)) : ?>
                        <p class="body-smaller">Meklēt pēc:</p>
                        <div class="form-group d-md-flex">
                            <form>
                                <div class="selectBox select-arrow">
                                    <select class="form-control body-smaller">
                                        <option>Dzīves vieta</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>

                                <?php
                                $locations = [];
                                $allLocations = array(
                                    'Aizkraukles novads',
                                    'Augšdaugavas novads',
                                    'Ādažu novads',
                                    'Balvu novads',
                                    'Bauskas novads',
                                    'Cēsu novads',
                                    'Dienvidkurzemes novads',
                                    'Dobeles novads',
                                    'Jelgavas novads',
                                    'Jēkabpils novads',
                                    'Krāslavas novads',
                                    'Kuldīgas novads',
                                    'Ķekavas novads',
                                    'Limbažu novads',
                                    'Ludzas novads',
                                    'Madonas novads',
                                    'Mārupes novads',
                                    'Ogres novads',
                                    'Preiļu novads',
                                    'Rēzeknes novads',
                                    'Ropažu novads',
                                    'Saldus novads',
                                    'Saulkrastu novads',
                                    'Siguldas novads',
                                    'Smiltenes novads',
                                    'Talsu novads',
                                    'Tukuma novads',
                                    'Valmieras novads',
                                    'Daugavpils',
                                    'Jelgava',
                                    'Jēkabpils',
                                    'Jūrmala',
                                    'Liepāja',
                                    'Ogre',
                                    'Rēzekne',
                                    'Rīga',
                                    'Valmiera',
                                    'Ventspils'
                                );

                                $testt = array(
                                    'test' => 0,
                                    'test2' => 0
                                );


                                if (!empty($user_query_location->results)) {
                                    foreach ($user_query_location->results as $users) {
                                        $locations[] = get_user_meta($users->ID, 'location', true);

                                        foreach (array_keys($allLocations, get_user_meta($users->ID, 'location', true)) as $key) {
                                            unset($allLocations[$key]);
                                        }
                                    }
                                }

                                $location_count = array_count_values($locations);

                                // $location_count_result = 

                                $allLocations_associative = array();
                                if (!empty($allLocations)) {
                                    foreach ($allLocations as $key => $val) {
                                        $allLocations_associative[$val] = 0;
                                    }
                                    if (!empty($location_count)) {
                                        $location_count_result = array_merge($location_count, $allLocations_associative);
                                        // setlocale(LC_COLLATE, 'lv_LV');

                                        ksort($location_count_result, SORT_LOCALE_STRING);
                                    } else {
                                        $location_count_result = $allLocations_associative;
                                    }
                                } else {
                                    $location_count_result = $location_count;
                                }



                                // print_r($allLocations_ass);

                                ?>

                                <div id="checkboxes">
                                    <div class="list" data-simplebar>

                                        <?php foreach ($location_count_result as $location => $count) : ?>
                                            <div class="checkbox">
                                                <label class="body-smaller">
                                                    <input type="checkbox" name="location" class="br" value="<?php echo $location ?>" />
                                                    <span class="cr"><i class="icon-checkmark"></i></span>
                                                    <?php echo $location . ' (' . $count . ')' ?>
                                                </label>
                                            </div>
                                        <?php endforeach ?>
                                        <?php if (!empty($allLocations)) : ?>
                                            <?php foreach ($allLocations as $emptyLocation) : ?>
                                                <!-- <div class="checkbox">
                                                    <label class="body-smaller">
                                                        <input type="checkbox" name="location" class="br" value="<?php echo $emptyLocation ?>" />
                                                        <span class="cr"><i class="icon-checkmark"></i></span>
                                                        <?php echo $emptyLocation . ' (0)' ?>
                                                    </label>
                                                </div> -->
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </form>
                            <input type="number" id="volume" class="form-control body-smaller" value="" placeholder="Minimālais piena apjoms" />
                        </div>

                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <?php
            $users_per_page = 3;
            $current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;
            $args = array(
                'meta_key' => 'first_name',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'role__in' => (($_GET['mother_type']) ? 'um_davina-pienu' : 'um_sanema-pienu'),
                'number' => $users_per_page,
                'paged' => $current_page,

            );

            $user_query = new WP_User_Query($args);

            // print_r($user_query);
            $total_users = $user_query->get_total();
            $num_pages = ceil($total_users / $users_per_page);

            if (!empty($user_query->results)) {
                foreach ($user_query->results as $users) {
                    // Line below display the author data. 
                    // Use print_r($author); to display the complete author object.
            ?>
                    <div class="col-lg-4">
                        <div class="advertisements-block">
                            <div class="person d-flex align-items-center">
                                <div class="img-block" style="
                    background-image: url(<?php echo apply_filters('um_user_shortcode_filter__profile_photo', get_user_meta($users->ID, 'user-avatar', true), $users->ID) ?>);
                    background-position: center;
                  "></div>
                                <h4><?php echo $users->display_name; ?></h4>
                            </div>
                            <div class="info d-flex">
                                <ul class="data-name">
                                    <li>
                                        <p class="body-smaller">E-pasts</p>
                                    </li>
                                    <li>
                                        <p class="body-smaller">Dzīves vieta</p>
                                    </li>
                                    <li>
                                        <p class="body-smaller">Piena apjoms</p>
                                    </li>
                                </ul>
                                <ul class="data-value">
                                    <li class="user-current-email">
                                        <p class="body-smaller user-current-email">
                                        <div class="user-email body-smaller"><?php echo $users->user_email; ?></div>
                                        <div class="show-email body-smaller">Rādīt e-pastu</div>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="body-smaller">Jēkabpils</p>
                                    </li>
                                    <li>
                                        <p class="body-smaller">1500 ml</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>



        </div> -->
        <!-- <div class="row">
            <?php if ($num_pages > 1) : ?>
                <script>
                    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    var true_posts = '<?php echo serialize($user_query->query_vars); ?>';
                    var current_page = <?php echo $current_page ?>;
                    var max_pages = '<?php echo $num_pages ?>';
                </script>
                <a id="true_loadmore" data="<?php echo $num_pages; ?>" href="javascript:void(0)" class="pm-btn pm-btn__red d-block load-more-posts">Ielādēt vēl</a>
            <?php endif; ?>
        </div> -->
        <div class="row users dcs_full_div">

            <?php
            $users_per_page = 3;
            $current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;
            $args = array(
                'role__in' => ($_GET['mother_type']) ? 'um_davina-pienu' : 'um_sanema-pienu',
                'number' => '3',
                'offset' => '0',
                'order' => 'DESC'
            );
            $user_query = new WP_User_Query($args);

            $total_users = $user_query->get_total();
            $num_pages = ceil($total_users / $users_per_page);

            if (!empty($user_query->results)) {
                foreach ($user_query->results as $user) {
                    $single =  true;
                    $user_info = get_userdata($user->ID);
                    $first_name = $user_info->first_name;
                    $email = $user_info->user_email;
                    $volumeInit = (get_user_meta($user->ID, 'volume-unit', true) == 'Mililitri') ? 'ml' : 'l';
                    $volumeOfMilk = get_user_meta($user->ID, 'volume', true) . ' ' . $volumeInit;

                    $userPhotoLink;
                    if (get_user_meta($user->ID, 'user-avatar', true) == '') {
                        $userPhotoLink = get_stylesheet_directory_uri() . '/assets/img/profile/profile-default.svg';
                    } else {
                        $userPhotoLink = apply_filters('um_user_shortcode_filter__profile_photo', get_user_meta($user->ID, 'user-avatar', true), $user->ID);
                    }
            ?>

                    <?php
                    $subject;
                    if ($_GET['mother_type']) {
                        $subject = 'Piena dāvināšana';
                    } else {
                        $subject = 'Piena saņemšana';
                    }
                    ?>
                    <div class="col-lg-4">
                        <div class="advertisements-block position-relative">
                            <div class="advertisements-block-form d-none position-absolute w-100 h-100">
                                <div class="close-email-btn position-absolute">
                                    <span class="close-icon"></span>
                                </div>
                                <?php echo do_shortcode('[fep_shortcode_new_message_form to="' . $user_info->user_nicename . '" subject="' . $subject . '" heading=""]') ?>
                            </div>
                            <div class="person d-flex align-items-center">
                                <div class="img-block" style="
                    background-image: url(<?php echo ($user_ID) ? $userPhotoLink : get_stylesheet_directory_uri() . '/assets/img/profile/profile-default.svg'; ?>);
                    background-repeat: no-repeat;
                    background-position: center;
                    <?php
                    if ($user_ID) {
                        if (get_user_meta($user->ID, 'user-avatar', true) != '') {
                            echo 'background-size: cover;';
                        }
                    }
                    ?>
                    "></div>
                                <?php
                                if (!$user_ID) {
                                    if (strpos($first_name, ' ') !== false) {
                                        $first_name = substr($first_name, 0, strpos($first_name, ' '));
                                    }
                                }
                                ?>
                                <h4><?php echo $first_name; ?></h4>
                            </div>

                            <?php if ($user_ID) : ?>
                                <ul class="user-info">
                                    <li class="d-flex">
                                        <div class="user-info__name">
                                            <p class="body-smaller">E-pasts</p>
                                        </div>
                                        <div class="user-info__value">
                                            <div class="body-smaller user-current-email">
                                                <!-- <div class="user-email body-smaller"><?php echo $email ?></div> -->
                                                <a href="javascript:void(0)" class="show-email body-smaller">Sūtīt ziņu</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="user-info__name">
                                            <p class="body-smaller">Dzīves vieta</p>
                                        </div>
                                        <div class="user-info__value">
                                            <p class="body-smaller">
                                                <?php echo get_user_meta($user->ID, 'location', true) ?>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="user-info__name">
                                            <p class="body-smaller">Piena apjoms</p>
                                        </div>
                                        <div class="user-info__value">
                                            <p class="body-smaller">
                                                <?php echo (get_user_meta($user->ID, 'volume', true)) ? $volumeOfMilk : 'nav zināms'; ?>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <p class="notification body-smaller text-center">Pieslēgties, lai redzēt lietotāju informāciju. </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 dcs_attach_more">
                        <p>First Name : <?php echo $first_name; ?></p>
                        <p>Apjoms : <?php echo get_user_meta($user->ID, 'volume', true) ?></p>
                        <p>City : <?php echo get_user_meta($user->ID, 'location', true) ?></p>
                        <hr class="border">
                        </hr>
                    </div> -->
            <?php
                }
            } else {

                echo '<p class="body-small mx-auto">Diemžēl pašlaik nav sludinājumu.</p>';
            } ?>
            <!-- <div class="load_me_here"></div> -->

        </div>
        <div class="row position-relative load_more_area">
            <?php if ($total_users > 3) : ?>
                <a class="pm-btn pm-btn__red dcs_loadmore" href="javascript:void(0)">Ielādēt vēl</a>

            <?php endif ?>
            <!-- <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/loader.svg" class="position-absolute data-loader" style="top: 0; left: 50%; margin-left: -59px; z-index: 1;" alt=""> -->
        </div>
    </div>
</section>

<script>
    var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>'
</script>
<script type="text/javascript">
    var globChoices = null;
    var volume = null;
    let timeout;
    let current_page = 1;
    var userRole = '<?php echo ($_GET['mother_type']) ? 'um_davina-pienu' : 'um_sanema-pienu' ?>';
    jQuery('input#volume').val('');
    jQuery('#checkboxes .checkbox input').prop('checked', false);
    jQuery(document).ready(function($) {

        // LOCATION CHECKBOXES
        jQuery('#checkboxes .checkbox input').click(function() {
            var choices = {};
            globChoices = null;

            current_page = 1;

            if (timeout !== undefined) {
                clearTimeout(timeout);
            }

            $('.dcs_full_div').empty();
            //jQuery('.dcs_full_div').append('<div class="load_me_here"></div>');
            $('input[type=checkbox]:checked').each(function() {
                if (!choices.hasOwnProperty(this.name))
                    choices[this.name] = [this.value];
                else
                    choices[this.name].push(this.value);

            });
            timeout = setTimeout(function() {

                globChoices = choices;
                console.log(globChoices);
                offset = 0;

                jQuery.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: ({
                        action: "loadMore_users",
                        offset: offset,
                        myArray: myArray,
                        choices: globChoices,
                        volume: volume,
                        userRole: userRole,
                        current_page: current_page
                    }),
                    success: function(response) {
                        if (response != '0') {

                            offset = offset + 3;
                            jQuery('.load_me_here').append(response);
                            jQuery('.advertisements .users').append(response);
                            jQuery('.dcs_loadmore').show();
                        } else {
                            //jQuery('.dcs_loadmore_related_innovators').hide();
                            jQuery('.dcs_full_div').append('<p class="body-small mx-auto">Diemžēl pēc šādiem kritērijiem sludinājumu nav</p>');
                            jQuery('.dcs_loadmore').hide();
                            return false;
                        }
                    },
                });


            }, 1000);
        });


        $('input#volume').on('input', function(e) {
            volume = null;
            volume = this.value;
            console.log(volume);
            current_page = 1;

            if (timeout !== undefined) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function() {
                $('.dcs_full_div').empty();
                // jQuery('.dcs_full_div').append('<div class="load_me_here"></div>');

                offset = 0;
                jQuery.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: ({
                        action: "loadMore_users",
                        offset: offset,
                        myArray: myArray,
                        choices: globChoices,
                        volume: volume,
                        userRole: userRole,
                        current_page: current_page
                    }),
                    success: function(response) {
                        if (response != '0') {
                            offset = offset + 3;
                            jQuery('.dcs_loadmore').show();
                            jQuery('.load_me_here').append(response);
                            jQuery('.advertisements .users').append(response);
                        } else {
                            //jQuery('.dcs_loadmore_related_innovators').hide();
                            jQuery('.dcs_full_div').append('<p class="body-small mx-auto">Diemžēl pēc šādiem kritērijiem sludinājumu nav</p>');
                            jQuery('.dcs_loadmore').hide();
                            return false;
                        }
                    },
                });

            }, 1000);

        });
    });

    offset = 3;
    myArray = 123;

    // LOAD MORE BTN
    jQuery(".dcs_loadmore").click(function(event) {
        event.preventDefault();
        $(this).hide();

        current_page++;
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: ({
                action: "loadMore_users",
                offset: offset,
                myArray: myArray,
                choices: globChoices,
                volume: volume,
                userRole: userRole,
                current_page: current_page
            }),
            success: function(response) {
                if (response != '0') {
                    offset = offset + 3;

                    $('.dcs_loadmore').show();

                    jQuery('.load_me_here').append(response);
                    jQuery('.advertisements .users').append(response);
                } else {
                    jQuery('.dcs_loadmore').hide();
                    return false;
                }
            },
        });
    });
</script>

<?php get_footer(); ?>