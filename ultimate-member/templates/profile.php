<?php if (!defined('ABSPATH')) exit; ?>
<?php global $current_user;
if (!$_GET['mother_type']) {
	if ($current_user->roles[0] == 'um_sanema-pienu') {
		header('Location: ' . get_page_link() . '?mother_type=get');
	} elseif ($current_user->roles[0] == 'um_davina-pienu') {
		header('Location: ' . get_page_link() . '?mother_type=donate');
	}
}
?>
<?php if ($_GET['mother_type'] == 'get') : ?>
	<style>
		.um-time-interval label {
			display: none;
		}
	</style>
<?php endif; ?>
<section class="join edit-profile">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h1>Rediģēt profila informāciju</h1>
				<h2>Vēlos:</h2>
				<div class="choice">
					<a id="donate" class="pm-btn pm-btn__blue-not-clicked <?php if ($_GET['mother_type'] == 'donate') echo 'pm-btn__blue-clicked' ?>
" href="<?php echo get_page_link() ?>?mother_type=donate">Dāvināt pienu</a>
					<a id="get" class="pm-btn pm-btn__blue-not-clicked <?php if ($_GET['mother_type'] == 'get') echo 'pm-btn__blue-clicked' ?>" href="<?php echo get_page_link() ?>?mother_type=get">Saņemt pienu</a>
				</div>
			</div>
			<div class="col-lg-6 mx-auto" style="z-index: 2;">
				<div class="um <?php echo esc_attr($this->get_class($mode)); ?> um-<?php echo esc_attr($form_id); ?> um-role-<?php echo esc_attr(um_user('role')); ?> ">

					<div class="um-form" data-mode="<?php echo esc_attr($mode) ?>">

						<?php
						/**
						 * UM hook
						 *
						 * @type action
						 * @title um_profile_before_header
						 * @description Some actions before profile form header
						 * @input_vars
						 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
						 * @change_log
						 * ["Since: 2.0"]
						 * @usage add_action( 'um_profile_before_header', 'function_name', 10, 1 );
						 * @example
						 * <?php
						 * add_action( 'um_profile_before_header', 'my_profile_before_header', 10, 1 );
						 * function my_profile_before_header( $args ) {
						 *     // your code here
						 * }
						 * ?>
						 */
						do_action('um_profile_before_header', $args);

						if (um_is_on_edit_profile()) { ?>
							<form method="post" action="">
							<?php }

						/**
						 * UM hook
						 *
						 * @type action
						 * @title um_profile_header_cover_area
						 * @description Profile header cover area
						 * @input_vars
						 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
						 * @change_log
						 * ["Since: 2.0"]
						 * @usage add_action( 'um_profile_header_cover_area', 'function_name', 10, 1 );
						 * @example
						 * <?php
						 * add_action( 'um_profile_header_cover_area', 'my_profile_header_cover_area', 10, 1 );
						 * function my_profile_header_cover_area( $args ) {
						 *     // your code here
						 * }
						 * ?>
						 */
						do_action('um_profile_header_cover_area', $args);

						/**
						 * UM hook
						 *
						 * @type action
						 * @title um_profile_header
						 * @description Profile header area
						 * @input_vars
						 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
						 * @change_log
						 * ["Since: 2.0"]
						 * @usage add_action( 'um_profile_header', 'function_name', 10, 1 );
						 * @example
						 * <?php
						 * add_action( 'um_profile_header', 'my_profile_header', 10, 1 );
						 * function my_profile_header( $args ) {
						 *     // your code here
						 * }
						 * ?>
						 */
						do_action('um_profile_header', $args);

						/**
						 * UM hook
						 *
						 * @type filter
						 * @title um_profile_navbar_classes
						 * @description Additional classes for profile navbar
						 * @input_vars
						 * [{"var":"$classes","type":"string","desc":"UM Posts Tab query"}]
						 * @change_log
						 * ["Since: 2.0"]
						 * @usage
						 * <?php add_filter( 'um_profile_navbar_classes', 'function_name', 10, 1 ); ?>
						 * @example
						 * <?php
						 * add_filter( 'um_profile_navbar_classes', 'my_profile_navbar_classes', 10, 1 );
						 * function my_profile_navbar_classes( $classes ) {
						 *     // your code here
						 *     return $classes;
						 * }
						 * ?>
						 */
						$classes = apply_filters('um_profile_navbar_classes', ''); ?>

							<div class="um-profile-navbar <?php echo esc_attr($classes); ?>">
								<?php
								/**
								 * UM hook
								 *
								 * @type action
								 * @title um_profile_navbar
								 * @description Profile navigation bar
								 * @input_vars
								 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
								 * @change_log
								 * ["Since: 2.0"]
								 * @usage add_action( 'um_profile_navbar', 'function_name', 10, 1 );
								 * @example
								 * <?php
								 * add_action( 'um_profile_navbar', 'my_profile_navbar', 10, 1 );
								 * function my_profile_navbar( $args ) {
								 *     // your code here
								 * }
								 * ?>
								 */
								do_action('um_profile_navbar', $args); ?>
								<div class="um-clear"></div>
							</div>

							<?php
							/**
							 * UM hook
							 *
							 * @type action
							 * @title um_profile_menu
							 * @description Profile menu
							 * @input_vars
							 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
							 * @change_log
							 * ["Since: 2.0"]
							 * @usage add_action( 'um_profile_menu', 'function_name', 10, 1 );
							 * @example
							 * <?php
							 * add_action( 'um_profile_menu', 'my_profile_navbar', 10, 1 );
							 * function my_profile_navbar( $args ) {
							 *     // your code here
							 * }
							 * ?>
							 */
							do_action('um_profile_menu', $args);

							if (um_is_on_edit_profile() || UM()->user()->preview) {

								$nav = 'main';
								$subnav = UM()->profile()->active_subnav();
								$subnav = !empty($subnav) ? $subnav : 'default'; ?>

								<div class="um-profile-body <?php echo esc_attr($nav . ' ' . $nav . '-' . $subnav); ?>">
									<form method="POST" action="">
										<?php
										/**
										 * UM hook
										 *
										 * @type action
										 * @title um_profile_content_{$nav}
										 * @description Custom hook to display tabbed content
										 * @input_vars
										 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
										 * @change_log
										 * ["Since: 2.0"]
										 * @usage add_action( 'um_profile_content_{$nav}', 'function_name', 10, 1 );
										 * @example
										 * <?php
										 * add_action( 'um_profile_content_{$nav}', 'my_profile_content', 10, 1 );
										 * function my_profile_content( $args ) {
										 *     // your code here
										 * }
										 * ?>
										 */
										do_action("um_profile_content_{$nav}", $args);
										/**
										 * UM hook
										 *
										 * @type action
										 * @title um_profile_content_{$nav}_{$subnav}
										 * @description Custom hook to display tabbed content
										 * @input_vars
										 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
										 * @change_log
										 * ["Since: 2.0"]
										 * @usage add_action( 'um_profile_content_{$nav}_{$subnav}', 'function_name', 10, 1 );
										 * @example
										 * <?php
										 * add_action( 'um_profile_content_{$nav}_{$subnav}', 'my_profile_content', 10, 1 );
										 * function my_profile_content( $args ) {
										 *     // your code here
										 * }
										 * ?>
										 */
										do_action("um_profile_content_{$nav}_{$subnav}", $args); ?>

										<div class="clear"></div>

									</form>
								</div>

								<?php if (!UM()->user()->preview) { ?>

							</form>

						<?php }
							} else {
								$menu_enabled = UM()->options()->get('profile_menu');
								$tabs = UM()->profile()->tabs_active();

								$nav = UM()->profile()->active_tab();
								$subnav = UM()->profile()->active_subnav();
								$subnav = !empty($subnav) ? $subnav : 'default';

								if ($menu_enabled || !empty($tabs[$nav]['hidden'])) { ?>

							<div class="um-profile-body <?php echo esc_attr($nav . ' ' . $nav . '-' . $subnav); ?>">
								<form action="<?php echo get_page_link() ?>" method="post">
									<?php
									// Custom hook to display tabbed content
									/**
									 * UM hook
									 *
									 * @type action
									 * @title um_profile_content_{$nav}
									 * @description Custom hook to display tabbed content
									 * @input_vars
									 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
									 * @change_log
									 * ["Since: 2.0"]
									 * @usage add_action( 'um_profile_content_{$nav}', 'function_name', 10, 1 );
									 * @example
									 * <?php
									 * add_action( 'um_profile_content_{$nav}', 'my_profile_content', 10, 1 );
									 * function my_profile_content( $args ) {
									 *     // your code here
									 * }
									 * ?>
									 */
									do_action("um_profile_content_{$nav}", $args);

									/**
									 * UM hook
									 *
									 * @type action
									 * @title um_profile_content_{$nav}_{$subnav}
									 * @description Custom hook to display tabbed content
									 * @input_vars
									 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
									 * @change_log
									 * ["Since: 2.0"]
									 * @usage add_action( 'um_profile_content_{$nav}_{$subnav}', 'function_name', 10, 1 );
									 * @example
									 * <?php
									 * add_action( 'um_profile_content_{$nav}_{$subnav}', 'my_profile_content', 10, 1 );
									 * function my_profile_content( $args ) {
									 *     // your code here
									 * }
									 * ?>
									 */
									//	do_action("um_profile_content_{$nav}_{$subnav}", $args); 
									?>

									<div class="clear"></div>
								</form>
							</div>

					<?php }
							}

							do_action('um_profile_footer', $args); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-12 text-center" style="z-index: 2;">
				<a href="javascript:void(0);" class="remove-profile body-smaller">Dzēst profilu</a>
			</div>
		</div>
	</div>
