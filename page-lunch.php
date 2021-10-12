<?php
/*
 * Template Name: page-lunch
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__lunch" class="l-main">
            <div class="l-main__inner">
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">今日の給食</h1>
                                    <p class="secondary">Today's lunch</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="c-box u-bg--triangle">
                    <div class="c-box__fixed c-box__padding">
<?php
// 園舎を一覧表示する
$page_about = get_page_by_path('about');
$args = array(
    'cat' => 1,
    'posts_per_page' => 10,
    'post_type' => 'post',
    'status' => 'publish',
    'orderby' => 'desc',
    'paged' => $paged,
    
    );
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                        <div class="p-todayslunch u-frame--arc">
                            <div class="grid">
                                <div class="image grid__item">
                                    <figure class="image u-frame--brackets"><?php the_post_thumbnail( 'image830x630' ); ?></figure>
                                </div>
                                <div class="content grid__item">
                                    <header class="p-todayslunch-header">
                                        <h2 class="primary"><?php the_title();?></h2>
                                        <?php /*
                                        <p class="secondary">Today's lunch</p>
                                        */
                                        ?>
                                    </header>
                                    <div class="recipe p-editor">
                                        <div class="p-editor">
                                            <?php the_content();?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php endwhile; ?>
<?php include( 'template/common-pagination.php'); ?>
<?php endif;?>
<?php wp_reset_query();?>

                    </div>
                </section><!-- /.c-box -->

                <div class="u-bg--triangle">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>