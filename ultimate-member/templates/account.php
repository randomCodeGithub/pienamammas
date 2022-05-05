<?php if (!defined('ABSPATH')) exit; ?>
<?php global $current_user; ?>
<input type="hidden" name="user-current-photo" value="<?php echo apply_filters('um_user_shortcode_filter__profile_photo', get_user_meta($current_user->ID, 'user-avatar', true), $current_user->ID) ?>">