</section>

<!-- REMOVE PROFILE OVERLAY -->
<div class="remove-overlay d-none w-100 h-100 justify-content-center align-items-center">
	<div class="background-color position-absolute w-100 h-100"></div>
	<div class="remove-area">
		<h3>Vai tiešām vēlaties dzēst profilu?</h3>
		<p class="body-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy. Lorem ipsum dolor sit amet, consetetur elitr, sed</p>
		<form action="<?php echo get_option("siteurl"); ?>/pievienoties" method="POST">
			<button name="remove-user" class="pm-btn pm-btn__red">Dzēst</button>
			<a href="javascript:void(0);" class="pm-btn">Atcelt</a>
		</form>
	</div>
</div>

<!-- if USER IS MILK DONATER AND PROFILE FORM IS GET -->
<?php
if ($_GET['mother_type'] == 'get' && $current_user->roles[0] == 'um_davina-pienu') { ?>
	<script>
		jQuery(function() {
			$("input:radio[name=role]").not(':checked').prop("checked", true);
		});
	</script>
<?php
}
// if USER WANT GET MILK AND PROFILE FORM IS DONATE
if ($_GET['mother_type'] == 'donate' && $current_user->roles[0] == 'um_sanema-pienu') { ?>
	<script>
		jQuery(function() {
			$("input:radio[name=role]").not(':checked').prop("checked", true);
		});
	</script>

<?php
}
?>

