<?php
/*
 * Template Name: page-quality
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__quality" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">みらいくのこだわり</h1>
                                    <p class="secondary">4 unique Miraiku qualities</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="c-box u-bg--triangle">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-page-subheader">
                            <h2 class="primary"><?php //echo nl2br(get_field('quality_copy')); 
							echo get_field('quality_copy');?></h2>
                        </header>

                        <div class="p-content">
                            <div class="left-sp center-pc"><?php the_field('quality_text');?></div>
                        </div>

                        <div class="point-box">
                            <div id="point1" class="p-content p-content--mutual p-content--s">
                                <div class="p-content__grid p-content__grid--image">
                                    <div class="p-content__grid__item">
                                        <p class="p-content-point"><span>安心ポイント</span>01</p>
                                        <h3 class="p-heading--samonpink"><?php echo nl2br(get_field('quality_point_title1'));?></h3>
                                        <div class="wrap">
                                            <div class="text p-editor"><?php the_field('quality_point_text1');?></div>
<?php
/* 農園の最新の一件を表示 */
$page_about = get_page_by_path('about');
$args = array(
    'posts_per_page' => 1,
    'post_type' => 'farmer',
    'status' => 'publish',
    'orderby' => 'menu_order',
    );
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                                            <p><a href="<?php the_permalink();?>" class="c-button c-button--full c-button--samonpink">生産者のご紹介</a></p>
<?php endwhile; ?>
<?php endif;?>
<?php wp_reset_query();?>
                                        </div>
                                    </div>
                                    <div class="p-content__grid__item">
                                        <figure class="image u-frame--brackets"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quality/quality1<?php echo $is_2x?>.jpg" alt="" /></figure>
                                    </div>
                                </div>
                            </div>

                            <div id="point2" class="p-content p-content--mutual p-content--s">
                                <div class="p-content__grid p-content__grid--image">
                                    <div class="p-content__grid__item">
                                        <p class="p-content-point"><span>安心ポイント</span>02</p>
                                        <h3 class="p-heading--samonpink"><?php echo nl2br(get_field('quality_point_title2'));?></h3>
                                        <div class="wrap">
                                            <div class="text p-editor"><?php the_field('quality_point_text2');?></div>
                                        </div>
                                    </div>
                                    <div class="p-content__grid__item">
                                        <figure class="image u-frame--brackets"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quality/quality2<?php echo $is_2x?>.jpg" alt="" /></figure>
                                    </div>
                                </div>
                            </div>

                            <div id="point3" class="p-content p-content--mutual p-content--s">
                                <div class="p-content__grid p-content__grid--image">
                                    <div class="p-content__grid__item">
                                        <p class="p-content-point"><span>安心ポイント</span>03</p>
                                        <h3 class="p-heading--samonpink"><?php echo nl2br(get_field('quality_point_title3'));?></h3>
                                        <div class="wrap">
                                            <div class="text p-editor"><?php the_field('quality_point_text3');?></div>
                                            <p><a href="<?php echo home_url( '/sickchild' ); ?>" class="c-button c-button--full c-button--samonpink">病児・病後児保育について</a></p>
                                        </div>
                                    </div>
                                    <div class="p-content__grid__item">
                                        <figure class="image u-frame--brackets"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quality/quality3<?php echo $is_2x?>.jpg" alt="" /></figure>
                                    </div>
                                </div>
                            </div>

                            <div id="point4" class="p-content p-content--mutual p-content--s">
                                <div class="p-content__grid p-content__grid--image">
                                    <div class="p-content__grid__item">
                                        <p class="p-content-point"><span>安心ポイント</span>04</p>
                                        <h3 class="p-heading--samonpink"><?php echo nl2br(get_field('quality_point_title4'));?></h3>
                                        <div class="wrap">
                                            <div class="text p-editor"><?php the_field('quality_point_text4');?></div>
                                        </div>
                                    </div>
                                    <div class="p-content__grid__item">
                                        <figure class="image u-frame--brackets"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quality/quality4<?php echo $is_2x?>.jpg" alt="" /></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- /.c-box -->

                <div class="u-bg--triangle">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>