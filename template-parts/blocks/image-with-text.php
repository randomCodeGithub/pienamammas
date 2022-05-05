<?php
$image = get_field('image');
$text = get_field('text') ?: 'text...';
$reverse = get_field('reverse');

?>

<div class="img-text d-flex align-items-center <?php if ($reverse) echo 'flex-md-row-reverse'; ?> flex-column flex-md-row">
    <div class="img-block d-flex align-items-center">
        <img class="w-100" src="<?php echo $image ?>" alt="" />
    </div>
    <div class="text-block">
        <p class="body-small"><?php echo $text ?></p>
    </div>
</div>