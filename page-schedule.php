<?php
/*
 * Template Name: page-schedule
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__schedule" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">園全体のスケジュール</h1>
                                    <p class="secondary">schedule</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="c-box u-bg--stripe--type1">
                    <div class="c-box__fixed c-box__padding">
                        <div class="p-content p-content--s">
                            <h3 class="p-heading--brightyellow">園全体のスケジュール</h3>

                            <p class="u-align--center">みらいくでは、年間を通して様々なイベントを行っております。</p>
                            <figure class="image_pc show-pc hide-sp"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/schedule/schedule_pc@2x.jpg" alt=""/>
							</figure>
                           	<figure class="image_sp show-sp hide-pc"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/schedule/schedule_sp.jpg" alt=""/>
							</figure>
                            <!--<div class="google-calendar"><iframe src="https://calendar.google.com/calendar/embed?src=miraikuhoiku%40gmail.com&ctz=Asia%2FTokyo" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe></div>
							</div>-->
                        </div>

<?php
// 園舎を一覧表示する
$page_about = get_page_by_path('about');
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'preschool',
    'status' => 'publish',
    'orderby' => 'menu_order',
    );
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
                        <div class="p-content p-content--s">
                            <h3 class="p-heading--brightyellow">各園舎のスケジュール</h3>
                            <ul class="p-link-box p-link-box--first p-link-box--padding">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>

<?php $preschool_link_url = get_field('preschool_link_url');?>
<?php if(empty($preschool_link_url)):?>
                                <li class="p-link-box__item"><a href="<?php the_permalink();?>#schedule" class="c-button c-button--samonpink"><?php the_title();?></a></li>
<?php else:?>
                                <li class="p-link-box__item"><a href="<?php the_field('preschool_link_url');?>" class="c-button c-button--samonpink" target="_blank"><?php the_title();?></a></li>
<?php endif;?>

<?php endwhile; ?>
                            </ul>
                        </div>
<?php endif;?>
<?php wp_reset_query();?>

                    </div>
                </section><!-- /.c-box -->

                <div class="u-bg--stripe--type1">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>