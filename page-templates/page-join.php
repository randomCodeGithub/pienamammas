<?php

/**
 * Template Name: Pievienoties
 */

global $user_ID;
if ($user_ID) {
    $user = wp_get_current_user();
    if (in_array('administrator', (array) $user->roles)) {
        header('Location: ' . get_site_url() . '/dashboard/');
    } else {
        header('Location: ' . site_url() . '/profils');
    }
}
?>


<?php get_header();  ?>

<section class="join">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Pievienoties</h1>
                <h2>Vēlos:</h2>
                <div class="choice">
                    <a class="pm-btn pm-btn__blue-not-clicked <?php if ($_GET['mother_type'] == 'donate') echo 'pm-btn__blue-clicked' ?>
" href="<?php echo get_option("siteurl"); ?>/pievienoties/?mother_type=donate">Dāvināt pienu</a>
                    <a class="pm-btn pm-btn__blue-not-clicked <?php if ($_GET['mother_type'] == 'get') echo 'pm-btn__blue-clicked' ?>" href="<?php echo get_option("siteurl"); ?>/pievienoties/?mother_type=get">Saņemt pienu</a>
                </div>
                <?php
                if (!$_GET['mother_type']) : ?>
                    <a class="orange-link position-relative" style="z-index: 2;" href="<?php echo get_option("siteurl"); ?>/pieslegties/">
                        <h4>Pieslēgties ar jau eksistējošu profilu</h4>
                    </a>

                <?php endif ?>
            </div>
            <div class="col-lg-6 mx-auto" style="z-index: 2;">
                <?php
                // if ($_GET['mother_type'] == 'donate') {
                //     echo do_shortcode('[ultimatemember form_id="548"]');
                // } else if ($_GET['mother_type'] == 'get') {
                //     // echo 'is get';
                // }
                if ($_GET['mother_type']) {
                    echo do_shortcode('[ultimatemember form_id="548"]');
                    // echo do_shortcode('[ultimatemember form_id="672"]');
                }
                ?>
            </div>
            <?php
            if ($_GET['mother_type'] == 'get') { ?>
                <script>
                    jQuery(function() {
                        $("input:radio[name=role]").prop("checked", true);
                        // $('.um-field-radio').not('.active').find('input:radio[name=role]').prop("checked", true);
                    });
                </script>

            <?php
            }
            ?>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function() {

        $("#from-548, #to-548").on("change", function() {

            if ($(this).val() != '') {
                $(this).css('color', 'transparent');
            }
            if (!($("#um_field_548_from > p, #um_field_548_to > p").length > 0)) {
                $("#um_field_548_from, #um_field_548_to").append('<p class="from-format body-small position-absolute"></p>');
            }

            setTimeout(() => {
                if ($(this).parent().parent().find('input[type="hidden"]').val()) {
                    let dateFrom = $(this).parent().parent().find('input[type="hidden"]').val().split('/');
                    let dateFromNew = dateFrom[2] + '.' + dateFrom[1] + '.' + dateFrom[0];
                    $(this).parent().parent().find('p.body-small').text(dateFromNew);

                }
            }, 500);
        });

        $('#um_field_548_confirm_user_password input').after('<p class="body-smaller"></p>');

        $('#um_field_548_user_password input, #um_field_548_confirm_user_password input').on('keyup', function() {

            if ($('#um_field_548_confirm_user_password .um-field-error').length) {
                $('#um_field_548_confirm_user_password .um-field-error').remove();
            }


            if ($('#um_field_548_user_password input').val() == $('#um_field_548_confirm_user_password input').val()) {
                $('#um_field_548_confirm_user_password input + p').text('');
                $("#um_field_548_confirm_user_password input").css({
                    border: 'none',
                    color: ''
                });
                $('#um_field_548_confirm_user_password input + p').css({
                    'margin-top': '',
                    'margin-left': '',
                    'color': ''
                });

                $('input[type="submit"]').prop('disabled', false);
            }

            if ($('#um_field_548_user_password input').val() != $('#um_field_548_confirm_user_password input').val()) {
                $("#um_field_548_confirm_user_password input").css({
                    border: '1px solid #F48576',
                    color: '#F48576'
                });
                $('#um_field_548_confirm_user_password input + p').text('Paroles nesakrīt').css({
                    'margin-top': '-1.8rem',
                    'margin-left': '1.7rem',
                    'color': '#F48576'
                });

                $('input[type="submit"]').prop('disabled', true);
            }

        });
    });
</script>

<?php
if (isset($_POST['user_password-548']) && isset($_POST['confirm_user_password-548'])) :
    $password = $_POST['user_password-548'];
    $confirmPassword = $_POST['confirm_user_password-548'];
?>
    <?php if (($password == $confirmPassword) && (strlen($password) < 8  && strlen($confirmPassword) < 8)) : ?>
        <script>
            jQuery(function() {
                $('#um_field_548_user_password .um-field-error').text('Šajā laukā ir jābūt vismaz 8 rakstzīmēm');
            })
        </script>
    <?php endif ?>
    <?php if ($password != $confirmPassword) : ?>
        <script>
            jQuery(function() {
                $("#um_field_548_confirm_user_password input").css({
                    border: '1px solid #F48576',
                    color: '#F48576'
                });
            })
        </script>
    <?php endif ?>

<?php endif ?>

<?php get_footer(); ?>