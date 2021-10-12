<?php get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main id="l-main" class="l-main">
            <div id="page__preschool" class="l-main__inner">

                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">園舎紹介</h1>
                                    <p class="secondary">preschool</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="c-box u-bg--stripe--type1">
                    <div class="c-box__fixed c-box__padding">
                        <div class="c-column">
                            <div class="c-column__inner">
                                <div class="c-column__item">
                                    <section>
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
                                        <h2 class="p-heading--seagreen"><?php echo $preschool_category->name;?></h2>

                                        <div class="p-content">
                                            <div class="preschool-box">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                                                <div class="preschool-box__item">
                                                
<?php $preschool_link_url = get_field('preschool_link_url');?>
<?php if(empty($preschool_link_url)):?>
                                                    <a href="<?php the_permalink();?>" class="frame">
                                                        <p class="title"><?php the_title();?></p>
                                                        <p class="text"><?php the_field('preschool_feature_copy');?></p>
                                                    </a>
<?php else:?>
                                                    <a href="<?php the_field('preschool_link_url');?>" class="frame" target="_blank">
                                                        <p class="title"><?php the_title();?></p>
                                                        <p class="text"><?php the_field('preschool_feature_copy');?></p>
                                                    </a>
<?php endif;?>

                                                </div>
<?php endwhile;?>
                                            </div>
                                        </div>
<?php endif;?>
<?php endforeach;?>
<?php endif;?>
                                    </section>
                                </div><!-- /.c-column__primary -->

                                <div class="c-column__item">
<?php get_sidebar('preschool');?>
                                </div><!-- /.c-column__secondary -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.c-box -->

                <div class="u-bg--stripe--type1">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>

            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>
