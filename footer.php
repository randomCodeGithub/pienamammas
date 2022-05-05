</div>
<!-- footer -->
<!-- <img src="./img/footer_blob.png" alt=""> -->

<footer style="<?php if (!is_page('kruts-piens')) echo "z-index: -1;"; ?>">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-12 col-lg-4">
                <div class="contacts">
                    <p>Sazinies ar mums</p>
                    <?php $contactUs = get_field('contact_us', 'option'); ?>
                    <?php if ($contactUs) : ?>
                        <ul class="p-0">
                            <li>
                                <p class="body-smaller">
                                    <span>Tālrunis:</span> <a href="tel:<?php echo $contactUs['phone']; ?>"><?php echo $contactUs['phone']; ?></a>
                                </p>
                            </li>
                            <li>
                                <p class="body-smaller">
                                    <span>E-pasts:</span> <a href="mailto:<?php echo $contactUs['email']; ?>"><?php echo $contactUs['email']; ?></a>
                                </p>
                            </li>
                        </ul>

                    <?php endif; ?>
                </div>

                <p class="body-smaller">
                    &copy; <?php echo get_bloginfo("name") . " " . date("Y") ?>. Visas tiesības aizsargātas.
                </p>
            </div>
            <div class="col-12 col-lg-8">
                <div class="choose text-center">
                    <?php
                    $donateMilk = get_field('donate_milk', 'option');
                    $takeMilk = get_field('take_milk', 'option');
                    if ($donateMilk['name']) :
                    ?>
                        <a href="<?php echo $donateMilk['link'] ?>" class="pm-btn pm-btn__white"><?php echo $donateMilk['name'] ?></a>
                    <?php endif;
                    if ($takeMilk['name']) :
                    ?>
                        <a href="<?php echo $takeMilk['link'] ?>" class="pm-btn pm-btn__pink-with-border"><?php echo $takeMilk['name'] ?></a>

                    <?php endif ?>

                </div>

                <p class="body-smaller position-absolute"><?php echo get_field('notice', 'option') ?>
                </p>
            </div>
        </div>
    </div>
</footer>
<?php get_template_part('template-parts/foot'); ?>