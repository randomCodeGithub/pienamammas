<?php
$bullet_color = get_field('bullet_color') ?: 'orange';
$text = get_field('text');
?>
<div class="<?php echo ($bullet_color == 'orange') ? 'orange-list' : 'grey-list'; ?>
">
    <!-- <p>
        Novērtējumu par iespēju izmantot donora pienu savam bērnam veic
        viņa vecāki, pamatojoties uz trim galvenajiem faktoriem:
    </p>
    <ul>
        <li>
            <p class="body-small">
                donore var ziedot pienu tikai tad, ja veselības stāvoklis to
                atļauj un netiek konstatētas ar ziedošanu nesaderīgas
                veselības problēmas;
            </p>
        </li>
        <li>
            <p class="body-small">
                personīga saziņa starp donoru un vienu no vecākiem, kas
                izvēlējies saņemt donoru pienu;
            </p>
        </li>
        <li>
            <p class="body-small">donora mātes asins analīžu rezultāti</p>
        </li>
    </ul> -->
    <?php echo $text ?>
</div>