<?php
if (get_user_meta($current_user->ID, 'user-avatar', true) != '') : ?>
	<script>
		jQuery(document).ready(function() {
			$(window).load(function() {
				jQuery(".um-field-image .img-upload-block .img-options")
					.append(
						'<a href="javascript:void(0);" class="body-small d-block remove-current-photo">Dzēst bildi</a>'
					);

				$('.um-field-image .img-upload-block .img-options a[data-modal="um_upload_single"]').text('Mainīt bildi');

				$(".img-upload-block #uploaded-photo").css({
					"background-image": "url(<?php echo apply_filters('um_user_shortcode_filter__profile_photo', get_user_meta($current_user->ID, 'user-avatar', true), $current_user->ID) ?>)",
					"background-size": "cover",
				});

				$('.remove-current-photo').on('click', function() {
					$(".img-upload-block #uploaded-photo").css({
						"background-image": "url(<?php echo get_stylesheet_directory_uri() ?>/assets/img/upload-default-photo.svg)",
						"background-size": "auto",
					});
					$('input[name="user-avatar-554"]').val('')
					$('.um-field-image .img-upload-block .img-options a[data-modal="um_upload_single"]').text('Pievienot bildi');
					$(this).remove();
				})
			})
		})
	</script>
<?php endif; ?>

