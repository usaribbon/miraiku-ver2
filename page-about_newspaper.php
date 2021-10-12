<?php
/*
 * Template Name: page-about_newspaper
 */
get_header(); ?>


<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__about" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">みらいく新聞</h1>
                                    <p class="secondary">news paper</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div id="newspaper" class="c-box u-bg--circle--lightgray">
                    <div class="c-box__fixed c-box__padding">
                        <div class="c-column">
                            <div class="c-column__inner">
                                <div class="c-column__item">
                                    <section>
                                        <header class="p-page-subheader">
                                            <h2 class="primary">みらいく 新聞</h2>
                                        </header>
										
										<div class="p-content newspaper_lead">
                                            <p>みらいくでは、園での活動や行事、先生の紹介などを掲載した新聞を発行しています。</p>
                                        </div>

<?php
$args = array(
    'posts_per_page' => 1,
    'post_type' => 'newspaper',
    'status' => 'publish',
    'orderby' => 'menu_order',
    'paged' => $paged,
    );
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
										
                                        <div id="recent" class="p-content">
                                            <h3 class="p-heading--redorange">最新号のご紹介</h3>
											<h4><?php the_title(); ?></h4>
                                            <ul>
												<?php if(have_rows('images')): ?>
												<?php while(have_rows('images')): the_row(); ?>
												<?php 
													$image = get_sub_field('image');
													$src = $image['sizes']['newspaper'];
													$src_l = $image['sizes']['newspaper_l'];
													//$url = get_field('pdf').'#'.get_sub_field('page');?>
												<li><a href="<?php echo $src_l; ?>"rel="lightbox"  ><img src="<?php echo $src; ?>"></a></li>
												<?php endwhile; ?>
												<?php endif; ?>
											</ul>
											<p>※クリックで拡大表示します<br>
											※下のアーカイブよりPDFでご覧いただけます
											</p>
											
                                        </div>
										
									
<?php endwhile; ?>
<?php endif;?>
<?php wp_reset_query();?>
                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">アーカイブ</h3>
                                            <div class="white_box">
											<?php
											$args = array(
												'posts_per_page' => 10,
												'post_type' => 'newspaper',
												'status' => 'publish',
												'orderby' => 'menu_order',
												'paged' => $paged,
												);
											?>
											<?php $the_query = new WP_Query($args);?>
											<?php if ($the_query->have_posts()):?>
											<ul>
												<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
												<li><a href="<?php the_field('pdf'); ?>" target="_blank"><?php the_title(); ?></a></li>
												<?php endwhile; ?>
											</ul>
											<?php include( 'template/common-pagination.php'); ?>
											<?php endif;?>
											<?php wp_reset_query();?>
											</div>
										</div>                                        
                                    </section>
                                </div><!-- /.c-column__primary -->

                                <div class="c-column__item">
<?php get_sidebar( 'about' ); ?>
                                </div><!-- /.c-column__secondary -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.c-box -->

                <div class="u-bg--circle--lightgray">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>