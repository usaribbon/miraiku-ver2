<?php
// aboutを親とするページを一覧表示する
$page_about = get_page_by_path('about');
$args = array(
    'posts_per_pag' => -1,
    'post_type' => 'page',
    'orderby' => 'menu_order',
    'post_parent' => $page_about->ID,
    );
?>
<?php $the_query = new WP_Query($args);?>
<div class="p-widget p-widget--chigusablue">
    <h2 class="title">みらいくについて</h2>
<?php if ($the_query->have_posts()):?>
    <ul class="list">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
        <li class="list__item"><a href="<?php the_permalink();?>"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php the_title();?></a></li>
<?php endwhile; ?>
        <li class="list__item"><a href="/history"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> みらいくの歴史</a></li>
    </ul>
<?php endif;?>
</div>
<?php wp_reset_query();?>