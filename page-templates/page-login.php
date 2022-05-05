<?php

/**
 * Template Name: Pieslēgties
 */
?>

<?php
global $user_ID;
global $wpdb;
?>

<?php

if ($user_ID) {
    $user = wp_get_current_user();
    if (in_array('administrator', (array) $user->roles)) {
        header('Location: ' . get_site_url() . '/dashboard/');
    } else {
        header('Location: ' . site_url() . '/profils');
    }
}

if (!isset($_POST['action']) || $_POST['action'] !== 'my_login_action') {

?>

    <?php get_header(); ?>

    <section class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Pieslēgties</h1>
                </div>
                <div class="col-12 col-lg-6 mx-auto">
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="email" name="log" class="form-control body-small" placeholder="E-pasts" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="pwd" class="form-control body-small" placeholder="Parole" />
                        </div>
                        <button type="submit" name="btn_submit" style="z-index: 2;" class="btn pm-btn pm-btn__blue body-smaller">
                            Ienākt
                        </button>
                        <input type="hidden" name="action" value="my_login_action" />
                    </form>
                    <div class="text-center mt-4">
                            <a href="<?php echo get_option("siteurl"); ?>/atiestatit-paroli/">Aizmirsi paroli?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>

    <?php

} else {
    // see the codex for wp_signon()
    $result = wp_signon();

    if (is_wp_error($result)) {
        get_header();
    ?>


        <section class="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Pieslēgties</h1>
                    </div>
                    <div class="col-12 col-lg-6 mx-auto">
                        <?php

                        if (trim($_POST['log']) != '' && trim($_POST['pwd']) != '') {
                        ?>
                            <div class="errors"><p class="body-smaller">e-pasts / parole nav pareiza</p></div>
                        <?php } ?>
                        <form method="POST">
                            <div class="form-group">
                                <input type="email" name="log" class="form-control body-small" value="<?php echo $_POST['log'] ?>" placeholder="E-pasts" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="pwd" class="form-control body-small" placeholder="Parole" />
                            </div>
                            <button type="submit" style="z-index: 2;" class="btn pm-btn pm-btn__blue body-smaller">
                                Ienākt
                            </button>
                            <input type="hidden" name="action" value="my_login_action" />
                        </form>
                        <div class="text-center mt-4">
                            <a href="<?php echo get_option("siteurl"); ?>/atiestatit-paroli/">Aizmirsi paroli?</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
        get_footer();
    } else {
        header('Location: ' . $_SERVER['REQUEST_URI']);
        // echo "<script>window.location = '" . $_SERVER['REQUEST_URI'] . "'</script>";
    }
}

?>