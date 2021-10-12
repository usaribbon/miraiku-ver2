<div class="p-widget p-widget--seagreen">
<?php
// 園舎カテゴリごとに園舎を一覧表示する
$preschool_categories = get_terms('preschool_category');
if( ! empty($preschool_categories)):
foreach($preschool_categories as $preschool_category):?>
<?php $args = array(
    'posts_per_page' => -1,
    'post_type' => 'preschool',
    'status' => 'publish',
    'orderby' => 'menu_order',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'preschool_category',
            'field'    => 'slug',
            'terms'    => array( $preschool_category->slug ),
        ),
    ),
);
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
    <h2 class="title"><?php echo $preschool_category->name;?></h2>
    <ul class="list">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
<?php $preschool_link_url = get_field('preschool_link_url');?>
<?php if(empty($preschool_link_url)):?>
        <li class="list__item"><a href="<?php the_permalink();?>"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php the_title();?></a></li>
<?php else:?>
        <li class="list__item"><a href="<?php the_field('preschool_link_url');?>" target="_blank"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php the_title();?></a></li>
<?php endif;?>
<?php endwhile;?>
    </ul>
<?php endif;?>
<?php endforeach;?>
<?php endif;?>
</div>