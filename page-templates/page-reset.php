<?php /* Template Name: Reset password Page */ ?>

<?php 
global $user_ID;

if ($user_ID) {
header('Location: ' . get_site_url());
}

get_header();
?>

<section class="member-reset-password">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mx-auto">
                <h1>Atiestatīt paroli</h1>
                <?php echo do_shortcode('[reset_password]') ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>