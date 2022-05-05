<?php

define('TD', 'pandago-child');

function register_theme_nav()
{
  register_nav_menus(
    array(
      'header-nav'  => __('Header Navigation', TD),
      'header-tablet-nav'  => __('Header(Tablet) Navigation', TD),
      'sidebar-nav' => __('Sidebar Navigation', TD)
    )
  );
}

add_action('wp_enqueue_scripts', "pienamammas_scripts");

function pienamammas_scripts()
{
  wp_enqueue_style('bootstraps_css',   'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css');
  wp_enqueue_style('simplebar_css',   'https://unpkg.com/simplebar@latest/dist/simplebar.css');
  wp_enqueue_script('bootstraps_script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js');
  wp_enqueue_style('awesone.css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('fonts_default', '//fonts.googleapis.com/css?family=Montserrat:400,700');
  // wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/style.css');

  wp_dequeue_script('select2');

  wp_enqueue_script('scripts_theme', get_stylesheet_directory_uri() . '/assets/theme.js',   array(), '20151215', true);
  wp_enqueue_script('simplebar_js', 'https://unpkg.com/simplebar@latest/dist/simplebar.min.js',   array(), '1.0', true);
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_footer', 'wpse_262301_wp_footer', 11);
function wpse_262301_wp_footer()
{
  wp_dequeue_script('select2');
}

function register_acf_block_types()
{

  acf_register_block_type(array(
    'name'              => 'quote',
    'title'             => __('Quote block'),
    'description'       => __('Quote block'),
    'render_template'   => 'template-parts/blocks/quote.php',
    'category'          => 'formatting',
    'icon'              => 'format-quote',
    'mode'              => 'preview',
    'keywords'          => array('quote'),
  ));
  acf_register_block_type(array(
    'name'              => 'image-with-text',
    'title'             => __('Image with text'),
    'description'       => __('Image with text'),
    'render_template'   => 'template-parts/blocks/image-with-text.php',
    'category'          => 'formatting',
    'icon'              => 'media-document',
    'mode'              => 'preview',
    'keywords'          => array('image-with-text'),
  ));
  acf_register_block_type(array(
    'name'              => 'bullet-color-list',
    'title'             => __('Bullet color list'),
    'description'       => __('Bullet color list(orange / grey)'),
    'render_template'   => 'template-parts/blocks/bullet-color-list.php',
    'category'          => 'formatting',
    'icon'              => 'editor-ul',
    'mode'              => 'preview',
    'keywords'          => array('bullet-color-list'),
  ));
}
// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
  add_action('acf/init', 'register_acf_block_types');
}

function my_styles()
{
  wp_enqueue_style('child-style', URL_THEME . '/assets/css/style.css', array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'my_styles');

add_action('admin_init', function () {
  // Redirect any user trying to access comments page
  global $pagenow;

  if ($pagenow === 'edit-comments.php') {
    wp_redirect(admin_url());
    exit;
  }

  // Remove comments metabox from dashboard
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

  // Disable support for comments and trackbacks in post types
  foreach (get_post_types() as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
  if (is_admin_bar_showing()) {
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
  }
});

add_filter('nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3);

// NAVIGATION MENU CLASSES
function wpse156165_menu_add_class($atts, $item, $args)
{

  $button_style = get_field('button_style', $item);
  $disabledOnDevices = get_field('disable', $item);

  if ($disabledOnDevices) {
    foreach ($disabledOnDevices as $device) {
      if ($device == 'mobile') {
        $atts['class'] .= $device . '-disable ';
      }
      if ($device == 'tablet') {
        $atts['class'] .= $device . '-disable ';
      }
    }
  }

  if ($button_style) {
    $atts['class'] .= 'pm-btn pm-btn__nav';
  }
  return $atts;
}

add_filter('um_user_shortcode_filter__profile_photo', 'userProfilePhoto', 10, 2);

function userProfilePhoto($meta_value, $user_id)
{
  return "" . get_site_url() . "/wp-content/uploads/ultimatemember/{$user_id}/{$meta_value}";
}

add_action('um_after_account_general', 'showUMExtraFields', 100);

function showUMExtraFields()
{
  $id = um_user('ID');
  $output = '';
  $names = array('location', 'age', 'user-avatar', 'user_password', 'time-interval', 'from', 'to');

  $fields = array();
  foreach ($names as $name)
    $fields[$name] = UM()->builtin()->get_specific_field($name);
  $fields = apply_filters('um_account_secure_fields', $fields, $id);
  foreach ($fields as $key => $data)
    $output .= UM()->fields()->edit_field($key, $data);

  echo $output;
}

add_action('um_account_pre_update_profile', 'getUMFormData', 100);

function getUMFormData()
{
  $id = um_user('ID');
  $names = array('location', 'age', 'user-avatar', 'user_password', 'time-interval', 'from', 'to');

  foreach ($names as $name)
    update_user_meta($id, $name, $_POST[$name]);
}

/**
 * Add new predefined field "Profile Photo" in UM Form Builder.
 */
add_filter("um_predefined_fields_hook", "um_predefined_fields_hook_profile_photo", 99999, 1);
function um_predefined_fields_hook_profile_photo($arr)
{


  $arr['profile_photo'] = array(
    'title' => __('Profile Photo', 'ultimate-member'),
    'metakey' => 'profile_photo',
    'type' => 'image',
    'label' => __('Change your profile photo', 'ultimate-member'),
    'upload_text' => __('Upload your photo here', 'ultimate-member'),
    'icon' => 'um-faicon-camera',
    'crop' => 1,
    'max_size' => (UM()->options()->get('profile_photo_max_size')) ? UM()->options()->get('profile_photo_max_size') : 999999999,
    'min_width' => str_replace('px', '', UM()->options()->get('profile_photosize')),
    'min_height' => str_replace('px', '', UM()->options()->get('profile_photosize')),
  );

  return $arr;
}

/**
 *  Multiply Profile Photo with different sizes
 */
// add_action('um_registration_set_extra_data', 'um_registration_set_profile_photo', 9999, 2);
// function um_registration_set_profile_photo($user_id, $args)
// {

//   if (empty($args['custom_fields'])) return;

//   if (!isset($args['form_id'])) return;

//   if (!isset($args['profile_photo']) || empty($args['profile_photo'])) return;
//   $files = array();

//   $fields = unserialize($args['custom_fields']);

//   $user_basedir = UM()->uploader()->get_upload_user_base_dir($user_id, true);

//   $profile_photo = get_user_meta($user_id, 'profile_photo', true);

//   $image_path = $user_basedir . DIRECTORY_SEPARATOR . $profile_photo;

//   $image = wp_get_image_editor($image_path);

//   $file_info = wp_check_filetype_and_ext($image_path, $profile_photo);

//   $ext = $file_info['ext'];

//   $new_image_name = str_replace($profile_photo,  "profile_photo." . $ext, $image_path);

//   $sizes = UM()->options()->get('photo_thumb_sizes');

//   $quality = UM()->options()->get('image_compression');

//   if (!is_wp_error($image)) {

//     $max_w = UM()->options()->get('image_max_width');
//     if ($src_w > $max_w) {
//       $image->resize($max_w, $src_h);
//     }

//     $image->save($new_image_name);

//     $image->set_quality($quality);

//     $sizes_array = array();

//     foreach ($sizes as $size) {
//       $sizes_array[] = array('width' => $size);
//     }

//     $image->multi_resize($sizes_array);

//     delete_user_meta($user_id, 'synced_profile_photo');
//     update_user_meta($user_id, 'profile_photo', "profile_photo.{$ext}");
//     @unlink($image_path);
//   }
// }

/**
 * Ultimate Member - Customization
 * Description: Allow everyone to upload profile and cover photos on front-end pages.
 */
// add_filter("um_user_pre_updating_files_array", "um_custom_user_pre_updating_files_array", 10, 1);
// function um_custom_user_pre_updating_files_array($arr_files)
// {

//   if (is_array($arr_files)) {
//     foreach ($arr_files as $key => $details) {
//       if ($key == "user-avatar") {
//         unset($arr_files[$key]);
//         $arr_files["profile_photo"] = $details;
//       }
//     }
//   }

//   return $arr_files;
// }

// add_filter("um_allow_frontend_image_uploads", "um_custom_allow_frontend_image_uploads", 10, 3);
// function um_custom_allow_frontend_image_uploads($allowed, $user_id, $key)
// {

//   if ($key == "profile_photo") {
//     return true;
//   }

//   return $allowed; // false
// }

function fn_upload_file()
{
  global $current_user;
  global $user_ID;
  // echo  get_user_meta($current_user->ID, 'user-avatar', true);
  // if (isset($_POST['red-acc'])) {
  //   $upload_dir = wp_upload_dir();

  //   if (!empty($upload_dir['basedir'])) {
  //     $user_dirname = $upload_dir['basedir'] . '/test';
  //     if (!file_exists($user_dirname)) {
  //       wp_mkdir_p($user_dirname);
  //     }

  //     $files = glob($user_dirname.'/*');

  //     // Deleting all the files in the list
  //     foreach ($files as $file) {

  //       if (is_file($file))
  //         // Delete the given file
  //         unlink($file);
  //     }

  //     $filename = wp_unique_filename($user_dirname, $_FILES['my-input-image']['name']);
  //     move_uploaded_file($_FILES['my-input-image']['tmp_name'], $user_dirname . '/' . $filename);
  //     copy($user_dirname .'/'.$filename, $upload_dir['basedir'] .'/'. $filename);
  //   }
  // }

  if ($user_ID) {
    if (isset($_POST['user-avatar-554'])) {
      $upload_dir = wp_upload_dir();
      $user_dirname = $upload_dir['basedir'] . '/ultimatemember/temp';
      $filename = $_POST['user-avatar-554'];
      if (file_exists($user_dirname . '/' . $filename)) {
        copy($user_dirname . '/' . $filename, $upload_dir['basedir'] . '/ultimatemember/' . $current_user->ID . '/' . $filename);
        update_user_meta($current_user->ID, 'user-avatar', $filename);
      }
    }

    if (isset($_POST['remove-user'])) {
      require_once(ABSPATH . 'wp-admin/includes/user.php');
      wp_delete_user($current_user->ID);
    }

    if (isset($_POST['user_password-554']) && isset($_POST['confirm_user_password-554'])) {
      $passwordEdit = $_POST['user_password-554'];
      $confirmPasswordEdit = $_POST['confirm_user_password-554'];

      if (($passwordEdit == $confirmPasswordEdit) && (strlen($passwordEdit) >= 8  && strlen($confirmPasswordEdit) >= 8)) {
        // Get current logged-in user.
        $user = wp_get_current_user();
        wp_set_password($passwordEdit, $current_user->ID);
        // Log-in again.
        wp_set_auth_cookie($user->ID);
        wp_set_current_user($user->ID);
        do_action('wp_login', $user->user_login, $user);
      }
    }
  }
}
add_action('init', 'fn_upload_file');

function my_wp_nav_menu_args($args = '')
{

  if (is_user_logged_in()) {
    $args['menu'] = 'logged-in';
  } else {
    $args['menu'] = 'logged-out';
  }
  return $args;
}
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args');

function true_load_posts()
{

  $args = unserialize(stripslashes($_POST['query']));
  $args['paged'] = $_POST['page'] + 1; // следующая страница
  $args['post_status'] = 'publish';

  query_posts($args);
  // если посты есть
  if (have_posts()) :
    // запускаем цикл
    while (have_posts()) : the_post() ?>

      <?php if ($args['post_type'] == 'useful') : ?>
        <div class="post-block">
          <h3><?php the_title(); ?></h3>
          <p class="body-small"><?php the_field('excerpt', get_the_ID()); ?></p>
          <a class="body-small" href="<?php the_permalink(); ?>">Lasīt visu rakstu</a>
        </div>
      <?php elseif ($args['post_type'] == 'experts') : ?>
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
      <?php elseif ($args['post_type'] == 'experience_stories') : ?>
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
      <?php endif ?>

    <?php endwhile;

  endif;
  wp_reset_postdata();
  die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

function loads_users()
{

  global $user_ID;
  extract($_POST);
  $meta_query = array('relation' => 'OR');

  $locations = $_POST['choices'];
  $volume = $_POST['volume'];

  // print_r($_POST['choices']);
  // echo $volume;
  // if (isset($_POST['choices'])) {
  //   foreach ($locations as $Key => $Value) {

  //     if (count($Value)) {
  //       foreach ($Value as $Inkey => $Invalue) {
  //         $meta_query[] = array('key' => $Key, 'value' => $Invalue, 'compare' => '=');
  //       }
  //     }
  //   }
  // }

  $location_query = array('relation' => 'OR');
  if (isset($_POST['choices'])) {
    foreach ($locations as $Key => $Value) {

      if (count($Value)) {
        foreach ($Value as $Inkey => $Invalue) {
          $location_query[] = array('key' => $Key, 'value' => $Invalue, 'compare' => '=');
        }
      }
    }
  }



  $args = array(
    'role__in' => $userRole,
    'number' => '3',
    'offset' => $offset,
    'meta_query' => array(
      'relation' => 'AND',

      $location_query,
      array(
        'key'     => 'volume',
        'value'   => $volume,
        'compare' => '>=',
        'type' => 'NUMERIC'

      )
    ),

    'order' => 'DESC',
  );
  $user_query = new WP_User_Query($args);
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

      $total_users = $user_query->get_total();
      $num_pages = ceil($total_users / 3);

      if ($_POST['current_page'] == $num_pages) {
        echo '<script>jQuery(".dcs_loadmore").hide()</script>';
      }

      $subject;
      if ($userRole == 'um_davina-pienu') {
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

<?php
    }
  } else {
    echo "0";
  }
  die();
}

add_action('wp_ajax_loadMore_users', 'loads_users');
add_action('wp_ajax_nopriv_loadMore_users', 'loads_users');

add_filter('site_transient_update_plugins', 'filter_plugin_updates');
function filter_plugin_updates($value)
{
  unset($value->response['front-end-pm/front-end-pm.php']);
  return $value;
}

function human_time_diff_latvian($from, $to = '')
{
  if (empty($to)) {
    $to = time();
  }

  $diff = (int) abs($to - $from);

  if ($diff < HOUR_IN_SECONDS) {
    $mins = round($diff / MINUTE_IN_SECONDS);
    if ($mins <= 1)
      $mins = 1;
    /* translators: min=minute */
    $since = sprintf(_n('%s min', '%s min', $mins), $mins);
  } elseif ($diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS) {
    $hours = round($diff / HOUR_IN_SECONDS);
    if ($hours <= 1)
      $hours = 1;
    $since = sprintf(_n('%s stundām', '%s stundām', $hours), $hours);
  } elseif ($diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS) {
    $days = round($diff / DAY_IN_SECONDS);
    if ($days <= 1)
      $days = 1;
    $since = sprintf(_n('%s dienām', '%s dienām', $days), $days);
  } elseif ($diff < MONTH_IN_SECONDS && $diff >= WEEK_IN_SECONDS) {
    $weeks = round($diff / WEEK_IN_SECONDS);
    if ($weeks <= 1)
      $weeks = 1;
    $since = sprintf(_n('%s nedēļām', '%s nedēļām', $weeks), $weeks);
  } elseif ($diff < YEAR_IN_SECONDS && $diff >= MONTH_IN_SECONDS) {
    $months = round($diff / MONTH_IN_SECONDS);
    if ($months <= 1)
      $months = 1;
    $since = sprintf(_n('%s mēneša', '%s mēneša ', $months), $months);
  } elseif ($diff >= YEAR_IN_SECONDS) {
    $years = round($diff / YEAR_IN_SECONDS);
    if ($years <= 1)
      $years = 1;
    $since = sprintf(_n('%s gadiem', '%s gadiem', $years), $years);
  }

  return apply_filters('human_time_diff_latvian', $since, $diff, $from, $to);
}

add_filter('fep_get_the_date', 'fep_format_date_new');

function fep_format_date_new($date)
{
  if ('0000-00-00 00:00:00' === $date) {
    $h_time = __('Unpublished', 'front-end-pm');
  } else {
    $time = strtotime($date);
    //$time = get_post_time( 'G', true, $post, false );
    if ((abs($t_diff = time() - $time)) < DAY_IN_SECONDS) {
      if ($t_diff < 0) {
        $h_time = sprintf(__('%s from now', 'front-end-pm'), human_time_diff_latvian($time));
      } else {
        $h_time = sprintf(__('pirms %s', 'front-end-pm'), human_time_diff_latvian($time));
        // $h_time = $date;
      }
    } else {
      $h_time = mysql2date(get_option('date_format') . ' ' . get_option('time_format'), get_date_from_gmt($date));
    }
  }
  return apply_filters('fep_formate_date', $h_time, $date);
}

add_filter('fep_menu_buttons', 'fep_cus_fep_menu_buttons', 99);

function fep_cus_fep_menu_buttons($menu)
{
  unset($menu['announcements']);
  unset($menu['newmessage']);
  return $menu;
}
