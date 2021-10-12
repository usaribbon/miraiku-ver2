<div class="p-widget p-widget--samonpink">
<?php
// 契約農家を一覧表示する
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'farmer',
    'status' => 'publish',
    'orderby' => 'menu_order',
);
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
    <h2 class="title">契約農家のみなさま</h2>
    <ul class="list">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
        <li class="list__item"><a href="<?php the_permalink();?>"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php the_title();?></a></li>
<?php endwhile;?>
    </ul>
<?php endif;?>
</div>