<?php if ($current_user->roles[0] == 'um_davina-pienu') :
	if (!empty(get_user_meta($current_user->ID, 'from', true))) {
		$fromDate = DateTime::createFromFormat('Y/m/d', get_user_meta($current_user->ID, 'from', true));
		$formatFromDate = $fromDate->format('d.m.Y');
	}
	if (!empty(get_user_meta($current_user->ID, 'to', true))) {
		$toDate = DateTime::createFromFormat('Y/m/d', get_user_meta($current_user->ID, 'to', true));
		$formatToDate = $toDate->format('d.m.Y');
	}
?>
	<!-- <script>
		jQuery(window).load(function() {
			$('#from-554, #to-554').css('color', 'transparent');
			let dateFrom = $("#um_field_554_from").append('<p class="from-format body-small position-absolute"><?php echo $formatFromDate ?></p>');
			let dateto = $("#um_field_554_to").append('<p class="to-format body-small position-absolute"><?php echo $formatToDate ?></p>');
		})
	</script> -->
<?php endif ?>

<script>
	jQuery(document).ready(function() {


		// <?php if ($_GET['mother_type'] == 'donate') : ?>
		// 	<?php if (get_user_meta($current_user->ID, 'from', true) == '') : ?>
		// 		$("#from-554").on("change", function() {

		// 			if ($(this).val() != '') {
		// 				$(this).css('color', 'transparent');
		// 			}
		// 			if (!($("#um_field_554_from > p").length > 0)) {
		// 				$("#um_field_554_from").append('<p class="from-format body-small position-absolute"></p>');
		// 			}

		// 			setTimeout(() => {
		// 				if ($(this).parent().parent().find('input[type="hidden"]').val()) {
		// 					let dateFrom = $(this).parent().parent().find('input[type="hidden"]').val().split('/');
		// 					let dateFromNew = dateFrom[2] + '.' + dateFrom[1] + '.' + dateFrom[0];
		// 					$(this).parent().parent().find('p.body-small').text(dateFromNew);

		// 				}
		// 			}, 500);
		// 		})
		// 	<?php else :
					// 		$fromDate = DateTime::createFromFormat('Y/m/d', get_user_meta($current_user->ID, 'from', true));
					// 		$formatFromDate = $fromDate->format('d.m.Y'); 
				?>
		// 		// $(window).load(function() {
		// 			$('#from-554').css('color', 'transparent');
		// 			let dateFrom = $("#um_field_554_from").append('<p class="from-format body-small position-absolute"><?php echo $formatFromDate ?></p>');

		// 		// })

		// 	<?php endif; ?>
		// 	<?php if (get_user_meta($current_user->ID, 'to', true) == '') : ?>
		// 		$("#to-554").on("change", function() {

		// 			if ($(this).val() != '') {
		// 				$(this).css('color', 'transparent');
		// 			}
		// 			if (!($("#um_field_554_to > p").length > 0)) {
		// 				$("#um_field_554_to").append('<p class="from-format body-small position-absolute"></p>');
		// 			}

		// 			setTimeout(() => {
		// 				if ($(this).parent().parent().find('input[type="hidden"]').val()) {
		// 					let dateFrom = $(this).parent().parent().find('input[type="hidden"]').val().split('/');
		// 					let dateFromNew = dateFrom[2] + '.' + dateFrom[1] + '.' + dateFrom[0];
		// 					$(this).parent().parent().find('p.body-small').text(dateFromNew);

		// 				}
		// 			}, 500);
		// 		})
		// 	<?php else :
					// 		$toDate = DateTime::createFromFormat('Y/m/d', get_user_meta($current_user->ID, 'to', true));
					// 		$formatToDate = $toDate->format('d.m.Y'); 
				?>

		// 		$(window).load(function() {
		// 			$('#to-554').css('color', 'transparent');
		// 			let dateto = $("#um_field_554_to").append('<p class="to-format body-small position-absolute"><?php echo $formatToDate ?></p>');

		// 		})
		// 	<?php endif; ?>
		// <?php endif ?>

		jQuery('.um-form form').attr('action', '<?php echo get_page_link() ?>?mother_type=<?php echo ($current_user->roles[0] == 'um_sanema-pienu') ? 'get' : 'donate'; ?>');


		$('#um_field_554_user_password input').attr('name', 'no-password');
		$('#um_field_554_confirm_user_password input').attr('name', 'no-confirm').after('<p class="body-smaller"></p>');

		$('#um_field_554_user_password input, #um_field_554_confirm_user_password input').on('keyup', function() {

			if (!$.trim($("#um_field_554_confirm_user_password input").val())) {
				$('#um_field_554_confirm_user_password input').attr('name', 'no-confirm');
			} else {
				$('#um_field_554_confirm_user_password input').attr('name', 'confirm_user_password-554');

			}

			if (!$.trim($("#um_field_554_user_password input").val())) {
				$('#um_field_554_user_password input').attr('name', 'no-password');
			} else {
				$('#um_field_554_user_password input').attr('name', 'user_password-554');

			}

			if ($('#um_field_554_confirm_user_password .um-field-error').length) {
				$('#um_field_554_confirm_user_password .um-field-error').remove();
			}

			// if ($('#um_field_554_user_password input[name="user_password-554"]').length) {
			// 	$('input[type="submit"]').prop('disabled', true);
			// }

			if ($('#um_field_554_user_password input').val() == $('#um_field_554_confirm_user_password input').val()) {
				$('#um_field_554_confirm_user_password input + p').text('');
				$("#um_field_554_confirm_user_password input").css({
					border: 'none',
					color: ''
				});
				$('#um_field_554_confirm_user_password input + p').css({
					'margin-top': '',
					'margin-left': '',
					'color': ''
				});

				$('input[type="submit"]').prop('disabled', false);
			}

			if ($('#um_field_554_user_password input').val() != $('#um_field_554_confirm_user_password input').val()) {
				$("#um_field_554_confirm_user_password input").css({
					border: '1px solid #F48576',
					color: '#F48576'
				});
				$('#um_field_554_confirm_user_password input + p').text('Paroles nesakrīt').css({
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
if (isset($_POST['user_password-554']) && isset($_POST['confirm_user_password-554'])) :
	$password = $_POST['user_password-554'];
	$confirmPassword = $_POST['confirm_user_password-554'];
?>
	<?php if (($password == $confirmPassword) && (strlen($password) < 8  && strlen($confirmPassword) < 8)) : ?>
		<script>
			jQuery(function() {
				$('#um_field_554_user_password .um-field-error').text('Šajā laukā ir jābūt vismaz 8 rakstzīmēm');
			})
		</script>
	<?php endif ?>
	<?php if ($password != $confirmPassword) : ?>
		<script>
			jQuery(function() {
				$("#um_field_554_confirm_user_password input").css({
					border: '1px solid #F48576',
					color: '#F48576'
				});
			})
		</script>
	<?php endif ?>

<?php endif ?>