<?php

/**
 * Template Name: Rediģēt profila informāciju
 */
?>
<?php get_header(); ?>

<?php echo do_shortcode('[ultimatemember_account]') ?>
<?php //echo do_shortcode('[ultimatemember form_id="537"]') ?>
<?php echo do_shortcode('[ultimatemember form_id="554"]') ?>
<?php //echo do_shortcode('[ultimatemember form_id="537"]');


// if ($_POST['my-input-image']) {
//     $UploadDirectory    =  WP_CONTENT_DIR . '/uploads/test/';
//     echo $_POST['my-input-image'];
//     move_uploaded_file($_FILES['my-input-image']['tmp_name'], $UploadDirectory . $_FILES['my-input-image']['name']);
// }
?>



<?php //echo do_action('um_after_account_general') 
?>
<?php //echo do_action('um_account_pre_update_profile') 
?>

<?php get_footer(); ?>